<?php
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




/**
 * SyncRestHandler contains the logic for preparing the REST request, calls REST services and returns the response.
 * @hao - Currently the implementation is solely a wrapper of PECL OAuth. Remove the library dependencies in the future.
 */
class SyncRestHandler extends RestHandler
{
  /**
    * Store the error code during Request
    * @var FaultHandler
    */
    private $faultHandler = null;

    /**
     * @var ServiceContext
     */
    private $context;

    private $curlHttpClient;

    /**
     * Initializes a new instance of the SyncRestHandler class.
     *
     * @param ServiceContext $context The context
     */
    public function __construct($context)
    {
        parent::__construct($context);
        $this->context = $context;
        $this->curlHttpClient = new CurlHttpClient();
        return $this;
    }

    public function updateContext($newServiceContext){
        if($newServiceContext instanceof ServiceContext){
            $this->context = $newServiceContext;
        }else{
           throw new SdkException("Cannot Update Service Context.");
        }
    }

    //----------------New Added Method to get Last error
    /**
  * Return an representation of an error returned by the last request, or null
  * if the last request was not an error.
    * @return null if no error
    *         An object contain error information
  */
    public function getFaultHandler()
    {
       return $this->faultHandler;
    }

    public function closeCurlClient(){
       $curlHttpClient->closeConnection();
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


    public function closeConnection(){
        $this->curlHttpClient->closeConnection();
    }

    /**
     * The main method for making Request.
     * @param $requestParameters, $requestBody, $oauthRequestUri
     * @return APIResult
     */
    public function sendRequest($requestParameters, $requestBody, $oauthRequestUri)
    {
        if (isset($this->context->IppConfiguration->Logger->CustomLogger)) {
            $this->context->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Called PrepareRequest method");
        }
        //Get the OAuth Authorization Mode for the request
        $oMode = $this->context->IppConfiguration->OAuthMode;

        // This step is required since the configuration settings might have been changed.
        $this->resetCompressorAndSerializer();
        // Determine dest URI
        $requestUri = $this->setDestinationURL($requestParameters, $oMode, $oauthRequestUri);
        //minorVersion support
        $requestUri = $this->appendMinorVersionToRequestURI($requestUri);
        //Check for the HTTP method
        $HttpMethod = $this->checkHTTPMethod($requestParameters);
        $queryParameters = $this->parseURL($requestUri);
        $baseURL = $this->getBaseURL($requestUri);
        if($oMode == CoreConstants::OAUTH1){
          return $this->OAuth1APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody);
        } else if ($oMode == CoreConstants::OAUTH2){
          return $this->OAuth2APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody);
        } else{
           throw new SdkException("OAuth Mode not supported.");
        }
    }

    /**
     * The API call to generate OAuth 1 signatures and make API call
     * @param $baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody
     * @return Response and HTTP Status code
     */
    private function OAuth1APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody){

      $AuthorizationHeader = $this->getOAuth1AuthorizationHeader($baseURL, $queryParameters, $HttpMethod);
      //We only support QBO for PHP SDK. No QBD support, change
      // from: if ('QBO'==$this->context->serviceType || 'QBD'==$this->context->serviceType)
      if (CoreConstants::IntuitServicesTypeQBO ==$this->context->serviceType) {
          // IDS call
          $httpHeaders = $this->setCommonHeadersForPHPSDK($AuthorizationHeader, $requestUri, $requestParameters->ContentType, $requestBody);
          // Log Request Body to a file
          $this->LogAPIRequestToLog($requestBody, $requestUri, $httpHeaders);
      } else {
          // IPP call
          $httpHeaders = $this->setCommonHeadersForPHPSDK($AuthorizationHeader, $requestUri, $requestParameters->ContentType, $requestBody);
          // Log Request Body to a file
          $this->LogAPIRequestToLog($requestBody, $requestUri, $httpHeaders);
      }

      $intuitResponse = $this->curlHttpClient->makeAPICall($requestUri, $HttpMethod, $httpHeaders,  $requestBody, null, false);
      $this->closeConnection();
      $faultHandler = $intuitResponse->getFaultHandler();
      $this->RequestLogging->LogPlatformRequests($intuitResponse->getBody(), $requestUri, $intuitResponse->getHeaders(), false);
      //Based on the ducomentation, the fetch expected HTTP/1.1 20X or a redirect. If not, any 3xx, 4xx or 5xx will throw an OAuth Exception
      //for 3xx without direct, it will throw a 503 code and error saying: Invalid protected resource url, unable to generate signature base string
      if(isset($faultHandler)) {
          $this->faultHandler = $faultHandler;
          return null;
      }

      return array($intuitResponse->getStatusCode(),$intuitResponse->getBody());
    }

    /**
     * Get OAuth1 Authroization Header
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
     * The API call to generate OAuth 1 signatures and make API call
     * @param $baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody
     * @return Response and HTTP Status code
     */
    private function OAuth2APICall($baseURL, $queryParameters, $HttpMethod, $requestUri, $requestParameters, $requestBody){
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

        $intuitResponse = $this->curlHttpClient->makeAPICall($requestUri, $HttpMethod, $httpHeaders,  $requestBody, null, true);
        $this->closeConnection();
        $faultHandler = $intuitResponse->getFaultHandler();
        $this->RequestLogging->LogPlatformRequests($intuitResponse->getBody(), $requestUri, $intuitResponse->getHeaders(), false);
        //Based on the ducomentation, the fetch expected HTTP/1.1 20X or a redirect. If not, any 3xx, 4xx or 5xx will throw an OAuth Exception
        //for 3xx without direct, it will throw a 503 code and error saying: Invalid protected resource url, unable to generate signature base string
        if(isset($faultHandler)) {
              $this->faultHandler = $faultHandler;
              return null;
        }
        return array($intuitResponse->getStatusCode(),$intuitResponse->getBody());
    }

    /**
     * Get OAuth2 Authroization Header
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
     * @param
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
     * Log API Request to the Log directory that user specified.
     * @param
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
     * @param $requestParameters, $oMode, $oauthRequestUri
     * @return $QBO Destination URL
     */
    private function setDestinationURL($requestParameters, $oMode, $oauthRequestUri){
      // Determine dest URI
      if (isset($requestParameters->ApiName)) {
          if(strcasecmp($oMode, CoreConstants::OAUTH1) == 0)
          {
            // Example: "https://appcenter.intuit.com/api/v1/Account/AppMenu"
            $requestUri = $this->context->baseserviceURL . $requestParameters->ApiName;
          }else{
            throw new SdkException("Disconnect/Reconnect Platform Call is only available in OAuth 1.0.");
          }
      } elseif (isset($oauthRequestUri)) {
          // Prepare the request Uri from base Uri and resource Uri.
          $requestUri = $oauthRequestUri;
      } elseif (isset($requestParameters->ResourceUri)) {
          $requestUri = $this->context->baseserviceURL . $requestParameters->ResourceUri;
      } else {
          throw new SdkException("Internal Error. UnSpecified URI Type for sending request.");
      }

      return $requestUri;
    }

    /**
     * Append Minor Version to the URI
     * @param requestUri
     * @return requestUri with Minor Version Appended
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
     * @param RequestParameters
     * @return HTTP Method
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

    private function getBaseURL($url){
      return strtok($url, '?');
    }

    //Get the query parameters from URL
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
     * Calls the rest service.
     *
     * @param RequestParameters $requestParameters The parameters
     * @param string $requestBody The request body
     * @param string $oauthRequestUri The OAuth request uri
     * @return array elements are 0: HTTP response code; 1: HTTP response body
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
}
