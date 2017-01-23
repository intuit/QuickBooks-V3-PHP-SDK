<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidServiceRequestException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for InvalidServiceRequestException and is intended
 * to contain all InvalidServiceRequestException Unit Tests
 */
class InvalidServiceRequestExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for InvalidServiceRequestException Constructor
	 */ 
	public function testInvalidServiceRequestExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new InvalidServiceRequestException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a InvalidServiceRequestException Constructor
	 */ 
	public function testInvalidServiceRequestExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new InvalidServiceRequestException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
