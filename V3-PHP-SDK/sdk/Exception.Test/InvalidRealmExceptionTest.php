<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidRealmException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for InvalidRealmException and is intended
 * to contain all InvalidRealmException Unit Tests
 */
class InvalidRealmExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for InvalidRealmException Constructor
	 */ 
	public function testInvalidRealmExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new InvalidRealmException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a InvalidRealmException Constructor
	 */ 
	public function testInvalidRealmExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new InvalidRealmException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
