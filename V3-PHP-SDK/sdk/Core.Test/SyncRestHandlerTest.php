<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for SyncRestHandler class
*/
class SyncRestHandlerTest extends PHPUnit_Framework_TestCase
{
	
	/**
	 * Test case - constructor test
	 */
	public function testSyncRestHandlerConstructorTest()
	{
		try {
			$serviceContext = Initializer::InitializeServiceContextQbo();
			$actual = new SyncRestHandler($serviceContext);
		}
		catch(Exception $e)
		{
			$this->assertNotNull(NULL,'Failed to initialize SyncRestHandler ' . $e->getMessage());
		}	
	}
		
	/**
	 * Test case - bad constructor test
	 */
	public function testSyncRestHandlerEmptyConstructorTest()
	{
		try {
			$actual = new SyncRestHandler(NULL);
		}
		catch(Exception $e)
		{
		}	
	}
	
	/**
	 * Test case - Prepare request.  However, in PHP, we combined PrepareRequest and GetResponse,
	 * (therefore, this test case doesn't end up being a perfect mapping to the .NET test case)
	 */
	public function testSyncRestHandlerPrepareRequestTest()
	{
		$serviceContext = Initializer::InitializeServiceContextQbo();
		
		$handler = new SyncRestHandler($serviceContext);
		$resourceUri = "company/".$serviceContext->realmId."/customer";
		
		$requestParameters = new RequestParameters($resourceUri, 'POST', CoreConstants::CONTENTTYPE_APPLICATIONXML, NULL);

		$this->assertEquals($requestParameters->ResourceUri, $resourceUri);
		$this->assertEquals($requestParameters->HttpVerbType, 'POST');
		$this->assertEquals($requestParameters->ContentType, CoreConstants::CONTENTTYPE_APPLICATIONXML);
	}

    // TODO - actually generates HTTP 500, need to check which is correct
	/**
	 * .NET SDK says this is designed to generate a HTTP 415
 	 */
    public function testGetResponseExceptionTest()
	{
		$serviceContext = Initializer::InitializeServiceContextQbo();
		
		$handler = new SyncRestHandler($serviceContext);
		$resourceUri = "company/".$serviceContext->realmId."/customer";
		
		$requestParameters = new RequestParameters($resourceUri, 'POST', CoreConstants::CONTENTTYPE_APPLICATIONTEXT, NULL);
		$response = $handler->GetResponse($requestParameters, NULL, NULL);
	}

    // TODO - actually generates HTTP 500, need to check (and test explicitly) what should be generated
	/**
	 * Generates status code 404
	 */
	public function testGetResponseNotFoundExceptionTest()
	{
		$serviceContext = Initializer::InitializeServiceContextQbo();
		
		$handler = new SyncRestHandler($serviceContext);
		$resourceUri = "company/".$serviceContext->realmId."/myentity";
		
		$requestParameters = new RequestParameters($resourceUri, 'POST', CoreConstants::CONTENTTYPE_APPLICATIONXML, NULL);
		try {
			$handler->GetResponse($requestParameters, 'postbody', NULL);
			$this->assertTrue(FALSE, 'Did a request with a non-existent entity; should have hit exception.');
		}
		catch(Exception $e)
		{
			$this->assertTrue(TRUE, 'Did a request with a non-existent entity - successfully hit expected exception.');
		}	
	}	
	
	/**
	 * We don't due Retry support (asynch) or separate prepare + request in this PHP SDK, so some
	 * test cases from the .NET SDK were not relavant to port.
	 */	

}
?>
