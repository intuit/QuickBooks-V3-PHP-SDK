<?php
use dk\nordsign\application\services;

set_include_path(
    get_include_path() . PATH_SEPARATOR . realpath("../src"));
use com\mikebevz\xsd2php;

require_once "com/mikebevz/xsd2php/SoapServer.php";

class SoapServerTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var xsd2php\SoapServer
     */
    private $tclass;
    
    private $wsdl;
    
    private $options;
    
    private $expDir = "data/expected/SoapServer";
    private $genDir = "data/generated/SoapServer";
    private static $actual;
    
    protected function setUp()
    {
        $this->options = array(
            'soap_version' => SOAP_1_2,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS
        );
        
        $this->wsdl = $this->expDir.DIRECTORY_SEPARATOR."NavService.wsdl";
        $this->tclass = new xsd2php\SoapServer($this->wsdl, $this->options);
    }
    protected function tearDown()
    {
        $this->tclass = null;
    }
    
    /**
     * Case is that we've got NavService.php, a webservice class, which we would
     * like to expose as a webservice using SoapServer.
     *
     */
    public function test1()
    {
        require_once $this->expDir.DIRECTORY_SEPARATOR."services".DIRECTORY_SEPARATOR."NavService.php";
        
        $service = new services\NavService2();
        $this->tclass->setObject($service);
                
        $req = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body>
        <ns4:updateContactCompany xmlns:ns2="urn:dk:nordsign:schema:ContactCompany" 
        xmlns:ns3="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" 
        xmlns:ns4="urn:dk:nordsign:application:services" 
        xmlns:ns5="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" 
        xmlns:ns6="urn:dk:nordsign:schema:ContactPerson">
        <ns2:ContactCompany>
        <ns2:ExtID>DK234234234234234</ns2:ExtID><ns5:CompanyID>DK234234234234234</ns5:CompanyID><ns5:Name>TON s.r.o.</ns5:Name><ns5:Telephone>24234234222</ns5:Telephone><ns5:Telefax>12341234622</ns5:Telefax><ns3:Party><ns5:WebsiteURI>test.com</ns5:WebsiteURI></ns3:Party><ns2:BillingAddress><ns2:Address><ns5:Line>Nytorv 50</ns5:Line></ns2:Address><ns2:PostalCode>9000</ns2:PostalCode><ns2:City>Aalborg</ns2:City><ns2:State>Nordjylland</ns2:State><ns2:Country>DK</ns2:Country></ns2:BillingAddress>
        </ns2:ContactCompany>
        </ns4:updateContactCompany>
        </soap:Body></soap:Envelope>';
        
        $req = '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/"><soap:Body>
        <ns4:updateContactPerson xmlns:ns2="urn:dk:nordsign:schema:ContactCompany" 
        xmlns:ns3="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" 
        xmlns:ns4="urn:dk:nordsign:application:services" 
        xmlns:ns5="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" 
        xmlns:ns6="urn:dk:nordsign:schema:ContactPerson">
        <ns6:ContactPerson>
            <ns5:Name>TON s.r.o.</ns5:Name>
        </ns6:ContactPerson>
        </ns4:updateContactPerson>
        </soap:Body></soap:Envelope>';
        
        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="urn:dk:nordsign:application:services"><SOAP-ENV:Body><ns1:updateContactPersonResponse>TON s.r.o.</ns1:updateContactPersonResponse></SOAP-ENV:Body></SOAP-ENV:Envelope>
';
        
        ob_start('SoapServerTest::callback');
        $resp = $this->tclass->handle($req);
        ob_end_flush();
        
        //print_r(self::$actual);
        $this->assertEquals($expected, self::$actual);
    }
    
    public static function callback($buf)
    {
        self::$actual = $buf;
    }
}
