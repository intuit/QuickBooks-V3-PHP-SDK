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
namespace QuickBooksOnline\API\Core\OAuth\OAuth2;


use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Exception\ServiceException;
use QuickBooksOnline\API\Core\HttpClients\CurlHttpClient;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\OAuth\OAuth1\OAuth1;

/**
 * Class OAuth2LoginHelper
 *
 * A helper class to handle OAuth 2 related requests
 * @package QuickbooksOnline
 *
 */
class OAuth2LoginHelper
{
    /**
     * OAuth 2 Client ID, can be found on your apps "keys" tab.
     * @var String $clientID         the Client ID asscoiated with the app
     */
    private $clientID;

    /**
     * OAuth 2 Client Secret, can be found on your apps "keys" tab.
     * @var String $clientSecret     the Client ID asscoiated with the app
     */
    private $clientSecret;

    /**
     * OAuth 2 redirectUri, used to verift callback during generating OAuth code
     * @var String $redirectUri      the redirect URI specified on the Apps tab
     */
    private $redirectUri;

    /**
     * OAuth 2 scope, used to declare the scope of the App
     * @var String $scope            the scope of the App
     */
    private $scope;

    /**
     * OAuth 2 state. It can be used for passing query parameters to the Redirect URI.
     * @var String $state            the string for verfiy the request is not compromised
     */
    private $state = null;

    /**
     * The OAuth 2 Access Token object that contains: clientID, clientSecret, accessToken, and refreshToken, etc. Used for refresh token API call
     * @var OAuth2AccessToken $oauth2AccessToken      The OAuth2AccessToken for the oauth2 information
     */
    private $oauth2AccessToken;

    /**
     * The http client making the OAuth Call.
     * @var CurlHttpClient $curlHttpClient      the curlClient that makes the actual Call
     */
    private $curlHttpClient;

    /**
     * Error during retrieve/update access token.
     * @var FaultHandler $faultHandler        the fault handler that handles error case
     */
    private $faultHandler = false;

    /**
     * Constructor for OAuth2Login Helper. Client ID and Client Secret are used to get OAuth 2 Tokens. Service Context is used for refreshToken API call
     * @param String $clientID                   The client ID of the App
     * @param String $clientSecret               The client Secret of the App
     * @param String $redirectUri                The redirect URI specified for the App
     * @param String $scope                      The scope of the app
     * @param String $state                      The string to verify the request is not compromised
     * @param ServiceContext $serviceContext     The serviceContext for the request, only passed for making refresh token API call
     */
    public function __construct($clientID, $clientSecret, $redirectUri = null, $scope = null, $state = null, ServiceContext $serviceContext = null){
        //used for refresh token
        if(isset($serviceContext)){
            $accessTokenObj =  $serviceContext->requestValidator;
            if(isset($accessTokenObj) && $accessTokenObj instanceof OAuth2AccessToken){
                $this->oauth2AccessToken = $accessTokenObj;
                $this->clientID = $accessTokenObj->getClientID();
                $this->clientSecret = $accessTokenObj->getClientSecret();
            }else{
                 throw new SdkException("Can't get OAuth 2 Settings from ServiceContext for refresh Token. Please make sure you are using OAuth 2 Values.");
            }
        }
        //used for getting OAuth 2 Access Token
        else{
            $this->clientID = $clientID;
            $this->clientSecret = $clientSecret;
            $this->redirectUri = $redirectUri;
            $this->scope = $scope;
            if(isset($state)){
              $this->state = $state;
            }else{
              $this->state = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
            }
        }
        $this->curlHttpClient = new CurlHttpClient();
    }

    /**
     * Return the OAuth 2 Access Token Obj from the login helper.
     * @return OAuth2AccessToken   The OAuth 2 Access Token object
     */
    public function getAccessToken(){
       if(isset($this->oauth2AccessToken) && !empty($this->oauth2AccessToken)){
           return $this->oauth2AccessToken;
       }else{
           throw new SdkException("Can't get OAuth 2 Access Token Object. It is not set yet.");
       }
    }

    /**
     * Return the Client ID for the App
     * @return String   The clientID
     */
    public function getClientID(){
        if(isset($this->clientID) && !empty($this->clientID)){
            return (String)$this->clientID;
        }else{
          throw new SdkException("Can't get OAuth 2 Client ID. It is not set.");
        }
    }

