<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for InvalidTokenException and is intended
 * to contain all InvalidTokenException Unit Tests
 */
class InvalidTokenExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for InvalidTokenException Constructor
	 */ 
	public function testInvalidTokenExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new InvalidTokenException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a InvalidTokenException Constructor
	 */ 
	public function testInvalidTokenExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new InvalidTokenException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
