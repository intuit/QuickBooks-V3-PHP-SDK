<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for DeflateCompressor class
*/
class DeflateCompressorTest extends PHPUnit_Framework_TestCase
{
	/**
	 * A test for DeflateCompressor Constructor
	 */
    public function testDeflateCompressorConstructorTest()
    {
        $this->assertEquals(DeflateCompressor::DataCompressionFormat, DataCompressionFormat::Deflate);
    }

	/**
	 * A test for Compress
	 */
    public function testCompressTest()
    {
        $target = new DeflateCompressor(); // TODO: Initialize to an appropriate value
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
        $target = new DeflateCompressor();

		// Tough to verify without re-implementing Compress, but can at least verify
		// that no Exception thrown
		$responseBody = "";
		$responseHeaders = array();
		try
		{
			$raw = "Hello world";
			$encoded = gzencode($raw);
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
        $this->assertEquals(DeflateCompressor::DataCompressionFormat, DataCompressionFormat::Deflate);
    }

	/**
	 * Tests Decompression with an actual compressed data
	 */
    public function testCompressDecompressTest()
    {
        $target = new DeflateCompressor();

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
