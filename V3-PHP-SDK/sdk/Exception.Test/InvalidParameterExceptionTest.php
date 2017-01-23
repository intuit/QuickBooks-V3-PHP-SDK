<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidParameterException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for InvalidParameterException and is intended
 * to contain all InvalidParameterException Unit Tests
 */
class InvalidParameterExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for InvalidParameterException Constructor
	 */ 
	public function testInvalidParameterExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new InvalidParameterException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a InvalidParameterException Constructor
	 */ 
	public function testInvalidParameterExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new InvalidParameterException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
