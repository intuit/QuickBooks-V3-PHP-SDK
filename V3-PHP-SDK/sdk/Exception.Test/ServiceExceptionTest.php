<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ServiceException and is intended
 * to contain all ServiceException Unit Tests
 */
class ServiceExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ServiceException Constructor
	 */ 
	public function testServiceExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ServiceException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ServiceException Constructor
	 */ 
	public function testServiceExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ServiceException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
