<?php
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\CoreConstants;



class IntuitResponse{

   private $headers;

   private $body;

   private $httpResponseCode;

   private $faultHandler;

   private $contentType;

   public function __construct($passedHeaders, $passedBody, $passedHttpResponseCode){
          if(isset($passedHeaders)){
              $this->setHeaders($passedHeaders);
          }else{
              throw new SdkException("Headers are null.");
          }

          if(isset($passedBody) && !empty($passedBody)){
              $this->body = $passedBody;
          }else{
              throw new SdkException("Http Status Code:[" .$passedHttpResponseCode . "] Http Response Body are null or Empty.");
          }

          if(isset($passedHttpResponseCode)){
              $this->httpResponseCode = (int)$passedHttpResponseCode;
              if($this->httpResponseCode < 200 || $this->httpResponseCode >= 300){
                 $this->faultHandler = new FaultHandler();
                 $this->faultHandler->setHttpStatusCode($this->httpResponseCode);
                 $this->faultHandler->setResponseBody($this->body);
                 $this->faultHandler->parseResponse($this->body, $this->contentType);
                 //Manually set the error message
                 $this->faultHandler->setOAuthHelperError("Invalid auth/bad request (got a " .$passedHttpResponseCode . ", expected HTTP/1.1 20X or a redirect)");
              }
          }else{
              throw new SdkException("Passed Http status code is null.");
          }
   }

   public function setHeaders($rawHeaders){
        $rawHeaders = str_replace("\r\n", "\n", $rawHeaders);
        $response_headers_rows = explode("\n", trim($rawHeaders));
        foreach ($response_headers_rows as $line) {
            if(strpos($line, ': ') == false){
                continue;
            }else {
                list($key, $value) = explode(': ', $line);
                $this->headers[$key] = $value;
                //set response content type
                $this->setContentType($key, $value);
            }
        }

   }

   private function setContentType($key, $val){
     $trimedKey = trim($key);
     if(strcasecmp($trimedKey, CoreConstants::CONTENT_TYPE) == 0){
         $this->contentType = trim($val);
     }
   }

   public function getHeaders(){
       return $this->headers;
   }

   public function getBody(){
       return $this->body;
   }

   public function getStatusCode(){
       return $this->httpResponseCode;
   }

   public function getFaultHandler(){
       return $this->faultHandler;
   }

   public function getResponseContentType(){
       return $this->contentType;
   }

}