    /**
     * Return the Client Secret for the App
     * @return String   The clientSecret
     */
    public function getClientSecret(){
        if(isset($this->clientSecret) && !empty($this->clientSecret)){
            return (String)$this->clientSecret;
        }else{
          throw new SdkException("Can't get OAuth 2 Client Secret. It is not set.");
        }
    }

    /**
     * Return the Scope for the App
     * @return String   The Scope
     */
    public function getScope(){
        if(isset($this->scope) && !empty($this->scope)){
            return (String)$this->scope;
        }else{
          throw new SdkException("Can't get OAuth 2 Scope. It is not set.");
        }
    }

    /**
     * Return the redirectUri for the App
     * @return String   The redirectUri
     */
    public function getRedirectURL(){
        if(isset($this->redirectUri) && !empty($this->redirectUri)){
            return (String)$this->redirectUri;
        }else{
          throw new SdkException("Can't get OAuth 2 redirectUri. It is not set.");
        }
    }

    /**
     * Return the state for the App
     * @return String   The state
     */
    public function getState(){
        if(isset($this->state) && !empty($this->state)){
            return (String)$this->state;
        }else{
          throw new SdkException("Can't get OAuth 2 state. It is not set.");
        }
    }

    /**
     * Step 1 of OAuth 2 protocol. Return the OAuth 2 Authorization URL.
     * @return String                THe Authorization URL
     */
    public function getAuthorizationCodeURL(){
        $parameters = array(
           'client_id' => $this->getClientID(),
           'scope' => $this->getScope(),
           'redirect_uri' => $this->getRedirectURL(),
           'response_type' => 'code',
           'state' => $this->getState()
       );
       $authorizationRequestUrl = CoreConstants::OAUTH2_AUTHORIZATION_REQUEST_URL;
       $authorizationRequestUrl .= '?' . http_build_query($parameters, null, '&', PHP_QUERY_RFC1738);
       return $authorizationRequestUrl;
    }

    /**
     * Step 2 of OAuth 2 protocol. After you get authorization code, use this method to exchange an access token with it.
     * @param String $code            The Authorization Code returned to your redirect Uri
     * @param String RealmID          The Company ID that will be associated with the Acess Token. It does not use for exchange authorization Code to
     *                                authorization token, however, it will be used to help update the OAuth 2 token easier at a later step.
     * @return OAuth2AccessToken      The OAuth2AccessToken Object
     */
    public function exchangeAuthorizationCodeForToken($code, $realmID){
       if(!isset($code)){
            throw new SdkException("The code is not set. Can't exchange for OAuth 2 Access Token.");
       }
       $parameters = array(
          'grant_type' => 'authorization_code',
          'code' => (String)$code,
          'redirect_uri' => $this->getRedirectURL()
       );
       $authorizationHeaderInfo = $this->generateAuthorizationHeader();
       $http_header = array(
         'Accept' => 'application/json',
         'Authorization' => $authorizationHeaderInfo,
         'Content-Type' => 'application/x-www-form-urlencoded'
       );
       $intuitResponse = $this->curlHttpClient->makeAPICall(CoreConstants::OAUTH2_TOKEN_ENDPOINT_URL, CoreConstants::HTTP_POST, $http_header, http_build_query($parameters), null, true);
       $this->faultHandler = $intuitResponse->getFaultHandler();
       if($this->faultHandler) {
          throw new ServiceException("Exchange Authorization Code for Access Token failed. Body: [" . $this->faultHandler->getResponseBody() . "].", $this->faultHandler->getHttpStatusCode());
       }else{
          $this->faultHandler = false;
          $this->oauth2AccessToken = $this->parseNewAccessTokenFromResponse($intuitResponse->getBody(), $realmID);
          return $this->getAccessToken();
       }
    }

    /**
     * Get a new access token based on the refresh token
     * @return OAuth2AccessToken     A new OAuth2AccessToken that contains all the information(accessTokenkey, RefreshTokenKey, ClientID, and ClientSecret, Expiration Time, etc)
     */
    public function refreshToken(){
       $refreshToken = $this->getAccessToken()->getRefreshToken();
       $http_header = $this->constructRefreshTokenHeader();
       $requestBody = $this->constructRefreshTokenBody($refreshToken);
       $intuitResponse = $this->curlHttpClient->makeAPICall(CoreConstants::OAUTH2_TOKEN_ENDPOINT_URL, CoreConstants::HTTP_POST, $http_header, $requestBody, null, true);
       $this->faultHandler = $intuitResponse->getFaultHandler();
       if($this->faultHandler) {
          throw new ServiceException("Refresh OAuth 2 Access token with Refresh Token failed. Body: [" . $this->faultHandler->getResponseBody() . "].", $this->faultHandler->getHttpStatusCode());
       }else{
          $this->faultHandler = false;
          $this->oauth2AccessToken = $this->parseNewAccessTokenFromResponse($intuitResponse->getBody());
          return $this->getAccessToken();
       }
    }

