<?php
use oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2;
use oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2;
use dk\nordsign\schema\ContactCompany as CC;

set_include_path(get_include_path().PATH_SEPARATOR.
                realpath("../src").PATH_SEPARATOR.
                realpath("data/expected/ContactCompany"));

use com\mikebevz\xsd2php;

require_once "com/mikebevz/xsd2php/Bind.php";
require_once "com/mikebevz/xsd2php/Php2Xml.php";
//require_once "dk/nordsign/schema/ContactCompany/ContactCompany.php";
//require_once "dk/nordsign/schema/ContactCompany/AddressType.php";

class BindTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * @var xsd2php\Bind
     */
    private $tclass;
    
    private $expDir = "data/expected/ContactCompany";
    private $genDir = "data/generated/ContactCompany";
    
    
    protected function setUp()
    {
        $this->tclass = new xsd2php\Bind("");
    }
    protected function tearDown()
    {
        $this->tclass = null;
    }
    
    /**
    public function testBindSimple1() {
        require_once dirname(__FILE__).'/data/expected/simple1/shiporder.php';
        require_once dirname(__FILE__).'/data/expected/simple1/shipto.php';
        require_once dirname(__FILE__).'/data/expected/simple1/item.php';
        require_once dirname(__FILE__).'/data/expected/simple1/orderperson.php';
        require_once dirname(__FILE__).'/data/expected/simple1/name.php';
        require_once dirname(__FILE__).'/data/expected/simple1/address.php';
        require_once dirname(__FILE__).'/data/expected/simple1/city.php';
        require_once dirname(__FILE__).'/data/expected/simple1/country.php';
        require_once dirname(__FILE__).'/data/expected/simple1/title.php';
        require_once dirname(__FILE__).'/data/expected/simple1/note.php';
        require_once dirname(__FILE__).'/data/expected/simple1/quantity.php';
        require_once dirname(__FILE__).'/data/expected/simple1/price.php';
        $xml = file_get_contents(dirname(__FILE__).'/data/expected/simple1/shiporder.xml');
        $model = new shiporder();

        $shiporderModel = $this->tclass->bindXml($xml, $model);

        $modelToXml = new xsd2php\Php2Xml();
        $actualXml = $modelToXml->getXml($shiporderModel);
        $this->assertEquals($xml, $actualXml);


        $shiporder = new shiporder();
        $item = new item();

        $note = new note();
        $note->value = "Note";
        $item->note = $note;

        $price = new price();
        $price->value = 125.5;
        $item->price = $price;

        $quantity = new quantity();
        $quantity->value = 145;
        $item->quantity = $quantity;

        $title = new title();
        $title->value = 'Example title';
        $item->title = $title;
        $shiporder->item = $item;

        $shiporder->orderid = 'Order ID';
        $orderperson = new orderperson();
        $orderperson->value = "Jon Doe";

        $shiporder->orderperson = $orderperson;

        $shipto = new shipto();
        $address = new address();
        $address->value = "Big Valley Str. 142";

        $shipto->address = $address;
        $city = new city();
        $city->value = "Aalborg";
        $shipto->city = $city;
        $country = new country();
        $country->value = "Denmark";
        $shipto->country = $country;
        $name = new name();
        $name->value = "Jon Doe Company";
        $shipto->name = $name;

        $shiporder->shipto = $shipto;

        $this->assertEquals($shiporder, $shiporderModel);


    }
    */
    
    public function testContactCompany()
    {
        $this->tclass->debug = true;
        
        $input = file_get_contents($this->expDir.DIRECTORY_SEPARATOR."BindTest.xml");
        
        $expBinding = new CC\ContactCompany();
        $bilAdd = new CC\AddressType();
        $line = new CommonBasicComponents_2\Line();
        $line->value = "Nytorv 50 22 2";
        $addrTypeLine = new CommonAggregateComponents_2\AddressLineType();
        $addrTypeLine->Line = $line;
        $bilAdd->Address = $addrTypeLine;
        
        $city = new CommonBasicComponents_2\CityNameType();
        $city->value = "Aalborg";
        $bilAdd->City = $city;
        
        $country = new CommonBasicComponents_2\NameType();
        $country->value = "DK";
        $bilAdd->Country = $country;
        
        $state = new CommonBasicComponents_2\RegionType();
        $state->value = "Nordjylland";
        $bilAdd->State = $state;
        $postCode = new CommonBasicComponents_2\PostalZoneType();
        $postCode->value = "9000";
        
        $bilAdd->PostalCode = $postCode;
        
        $expBinding->BillingAddress = $bilAdd;
        
        $party = new CommonAggregateComponents_2\Party();
        $webURI = new CommonBasicComponents_2\WebsiteURI();
        $webURI->value = "test.com";
        $party->WebsiteURI = $webURI;
        $expBinding->Party = $party;
        
        $fax = new CommonBasicComponents_2\Telefax();
        $fax->value = "12341234622";
        
        $expBinding->Telefax = $fax;
        
        $phone = new CommonBasicComponents_2\Telephone();
        $phone->value = "24234234222";
        
        $expBinding->Telephone = $phone;
        
        $name = new CommonBasicComponents_2\Name();
        $name->value = "TON s.r.o.";
        
        $expBinding->Name = $name;
        
        $compId = new CommonBasicComponents_2\CompanyID();
        $compId->value = "DK234234234234234";
        
        $expBinding->CompanyID = $compId;
        
        $extId = new CommonBasicComponents_2\IDType();
        $extId->value = "DK234234234234234";
        $expBinding->ExtID = $extId;
        
        //
        $model = $this->tclass->unmarshal($input);
        
        $this->assertEquals($expBinding, $model);
    }
}
