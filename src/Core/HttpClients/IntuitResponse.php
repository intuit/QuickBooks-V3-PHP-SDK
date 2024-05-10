<?php

namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\CoreConstants;


/**
 * Class IntuitResponse
 *
 * An Object to store all response related information
 * @package QuickBooksOnline
 *
 */
class IntuitResponse{

   /**
    * The header of Intuit Response.
    * @var array
    */
   private $headers;

   /**
    * The body of Intuit Response.
    * @var string
    */
   private $body;

   /**
    * The http status code of Intuit Response.
    * @var int
    */
   private $httpResponseCode;

   /**
    * The associated error message for this response, if the status code is not 200.
    * @var FaultHandler
    */
   private $faultHandler = false;

   /**
    * The content type of response. It can be JSON or XML
    * @var String
    */
   private $contentType;

   /**
    * Used for Intuti to debug the cause for non-200 http status code.
    * If a developer is getting non-200 code and he is not sure what happened,
    * provide this id to the support ticket.
    * @var String
    */
   private $intuit_tid;

   /**
    * Constructor. Set the Intuit Response based on the curl Executation result
    * @param String | Array   http client returned eaders
    * @param String           http client returned body
    * @param Int              http client returned status code
    * @param Boolean          Should the headers,body and response code be handlered. Default to false
    * @param String           Client Name that return the response
    */
   public function __construct($passedHeaders, $passedBody, $passedHttpResponseCode, $parse = false, $clientName = CoreConstants::CLIENT_CURL){
          if($parse == false){
              foreach ($passedHeaders as &$passedHeader ){
                  if( is_array( $passedHeader ) ){
                      $passedHeader = implode( "; ", $passedHeader );
                  }
              }
              $this->setResponseAsItIs($passedHeaders, $passedBody, $passedHttpResponseCode);
          }else{
              $this->parseResponseToIntuitResponse($passedHeaders, $passedBody, $passedHttpResponseCode, $clientName);
          }
   }

   /**
    * Do not parse the response. Just set it as it is.
    * @param String | Array   http client returned eaders
    * @param String           http client returned body
    * @param Int              http client returned status code
    * @throws  SdkExcpetion   If any of the passed parameter is undefined.
    */
   private function setResponseAsItIs($passedHeaders, $passedBody, $passedHttpResponseCode){
      if(isset($passedHeaders) && isset($passedBody) && isset($passedHttpResponseCode)){
          $this->headers = $passedHeaders;
          $this->body = $passedBody;
          $this->httpResponseCode = $passedHttpResponseCode;
          $passedHeaders = array_change_key_case($passedHeaders, CASE_LOWER);
          $this->setContentType(CoreConstants::CONTENT_TYPE, $passedHeaders[strtolower(CoreConstants::CONTENT_TYPE)]);
          $this->setIntuitTid(CoreConstants::INTUIT_TID, $passedHeaders[strtolower(CoreConstants::INTUIT_TID)]);
          $this->setFaultHandler($passedBody, $passedHttpResponseCode, $this->getIntuitTid());
      }else{
          throw new SdkException("Passed Headers, body, or status code is Null.");
      }
   }

   /**
    * Parse the response from different http client response and set the Intuit response.
    * @param String | Array   http client returned eaders
    * @param String           http client returned body
    * @param Int              http client returned status code
    * @param String           http client name
    */
   private function parseResponseToIntuitResponse($passedHeaders, $passedBody, $passedHttpResponseCode, $clientName){
     if($clientName == CoreConstants::CLIENT_CURL){
        if(isset($passedHeaders)){
            $this->setHeaders($passedHeaders);
        }else{
            throw new SdkException("The response header from cURL is null.");
        }

        if(isset($passedBody)){
            $this->body = $passedBody;
        }else{
            throw new SdkException("The Http Response Body from cURL is null.");
        }

        if(isset($passedHttpResponseCode)){
            $this->httpResponseCode = (int)$passedHttpResponseCode;
            $this->setFaultHandler($this->getBody(), $this->getStatusCode(), $this->getIntuitTid());
        }else{
            throw new SdkException("Passed Http status code from cURL is null.");
        }
     }else{
        throw new SdkException("This should not be thrown. IntuitResponse currently don't support parse other client response to Intuit Response other than curl.");
     }

   }

   /**
    * This is used to set the detailed error coming from QuickBooks Online detail
    * @param String              Response Body
    * @param Integer             Response Status code
    * @param String              Intuit tid on the response header
    */
   private function setFaultHandler($body, $httpResponseCode, $tid){
     //If the status code is non-200
     if($httpResponseCode < 200 || $httpResponseCode >= 300){
        $this->faultHandler = new FaultHandler();
        $this->faultHandler->setHttpStatusCode($httpResponseCode);
        $this->faultHandler->setResponseBody($body);
        $this->faultHandler->setIntuitTid($tid);
        //A standard message for now.
        //TO DO: Wait V3 Team to provide different message for different response.
        $this->faultHandler->setHelpMsg("Invalid auth/bad request (got a " . $httpResponseCode . ", expected HTTP/1.1 20X or a redirect)");
        if($this->getResponseContentType() != null && (strcasecmp($this->getResponseContentType(), CoreConstants::CONTENTTYPE_APPLICATIONXML) == 0 ||
                strcasecmp($this->getResponseContentType(), CoreConstants::CONTENTTYPE_TEXTXML) == 0)){
            $this->faultHandler->parseResponse($body);
        }
     }else{
        $this->faultHandler = false;
     }
   }

   /**
    * Parse the raw Http Response Header to associated array to be consumered.
    * It will also store the Content-Type of the response.
    * @param string | Array rawHeaders
    */
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
                $this->setIntuitTid($key, $value);
            }
        }

   }

   /**
    * Find the headers for response, find the Content-type header and intuit_tid header and set it.
    * @param String   Header key
    * @param String   Header value
    */
   private function setContentType($key, $val){
     $trimedKey = trim($key);
     if(strcasecmp($trimedKey, CoreConstants::CONTENT_TYPE) == 0){
         $this->contentType = trim($val);
     }
   }

   /**
    * Find the headers for response, find the intuit_tid header and set it.
    * @param String   Header key
    * @param String   Header value
    */
   private function setIntuitTid($key, $val){
     $trimedKey = trim($key);
     if(strcasecmp($trimedKey, CoreConstants::INTUIT_TID) == 0){
         $this->intuit_tid = trim($val);
     }
   }

   /**
    * Return the header of the Response
    *
    * @return array Response Headers
    */
   public function getHeaders(){
       return $this->headers;
   }

   /**
    * Return the body of the Response
    *
    * @return String     Response Body
    */
   public function getBody(){
       return $this->body;
   }

   /**
    * Return the status code of the Response
    *
    * @return Integer   The response status code
    */
   public function getStatusCode(){
       return $this->httpResponseCode;
   }

   /**
    * Return the fault handler object to debug the request error.
    * @return Faulthandler The faultHandler that has helper method to debug the error.
    */
   public function getFaultHandler(){
       return $this->faultHandler;
   }

   /**
    * Return the content type of the Response
    *
    * @return string JSON or XML
    */
   public function getResponseContentType(){
       return $this->contentType;
   }

   /**
    * Return the Intuit Tid of the response
    *
    * @return string Intuit tid
    */
   public function getIntuitTid(){
       return $this->intuit_tid;
   }

}
