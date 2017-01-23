<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/EndpointNotFoundException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for EndpointNotFoundException and is intended
 * to contain all EndpointNotFoundException Unit Tests
 */
class EndpointNotFoundExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for EndpointNotFoundException Constructor
	 */ 
	public function testEndpointNotFoundExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new EndpointNotFoundException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a EndpointNotFoundException Constructor
	 */ 
	public function testEndpointNotFoundExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new EndpointNotFoundException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
