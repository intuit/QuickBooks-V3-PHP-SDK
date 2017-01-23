<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/SerializationException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for SerializationException and is intended
 * to contain all SerializationException Unit Tests
 */
class SerializationExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for SerializationException Constructor
	 */ 
	public function testSerializationExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new SerializationException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a SerializationException Constructor
	 */ 
	public function testSerializationExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new SerializationException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
