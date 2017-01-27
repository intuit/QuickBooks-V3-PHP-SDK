/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php 

require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');

/**
 * OAuth implementation conforming to RequestValidator base class 
 * 
 * OAuth implementation conforming to RequestValidator base class,
 * to allow IPP calls via often-used OAuth mechanism.
 *
 */
class OAuthRequestValidator extends RequestValidator
{
	/**
	 * The Oauth signature method.
	 * @var string 
	 */
	 public $oauthSignatureMethod;
	 
	/**
	 * The OAuth Access Token
	 * @var string 
	 */
	 public $AccessToken;
	 
	/**
	 * The OAuth Access Token Secret
	 * @var string 
	 */
	 public $AccessTokenSecret;
	 
	/**
	 * The OAuth Consumer Key
	 * @var string 
	 */
	 public $ConsumerKey;
	 
	/**
	 * The OAuth Consumer Secret
	 * @var string 
	 */
	 public $ConsumerSecret;
	 

	/**
	 * Initializes a new instance of the OAuthRequestValidator class.
	 *
	 * @param int $accessToken The access token.
	 * @param int $accessTokenSecret The access token secret.
	 * @param int $consumerKey The consumer key.
	 * @param int $consumerSecret The consumer secret.
	 */
	public function OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret)
	{
		if (empty($accessToken))
		{
			throw new InvalidTokenException('Access token cannot be null or empty.');
		}
		
		if (empty($accessTokenSecret))
		{
			throw new InvalidTokenException("Access token secret cannot be null or empty.");
		}
		
		if (empty($consumerKey))
		{
			throw new InvalidTokenException("Consumer key cannot be null or empty.");
		}
		
		if (empty($consumerSecret))
		{
			throw new InvalidTokenException("Consumer key secret cannot be null or empty.");
		}
		
		$this->AccessToken = $accessToken;
		$this->AccessTokenSecret = $accessTokenSecret;
		$this->ConsumerKey = $consumerKey;
		$this->ConsumerSecret = $consumerSecret;
		$this->oauthSignatureMethod = OAUTH_SIG_METHOD_HMACSHA1;
	}

}
