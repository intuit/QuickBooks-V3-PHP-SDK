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
* Tests for CoreHelper class
*/
class CoreHelperTest extends PHPUnit_Framework_TestCase
{

	/**
	 * Test for GetSerializer API
	 */
    public function testGetSerializerTest()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $serviceContext->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Xml;
        $serializer = CoreHelper::GetSerializer($serviceContext, true);
        $this->assertNotNull($serializer);
        $this->assertTrue(get_class($serializer) == get_class(new XmlObjectSerializer()));

		/*
        $serviceContext = Initializer::InitializeServiceContextQbd();
        $serviceContext->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Json;
        $serializer = CoreHelper::GetSerializer($serviceContext, true);
        $this->assertNotNull($serializer);
        $this->assertTrue(get_class($serializer) == get_class(new JsonObjectSerializer()));
		*/

		$serviceContext = Initializer::InitializeServiceContextQbo();
		$serviceContext->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Xml;
		$serializer = CoreHelper::GetSerializer($serviceContext, true);
		$this->assertNotNull($serializer);
		$this->assertTrue(get_class($serializer) == get_class(new XmlObjectSerializer()));

		/*
		$serviceContext = Initializer::InitializeServiceContextQbd();
		$serviceContext->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Json;
		$serializer = CoreHelper::GetSerializer($serviceContext, true);
		$this->assertNotNull($serializer);
		$this->assertTrue(get_class($serializer) == get_class(new JsonObjectSerializer()));
		*/

    }

	/**
	 * Test for GetCompressor API
	 */
	public function testGetCompressorTest()
	{
	    $serviceContext = Initializer::InitializeServiceContextQbo();
	    $serviceContext->IppConfiguration->Message->Request->CompressionFormat = CompressionFormat::GZip;
	    $compressor = CoreHelper::GetCompressor($serviceContext, true);
	    $this->assertNotNull($compressor, 'At step 1');
	    $this->assertTrue(get_class($compressor) == get_class(new GZipCompressor()));

		$serviceContext = Initializer::InitializeServiceContextQbo();
		$serviceContext->IppConfiguration->Message->Request->CompressionFormat = CompressionFormat::Deflate;
		$compressor = CoreHelper::GetCompressor($serviceContext, true);
		$this->assertNotNull($compressor, 'At step 2');
		$this->assertTrue(get_class($compressor) == get_class(new DeflateCompressor()));

		$serviceContext = Initializer::InitializeServiceContextQbo();
		$serviceContext->IppConfiguration->Message->Response->CompressionFormat = CompressionFormat::GZip;
		$compressor = CoreHelper::GetCompressor($serviceContext, false);
		$this->assertNotNull($compressor, 'At step 3');
		$this->assertTrue(get_class($compressor) == get_class(new GZipCompressor()));

		$serviceContext = Initializer::InitializeServiceContextQbo();
		$serviceContext->IppConfiguration->Message->Response->CompressionFormat = CompressionFormat::Deflate;
		$compressor = CoreHelper::GetCompressor($serviceContext, false);
		$this->assertNotNull($compressor, 'At step 4');
		$this->assertTrue(get_class($compressor) == get_class(new DeflateCompressor()));
	}

	/**
	 * Test for GetRequestLogging API
	 */
	public function testGetRequestLoggingTest()
	{
	    $serviceContext = Initializer::InitializeServiceContextQbo();

	    $logger = CoreHelper::GetRequestLogging($serviceContext);
		$this->assertNotNull($logger);
		$this->assertTrue(get_class($logger) == 'LogRequestsToDisk');
	}

	/**
	 * Test for IsInvalidaLinearRetryMode API
	 */
	public function testIsInvalidaLinearRetryModeTest()
	{
		// No Retry mode supported in this SDK
	}
}
?>
