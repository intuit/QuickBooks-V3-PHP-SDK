<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/CommunicationException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for CommunicationException and is intended
 * to contain all CommunicationException Unit Tests
 */
class CommunicationExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for CommunicationException Constructor
	 */ 
	public function testCommunicationExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new CommunicationException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a CommunicationException Constructor
	 */ 
	public function testCommunicationExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new CommunicationException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
