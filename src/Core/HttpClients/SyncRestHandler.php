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

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Utility\IntuitErrorHandler;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Exception\IdsException;
use QuickBooksOnline\API\Core\OAuth\OAuth1\OAuth1;
use QuickBooksOnline\API\Core\OAuth\OAuth2\OAuth2AccessToken;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Exception\ServiceException;



/**
 * Class SyncRestHandler
 *
 * SyncRestHandler contains the logic for preparing the REST request, calls REST services and returns the response.
 * @package QuickbooksOnline
 *
 */
class SyncRestHandler extends RestHandler
{
   /**
    * Store the error information on a non-200 response from QBO
    * @var FaultHandler
    */
    private $faultHandler = false;

   /**
    * The serviceContext of this request
    * @var ServiceContext
    */
    private $context = null;

   /**
    * The Http Client that is used to make QuickBooks Online API call
    * @var HttpClientInterface
    */
    private $httpClientInterface;

   /**
    * Initializes a new instance of the SyncRestHandler class.
    *
    * @param ServiceContext   $context    The service context used for the request
    * @param HttpClientInterface $client  The http client used for the request
    */
    public function __construct($context, HttpClientInterface $client = null)
    {
        parent::__construct($context);
        $this->context = $context;
        $this->httpClientInterface = isset($client) ? $client : new CurlHttpClient();
    }

   /**
    * Update the Service Context of the request.
    *
    * @param ServiceContext  $newServiceContext      The new service context that will be used for the request
    */
    public function updateContext($newServiceContext){
        if(isset($newServiceContext) && $newServiceContext instanceof ServiceContext){
            $this->context = $newServiceContext;
        }else{
           throw new SdkException("Cannot Update Service Context. The service context either is undefined or not an instance of ServiceContext.");
        }
    }

    /**
     * Return the RequestLogger
     * @return LogRequestsToDisk $requestLogger;
     */
     public function getRequestLogger(){
       return $this->RequestLogging;
     }


   /**
    * Return an representation of an error returned by the last request, or false if the last request was not an error.
    * @return False | FaultHander
    */
    public function getFaultHandler()
    {
       return $this->faultHandler;
    }


