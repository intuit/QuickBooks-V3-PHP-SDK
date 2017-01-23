<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SecurityException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for SecurityException and is intended
 * to contain all SecurityException Unit Tests
 */
class SecurityExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for SecurityException Constructor
	 */ 
	public function testSecurityExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new SecurityException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a SecurityException Constructor
	 */ 
	public function testSecurityExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new SecurityException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
