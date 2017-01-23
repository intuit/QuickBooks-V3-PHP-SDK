<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/FaultException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for FaultException and is intended
 * to contain all FaultException Unit Tests
 */
class FaultExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for FaultException Constructor
	 */ 
	public function testFaultExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new FaultException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a FaultException Constructor
	 */ 
	public function testFaultExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new FaultException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
