<?php
namespace QuickBooksOnline\API\Core\OAuth\OAuth2;

use QuickBooksOnline\API\Exception\SdkException;

class OAuth2AccessToken{

    private $accessTokenKey;

    private $tokenType;

    private $refresh_token;

    private $accessTokenExpiresIn;

    private $refreshTokenExpiresIn;

    private $clientID;

    private $clientSecret;

    public function __construct($atk, $refreshtk, $cID, $cS, $atei = null, $refreshtei = null, $tk = "bearer"){
        $this->accessTokenKey = $atk;
        $this->refresh_token = $refreshtk;
        $this->clientID = $cID;
        $this->clientSecret = $cS;
        $this->accessTokenExpiresIn = $atei;
        $this->refreshTokenExpiresIn = $refreshtei;
        $this->tokenType = $tk;
    }

    public function getAccessToken(){
        return $this->accessTokenKey;
    }

    public function getAccessTokenExpriationTime(){
        if(isset($this->accessTokenExpiresIn))
        {
          return $this->accessTokenExpiresIn;
        }else{
          throw new SdkException("The Expiration Time for OAuth 2 Access Token is not set.");
        }
    }

    public function getRefreshToken(){
        return $this->refresh_token;
    }

    public function getRefreshTokenExpirationTime(){
      if(isset($this->refreshTokenExpiresIn))
      {
        return $this->refreshTokenExpiresIn;
      }else{
        throw new SdkException("The Expiration Time for OAuth 2 refresh Token is not set.");
      }
    }

    public function getCLientID(){
        return $this->clientID;
    }

    public function getClientSecret(){
        return $this->clientSecret;
    }


}

 ?>
