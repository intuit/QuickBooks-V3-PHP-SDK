<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Core/LogRequestsToDisk.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for LogRequestsToDisk class
*/
class LogRequestsToDiskTest extends PHPUnit_Framework_TestCase
{
	/**
	 * A test for LogRequestsToDisk Constructor
	 */
    public function testLogRequestsToDiskConstructor_Variation1_Test()
    {
    	$logObj = new LogRequestsToDisk(FALSE, NULL);
        $this->assertNotNull($logObj, 'Constructor failed');
    }
	
	/**
	 * A test for LogRequestsToDisk Constructor
	 */
	public function testLogRequestsToDiskConstructor_Variation2_Test()
	{
    	$logObj = new LogRequestsToDisk(TRUE, NULL);
	    $this->assertNotNull($logObj, 'Constructor failed');
	}
	
	/**
	 * A test for LogRequestsToDisk Constructor
	 */
	public function testLogRequestsToDiskConstructor_Variation3_Test()
	{
		$logObj = new LogRequestsToDisk(FALSE, sys_get_temp_dir());
	    $this->assertNotNull($logObj, 'Constructor failed');
	}
	
	/**
	 * A test for LogRequestsToDisk Constructor
	 */
	public function testLogRequestsToDiskConstructor_Variation4_Test()
	{
		$logObj = new LogRequestsToDisk(TRUE, sys_get_temp_dir());
	    $this->assertNotNull($logObj, 'Constructor failed');
	}

	
	/**
	 * A test for LogRequestsToDisk Constructor
	 */
	public function testLogRequestsToDiskFilesTest()
	{
		$logDest = sys_get_temp_dir();
		$fileCountBefore = iterator_count(new DirectoryIterator($logDest));
		
		$logObj = new LogRequestsToDisk(TRUE, sys_get_temp_dir());
		$this->assertNotNull($logObj, 'Constructor failed');
		
		$logObj->LogPlatformRequests('<example></example>', 'https://example.com/', array('Content-Type'=>'application/xml'), FALSE);
		$logObj->LogPlatformRequests('<example></example>', 'https://example.com/', array('Content-Type'=>'application/xml'), TRUE);
		
		$fileCountAfter = iterator_count(new DirectoryIterator($logDest));
		
		$this->assertGreaterThan($fileCountBefore, $fileCountAfter, 'File count did not grow during logging process - surprising.');
		
	}

}
?>
