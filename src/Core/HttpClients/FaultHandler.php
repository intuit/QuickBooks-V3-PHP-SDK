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

use QuickBooksOnline\API\Data\IPPFault;
/**
 * Class FaultHandler
 *
 * Record the 3xx, 4xx and 5xx response status code in the response and provide helper
 * message for developers to handle them.
 *
 * @package QuickbooksOnline
 */
class FaultHandler
{
    /**
     * The Service Context. Previous from PECL OAuth 1.2.3 extension requirement. Not used in PHP SDK > v3.4.0
     * @var ServiceContext context
     * @deprecated
     */
    private $context;

    /**
     * The status code get from the HTTP response
     * @var Integer
     */
    private $httpStatusCode;

    /**
     * The response body from the HTTP response
     * @var String
     */
    private $responseBody;

    /**
     * Previous used by PECL OAuth 1.2.3 extension for helper message.
     * Now is used to store QuickBooks Online specific help message.
     * @var String
     */
    private $helpMsg;

    /**
     * Used for Intuti to debug the cause for non-200 http status code.
     * If a developer is getting non-200 code and he is not sure what happened,
     * provide this id to the support ticket.
     * @var String
     */
     private $intuit_tid;


    //-------------------------Intuit Error helper information-------------------------
    /**
     * The Intuit Error Type specified in the HTTP Response Body
     * @var String
     */
    private $intuitErrorType = "";

    /**
     * The Intuit Error Code specified in the HTTP Response Body
     * @var Int
     */
    private $intuitErrorCode = 0;

    /**
     * The Intuit Error Element specified in the HTTP Response Body
     * @var String
     */
    private $intuitErrorElement = "";

    /**
     * The Intuit Error Message specified in the HTTP Response Body
     * @var String
     */
    private $intuitErrorMessage = "";

    /**
     * The Intuit Error Detail specified in the HTTP Response Body
     * @var String
     */
    private $intuitErrorDetail = "";

    /**
     * Initializes a new instance of the FaultHandler class. Previous Used by PECL OAuth 1.2.3 extension. Not used in PHP SDK > v3.4.0
     * @param ServiceContext context
     * @param OAuthException Coming From OAuth 1.2.3 extension
     * @deprecated
     */
    public function __construct($context = null, $OAuthException = null)
    {
        if($context == null && $OAuthException == null) return;
        $this->context = $context;
        $this->generateErrorFromOAuthMsg($OAuthException);
    }

    /**
     * generate Error from OAuth Exception
     * @param OAuthException  The OAuth Exception from PECL OAuth 1.2.3
     * @deprecated
     */
    private function generateErrorFromOAuthMsg($OAuthException)
    {
        if (get_class($OAuthException) == 'OAuthException') {
            $this->httpStatusCode = $OAuthException->getCode();
            $this->helpMsg = $OAuthException->getMessage();
            $this->responseBody = $OAuthException->lastResponse;
        } else {
            throw new \Exception("OAuthException required for generate error from Intuit. The passed parameters for Fault handler is not OAuthException");
        }
    }
    /**
     * Based on the HTTP Response body, set the Intuit Error elements.
     * @var String The http response body in XML format
     */
    public function parseResponse($message){
      $xmlObj = simplexml_load_string($message);

      if(!$this->isTheErrorBodyInStandardFormat($xmlObj)){
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

      $element = (string)$xmlObj->Fault->Error->attributes()['element'];
      if(isset($element) && !empty($element)){
        $this->intuitErrorElement = $element;
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
     * Check if the format is standard Intuit Response format. This is to prevent Intuit Return random Structured Error.
     * @param SimpleXMLElement the XML object of the Body
     * @return True | False
     */
    private function isTheErrorBodyInStandardFormat($xmlObj)
    {
        if(!isset($xmlObj->Fault) || !isset($xmlObj->Fault->Error)){
           return false;
        }
        return true;
    }

    /**
     * Set the Http Status code for the fault handler
     * @param Int   Response HTTP Status Code
     */
    public function setHttpStatusCode($statusCode)
    {
         $this->httpStatusCode = $statusCode;
    }

    /**
     * Set the Http helper message. Developer should get some hint based on the helper message
     * TO DO: It should use Intuit Response information($intuitErrorType, $intuitErrorElement, etc) to generate the message. Right now it is hard coded string.
     * @param String  help message
     */
    public function setHelpMsg($msg)
    {
         $this->helpMsg = $msg;
    }

    /**
     * Set the Intuit_tid for the response
     * @param String  help message
     */
    public function setIntuitTid($tid)
    {
         $this->intuit_tid = $tid;
    }

    /**
     * Set the body for the fault handler
     * @param String   Response body
     */
    public function setResponseBody($body)
    {
         $this->responseBody = $body;
    }

    /**
     * Return the status code of the Response
     *
     * @return Integer   The response status code
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Return the helper message
     *
     * @return String   The helper method to find why the return code is not 200
     */
    public function getOAuthHelperError()
    {
        return $this->helpMsg;
    }

    /**
     * Return the body of the Response
     *
     * @return String   The response body
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Return the Intuit_tid of the response
     *
     * @return String   The intuit tid
     */
    public function getIntuitTid()
    {
        return $this->intuit_tid;
    }

    /**
     * Return the Intuit Error Type of the Response
     *
     * @return String   The Intuit Error Type
     */
    public function getIntuitErrorType(){
        return $this->intuitErrorType;
    }

    /**
     * Return the Intuit Error Code of the Response
     *
     * @return Int   The Intuit Error Code
     */
    public function getIntuitErrorCode(){
        return $this->intuitErrorCode;
    }

    /**
     * Return the Intuit Error element of the Response
     *
     * @return String  The Intuit Error element
     */
    public function getIntuitErrorElement(){
        return $this->intuitErrorElement;
    }

    /**
     * Return the Intuit Error Message of the Response
     *
     * @return String   The Intuit Error Message
     */
    public function getIntuitErrorMessage(){
        return $this->intuitErrorMessage;
    }

    /**
     * Return the Intuit Error Detail of the Response
     *
     * @return String   The Intuit Error Detail
     */
    public function getIntuitErrorDetail(){
        return $this->intuitErrorDetail;
    }
}
