<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/ServerTooBusyException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ServerTooBusyException and is intended
 * to contain all ServerTooBusyException Unit Tests
 */
class ServerTooBusyExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ServerTooBusyException Constructor
	 */ 
	public function testServerTooBusyExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ServerTooBusyException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ServerTooBusyException Constructor
	 */ 
	public function testServerTooBusyExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ServerTooBusyException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