    /**
     * Get a new access token based on the refresh token. Static function to make easy refreshToken API call.
     * @return OAuth2AccessToken     A new OAuth2AccessToken that contains all the information(accessTokenkey, RefreshTokenKey, ClientID, and ClientSecret, Expiration Time, etc)
     */
    public function refreshAccessTokenWithRefreshToken($refreshToken){
       $http_header = $this->constructRefreshTokenHeader();
       $requestBody = $this->constructRefreshTokenBody($refreshToken);
       $intuitResponse = $this->curlHttpClient->makeAPICall(CoreConstants::OAUTH2_TOKEN_ENDPOINT_URL, CoreConstants::HTTP_POST, $http_header, $requestBody, null, true);
       $this->faultHandler = $intuitResponse->getFaultHandler();
       if($this->faultHandler) {
          throw new ServiceException("Refresh OAuth 2 Access token with Refresh Token failed. Body: [" . $this->faultHandler->getResponseBody() . "].", $this->faultHandler->getHttpStatusCode());
       }else{
          $this->faultHandler = false;
          $this->oauth2AccessToken = $this->parseNewAccessTokenFromResponse($intuitResponse->getBody());
          return $this->getAccessToken();
       }
    }

    /**
     * Revoke an OAuth 2 access token or refresh token
     * @param String $accessTokenOrRefreshToken      THe access token or the refreshToken
     * @throws any non-200 status code will cause an exception to throw
     * @return Boolean True | False
     */
    public function revokeToken($accessTokenOrRefreshToken){
      if(!isset($accessTokenOrRefreshToken) ){
           throw new SdkException("The refresh token or access token is not set. Can't revoke OAuth 2 Token.");
      }
      $parameters = array(
         "token" => (String)$accessTokenOrRefreshToken
      );
      $authorizationHeaderInfo = $this->generateAuthorizationHeader();
      $http_header = array(
        'Accept' => 'application/json',
        'Authorization' => $authorizationHeaderInfo,
        'Content-Type' => 'application/json'
      );
      $intuitResponse = $this->curlHttpClient->makeAPICall(CoreConstants::REVOCATION_ENDPONT, CoreConstants::HTTP_POST, $http_header, json_encode($parameters), null, true);
      $this->faultHandler = $intuitResponse->getFaultHandler();
      if($this->faultHandler) {
         throw new ServiceException("Revoke Token failed. Body: [" . $this->faultHandler->getResponseBody() . "].", $this->faultHandler->getHttpStatusCode());
      }else{
         $this->faultHandler = false;
         return true;
      }
    }

