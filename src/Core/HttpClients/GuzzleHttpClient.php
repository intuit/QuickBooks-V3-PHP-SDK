<?php
/*******************************************************************************
 * Copyright (c) 2017 Intuit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *******************************************************************************/
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
  * @package QuickbooksOnline
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
      * @var asscoiated Array  Store the Options for GuzzleClient
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
