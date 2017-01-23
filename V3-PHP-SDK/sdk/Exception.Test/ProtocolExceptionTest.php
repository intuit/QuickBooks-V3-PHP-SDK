<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/ProtocolException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ProtocolException and is intended
 * to contain all ProtocolException Unit Tests
 */
class ProtocolExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ProtocolException Constructor
	 */ 
	public function testProtocolExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ProtocolException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ProtocolException Constructor
	 */ 
	public function testProtocolExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ProtocolException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
