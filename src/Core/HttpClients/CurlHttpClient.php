<?php

namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2LoginHelper;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Diagnostics\LogRequestsToDisk;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\CoreConstants;

/**
 * Class CurlHttpClient
 *
 * A Http Client using PHP cURL extension to send HTTP/HTTPS request to QuickBooks Online
 * @package QuickBooksOnline
 *
 */
class CurlHttpClient implements HttpClientInterface{

    /**
    * @var BaseCurl The basecURL instance will be used for performing Http/Https client request.
    */
    private $basecURL = null;

    /**
    * @var IntuitResponse | False The parsed response from curl client to Intuit customized response
    */
    private $intuitResponse = false;

    /**
     * Get the Logging component for the REST service
     * @var LogRequestsToDisk
     */
    protected $requestLogging;

    /**
     * The constructor for constructing the cURL http client for making API calls
     * @param BaseCurl $curl    A predefined BaseCurl instance to be used in this client
     */
    public function __construct(BaseCurl $curl = null)
    {
        if(isset($curl)){
              $this->basecURL = $curl;
        }else{
              $this->basecURL = new BaseCurl();
        }
    }

    /**
     * Creates Request Response Logging mechanism.
     * @param ServiceContext serviceContext The serivce context object.
     */
    public function createRequestLoggingHelper($serviceContext){
        $this->requestLogging = CoreHelper::GetRequestLogging($serviceContext);
    }

    /**
     * @inheritdoc
     */
    public function makeAPICall($url, $method, array $headers, $body, $timeOut, $verifySSL){

        $this->LogPlatformRequests($body, $headers, true);
        $this->clearResponse();
        $this->prepareRequest($url, $method, $headers, $body, $timeOut, $verifySSL);
        $rawResponse = $this->executeRequest();
        $this->handleErrors();
        $this->setIntuitResponse($rawResponse);
        $this->closeConnection();
        $this->LogAPIResponseToLog($this->intuitResponse->getBody(), $this->intuitResponse->getHeaders());

        return $this->getLastResponse();
    }

    /**
     * @inheritdoc
     */
    public function prepareRequest($url, $method, array $headers, $body, $timeOut, $verifySSL){
        //Set basic Curl Info
        $curl_opt = [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => trim($method),
            //Set return transfer to true so the curl_exec will return the result
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $this->getHeaders($headers),
            //10 seconds is allowed to make the connection to the server
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_TIMEOUT => isset($timeOut) ? $timeOut : 100,
            CURLOPT_RETURNTRANSFER => true,
            //When CURLOPT_HEADER is set to 0 the only effect is that header info from the response is excluded from the output.
            //So if you don't need it that's a few less KBs that curl will return to you.
            //In our case, header is required
            CURLOPT_HEADER => true
        ];

        if ($method !== "GET" && isset($body)) {
          $curl_opt[CURLOPT_POSTFIELDS] = $body;
        }

        //Set SSL. Only Enabled for OAuth 2 Request
        $this->setSSL($curl_opt, $verifySSL);

        $this->initializeCurl();
        $this->basecURL->setupCurlOptArray($curl_opt);
    }

    /**
     * Before making any API call, clear the stored response from previous request.
     */
    public function clearResponse(){
      $this->intuitResponse = false;
    }

    /**
     * Send a request and return the response
     * @return mixed <b>TRUE</b> on success or <b>FALSE</b> on failure. However, if the <b>CURLOPT_RETURNTRANSFER</b>
     */
    private function executeRequest(){
        return $this->basecURL->execute();
    }

    /**
     * The error during HTTP/HTTPS call. For example, the certificate expired. The server respond time out. It has nothing to do with the
     * status code returned from server.
     */
    private function handleErrors(){
        if($this->basecURL->errno() || $this->basecURL->error()){
           $errorMsg = $this->basecURL->error();
           $errorNumber = $this->basecURL->errno();
           throw new SdkException("cURL error during making API call. cURL Error Number:[" . $errorNumber . "] with error:[" . $errorMsg . "]");
        }
    }

