<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/BatchItemsExceededException.php');

date_default_timezone_set('America/Chicago');
 
/**
 * This is a test class for BatchItemsExceededExceptionTest and is intended
 * to contain all BatchItemsExceededExceptionTest Unit Tests
 */
class BatchItemsExceededExceptionTest extends PHPUnit_Framework_TestCase_Gatherer
{
	/**
	 * A test for BatchItemsExceededException Constructor
	 */ 
	public function testBatchItemsExceededExceptionConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$target = new BatchItemsExceededException($errorMessage, $errorCode);
		}
		catch (Exception $e)
		{
	        $this->assertTrue(FALSE);
		}
	}

	/**
	 * A test for a bad call to a BatchItemsExceededException Constructor
	 */ 
	public function testBatchItemsExceededExceptionBadConstructorTest()
	{
		try
		{
			$errorMessage = "Unauthorized";
			$errorCode = "401";
			$invalidArg = "InvalidArg";
			$target = new BatchItemsExceededException($errorMessage, $errorCode, $invalidArg);
	        $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		}
	}
}

?>
