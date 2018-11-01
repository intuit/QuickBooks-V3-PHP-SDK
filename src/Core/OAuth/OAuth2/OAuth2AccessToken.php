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

use QuickBooksOnline\API\Exception\SdkException;
use QuickbooksOnline\API\Core\CoreConstants;

/**
 * Class OAuth2AccessToken
 *
 * A helper class to store the OAuth 2 Token related information
 *
 * @package QuickbooksOnline
 *
 */
class OAuth2AccessToken{

   /**
    * OAuth 2 Access Token key. Final product generated from OAuth 2 protocol.
    * @var String $accessTokenKey         A long String for representing access token key
    */
    private $accessTokenKey;

    /**
     * OAuth 2 Access Token Type. Always be bearer
     * @var String $tokenType             String Token Type
     */
    private $tokenType;

    /**
     * OAuth 2 Refresh Token key. A token used to generate new Access Token
     * @var String $refresh_token         A String for representing refresh token key
     */
    private $refresh_token;

    /**
     * OAuth 2 access Token key expire time. It is a date representation. Use current time plus one hour
     * @var String $accessTokenExpiresAt         A String representation of OAuth 2 access token expiration time
     */
    private $accessTokenExpiresAt;

    /**
     * OAuth 2 Refresh Token key expire time. It is a date representation. Use current time plus 101 days
     * @var String $refreshTokenExpiresAt         A String representation of OAuth 2 refresh token expiration time
     */
    private $refreshTokenExpiresAt;

    /**
     * OAuth 2 access Token key expire time in seconds. Always 3600 seconds.
     * @var String $accessTokenValidationPeriod          OAuth 2 access token validation time
     */
    private $accessTokenValidationPeriod;

    /**
     * OAuth 2 refresh Token key expire time in seconds. Always 8726400 seconds.
     * NOTE Since QBO OAuth 2 Access Token is only valid for 1 hour. You always need to use refresh token to make a refresh token API call to get a new Access Token. However,
     *      every 24 hours the refresh token returned from QBO will be changed. In practice, the Refresh Token is only valid for 24 hours. Please ALWAYS RECORD THE LATEST REFRESH TOKEN
     *      RETURN FROM LAST REFRESH TOKEN API CALL.
     * @var String $refreshTokenValidationPeriod         OAuth 2 refresh token validation time
     */
    private $refreshTokenValidationPeriod;

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
     * The company ID associated with the OAuth 2 token.
     * @var String $realmID          A value will returned during OAuth 2 access token call
     */
    private $realmID;

    /**
     * The URL that is going be used for this Access Token
     * @var String $baseURL         The BaseURL for this Access Token
     */
    private $baseURL;

    /**
     * The constructor for passing the OAuth 2 Token related information
     * @param String $cID                      The Client ID
     * @param String $cS                       The Client Secret
     * @param String $atk                      The OAuth 2 Access Token generated from Client ID, Client Secret.
     * @param String $refreshtk                The OAuth 2 Refresh Token generated from Client ID, Client Secret.
     * @param Long   $atei                     The number of seconds that access token expired. Always 3600 seconds.
     * @param Long   $refreshtei               The number of seconds that refresh token expired. Always 8726400 seconds.
     * @param String $tk                       The token type. Always bearer, unless specified.
     */
    public function __construct($cID, $cS, $atk = null, $refreshtk = null, $atei = null, $refreshtei = null, $tk = "bearer"){
        $this->clientID = $cID;
        $this->clientSecret = $cS;
        $this->accessTokenKey = $atk;
        $this->refresh_token = $refreshtk;
        $this->accessTokenExpiresAt = $atei;
        $this->refreshTokenExpiresAt = $refreshtei;
        $this->tokenType = $tk;
    }

    /**
     * Set the OAuth 2 Access Token.
     * @param String $accessToken      The access token.
     */
    public function setAccessToken($accessToken){
       $this->accessTokenKey = $accessToken;
    }

    /**
     * Set the OAuth 2 refresh Token.
     * @param String $refreshToken      The refresh token.
     */
    public function setRefreshToken($refreshToken){
      $this->refresh_token = $refreshToken;
    }

    /**
     * Set the realmID associated with this Acess Token
     * @param Long $realmID            The realmID for the access token
     */
    public function setRealmID($realmID){
      $this->realmID = $realmID;
    }

    /**
     * Set the baseURL associated with this Acess Token
     * @param Long $realmID            The realmID for the access token
     */
    public function setBaseURL($baseURL){
      if(strcasecmp($baseURL, CoreConstants::DEVELOPMENT_SANDBOX) == 0){
         $this->baseURL = CoreConstants::SANDBOX_DEVELOPMENT;
      }else if(strcasecmp($baseURL, CoreConstants::PRODUCTION_QBO) == 0){
         $this->baseURL = CoreConstants::QBO_BASEURL;
      }else{
         $this->baseURL = $baseURL;
      }

    }

    /**
     * Set the number of seconds for access token.
     * The implementation of Quickbooks Online OAuth 2 is short access token, short refresh token. So this method is not useful.
     * @param int $seconds             The duration period of Access token
     */
    public function setAccessTokenValidationPeriodInSeconds($seconds){
      $this->accessTokenValidationPeriod = $seconds;
    }

    /**
     * Set the number of seconds for refresh token.
     * The implementation of Quickbooks Online OAuth 2 is short access token, short refresh token. So this method is not useful.
     * @param int $seconds             The duration period of refresh token
     */
    public function setRefreshTokenValidationPeriodInSeconds($seconds){
      $this->refreshTokenValidationPeriod = $seconds;
    }

