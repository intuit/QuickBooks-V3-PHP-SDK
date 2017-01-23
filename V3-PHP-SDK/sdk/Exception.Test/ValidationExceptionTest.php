<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ValidationException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ValidationException and is intended
 * to contain all ValidationException Unit Tests
 */
class ValidationExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ValidationException Constructor
	 */ 
	public function testValidationExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ValidationException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ValidationException Constructor
	 */ 
	public function testValidationExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ValidationException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
