<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for FaultHandlerTest class
*/
class FaultHandlerTest extends PHPUnit_Framework_TestCase
{
	/**
	 * A test for FaultHandler Constructor
	 */
    public function testFaultHandlerConstructorTest()
    {
		$serviceContext = Initializer::InitializeServiceContextQbo();
    $exception = new OAuthException();
		$target = new FaultHandler($serviceContext, $exception);
		$this->assertNotNull($target);
    }

	/**
	 * A test for ParseResponseAndThrowException
   * The method do not exist. THe test case is unnecessary.
	 */
	public function testParseResponseAndThrowExceptionNullWebExceptionTest()
	{

	}
}
?>
