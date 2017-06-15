<?php
namespace QuickBooksOnline\API\Core\OAuth\OAuth1;

use QuickBooksOnline\API\Exception\SdkException;


class OAuth1{

  private $consumerKey;
  private $consumerSecret;
  private $oauthToken;
  private $oauthTokenSecret;
  private $oauthNonce;
  private $oauthTimeStamp;

  const SIGNATURE_METHOD = 'sha1';
  const NONCE_CHARS = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

  public $oauthParameters;

  public function __construct($ck, $cS, $oT, $oTS)
  {
      if(isset($ck)){
          $this->consumerKey = $ck;
      }else{
          throw new SdkException("Consumer key is not passed.");
      }

      if(isset($cS)){
          $this->consumerSecret = $cS;
      }else{
          throw new SdkException("Consumer Secret is not passed.");
      }

      if(isset($oT)){
          $this->oauthToken = $oT;
      }else{
          throw new SdkException("OAuth Token is not passed.");
      }

      if(isset($oTS)){
          $this->oauthTokenSecret = $oTS;
      }else{
          throw new SdkException("OAuth token Secret is not passed.");
      }

      $this->setNonce();
      $this->setOAuthTimeStamp();
      $this->oauthParameters = $this->appendOAuthPartsTo(null);
  }

  public function getOAuthHeader($uri, $queryParameters, $httpMethod){
      $this->sign($uri, $queryParameters, $httpMethod);
      foreach($this->oauthParameters as $k => $v){
           $this->oauthParameters[$k] = $k . '="' . rawurlencode($v) . '"';
      }
      return 'OAuth ' . implode(',', $this->oauthParameters);
  }

  /**
   * For QUickBooks online, the Body only have two format, JSON or test. Do not include them in the authorization parts.
   */
  public function sign($uri, $queryParameters, $httpMethod){
      $baseString = $this->getBaseString($uri, $httpMethod, $queryParameters);
      $oauthSignature = $this->signUsingHmacSha1($baseString);
      $this->oauthParameters['oauth_signature'] = $oauthSignature;
  }

  public function getBaseString($uri, $method, array $parameters = array()){
      $baseString = $this->prepareHttpMethod($method) . '&' .
                    $this->prepareURL($uri) . '&' .
                    $this->prepareQueryParams($parameters);
      return $baseString;
  }



  private function prepareHttpMethod($method){
       $trimmedMethod = trim($method);
       $upperMethod = strtoupper($trimmedMethod);
       return rawurlencode($method);
  }

  private function prepareURL($url){
       $trimedURL = trim($url);
       $encodedString = rawurlencode($trimedURL);
       return  $encodedString;
  }

  /**
   * When we append OAuth parts to the existed queryParameters. We don't add body for Query in the signature part.
   * POST parameters should only be included in the signatureif they are of content-type "application/x-www-form-urlencoded" as with a form submission.
   */
  private function prepareQueryParams($queryParameters){
       $appendedQueryParams = $this->appendOAuthPartsTo($queryParameters);

       array_walk_recursive($appendedQueryParams, function (&$key, &$value) {
         $key   = rawurlencode($key);
         $value = rawurlencode($value);
        });

       uksort($appendedQueryParams, 'strcmp');
       $pairs = [];
       foreach ($appendedQueryParams as $parameter => $value) {
           if (is_array($value)) {
               // If two or more parameters share the same name, they are sorted by their value
               // Ref: Spec: 9.1.1 (1)
               sort($value, SORT_STRING);
               foreach ($value as $duplicateValue) {
                   $pairs[] = $parameter . '=' . $duplicateValue;
               }
           } else {
               $pairs[] = $parameter . '=' . $value;
           }
       }
       // For each parameter, the name is separated from the corresponding value by an '=' character (ASCII code 61)
       // Each name-value pair is separated by an '&' character (ASCII code 38)
       $resultString = implode('&', $pairs);
       $encodedString = rawurlencode($resultString);
       return $encodedString;
  }

  public function signUsingHmacSha1($baseString){
       $key = rawurlencode($this->consumerSecret) . '&' . rawurlencode($this->oauthTokenSecret);
       return base64_encode(hash_hmac(self::SIGNATURE_METHOD, $baseString, $key, TRUE));
  }

  private function setNonce($length = 6){
        $result = '';
        $cLength = strlen(self::NONCE_CHARS);
        for ($i=0; $i < $length; $i++)
        {
           $rnum = rand(0,$cLength - 1);
           $result .= substr(self::NONCE_CHARS,$rnum,1);
        }
        $this->oauthNonce = $result;
  }

  private function setOAuthTimeStamp(){
        $this->oauthTimeStamp = time();
  }

  private function appendOAuthPartsTo(array $queryParameters = null){
      if($queryParameters == null){
          $queryParameters = array();
      }
      $queryParameters['oauth_consumer_key'] = $this->consumerKey;
      $queryParameters['oauth_token'] = $this->oauthToken;
      $queryParameters['oauth_signature_method'] ='HMAC-SHA1';
      $queryParameters['oauth_timestamp'] = $this->oauthTimeStamp;
      $queryParameters['oauth_nonce'] =$this->oauthNonce;
      $queryParameters['oauth_version'] = '1.0';
      return $queryParameters;
  }
}
