<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Diagnostics/Logger.php');
require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLevel.php');
require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLogger.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for TraceLoggerTest and is intended
 * to contain all TraceLoggerTest Unit Tests
 */
class TraceLoggerTest extends PHPUnit_Framework_TestCase {

	/**
	 * A test for TraceLogger Constructor
	 */ 
	public function testTraceLoggerConstructorTest()
	{
		try
		{
		    $target = new TraceLogger();
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}
		
	/**
	 * A test for Log Error
	 */ 
	public function testLogErrorTest()
	{
		try
		{
			$target = new TraceLogger();
			$messageToWrite = "Error message.";
			$target->Log(TraceLevel::Error, $messageToWrite);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for Log Information
	 */ 
	public function testLogInfoTest()
	{
		try
		{
			$target = new TraceLogger();
			$messageToWrite = "Information message.";
			$target->Log(TraceLevel::Info, $messageToWrite);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}
	
	/**
	 * A test for Log Verbose
	 */ 
	public function testLogVerboseTest()
	{
		try
		{
			$target = new TraceLogger();
			$messageToWrite = "Verbose message.";
			$target->Log(TraceLevel::Verbose, $messageToWrite);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}
		
	/**
	 * A test for Log Warning
	 */ 
	public function testLogWarningTest()
	{
		try
		{
			$target = new TraceLogger();
			$messageToWrite = "Warning message.";
			$target->Log(TraceLevel::Warning, $messageToWrite);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}	
		
	/**
	 * A test for Log Off
	 */ 
	public function testLogOffTest()
	{
		try
		{
			$target = new TraceLogger();
			$messageToWrite = "Off message.";
			$target->Log(TraceLevel::Off, $messageToWrite);
		}
		catch (Exception $e)
		{
			echo "Exception: " . $e->getMessage() . "\n";
	        $this->assertTrue(FALSE);
		}
	}	
}
?>