    /**
     * Provide OAuth 1 token generation for OAuth 2 token. This function currently is not available on QUickBooks Online yet.
     * @param String $consumerKey           The consumer key of OAuth 1
     * @param String $consumerSecre         The consumer Secre of OAuth 1
     * @param String $accessToken           The access token key of OAuth 1
     * @param String $accessTokenSecret     The access Token Secret key of OAuth 1
     * @param String $scope                 The scope of the key
     * @return OAuth2AccessToken
     */
    public function OAuth1ToOAuth2Migration($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret, $scope){
        $oauth1Encrypter = new OAuth1($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
        $parameters = array(
          'scope' => $scope,
          'redirect_uri' => "https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl",
          'client_id' => $this->getClientID(),
          'client_secret' => $this->getClientSecret()
        );
        $baseURL = "https://developer.api.intuit.com/v2/oauth2/tokens/migrate";
        $authorizationHeaderInfo = $oauth1Encrypter->getOAuthHeader($baseURL, array(), "POST");
        $http_header = array(
          'Accept' => 'application/json',
          'Authorization' => $authorizationHeaderInfo,
          'Content-Type' => 'application/json'
        );
        $intuitResponse = $this->curlHttpClient->makeAPICall($baseURL, CoreConstants::HTTP_POST, $http_header, json_encode($parameters), null, false);
        $this->faultHandler = $intuitResponse->getFaultHandler();
        if($this->faultHandler) {
           throw new ServiceException("Migrate OAuth 1 token to OAuth 2 token failed. Body: [" . $this->faultHandler->getResponseBody() . "].", $this->faultHandler->getHttpStatusCode());
        }else{
           $this->faultHandler = false;
           $this->oauth2AccessToken = $this->parseNewAccessTokenFromResponse($intuitResponse->getBody());
           return $this->getAccessToken();
        }
    }

    /**
     * Get the error from last request
     *
     * @return lastError
     * @deprecated  Right now, if any OAuth token failed, an exception will be thrown
     */
    public function getLastError()
    {
        return $this->faultHandler;
    }

    /**
     * Parse the JSON Body to store the information to an OAuth 2 Access Token
     * @param String  $body       The JSON String contains all the OAuth 2 Access token information
     * @param String  $realmID    The realmID returned from authorization Code steps.It does not require for refresh token
     */
    private function parseNewAccessTokenFromResponse($body, $realmID = null){
        if(is_string($body)){
           $json_body = json_decode($body, true);
           if(json_last_error() === JSON_ERROR_NONE){
              $tokenExpiresTime = $json_body[CoreConstants::EXPIRES_IN];
              $refreshToken = $json_body[CoreConstants::OAUTH2_REFRESH_GRANTYPE];
              $refreshTokenExpiresTime = $json_body[CoreConstants::X_REFRESH_TOKEN_EXPIRES_IN];
              $accessToken = $json_body[CoreConstants::ACCESS_TOKEN];
              $this->checkIfEmptyValueReturned($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken);
              //If we have a response of OAuth 2 Access Token and the access token is not set, it must come from initial request. Create a dummy access token and update it.
              if(!isset($this->oauth2AccessToken)){
                  $this->oauth2AccessToken = new OAuth2AccessToken($this->getClientID(), $this->getClientSecret());
              }
              $this->oauth2AccessToken->updateAccessToken($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken);
              if(isset($realmID)){
                   $this->oauth2AccessToken->setRealmID($realmID);
              }
              return $this->oauth2AccessToken;
           }else{
              throw new SdkException("JSON DECODE encounters error:" . json_last_error());
           }
        }
    }

    /**
     * A helper function to check Null value
     * @param String $tokenExpiresTime            access token expires time
     * @param String $refreshToken                Refreh Token
     * @param String $refreshTokenExpiresTime     refresh token expires time
     * @param String $accessToken                 accessToken
     */
    private function checkIfEmptyValueReturned($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken){
      if(empty($tokenExpiresTime)){
        throw new SdkException("Error Retrieve RefreshToken from Response. Token Expires In Time is Empty.");
      }

      if(empty($refreshToken)){
        throw new SdkException("Error Retrieve RefreshToken from Response. Refresh Token is Empty.");
      }

      if(empty($refreshTokenExpiresTime)){
        throw new SdkException("Error Retrieve RefreshToken from Response. Refresh Token Expires Time is Empty.");
      }

      if(empty($accessToken)){
        throw new SdkException("Error Retrieve RefreshToken from Response. Access Token is Empty.");
      }
    }

    /**
     * Generate Authorization Header based on Client ID and Client Serect
     * @return String   The authorization value
     */
    private function generateAuthorizationHeader(){
        $encodedClientIDClientSecrets = base64_encode($this->getClientID() . ':' . $this->getClientSecret());
        $authorizationheader = CoreConstants::OAUTH2_AUTHORIZATION_TYPE . $encodedClientIDClientSecrets;
        return $authorizationheader;
    }

    /**
     * Generate header for refresh Token
     * @return Array Refresh Token header
     */
    private function constructRefreshTokenHeader(){
        $authorizationHeaderInfo = $this->generateAuthorizationHeader();
        $http_header = array(
            'Accept' => CoreConstants::CONTENTTYPE_APPLICATIONJSON,
            'Authorization' => $authorizationHeaderInfo,
            'Content-Type' => CoreConstants::CONTENTTYPE_URLFORMENCODED,
            'connection'    => 'close'
        );
        return $http_header;
    }

    /**
     * Generate POST body for refresh Token
     * @param String $refresh_token  Refresh Token
     * @return String String representation of the refresh token body
     */
    private function constructRefreshTokenBody($refresh_token){
        $parameters = array(
          'grant_type' => CoreConstants::OAUTH2_REFRESH_GRANTYPE,
          'refresh_token' => (String)$refresh_token
        );
        return http_build_query($parameters);
    }
}