    /**
     * Set the expiration date of access token.
     * The implementation of Quickbooks Online OAuth 2 is short access token, short refresh token. So this method is not useful.
     * @param Date $date            The acutal expiration date of Access Token.
     */
    public function setAccessTokenExpiresAt($date){
      $this->accessTokenExpiresAt = $date;
    }

    /**
     * Set the expiration date of refresh token.
     * The implementation of Quickbooks Online OAuth 2 is short access token, short refresh token. So this method is not useful.
     * @param Date $date            The acutal expiration date of refresh Token.
     */
    public function setRefreshTokenExpiresAt($date){
      $this->refreshTokenExpiresAt = $date;
    }

    /**
     * Check if the access token is set.
     * @return Booelan
     */
    public function isAccessTokenSet(){
       if(isset($this->accessTokenKey) && !empty($this->accessTokenKey)){
          return true;
       }else{
          return false;
       }
    }

    /**
     * Check if the refresh token is set.
     * @return Booelan
     */
    public function isFreshTokenSet(){
      if(isset($this->refresh_token) && !empty($this->refresh_token)){
         return true;
      }else{
         return false;
      }
    }

    /**
     * Return the number of seconds for refresh token
     * The implementation of Quickbooks Online OAuth 2 always return an 8726400 seconds refresh token. This method is not useful now
     * @return int
     */
    public function getRefreshTokenValidationPeriodInSeconds(){
      if(isset($this->refreshTokenValidationPeriod) && !empty($this->refreshTokenValidationPeriod))
      {
          return $this->refreshTokenValidationPeriod;
      }else{
        throw new SdkException("The validation period for OAuth 2 refresh Token is not set.");
      }
    }

    /**
     * Return the number of seconds for access token
     * The implementation of Quickbooks Online OAuth 2 always return an one hour access token. This method is not useful
     * @return int
     */
    public function getAccessTokenValidationPeriodInSeconds(){
      if(isset($this->accessTokenValidationPeriod) && !empty($this->accessTokenValidationPeriod))
      {
          return $this->accessTokenValidationPeriod;
      }else{
        throw new SdkException("The validation period for OAuth 2 access Token is not set.");
      }
    }

    /**
     * Return the expiration date of Access Token
     * @return Date
     */
    public function getAccessTokenExpiresAt(){
        if(!empty($this->accessTokenExpiresAt))
        {
          return $this->getDateFromSeconds($this->accessTokenExpiresAt);
        }else{
          throw new SdkException("The Expiration Time for OAuth 2 Access Token is not set.");
        }
    }

    /**
     * Return the expiration date of refresh Token
     * @return Date
     */
    public function getRefreshTokenExpiresAt(){
      if(!empty($this->refreshTokenExpiresAt))
      {
        return $this->getDateFromSeconds($this->refreshTokenExpiresAt);
      }else{
        throw new SdkException("The Expiration Time for OAuth 2 refresh Token is not set.");
      }
    }

    /**
     * Return the refresh Token
     * @return String
     */
    public function getRefreshToken(){
        if(isset($this->refresh_token) && !empty($this->refresh_token))  return $this->refresh_token;
        else throw new SdkException("The OAuth 2 Refresh Token is not set in the Access Token Object.");
    }

    /**
     * Return the access Token
     * @return String
     */
    public function getAccessToken(){
      if(isset($this->accessTokenKey) && !empty($this->accessTokenKey))  return $this->accessTokenKey;
      else throw new SdkException("The OAuth 2 Access Token is not set in the Access Token Object.");
    }

    /**
     * Return the Client ID
     * @return String
     */
    public function getClientID(){
        if(isset($this->clientID) && !empty($this->clientID)){
            return $this->clientID;
        }else{
          throw new SdkException("Can't get OAuth 2 Client ID from Access Token Object. It is not set.");
        }
    }

    /**
     * Return the Client Secret
     * @return String
     */
    public function getClientSecret(){
        if(isset($this->clientSecret) && !empty($this->clientSecret)){
            return $this->clientSecret;
        }else{
          throw new SdkException("Can't get OAuth 2 Client Secret from Access Token Object. It is not set.");
        }
    }

    /**
     * Return the Company ID.
     * @return String
     */
    public function getRealmID(){
        if(isset($this->realmID) && !empty($this->realmID)){
            return $this->realmID;
        }else{
            return "";
        }
    }

    /**
     * Return the BaseURL for this access token generated for.
     * @return String
     */
    public function getBaseURL(){
        if(isset($this->baseURL) && !empty($this->baseURL)){
            return $this->baseURL;
        }else{
            return "";
        }
    }

    /**
     * Update an access token after creating a new access token or making a refresh tokan API call
     * @param Long     $tokenExpiresTime          The number of seconds that access token expired. Always 3600 seconds.
     * @param String   $refreshToken              The OAuth 2 Refresh Token returned from refresh token API call or generated from a new request.
     * @param Long     $refreshTokenExpiresTime   The number of seconds that refresh token expired. Always 8726400 seconds.
     * @param String   $accessToken               The OAuth 2 Access Token returned from refresh token API call or generated from a new request.
     */
    public function updateAccessToken($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken){
       $this->setAccessToken($accessToken);
       $this->setRefreshToken($refreshToken);
       $this->setAccessTokenValidationPeriodInSeconds($tokenExpiresTime);
       $this->setRefreshTokenValidationPeriodInSeconds($refreshTokenExpiresTime);
       $this->setAccessTokenExpiresAt(time() + $tokenExpiresTime);
       $this->setRefreshTokenExpiresAt(time() + $refreshTokenExpiresTime);
    }

    /**
     * A helper function to convert Seconds to date
     * @param  Integer  $second
     * @return Date
     */
    private function getDateFromSeconds($seconds){
      return date('Y/m/d H:i:s', $seconds);
    }
}
