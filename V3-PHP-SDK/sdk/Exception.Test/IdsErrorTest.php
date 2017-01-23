<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/IdsError.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for IdsError and is intended
 * to contain all IdsError Unit Tests
 */
class IdsErrorTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for IdsError Constructor
	 */ 
	public function testIdsErrorConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new IdsError($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a IdsError Constructor
	 */ 
	public function testIdsErrorBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new IdsError($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
