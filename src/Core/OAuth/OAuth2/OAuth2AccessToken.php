<?php
namespace QuickBooksOnline\API\Core\OAuth\OAuth2;

use QuickBooksOnline\API\Exception\SdkException;

class OAuth2AccessToken{

    private $accessTokenKey;

    private $tokenType;

    private $refresh_token;

    private $accessTokenExpiresAt;

    private $refreshTokenExpiresAt;

    private $accessTokenValidationPeriod;

    private $refreshTokenValidationPeriod;

    private $clientID;

    private $clientSecret;



    public function __construct($cID, $cS, $atk, $refreshtk, $atei = null, $refreshtei = null, $tk = "bearer"){
        $this->clientID = $cID;
        $this->clientSecret = $cS;
        $this->accessTokenKey = $atk;
        $this->refresh_token = $refreshtk;
        $this->accessTokenExpiresAt = $atei;
        $this->refreshTokenExpiresAt = $refreshtei;
        $this->tokenType = $tk;
    }

    public function setAccessToken($accessToken){
       $this->accessTokenKey = $accessToken;
    }

    public function setRefreshToken($refreshToken){
      $this->refresh_token = $refreshToken;
    }

    public function setAccessTokenValidationPeriodInSeconds($seconds){
      $this->accessTokenValidationPeriod = $seconds;
    }

    public function setRefreshTokenValidationPeriodInSeconds($seconds){
      $this->refreshTokenValidationPeriod = $seconds;
    }

    public function setAccessTokenExpiresAt($date){
      $this->accessTokenExpiresAt = $date;
    }

    public function setRefreshTokenExpiresAt($date){
      $this->refreshTokenExpiresAt = $date;
    }

    public function isAccessTokenSet(){
       if(isset($this->accessTokenKey) && !empty($this->accessTokenKey)){
          return true;
       }else{
          return false;
       }
    }

    public function isFreshTokenSet(){
      if(isset($this->refresh_token) && !empty($this->refresh_token)){
         return true;
      }else{
         return false;
      }
    }

    public function isFreshTokenExpirationTimeSet(){
      if(isset($this->refreshTokenValidationPeriod) && !empty($this->refreshTokenValidationPeriod)){
         return true;
      }else{
         return false;
      }
    }

    public function isAccessTokenExpirationTimeSet(){
      if(isset($this->accessTokenValidationPeriod) && !empty($this->accessTokenValidationPeriod)){
         return true;
      }else{
         return false;
      }
    }

    public function isAccessTokenExpirationDateSet(){
      if(isset($this->accessTokenExpiresAt) && !empty($this->accessTokenExpiresAt)){
         return true;
      }else{
         return false;
      }
    }

    public function isRefreshTokenExpirationDateSet(){
      if(isset($this->refreshTokenExpiresAt) && !empty($this->refreshTokenExpiresAt)){
         return true;
      }else{
         return false;
      }
    }

    public function getRefreshTokenValidationPeriodInSeconds(){
      if(isset($this->refreshTokenValidationPeriod) && !empty($this->refreshTokenValidationPeriod))
      {
          return $this->refreshTokenValidationPeriod;
      }else{
        throw new SdkException("The validation period for OAuth 2 refresh Token is not set.");
      }
    }

    public function getAccessTokenValidationPeriodInSeconds(){
      if(isset($this->accessTokenValidationPeriod) && !empty($this->accessTokenValidationPeriod))
      {
          return $this->accessTokenValidationPeriod;
      }else{
        throw new SdkException("The validation period for OAuth 2 access Token is not set.");
      }
    }

    public function getAccessTokenExpiresAt(){
        if(!empty($this->accessTokenExpiresAt))
        {
          return $this->getDateFromSeconds($this->accessTokenExpiresAt);
        }else{
          throw new SdkException("The Expiration Time for OAuth 2 Access Token is not set.");
        }
    }

    public function getRefreshTokenExpiresAt(){
      if(!empty($this->refreshTokenExpiresAt))
      {
        return $this->getDateFromSeconds($this->refreshTokenExpiresAt);
      }else{
        throw new SdkException("The Expiration Time for OAuth 2 refresh Token is not set.");
      }
    }

    public function getRefreshToken(){
        if(isset($this->refresh_token) && !empty($this->refresh_token))  return $this->refresh_token;
        else throw new SdkException("The OAuth 2 Refresh Token is not set in the Access Token Object.");
    }

    public function getAccessToken(){
      if(isset($this->accessTokenKey) && !empty($this->accessTokenKey))  return $this->accessTokenKey;
      else throw new SdkException("The OAuth 2 Access Token is not set in the Access Token Object.");
    }

    public function getClientID(){
        if(isset($this->clientID) && !empty($this->clientID)){
            return $this->clientID;
        }else{
          throw new SdkException("Can't get OAuth 2 Client ID from Access Token Object. It is not set.");
        }
    }

    public function getClientSecret(){
        if(isset($this->clientSecret) && !empty($this->clientSecret)){
            return $this->clientSecret;
        }else{
          throw new SdkException("Can't get OAuth 2 Client Secret from Access Token Object. It is not set.");
        }
    }

    public function updateAccessToken($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken){
       $this->setAccessToken($accessToken);
       $this->setRefreshToken($refreshToken);
       $this->setAccessTokenValidationPeriodInSeconds($tokenExpiresTime);
       $this->setRefreshTokenValidationPeriodInSeconds($refreshTokenExpiresTime);
       $this->setAccessTokenExpiresAt(time() + $tokenExpiresTime);
       $this->setRefreshTokenExpiresAt(time() + $refreshTokenExpiresTime);
    }

    private function getDateFromSeconds($seconds){
      return date('Y/m/d H:i:s', $seconds);
    }

    public function isAccessTokenExpired(){
      return $this->accessTokenExpiresAt < time();
    }

    public function isRefreshTokenExpired(){
      return $this->refreshTokenExpiresAt < time();
    }
}

 ?>
