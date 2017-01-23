<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/IdsException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for IdsException and is intended
 * to contain all IdsException Unit Tests
 */
class IdsExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for IdsException Constructor
	 */ 
	public function testIdsExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new IdsException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a IdsException Constructor
	 */ 
	public function testIdsExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new IdsException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
