<?php
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Exception\SdkException;

class CurlHttpClient{

    //The basecURL will be re-used once it is created.
    private $basecURL;
    private $rawResponse;
    private $faultHandler;

    public function __construct($curl = null)
    {
        if(isset($curl)){
              $this->basecURL = $curl;
        }else{
              $this->basecURL = new BaseCurl();
        }
    }

    public function makeAPICall($url, $method, array $headers, $body, $timeOut, $verifySSL){
        $this->clearAllPreviousData();
        $this->prepareRequest($url, $method, $headers, $body, $timeOut, $verifySSL);
        $this->executeRequest();
        $this->handleErrors();
        return $this->getIntuitResponse();
    }

    private function clearAllPreviousData(){
        $this->response = null;
        $this->faultHandler = null;
    }
    /**
     * Set the cURL with all required parameters.
     * For Query Parameters, for get, please append it to the URI. For POST, please use the $body
     */
    private function prepareRequest($url, $method, array $headerArray, $body, $timeOut, $verifySSL){
        //Set basic Curl Info
        $curl_opt = [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => trim($method),
            //Set return transfer to true so the curl_exec will return the result
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $this->getHeaders($headerArray),
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

        //Set SSL. Only Enabled for OAuth 2
        $this->setSSL($curl_opt, $verifySSL);

        $this->intializeCurl();
        $this->basecURL->setupCurlOptArray($curl_opt);
    }

    private function executeRequest(){
        $this->rawResponse = $this->basecURL->execute();
    }

    private function handleErrors(){
        if($this->basecURL->errno() || $this->basecURL->error()){
           $errorMsg = $this->basecURL->error();
           $errorNumber = $this->basecURL->errno();
           throw new SdkException("cURL error during making API call. cURL Error Number:[" . $errorNumber . "] with error:[" . $errorMsg . "]");
        }
    }

    private function getIntuitResponse(){
        $headerSize = $this->basecURL->getInfo(CURLINFO_HEADER_SIZE);
        $rawHeaders = mb_substr($this->rawResponse, 0, $headerSize);
        $rawBody = mb_substr($this->rawResponse, $headerSize);
        $httpStatusCode = $this->basecURL->getInfo(CURLINFO_HTTP_CODE);
        $IntuitResponse = new IntuitResponse($rawHeaders, $rawBody, $httpStatusCode);
        return $IntuitResponse;
    }

    private function intializeCurl(){
        if($this->basecURL->isCurlSet()){ return; }
        else {$this->basecURL->init();}
    }

    private function getHeaders($headers){
      if(!isset($headers) || empty($headers)){
          throw new SdkException("Error. The headers set for cURL are either NULL or Empty");
      }else{
          $convertedHeaders = $this->convertHeaderArrayToHeaders($headers);
          return $convertedHeaders;
      }
    }

    private function setSSL(&$curl_opt, $verifySSL){
      if($verifySSL){
          $curl_opt[CURLOPT_SSL_VERIFYPEER] = true;
          $curl_opt[CURLOPT_SSL_VERIFYHOST] = 2;
          $curl_opt[CURLOPT_CAINFO] = dirname(dirname(__FILE__)) . "/OAuth/OAuth2/certs/cacert.pem"; //Pem certification Key Path
      }
    }

    /**
     * Convert an Array to Curl Headers
     * @param array $headerArray The request headers
     * @return Curl Array Headers
     */
    public function convertHeaderArrayToHeaders(array $headerArray){
         $headers = array();
         foreach($headerArray as $k => $v){
              $headers[] = $k . ":" . $v;
         }
         return $headers;
    }

    public function closeConnection(){
        $this->basecURL->close();
    }

}

 ?>
