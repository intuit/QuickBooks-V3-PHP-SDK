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
namespace QuickBooksOnline\API\Core\OAuth\OAuth1;

use QuickBooksOnline\API\Exception\SdkException;

/**
 * Class OAuth1
 *
 * A helper class to sign the Signature based on the request
 * @package QuickBooksOnline
 *
 */

class OAuth1{

  /**
   * The OAuth 1 ConsumerKey
   * @var String $consumerKey    The OAuth 1 Consumer Key
   */
  private $consumerKey;

  /**
   * The OAuth 1 ConsumerSecret
   * @var String $consumerSecret    The OAuth 1 Consumer Secret
   */
  private $consumerSecret;

  /**
   * The OAuth 1 Access Token
   * @var String $oauthToken    The OAuth 1 Access Token key
   */
  private $oauthToken;

  /**
   * The OAuth 1 Access Token Secret
   * @var String $oauthTokenSecret    The OAuth 1 Access Token Secret
   */
  private $oauthTokenSecret;

  /**
   * The OAuth 1 Nonce for random value
   * @var String $oautNonce    The OAuth 1 Nonce
   */
  private $oauthNonce;

  /**
   * The OAuth 1 Time Stamp
   * @var String $oauthTimeStamp    The OAuth 1 Time Stamp
   */
  private $oauthTimeStamp;

  /**
   * The OAuth 1 signature method
   */
  const SIGNATURE_METHOD = 'sha1';

  /**
   * A set of characters for random selection
   */
  const NONCE_CHARS = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

  /**
   * THe OAuth parameters
   * @var Array $oauthParameters   The oauthParameters to be included
   */
  public $oauthParameters;

  /**
   * The Constructor for OAuth 1
   * @param String $ck     Consumer key
   * @param String $cS     Consumer Secret
   * @param String $oT     OAuth Access Token
   * @param String $oTS    OAuth Access Token Secret
   */
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

  /**
   * Return the completed signed Authorization Header
   * @param String $uri              The complete URL contains everything
   * @param Array $queryParameters   The QueryParaemters for the request
   * @param String $httpMethod       The Http Method. POST or GET
   * @return String Authorization Header
   */
  public function getOAuthHeader($uri, $queryParameters, $httpMethod){
      $this->sign($uri, $queryParameters, $httpMethod);
      foreach($this->oauthParameters as $k => $v){
           $this->oauthParameters[$k] = $k . '="' . rawurlencode($v) . '"';
      }
      return 'OAuth ' . implode(',', $this->oauthParameters);
  }

  /**
   * Sign the Request based on the URL, OAuth 1 values, and query parameters. It follows the spec mentioned at here: https://oauth1.wp-api.org/docs/basics/Signing.html
   * For QuickBooks online, the Body only have two format, JSON or test. Do not include them in the authorization parts.
   * @param String $uri                 The Complete URL contains everything
   * @param Array $queryparameters      The query parameters for the array
   * @param String $httpMethod       The Http Method. POST or GET
   */
  public function sign($uri, $queryParameters, $httpMethod){
      $baseString = $this->getBaseString($uri, $httpMethod, $queryParameters);
      $oauthSignature = $this->signUsingHmacSha1($baseString);
      $this->oauthParameters['oauth_signature'] = $oauthSignature;
  }

  /**
   * Prepare the base String for OAuth 1 to sign
   * @param String $uri                 The Complete URL contains everything
   * @param String $method              The Http Method. POST or GET
   * @param Array $parameters           The query parameters for the array
   * @return String   The baseString for sign
   */
  public function getBaseString($uri, $method, array $parameters = array()){
      $baseString = $this->prepareHttpMethod($method) . '&' .
                    $this->prepareURL($uri) . '&' .
                    $this->prepareQueryParams($parameters);
      return $baseString;
  }


  /**
   * Helper method to format the HTTP method
   * @param String $method    The Post or Get
   * @return String    The formatted HTTP method
   */
  private function prepareHttpMethod($method){
       $trimmedMethod = trim($method);
       $upperMethod = strtoupper($trimmedMethod);
       return rawurlencode($method);
  }

  /**
   * Helper method to format the URL
   * @param String $url    The URL to be formatted
   * @return String    The formatted URL String
   */
  private function prepareURL($url){
       $trimedURL = trim($url);
       $encodedString = rawurlencode($trimedURL);
       return  $encodedString;
  }

  /**
   * A helper method to decide which query parameters to be included
   * When we append OAuth parts to the existed queryParameters. We don't add body for Query in the signature part.
   * POST parameters should only be included in the signature if they are of content-type "application/x-www-form-urlencoded" as with a form submission.
   * @param Array $queryParameters    The QueryParameters Array for format and re-order
   * @return String The formatted string
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

  /**
   * Sign the $baseString with HMAC-SHA1
   * @param String $baseString    The baseString to be signed
   * @return String Signed String
   */
  public function signUsingHmacSha1($baseString){
       $key = rawurlencode($this->consumerSecret) . '&' . rawurlencode($this->oauthTokenSecret);
       return base64_encode(hash_hmac(self::SIGNATURE_METHOD, $baseString, $key, TRUE));
  }

  /**
   * Set a random nonce for the signature
   * @param int $length   the lenght of the lenght
   */
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

  /**
   * Set a random timestamp for the signature
   */
  private function setOAuthTimeStamp(){
        $this->oauthTimeStamp = time();
  }

  /**
   * Add all OAuth query paraemters to the signature string string
   * @param Array $queryParameters    The queryParameters to be included
   * @return Array $queryParameters   The complete query parameters
   */
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