    /**
     * Sending an request to QuickBooks Online based on the Request parameters, body and URI.
     *
     * @param  RequestParamters $requestParameters     The request parameter for this API Call
     * @param  String           $requestBody           The body of the API call
     * @param  String           $specifiedRequestUri   The user specified URI for the request
     * @param  Boolean          $throwExceptionOnError If throw an exception whent he return http status is not 200. Default is false
     * @return Array            APIResult              The result of this Http Request.
     */
    public function sendRequest($requestParameters, $requestBody, $specifiedRequestUri, $throwExceptionOnError = false)
    {
        // This step is required since the configuration settings might have been changed.
        $this->resetCompressorAndSerializer();
        //Get the OAuth Authorization Mode for the request, OAuth 1 or OAuth 2.
        $oMode = $this->context->IppConfiguration->OAuthMode;
        // Determine dest URI
        $requestUri = $this->getDestinationURL($requestParameters, $oMode, $specifiedRequestUri);
        //minorVersion support
        $requestUri = $this->appendMinorVersionToRequestURI($requestUri);
        //Check for the HTTP method
        $HttpMethod = $this->checkHTTPMethod($requestParameters);
        $queryParameters = $this->parseURL($requestUri);
        $baseURL = $this->getBaseURL($requestUri);
        if($oMode == CoreConstants::OAUTH1){
          return $this->OAuth1APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody, $throwExceptionOnError);
        } else if ($oMode == CoreConstants::OAUTH2){
          return $this->OAuth2APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody, $throwExceptionOnError);
        } else{
           throw new SdkException("OAuth Mode not supported.");
        }
    }

    /**
     * The API call to generate OAuth 1 signatures and make API call
     *
     * @param  String           $baseURL               The request url without queryParameters
     * @param  Array            $queryParameters       A list of query parameters
     * @param  String           $HttpMethod            POST or GET
     * @param  String           $requestUri            The Complete HTTP request URI
     * @param  Array            $requestParameters     The Complete HTTP request URI
     * @param  String           $requestBody           The request body for POST request.
     * @param  Boolean          $throwExceptionOnError If throw an exception whent he return http status is not 200. Default is false
     *
     * @return Response and HTTP Status code
     */
    private function OAuth1APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody, $throwExceptionOnError){
      $AuthorizationHeader = $this->getOAuth1AuthorizationHeader($baseURL, $queryParameters, $HttpMethod);
      $httpHeaders = $this->setCommonHeadersForPHPSDK($AuthorizationHeader, $requestUri, $requestParameters->ContentType, $requestBody);
      // Log Request Body to a file
      $this->LogAPIRequestToLog($requestBody, $requestUri, $httpHeaders);
      $intuitResponse = $this->httpClientInterface->makeAPICall($requestUri, $HttpMethod, $httpHeaders, $requestBody, null, false);
      $faultHandler = $intuitResponse->getFaultHandler();
      $this->LogAPIResponseToLog($intuitResponse->getBody(), $requestUri, $intuitResponse->getHeaders(), false);
      //Based on the ducomentation, the fetch expected HTTP/1.1 20X or a redirect. If not, any 3xx, 4xx or 5xx will throw an OAuth Exception
      //for 3xx without direct, it will throw a 503 code and error saying: Invalid protected resource url, unable to generate signature base string
      if($faultHandler) {
          if($throwExceptionOnError == true){
              throw new ServiceException("Request is not made successful. Body: [" . $faultHandler->getResponseBody() . "].", $faultHandler->getHttpStatusCode());
          }else{
              $this->faultHandler = $faultHandler;
              return null;
          }
      }else{
         $this->faultHandler = false;
      }
      return array($intuitResponse->getStatusCode(),$intuitResponse->getBody());
    }


    /**
     * Get OAuth1 Authroization Header based on Query Parameters, BaseURL
     * @param String   $baseURL            The baseURL without queryParameters
     * @param Array    $queryParameters    The queryParameters list from the complete URI
     * @param String   $httpMethod         POST or GET
     * @return OAuth1 Authorization Header
     */
    private function getOAuth1AuthorizationHeader($baseURL, $queryParameters, $HttpMethod){
      $oauth1 = new OAuth1(
        $this->context->requestValidator->ConsumerKey,
        $this->context->requestValidator->ConsumerSecret,
        $this->context->requestValidator->AccessToken,
        $this->context->requestValidator->AccessTokenSecret
      );

      $AuthorizationHeader = $oauth1->getOAuthHeader($baseURL, $queryParameters, $HttpMethod);
      return $AuthorizationHeader;
    }

    /**
     * The OAuth 2 API call
     *
     * @param  String           $baseURL               The request url without queryParameters
     * @param  Array            $queryParameters       A list of query parameters
     * @param  String           $HttpMethod            POST or GET
     * @param  String           $requestUri            The Complete HTTP request URI
     * @param  Array            $requestParameters     The Complete HTTP request URI
     * @param  String           $requestBody           The request body for POST request.
     * @param  Boolean          $throwExceptionOnError If throw an exception whent he return http status is not 200. Default is false
     *
     * @return Response and HTTP Status code
     */
    private function OAuth2APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody, $throwExceptionOnError){
        $AuthorizationHeader = $this->getOAuth2AuthorizationHeader($this->context->requestValidator);
        //We only support QBO for PHP SDK. No QBD support, change
        // from: if ('QBO'==$this->context->serviceType || 'QBD'==$this->context->serviceType)
        if (CoreConstants::IntuitServicesTypeQBO ==$this->context->serviceType) {
            // IDS call
            $httpHeaders = $this->setCommonHeadersForPHPSDK($AuthorizationHeader, $requestUri, $requestParameters->ContentType, $requestBody);
            // Log Request Body to a file
            $this->LogAPIRequestToLog($requestBody, $requestUri, $httpHeaders);
        } else {
             throw new SdkException("IPP or other Call is not supported in OAuth2 Mode.");
        }

        $intuitResponse = $this->httpClientInterface->makeAPICall($requestUri, $HttpMethod, $httpHeaders,  $requestBody, null, true);
        $faultHandler = $intuitResponse->getFaultHandler();
        $this->LogAPIResponseToLog($intuitResponse->getBody(), $requestUri, $intuitResponse->getHeaders(), false);
        //Based on the ducomentation, the fetch expected HTTP/1.1 20X or a redirect. If not, any 3xx, 4xx or 5xx will throw an OAuth Exception
        //for 3xx without direct, it will throw a 503 code and error saying: Invalid protected resource url, unable to generate signature base string
        if($faultHandler) {
            if($throwExceptionOnError == true){
                throw new ServiceException("Request is not made successful. Response Code:[" . $faultHandler->getHttpStatusCode() . "] with body: [" . $faultHandler->getResponseBody() . "].", $faultHandler->getHttpStatusCode());
            }else{
                $this->faultHandler = $faultHandler;
                return null;
            }
        }else{
            $this->faultHandler = false;
        }
        return array($intuitResponse->getStatusCode(),$intuitResponse->getBody());
    }

    /**
     * Get OAuth2 Authroization Header based on OAuth 2 Access Token
     *
     * @param OAuth2AccessToken   $OAuth2AccessToken     The OAuth 2 token contains AccessToken, RefreshToken, ClientID and Client Secret.
     * @return OAuth2 Authorization Header
     */
    private function getOAuth2AuthorizationHeader($OAuth2AccessToken){
      if(!$OAuth2AccessToken instanceof OAuth2AccessToken){
         throw new SdkException("Internal Error. The OAuth 2 configuration is not complete.");
      }

      $accessToken = $OAuth2AccessToken->getAccessToken();
      $AuthorizationHeader = "Bearer " . $accessToken;
      return $AuthorizationHeader;
    }

    /**
     * Set the Common Headers for PHP SDK. It is used in all HTTP Request
     * @param  String $AuthorizationHeader    The authorizationHeader
     * @param  String $requestUri             The request URI
     * @param  String $contentType            The content type
     * @param  String $requestBody            The request Body
     *
     * @return theStandard HTTP Header
     */
    private function setCommonHeadersForPHPSDK($AuthorizationHeader, $requestUri, $ContentType, $requestBody){
      $httpHeaders = array(
          'Authorization' => $AuthorizationHeader,
          'host'          => parse_url($requestUri, PHP_URL_HOST),
          'user-agent'    => CoreConstants::USERAGENT,
          'accept'        => $this->getAcceptContentType($ContentType),
          'connection'    => 'close',
          'content-type'  => $ContentType,
          'content-length'=> strlen($requestBody)
      );

      return $httpHeaders;
    }

    /**
     * Log API Reponse to the Log directory that user specified.
     * @param String $body The requestBody
     * @param String $requestUri  The URI for this request
     * @param Array $httpHeaders  The headers for the request
     */
    public function LogAPIResponseToLog($body, $requestUri, $httpHeaders){
      if(strcasecmp($httpHeaders[CoreConstants::CONTENT_TYPE], CoreConstants::CONTENTTYPE_APPLICATIONXML) == 0 ||
          strcasecmp($httpHeaders[CoreConstants::CONTENT_TYPE], CoreConstants::CONTENTTYPE_APPLICATIONXML_WITH_CHARSET) == 0){
             $body = $this->parseStringToDom($body);
      }

      $this->RequestLogging->LogPlatformRequests($body, $requestUri, $httpHeaders, false);
    }

    /**
     * Log API Request to the Log directory that user specified.
     * @param String $requestBody The requestBody
     * @param String $requestUri  The URI for this request
     * @param Array $httpHeaders  The headers for the request
     */
    public function LogAPIRequestToLog($requestBody, $requestUri, $httpHeaders){
      $this->RequestLogging->LogPlatformRequests($requestBody, $requestUri, $httpHeaders, true);

      if ($requestBody && $this->RequestCompressor) {
          $this->RequestCompressor->Compress($httpHeaders, $requestBody);
      }

      if ($this->ResponseCompressor) {
          $this->ResponseCompressor->PrepareDecompress($httpHeaders);
      }
    }

    /**
     * Parse a String xml to DOM structure for easy read
     * @param String $string   The String representation
     * @return The DOM structured XML
     */
    private function parseStringToDom($string){
      $dom = new \DOMDocument();
      $dom->preserveWhiteSpace = FALSE;
      $dom->loadXML($string);
      $dom->formatOutput = TRUE;
      return $dom->saveXml();
    }


    /**
     * This step is required since the configuration settings might have been changed.
     */
    private function resetCompressorAndSerializer(){
      $this->RequestCompressor = CoreHelper::GetCompressor($this->context, true);
      $this->ResponseCompressor = CoreHelper::GetCompressor($this->context, false);
      $this->RequestSerializer = CoreHelper::GetSerializer($this->context, true);
      $this->ResponseSerializer = CoreHelper::GetSerializer($this->context, false);
    }

    /**
     * Based on the request determine the URL Endpoint
     * @param  RequestParamters $requestParameters    The request parameter for this API Call
     * @param  String           $oMode                The OAuth mode for the request
     * @param  String           $specifiedRequestUri  Ignore the rule, use the user specified URI for the request
     * @return String           Destination URL for the request
     */
    private function getDestinationURL($requestParameters, $oMode, $specifiedRequestUri){
      // For Platform Discconect/Reconenct call, only for OAuth 1
      if (isset($requestParameters->ApiName)) {
          if(strcasecmp($oMode, CoreConstants::OAUTH1) == 0)
          {
            // Example: "https://appcenter.intuit.com/api/v1/Account/AppMenu"
            $requestUri = $this->context->baseserviceURL . $requestParameters->ApiName;
          }else{
            throw new SdkException("Disconnect/Reconnect Platform Call is only available in OAuth 1.0.");
          }
      } elseif (isset($specifiedRequestUri)) {
          // Prepare the request Uri from base Uri and resource Uri.
          $requestUri = $specifiedRequestUri;
      } elseif (isset($requestParameters->ResourceUri)) {
          $requestUri = $this->context->baseserviceURL . $requestParameters->ResourceUri;
      } else {
          throw new SdkException("Internal Error. UnSpecified URI Type for sending request.");
      }

      return $requestUri;
    }

    /**
     * Append Minor Version to the URI
     *
     * @param String requestUri
     * @return String requestUri with Minor Version Appended
     */
    private function appendMinorVersionToRequestURI($requestUri){
      $setMinorVersion = $this->context->minorVersion;
      if (isset($setMinorVersion)) {
          if ($this->queryToArray($requestUri) == false) { //if no query string params
              $requestUri .= "?minorversion=" . $this->context->minorVersion;
          } else {
              $requestUri .= "&minorversion=" . $this->context->minorVersion;
          }
      }
      return $requestUri;
    }

    /**
     * Check The HTTP MEthod from the requestParameters, make sure it is either GET or POST
     *
     * @param RequestParameters  RequestParameters  The requestParameters for the request
     * @return String HTTP Method
     */
    private function checkHTTPMethod($requestParameters){
      $verb = $requestParameters->HttpVerbType;
      if(strcasecmp($verb, CoreConstants::HTTP_POST) == 0){
         return CoreConstants::HTTP_POST;
      } else if(strcasecmp($verb, CoreConstants::HTTP_GET) == 0){
         return CoreConstants::HTTP_GET;
      } else{
         throw new SdkException("Internal Error. Unsupported HTTP Method:" . $verb);
      }
    }

    /**
     * Get the base URL.
     *
     * @param String  $url  The complete URL for the request
     * @return String       The baseURL.
     */
    private function getBaseURL($url){
      return strtok($url, '?');
    }

    /**
     * Get the query parameters from the complete URL, used for sign signature for OAuth 1.
     *
     * @param String  $url  The $url for the request
     * @return Array  a list of query paramters.
     */
    private function parseURL($url){
       $query_str = parse_url($url, PHP_URL_QUERY);
       parse_str($query_str, $parameters);
       return $parameters;
    }

  /**
   * Accept anything if content type is not XML or Json
   * @param type $value
   * @return string
   */
   private function getAcceptContentType($value)
   {
       if (CoreConstants::CONTENTTYPE_APPLICATIONXML === $value) {
           return $value;
       }

       if (CoreConstants::CONTENTTYPE_APPLICATIONJSON === $value) {
           return $value;
       }

       if (CoreConstants::CONTENTTYPE_APPLICATIONPDF === $value) {
           return $value;
       }

       if (CoreConstants::CONTENTTYPE_OCTETSTREAM === $value) {
           if ($this->ResponseSerializer instanceof XmlObjectSerializer) {
               return CoreConstants::CONTENTTYPE_APPLICATIONXML;
           }

           if ($this->ResponseSerializer instanceof JsonObjectSerializer) {
               return CoreConstants::CONTENTTYPE_APPLICATIONJSON;
           }
       }

       return "*/*";
   }

   /**
    * A helper function to convert Query to Array
    * @param String $qry   The query String
    * @return  False | Array   The result
    */
    private function queryToArray($qry)
    {
        $result = array();
                //string must contain at least one = and cannot be in first position
                if (strpos($qry, '=')) {
                    if (strpos($qry, '?')!==false) {
                        $q = parse_url($qry);
                        $qry = $q['query'];
                    }
                } else {
                    return false;
                }

        foreach (explode('&', $qry) as $couple) {
            list($key, $val) = explode('=', $couple);
            $result[$key] = $val;
        }

        return empty($result) ? false : $result;
    }



    /**
     * Calls the rest service.
     *
     * @param RequestParameters $requestParameters The parameters
     * @param string $requestBody The request body
     * @param string $oauthRequestUri The OAuth request uri
     * @return array elements are 0: HTTP response code; 1: HTTP response body
     * @deprecated
     */
    private function CallRestService($requestParameters, $requestBody, $oauthRequestUri)
    {
        $this->context->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Getting the response from service.");

        // Call the service and get response.
        list($httpWebResponseCode, $httpWebResponseBody) = $request->sendRequest($requestParameters, $requestBody, $oauthRequestUri);

        $this->context->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Got the response from service.");

        // Parse the response from the call and return.
        $httpParsedWebResponseBody = $this->ParseResponse($httpWebResponseBody);

        return array($httpWebResponseCode,$httpParsedWebResponseBody);
    }


    /**
     * Returns the response by calling REST service.
     * deprecated on Version 2.6.0. Need to refactor @Hao
     *
     * @param RequestParameters $requestParameters The parameters
     * @param string $requestBody The request body
     * @param string $oauthRequestUri The OAuth request uri
     * @deprecated
     */
    public function GetResponseSyncRest($requestParameters, $requestBody, $oauthRequestUri)
    {
        $handler = new FaultHandler($this->context);

        // Create a variable for storing the response.
        $response = '';
        $responseCode = null;
        try {
            // Check whether the retryPolicy is null.
            if ($this->context->IppConfiguration->RetryPolicy == null) {
                // If yes then call the rest service without retry framework enabled.
                list($responseCode, $response) = $this->CallRestService($requestParameters, $requestBody, $oauthRequestUri);
            } else {
                // Not yet implemented
                throw new IdsException("Retry policy not available in this SDK");

                // If no then call the rest service using the execute action of retry framework.
                // $this->context->IppConfiguration->RetryPolicy->ExecuteAction(() =>
                // {
                //     $response = $this->CallRestService($requestParameters, $requestBody, $oauthRequestUri);
                // });
            }
        } catch (\Exception $webException) {
            // System.Net.HttpWebRequest.Abort() was previously called.-or- The time-out
            // period for the request expired.-or- An error occurred while processing the request.
            $isIpp = false;
            if ($this->context->ServiceType == IntuitServicesType::IPP) {
                $isIpp = true;
            }

            $idsException = $handler->ParseResponseAndThrowException($webException, $responseCode, $isIpp);
            if ($idsException != null) {
                $this->context->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Error, $idsException->getMessage());
                throw $idsException;
            }
        }

        if ($this->context->ServiceType == IntuitServicesType::IPP) {
            // Handle errors here
            IntuitErrorHandler::HandleErrors($response);
        } else {
            // Check the response if there are any fault tags and throw appropriate exceptions.
            $oneException = $handler->ParseErrorResponseAndPrepareException($response);
            if (exception != null) {
                throw $oneException;
            }
        }

        // Return the response.
        return $response;
    }
}
