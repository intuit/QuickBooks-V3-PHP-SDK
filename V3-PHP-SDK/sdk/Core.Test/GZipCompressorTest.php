<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for GZipCompressor class
*/
class GZipCompressorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * A test for GZipCompressor Constructor
	 */
    public function testGZipCompressorConstructorTest()
    {
        $this->assertEquals(GZipCompressor::DataCompressionFormat, DataCompressionFormat::GZip);
    }

	/**
	 * A test for Compress
	 */
    public function testCompressTest()
    {
        $target = new GZipCompressor(); // TODO: Initialize to an appropriate value
        $curlHeaders = array();
        $responseHeaders = array();
        $raw = "Hello World";
        
        // Tough to verify without re-implementing Compress, but can at least verify
        // that no Exception thrown
        try
        {
			$postBody = $raw;
	        $target->Compress($curlHeaders,$postBody);
		    $decoded = $target->Decompress($postBody,$responseHeaders);
	        $this->assertEquals($raw, $decoded);
		}
		catch (Exception $e)
		{
			// should not land here
		    $this->assertTrue(FALSE);
		}	
    }

	/**
	 * A test for Decompress
	 */
    public function testDecompressTest()
    {
        $target = new GZipCompressor();

		// Tough to verify without re-implementing Compress, but can at least verify
		// that no Exception thrown
		$responseBody = "";
		$responseHeaders = array();
		try
		{
			$raw = "Hello world";
			$encoded = gzencode($raw,9);
		    $decoded = $target->Decompress($encoded,$responseHeaders);
	        $this->assertEquals($raw, $decoded);

		}
		catch (Exception $e)
		{
			// should not land here
		    $this->assertTrue(FALSE);
		}	
    }

	/**
	 * A test for DataCompressionFormat
	 */
    public function testDataCompressionFormatTest()
    {
        $this->assertEquals(GZipCompressor::DataCompressionFormat, DataCompressionFormat::GZip);
    }

	/**
	 * Tests Decompression with an actual compressed data
	 */
    public function testCompressDecompressTest()
    {
        $target = new GZipCompressor();

		// Tough to verify without re-implementing Compress, but can at least verify
		// that no Exception thrown
		$responseBody = "";
		$responseHeaders = array();
		try
		{
			$raw = "Hello world";
			$unusedArray = array();
			$encoded = $raw;
			$target->Compress($unusedArray, $encoded);
		    $decoded = $target->Decompress($encoded,$responseHeaders);
	        $this->assertEquals($raw, $decoded);
		}
		catch (Exception $e)
		{
			// should not land here
		    $this->assertTrue(FALSE);
		}	
    }
}
?>
