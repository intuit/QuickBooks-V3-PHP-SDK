<?php
namespace QuickBooksOnline\API\Core\OAuth\OAuth2;


use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\Exception\SdkException;
use QuickBooksOnline\API\Core\HttpClients\CurlHttpClient;
use QuickBooksOnline\API\Core\CoreConstants;


class OAuth2LoginHelper
{
    /**
     * @var the Client ID asscoiated with the app
     */
    protected $clientID;

    /**
     * @var the Client ID asscoiated with the app
     */
    protected $clientSecret;

    /**
     * @var the OAuth2AccessToken object, not the AccessToken String value
     */
    protected $accessToken;

    /**
     * @var the curlClient that makes the actual Call
     */
    protected $curlHttpClient;

    /**
     * @var the fault handler that handles error case
     */
    protected $faultHandler;

    /**
     * Constructor for OAuth2Login Helper. Client ID and Client Secret are used to get OAuth 2 Tokens. Service Context is used for refreshToken
     */
    public function __construct($clientID, $clientSecret, ServiceContext $serviceContext = null){
        if(isset($serviceContext)){
            $theAccessToken =  $serviceContext->requestValidator;
            if($theAccessToken instanceof OAuth2AccessToken){
                $this->accessToken = $theAccessToken;
                $this->clientID = $theAccessToken->getClientID();
                $this->clientSecret = $theAccessToken->getClientSecret();
            }else{
                 throw new SdkException("Can't get OAuth 2 Settings from Config. Please make sure you are using OAuth 2 Values.");
            }
        }else{
           $this->clientID = $clientID;
           $this->clientSecret = $clientSecret;
        }
        $this->curlHttpClient = new CurlHttpClient();
    }



    public function getAccessToken(){
       if(isset($this->accessToken) && !empty($this->accessToken)){
           return $this->accessToken;
       }else{
           throw new SdkException("Can't get OAuth 2 Access Token Object. It is not set yet.");
       }
    }

    public function getClientID(){
        if(isset($this->clientID) && !empty($this->clientID)){
            return $this->clientID;
        }else{
          throw new SdkException("Can't get OAuth 2 Client ID. It is not set.");
        }
    }

    public function getClientSecret(){
        if(isset($this->clientSecret) && !empty($this->clientSecret)){
            return $this->clientSecret;
        }else{
          throw new SdkException("Can't get OAuth 2 Client Secret. It is not set.");
        }
    }

    public function refreshToken(){
       $theAccessToken = $this->getAccessToken();
       $refreshToken =$theAccessToken->getRefreshToken();
       $refreshTokenEndpoint = CoreConstants::OAUTH2_TOKEN_ENDPOINT_URL;
       $http_header = $this->constructRefreshTokenHeader();
       $requestBody = $this->constructRefreshTokenBody($refreshToken);
       $intuitResponse = $this->curlHttpClient->makeAPICall($refreshTokenEndpoint, CoreConstants::HTTP_POST, $http_header, $requestBody, null, true);
       $this->closeConnection();
       $faultHandler = $intuitResponse->getFaultHandler();
       if(isset($faultHandler)) {
             $this->faultHandler = $faultHandler;
             return null;
       }else{
          $this->accessToken = $this->parseNewAccessTokenFromResponse($intuitResponse->getBody());
          return $this->getAccessToken();
       }
    }

    /**
     * Get the error from last request
     *
     * @return lastError
     */
    public function getLastError()
    {
        return $this->faultHandler;
    }

    private function parseNewAccessTokenFromResponse($body){
        if(is_string($body)){
           $json_body = json_decode($body, true);
           if(json_last_error() === JSON_ERROR_NONE){
              $tokenExpiresTime = $json_body[CoreConstants::EXPIRES_IN];
              $refreshToken = $json_body[CoreConstants::OAUTH2_REFRESH_GRANTYPE];
              $refreshTokenExpiresTime = $json_body[CoreConstants::X_REFRESH_TOKEN_EXPIRES_IN];
              $accessToken = $json_body[CoreConstants::ACCESS_TOKEN];
              $this->checkIfEmptyValueReturned($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken);
              $this->accessToken->updateAccessToken($tokenExpiresTime, $refreshToken, $refreshTokenExpiresTime, $accessToken);
              return $this->accessToken;
           }else{
              throw new SdkException("JSON DECODE encounters error:" . json_last_error());
           }
        }
    }

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

    private function generateAuthorizationHeader(){
        $encodedClientIDClientSecrets = base64_encode($this->getClientID() . ':' . $this->getClientSecret());
        $authorizationheader = CoreConstants::OAUTH2_AUTHORIZATION_TYPE . $encodedClientIDClientSecrets;
        return $authorizationheader;
    }

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

    private function constructRefreshTokenBody($refresh_token){
        $parameters = array(
          'grant_type' => CoreConstants::OAUTH2_REFRESH_GRANTYPE,
          'refresh_token' => $refresh_token
        );
        return http_build_query($parameters);
    }

    private function closeConnection(){
        $this->curlHttpClient->closeConnection();
    }
}

 ?>
