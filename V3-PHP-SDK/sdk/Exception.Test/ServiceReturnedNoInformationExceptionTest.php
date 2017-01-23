<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/ServiceReturnedNoInformationException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ServiceReturnedNoInformationException and is intended
 * to contain all ServiceReturnedNoInformationException Unit Tests
 */
class ServiceReturnedNoInformationExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ServiceReturnedNoInformationException Constructor
	 */ 
	public function testServiceReturnedNoInformationExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ServiceReturnedNoInformationException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ServiceReturnedNoInformationException Constructor
	 */ 
	public function testServiceReturnedNoInformationExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ServiceReturnedNoInformationException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
