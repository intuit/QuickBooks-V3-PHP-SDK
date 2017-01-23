<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for SdkException and is intended
 * to contain all SdkException Unit Tests
 */
class SdkExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for SdkException Constructor
	 */ 
	public function testSdkExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new SdkException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a SdkException Constructor
	 */ 
	public function testSdkExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new SdkException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