    /**
     * @inheritdoc
     */
    public function setIntuitResponse($response){
        $headerSize = $this->basecURL->getInfo(CURLINFO_HEADER_SIZE);
        $rawHeaders = mb_substr($response, 0, $headerSize);
        $rawBody = mb_substr($response, $headerSize);
        $httpStatusCode = $this->basecURL->getInfo(CURLINFO_HTTP_CODE);
        $theIntuitResponse = new IntuitResponse($rawHeaders, $rawBody, $httpStatusCode, true);
        $this->intuitResponse = $theIntuitResponse;
    }

    /**
     * Check if the cURL instance exists. If not or closed, create a new BaseCurl instance for this Http client
     */
    private function initializeCurl(){
        if($this->basecURL->isCurlSet()){ return; }
        else {$this->basecURL->init();}
    }

    /**
    * Get headers for the QuciKbooks Online Response
    */
    private function getHeaders($headers){
      if(!isset($headers) || empty($headers)){
          throw new SdkException("Error. The headers set for cURL are either NULL or Empty");
      }else{
          $convertedHeaders = $this->convertHeaderArrayToHeaders($headers);
          return $convertedHeaders;
      }
    }

    /**
     * Set the SSL certifcate path and corresponding varaibles for cURL
     */
    private function setSSL(&$curl_opt, $verifySSL){
      $curl_opt[CURLOPT_SSL_VERIFYPEER] = true;
      if($verifySSL){
          $curl_opt[CURLOPT_SSL_VERIFYHOST] = 2;
          //based on spec, if TLS 1.2 is supported, it will use the TLS 1.2 or latest version by default
          //$curl_opt[CURLOPT_SSLVERSION] = 6;
          $curl_opt[CURLOPT_CAINFO] = CoreConstants::getCertPath(); //Pem certification Key Path
      } else {
          $curl_opt[CURLOPT_SSL_VERIFYHOST] = 0;
      }
    }

    /**
     * Convert an Array to Curl Headers
     * @param array $headerArray The request headers
     * @return array Curl Headers
     */
    public function convertHeaderArrayToHeaders(array $headerArray){
         $headers = array();
         foreach($headerArray as $k => $v){
              $headers[] = $k . ":" . $v;
         }
         return $headers;
    }

    /**
     * close the connection of current http client
     */
    private function closeConnection(){
        $this->basecURL->close();
    }

    /**
     * @inheritdoc
     */
    public function getLastResponse(){
        return $this->intuitResponse;
    }

    /**
     * Logs the Platform Request to Disk.
     * @param string request body to log.
     * @param array headers HTTP headers of the request/response
     * @param bool isRequest Specifies whether the xml is request or response.
     */
    public function LogPlatformRequests($body, $headers, $isRequest){
        if ($this->requestLogging) {
            $this->requestLogging->LogPlatformRequests($body, CoreConstants::OAUTH2_TOKEN_ENDPOINT_URL, $headers, $isRequest);
        }
    }

    /**
     * Log API Reponse to the Log directory that user specified.
     * @param string $body The requestBody
     * @param array $httpHeaders  The headers for the request
     */
    public function LogAPIResponseToLog($body, $httpHeaders){
        if ($this->requestLogging) {
            $httpHeaders = array_change_key_case($httpHeaders, CASE_LOWER);
            if (strcasecmp($httpHeaders[strtolower(CoreConstants::CONTENT_TYPE)], CoreConstants::CONTENTTYPE_APPLICATIONXML) == 0 ||
                strcasecmp($httpHeaders[strtolower(CoreConstants::CONTENT_TYPE)], CoreConstants::CONTENTTYPE_APPLICATIONXML_WITH_CHARSET) == 0) {
                $body = $this->parseStringToDom($body);
            }

            $this->LogPlatformRequests($body, $httpHeaders, false);
        }
    }

    /**
     * Parse a String xml to DOM structure for easy read
     * @param String $string   The String representation
     * @return string|bool The DOM structured XML
     */
    private function parseStringToDom($string){
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML($string);
        $dom->formatOutput = TRUE;
        return $dom->saveXml();
    }

    /**
     * Enable the logging function
     *
     */
    public function enableLog() {
        if ($this->requestLogging) {
            $this->requestLogging->EnableServiceRequestsLogging = true;
        }
    }

    /**
     * Set Log directory
     * @param String $logDirectory
     */
    public function setLogDirectory($logDirectory){
        if ($this->requestLogging) {
            $this->requestLogging->ServiceRequestLoggingLocation = $logDirectory;
        }
    }

}
