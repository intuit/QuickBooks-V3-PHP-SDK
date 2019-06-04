<?php

 namespace QuickBooksOnline\API\Core\HttpClients;

 use QuickBooksOnline\API\Core\CoreConstants;
 use QuickBooksOnline\API\Exception\SdkException;
 use GuzzleHttp\Client;
 use GuzzleHttp\Psr7\Request;
 use GuzzleHttp\Exception\RequestException;
 use GuzzleHttp\Psr7;

 /**
  * Class GuzzleHttpClient
  *
  * Use GuzzleHttp Client to make HTTP/HTTPS request.
  *
  * @package QuickBooksOnline
  */
 class GuzzleHttpClient implements HttpClientInterface
 {
     /**
      * @var \GuzzleHttp\Client Guzzle Client
      */
     private $guzzleClient = null;

     /**
     * @var IntuitResponse | False The parsed response from curl client to Intuit customized response
     */
     private $intuitResponse = false;

     /**
      * @var array Store the Options for GuzzleClient
      */
     private $guzzleOpts = [];

     /**
      * Constructor for GuzzleHttpClient
      * @param Client guzzleClient passed to the constructor
      */
     public function __construct(Client $guzzleClient = null){
        if(isset($guzzleClient)){
            $this->guzzleClient = $guzzleClient;
        }else{
            $this->guzzleClient = new Client();
        }
     }

     /**
      * @inheritdoc
      */
     public function makeAPICall($url, $method, array $headers, $body, $timeOut, $verifySSL){
        $this->clearResponse();
        try{
            $this->prepareRequest($url, $method, $headers, $body, $timeOut, $verifySSL);
            $guzzleResponse = $this->guzzleClient->request($method, $url, $this->guzzleOpts);
            $this->setIntuitResponse($guzzleResponse);
            return $this->getLastResponse();
        } catch(RequestException $e){
            if($e->hasResponse()){
                throw new SdkException("A networking error occurs during Guzzle client request:" . Psr7\str($e->getResponse()));
            }else{
                throw new SdkException("Network Error:" . $e->getMessage());
            }
        }
     }

     /**
      * @inheritdoc
      */
     public function prepareRequest($url, $method, array $headers, $body, $timeOut, $verifySSL){
        $opts = [];

        if (isset($method) && $method !== "GET" && isset($body)) {
            $opts['body'] = $body;
        }

        if(isset($verifySSL) && $verifySSL == true){
            $opts['verify'] = CoreConstants::getCertPath();
        }

        $opts['timeout'] = isset($timeOut) ? $timeOut : 100;
        $opts['headers'] = $headers;
        $this->guzzleOpts = $opts;
     }

     /**
      * @inheritdoc
      */
     public function setIntuitResponse($response){
         $headersArray = $response->getHeaders();
         $body = $response->getBody();
         $httpStatusCode = $response->getStatusCode();
         $theIntuitResponse = new IntuitResponse($headersArray, $body, $httpStatusCode, false);
         $this->intuitResponse = $theIntuitResponse;
     }

     /**
      * @inheritdoc
      */
     public function getLastResponse(){
         return $this->intuitResponse;
     }

     /**
      * Before making any API call, clear the stored response from previous request.
      */
     public function clearResponse(){
       $this->intuitResponse = false;
     }
}
