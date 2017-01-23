<?php
/**
 * This file contains test cases for OAuthRequestValidator
 */
 
require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for OAuthRequestValidator class
*/
class OAuthRequestValidatorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * A test for OAuthRequestValidator Constructor AccessToken Empty
	 */
	public function testOAuthRequestValidatorConstructorTestAccessTokenEmpty()
	{
		$accessToken = NULL;
		$accessTokenSecret = NULL;
		$consumerKey = NULL;
		$consumerSecret = NULL;
		try
		{
		    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
			// should land here
		}
	}
	
	/**
	 * A test for OAuthRequestValidator Constructor Access Token Secret Empty
	 */
	public function testOAuthRequestValidatorConstructorTestAccessTokenSecretEmpty()
	{
		$accessToken = "accessToken";
		$accessTokenSecret = NULL;
		$consumerKey = NULL;
		$consumerSecret = NULL;
		try
		{
		    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
			// should land here
		}
	}

	/**
	 * A test for OAuthRequestValidator Constructor Consumer Key Empty
	 */
	public function testOAuthRequestValidatorConstructorTestConsumerKeyEmpty()
	{
		$accessToken = "accessToken";
		$accessTokenSecret = "accessTokenSecret";
		$consumerKey = NULL;
		$consumerSecret = NULL;
		try
		{
		    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
			// should land here
		}
	}
	
	/**
	 * A test for OAuthRequestValidator Constructor Consumer Secret Empty
	 */
	public function testOAuthRequestValidatorConstructorTestConsumerSecretEmpty()
	{
		$accessToken = "accessToken";
		$accessTokenSecret = "accessTokenSecret";
		$consumerKey = "consumerKey";
		$consumerSecret = NULL;
		try
		{
		    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
			// should land here
		}
	}
	
	
	/**
	 * A test for OAuthRequestValidator Constructor
	 */
	public function testOAuthRequestValidatorConstructorTest()
	{
		$accessToken = "accessToken";
		$accessTokenSecret = "accessTokenSecret";
		$consumerKey = "consumerKey";
		$consumerSecret = "consumerSecret";
		try
		{
		    $target = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			// should land here
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}
}
?>
