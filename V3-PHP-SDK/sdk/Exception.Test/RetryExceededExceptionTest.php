<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/RetryExceededException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for RetryExceededException and is intended
 * to contain all RetryExceededException Unit Tests
 */
class RetryExceededExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for RetryExceededException Constructor
	 */ 
	public function testRetryExceededExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new RetryExceededException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a RetryExceededException Constructor
	 */ 
	public function testRetryExceededExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new RetryExceededException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
