<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/RetryException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for RetryException and is intended
 * to contain all RetryException Unit Tests
 */
class RetryExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for RetryException Constructor
	 */ 
	public function testRetryExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new RetryException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a RetryException Constructor
	 */ 
	public function testRetryExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new RetryException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
