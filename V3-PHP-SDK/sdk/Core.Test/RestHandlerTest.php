<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for RestHandler class
*/
class RestHandlerTest extends PHPUnit_Framework_TestCase
{
	/**
	* Tests for RestHandler class
	*
	* These tests are relatively simple, compared to the .NET SDK,
	* because .NET seperates out the concepts of "preparing" a request
	* versus "getting" a request, which leads to numerous opportunities
	* to check for consistency between the methods.  In comparison, the
	* PHP SDK combines these operations due to the underlying API
	* structure.  This coincidence leads to fewer test cases here.
	*/
    public function testPrepareRequestSuccessTest()
	{
		$RealmId = 9; // Not real
		$uri = implode(CoreConstants::SLASH_CHAR,array('company', $RealmId, 'query'));
		$context  = new ServiceContext($RealmId,'QBO', NULL);
		$requestParameters = new RequestParameters($uri, 'POST', 'application/text', NULL);
		$restRequestHandler = new SyncRestHandler($context);
        $this->assertEquals($context->realmId, $restRequestHandler->context->realmId);
	}

}
?>
