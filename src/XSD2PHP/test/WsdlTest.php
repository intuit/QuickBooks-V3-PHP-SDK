<?php
set_include_path(get_include_path().PATH_SEPARATOR.
                realpath("../src"));
                
require_once 'com/mikebevz/xsd2php/Wsdl.php';
require_once 'data/expected/ContactPersonWsdl/services/NavService.php';


use dk\nordsign\application\services;
use com\mikebevz\xsd2php\wsdl;

class WsdlTest extends PHPUnit_Framework_TestCase
{
    /**
     * XSD to PHP convertor class
     * @var com\mikebevz\xsd2php\AbstractWsdl
     */
    private $tclass;

    private $expDir = "data/expected/ContactPersonWsdl";
    private $genDir = "data/generated/ContactPersonWsdl";
    
    protected function setUp()
    {
        //$this->xsd = dirname(__FILE__)."/../resources/ubl2.0/maindoc/UBL-Order-2.0.xsd";
        $this->tclass = new wsdl\WsdlFactory();
    }
    protected function tearDown()
    {
        $this->tclass = null;
    }
    
    public function testWsdlNavService()
    {
        if (file_exists($this->genDir)) {
            rmdir_recursive($this->genDir);
        }
        
        mkdir($this->genDir."/public/schemas", 0777, true);
        
        $service = new services\NavService();
        $this->tclass->setService($service);
        $this->tclass = $this->tclass->getImplementation($service);
        $this->tclass->setLocation("http://mylocation.com/soap/");
        $this->tclass->setSchemasPath("../resources/ContactWsdl");
        $this->tclass->setPublicPath(realpath($this->genDir."/public/schemas"));
        $this->tclass->setPublicUrl("/schemas");
        $this->tclass->setDebug(true);
        
        $schemas = array("CodeList_CurrencyCode_ISO_7_04.xsd",
                         "CodeList_LanguageCode_ISO_7_04.xsd",
                         "CodeList_MIMEMediaTypeCode_IANA_7_04.xsd",
                         "CodeList_UnitCode_UNECE_7_04.xsd",
                         "ContactCompany.xsd",
                         "ContactPerson.xsd",
                         "UBL-CommonAggregateComponents-2.0.xsd",
                         "UBL-CommonBasicComponents-2.0.xsd",
                         "UBL-QualifiedDatatypes-2.0.xsd",
                         "UnqualifiedDataTypeSchemaModule-2.0.xsd");
        
        
        $wsdl = $this->tclass->toXml();
        
        //print_r($wsdl);
        //file_put_contents($this->expDir."/NavService.wsdl", $wsdl);
        $expected = file_get_contents($this->expDir."/NavService.wsdl");
        
        $this->assertEquals($expected, $wsdl);

        
        foreach ($schemas as $schema) {
            $exp = file_get_contents($this->expDir."/public/schemas/".$schema);
            $act = file_get_contents($this->genDir."/public/schemas/".$schema);
            $this->assertEquals($exp, $act);
        }
        
        if (file_exists($this->genDir)) {
            rmdir_recursive($this->genDir);
        }
    }
}
