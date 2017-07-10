<?php
namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Utility\IntuitErrorHandler;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Exception\IdsException;
use QuickBooksOnline\API\Core\OAuth\OAuth1\OAuth1;
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
     */
    public function sendRequest($requestParameters, $requestBody, $oauthRequestUri)
    {
        if (isset($this->context->IppConfiguration->Logger->CustomLogger)) {
            $this->context->IppConfiguration->Logger->CustomLogger->Log(TraceLevel::Info, "Called PrepareRequest method");
        }

        // This step is required since the configuration settings might have been changed.
        $this->RequestCompressor = CoreHelper::GetCompressor($this->context, true);
        $this->ResponseCompressor = CoreHelper::GetCompressor($this->context, false);
        $this->RequestSerializer = CoreHelper::GetSerializer($this->context, true);
        $this->ResponseSerializer = CoreHelper::GetSerializer($this->context, false);


        // Determine dest URI
        if ($requestParameters->ApiName) {
            // Example: "https://appcenter.intuit.com/api/v1/Account/AppMenu"
            $requestUri = $this->context->baseserviceURL . $requestParameters->ApiName;
        } elseif ($oauthRequestUri) {
            // Prepare the request Uri from base Uri and resource Uri.
            $requestUri = $oauthRequestUri;
        } elseif ($requestParameters->ResourceUri) {
            $requestUri = $this->context->baseserviceURL . $requestParameters->ResourceUri;
        } else {
            throw new SdkException("Unhandled URI for sending request.");
        }

        //minorVersion support
        if ($this->context->minorVersion) {
            if ($this->queryToArray($requestUri) == false) { //if no query string params
                $requestUri .= "?minorversion=" . $this->context->minorVersion;
            } else {
                $requestUri .= "&minorversion=" . $this->context->minorVersion;
            }
        }

        //Check for the HTTP method
        if ('POST'==$requestParameters->HttpVerbType) {
            $HttpMethod = 'POST';
        } elseif ('GET'==$requestParameters->HttpVerbType) {
            $HttpMethod = 'GET';
        }else{
            throw new \Exception("THe HTTP verb is not supported.");
        }

        $queryParameters = $this->parseURL($requestUri);
        $baseURL = $this->getBaseURL($requestUri);

        $oauth1 = new OAuth1(
          $this->context->requestValidator->ConsumerKey, $this->context->requestValidator->ConsumerSecret,
          $this->context->requestValidator->AccessToken, $this->context->requestValidator->AccessTokenSecret
        );

        $AuthorizationHeader = $oauth1->getOAuthHeader($baseURL, $queryParameters, $HttpMethod);

        $httpHeaders = array();
        //We only support QBO for PHP SDK. No QBD support, change
        // from: if ('QBO'==$this->context->serviceType || 'QBD'==$this->context->serviceType)
        if (CoreConstants::IntuitServicesTypeQBO ==$this->context->serviceType) {
            // IDS call
            $httpHeaders = array(
                'Authorization' => $AuthorizationHeader,
                'host'          => parse_url($requestUri, PHP_URL_HOST),
                'user-agent'    => CoreConstants::USERAGENT,
                'accept'        => $this->getAcceptContentType($requestParameters->ContentType),
                'connection'    => 'close',
                'content-type'  => $requestParameters->ContentType,
                'content-length'=> strlen($requestBody)
            );

            // Log Request Body to a file
            $this->RequestLogging->LogPlatformRequests($requestBody, $requestUri, $httpHeaders, true);

            if ($requestBody && $this->RequestCompressor) {
                $this->RequestCompressor->Compress($httpHeaders, $requestBody);
            }

            if ($this->ResponseCompressor) {
                $this->ResponseCompressor->PrepareDecompress($httpHeaders);
            }
        } else {
            // IPP call
            $httpHeaders = array(
              'Authorization' => $AuthorizationHeader,
              'host'          => parse_url($requestUri, PHP_URL_HOST),
              'user-agent' => CoreConstants::USERAGENT
            );
            // Log Request Body to a file
            $this->RequestLogging->LogPlatformRequests($requestBody, $requestUri, $httpHeaders, true);

            if ($requestBody && $this->RequestCompressor) {
                $this->RequestCompressor->Compress($httpHeaders, $requestBody);
            }

            if ($this->ResponseCompressor) {
                $this->ResponseCompressor->PrepareDecompress($httpHeaders);
            }
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
