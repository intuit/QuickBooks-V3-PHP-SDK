<?php

require_once('../sdk/config.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');
require_once(PATH_SDK_ROOT . 'Core/Configuration/LocalConfigReader.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for LocalConfigReader class
*/
class LocalConfigReaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Check example of fields populated by LocalConfigReader
     */
    public function testReadIppConfigRequest()
    {
		$serviceContext = Initializer::InitializeServiceContextQbo();
                $this->assertTrue($serviceContext->IppConfiguration->Message->Request->SerializationFormat == SerializationFormat::Xml);
    }

    public function testReadIppContentWriter()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $this->assertTrue($serviceContext->IppConfiguration->ContentWriter->strategy === "file");
        $this->assertTrue($serviceContext->IppConfiguration->ContentWriter->prefix === "ipp");
    }

    public function testControlList()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $this->assertTrue($serviceContext->IppConfiguration->OpControlList instanceof OperationControlList);
    }

    public function testSpecialConfiguration()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $this->assertFalse($serviceContext->IppConfiguration->OpControlList->isAllowed("IPPPurchase", "jsonOnly"));
        $this->assertTrue($serviceContext->IppConfiguration->OpControlList->isAllowed("IPPTaxService", "jsonOnly"));
    }

    public function testMinorVersion()
    {
        $serviceContext = Initializer::InitializeServiceContextQbo();
        $this->assertEquals("3",$serviceContext->IppConfiguration->minorVersion);

    }


}
