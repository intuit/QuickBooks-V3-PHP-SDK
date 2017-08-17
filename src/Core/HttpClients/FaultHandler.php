<?php
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Data\IPPFault;
/**
 * Handles the 3xx, 4xx and 5xx response status code in the response and handles them.
 * This class use the pecl OAuth Extension. Rewrite it to be native cURL request @Hao
 */
class FaultHandler
{
    /**
     * The Service Context
     * @var ServiceContext context
     */
    private $context;

    /**
        * If any 3xx, 4xx or 5xx status code is returned, it will store here
        */
    private $httpStatusCode;

    /**
    * The response body from Intuit
    */
    private $responseBody;

    /**
        *The call is made through OAuth, if any code other than 2xx is returned, OAuth will have an error message generated as well.
        * The OAuth error message will store here.
        */
     private $oAuthHelperError;


     //Intuit Error helper information
     private $intuitErrorType;

     private $intuitErrorCode;

     private $intuitErrorMessage;

     private $intuitErrorDetail;

    /**
     * Initializes a new instance of the FaultHandler class.
     * @param ServiceContext context
     */
    public function __construct($context = null, $OAuthException = null)
    {
        if($context == null && $OAuthException == null) return;
        $this->context = $context;
        $this->generateErrorFromOAuthMsg($OAuthException);
    }

    /**
        * generate Error from OAuth Exception
        */
    private function generateErrorFromOAuthMsg($OAuthException)
    {
        if (get_class($OAuthException) == 'OAuthException') {
            $this->httpStatusCode = $OAuthException->getCode();
            $this->oAuthHelperError = $OAuthException->getMessage();
            $this->responseBody = $OAuthException->lastResponse;
        } else {
            throw new \Exception("OAuthException required for generate error from Intuit. The passed parameters for Fault handler is not OAuthException");
        }
    }

    public function setHttpStatusCode($statusCode)
    {
         $this->httpStatusCode = $statusCode;
    }

    public function setOAuthHelperError($error)
    {
         $this->oAuthHelperError = $error;
    }

    public function setResponseBody($_responseBody)
    {
         $this->responseBody = $_responseBody;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    public function getOAuthHelperError()
    {
        return $this->oAuthHelperError;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }

    public function getIntuitErrorType(){
        return $this->intuitErrorType;
    }

    public function getIntuitErrorCode(){
        return $this->intuitErrorCode;
    }

    public function getIntuitErrorMessage(){
        return $this->intuitErrorMessage;
    }

    public function getIntuitErrorDetail(){
        return $this->intuitErrorDetail;
    }

    /**
     * Only parse XML format to string values now
     */
    public function parseResponse($message, $contentType){
      if(!$this->isValidXml($message)){
          return;
      }
      $xmlObj = simplexml_load_string($message);

      if(!$this->isStandardFormat($xmlObj)){
          return;
      }
      $type = (string)$xmlObj->Fault->attributes()['type'];
      if(isset($type) && !empty($type)){
        $this->intuitErrorType = $type;
      }

      $code = (string)$xmlObj->Fault->Error->attributes()['code'];
      if(isset($code) && !empty($code)){
        $this->intuitErrorCode = $code;
      }

      $message = (string)$xmlObj->Fault->Error->Message;
      if(isset($message) && !empty($message)){
        $this->intuitErrorMessage = $message;
      }

      $detail = (string)$xmlObj->Fault->Error->Detail;
      if(isset($detail) && !empty($detail)){
        $this->intuitErrorDetail = $detail;
      }

    }

    /**
     * Check if the format is standard Intuit Response format
     */
    private function isStandardFormat($xmlObj)
    {
        if(!isset($xmlObj->Fault) || !isset($xmlObj->Fault->Error)){
           return false;
        }
        return true;
    }

    private function isValidXml($content)
    {
      $content = trim($content);
      if (empty($content)) {
          return false;
        }

      libxml_use_internal_errors(true);
      simplexml_load_string($content);
      $errors = libxml_get_errors();
      libxml_clear_errors();

      return empty($errors);
    }

}
