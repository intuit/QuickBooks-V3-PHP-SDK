<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

/** 
 * This is a test class for PlatformService and is intended to contain all PlatformService Unit Tests
 */

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for TraceLoggerTest and is intended
 * to contain all TraceLoggerTest Unit Tests
 */
class PlatformServiceTestCases extends PHPUnit_Framework_TestCase {

	/**
	 * A test for GetAppMenu
	 */ 
/*	public function testGetAppMenu()
	{
		$accessToken = ConfigurationManager::AppSettings('AccessTokenQBO');
		$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBO');
		$consumerKey = ConfigurationManager::AppSettings('ConsumerKeyQBO');
		$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecretQBO');
		$realmIAQBO = ConfigurationManager::AppSettings('RealmIAQBO');

		try
		{
		    $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			$serviceContext = new ServiceContext($realmIAQBO, IntuitServicesType::QBO, $oauthValidator);
			$platformService = new PlatformService($serviceContext);
			$html = $platformService->GetAppMenu();
			if (FALSE !== strpos($html, 'intuitPlatformAppMenuDropdownHeader'))
			{
				// Found contents of Html that we expected
			}
			else
			{
				// Expected Html fragment not found
		        $this->assertTrue(FALSE);
			}
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}	*/
		
	/**
	 * A test for Reconnect
	 */ 
	 /*
	public function testReconnect()
	{
		$realmId = ConfigurationManager::AppSettings('RealmIAQBO');
		try
		{
			$serviceContext = new ServiceContext($realmId, IntuitServicesType::QBO);
			$platformService = new PlatformService($serviceContext);
			$xmlObj = $platformService->Reconnect();
			
			if ("Token Refresh Window Out of Bounds"==(string)$xmlObj->ErrorMessage)
			{
				// Good.  Found expected content.
			}
			else {
				// Expected Xml fragment not found
				$this->assertTrue(FALSE);
			}
		}
		catch (Exception $e)
		{
	        //$this->assertTrue(FALSE);
		}
	}	
	*/
		
	/**
	 * A test for Current User API
	 */ 
	public function testCurrentUser()
	{
        // TODO - skip this test for now - not sure how to make it work
        $this->markTestSkipped();

		$accessToken = ConfigurationManager::AppSettings('AccessTokenQBO');
		$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBO');
		$consumerKey = ConfigurationManager::AppSettings('ConsumerKeyQBO');
		$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecretQBO');
		$realmIAQBO = ConfigurationManager::AppSettings('RealmIAQBO');
		
		try
		{
		    $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			$serviceContext = new ServiceContext($realmIAQBO, IntuitServicesType::QBO, $oauthValidator);
                        $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
                        $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
			$platformService = new PlatformService($serviceContext);
			$xmlObj = $platformService->CurrentUser();
			
			if ($xmlObj->User)
			{
				// Good.  Found expected content.
			}
			else {
				// Expected Xml fragment not found
				$this->assertTrue(FALSE);
			}
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}	
	
}

?>
