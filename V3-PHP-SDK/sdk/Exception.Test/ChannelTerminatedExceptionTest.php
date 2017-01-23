<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/ServiceExceptions/ChannelTerminatedException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for ChannelTerminatedException and is intended
 * to contain all ChannelTerminatedException Unit Tests
 */
class ChannelTerminatedExceptionTest extends PHPUnit_Framework_TestCase_Gatherer {

	/**
	 * A test for ChannelTerminatedException Constructor
	 */ 
	public function testChannelTerminatedExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new ChannelTerminatedException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a ChannelTerminatedException Constructor
	 */ 
	public function testChannelTerminatedExceptionTestBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new ChannelTerminatedException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
