<?php

set_include_path(get_include_path().PATH_SEPARATOR.
                realpath("../src"));

use dk\nordsign\schema\ContactCompany as CCP;
use oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2 as CAC2;
use oasis\names\specification\ubl\schema\xsd\CommonBasicComponents_2 as CBC2;
use com\mikebevz\xsd2php;
use oasis\names\specification\ubl\schema\xsd\Order_2;

set_include_path(dirname(__FILE__).'/data/expected/ubl2.0'.PATH_SEPARATOR.
                 dirname(__FILE__).'/data/expected/simple1'.PATH_SEPARATOR.
                 dirname(__FILE__).'/data/expected/simple1/bindings'.PATH_SEPARATOR.
                 get_include_path());
                        

require_once "com/mikebevz/xsd2php/Php2Xml.php";

class Php2XmlTest extends PHPUnit_Framework_TestCase
{
    private $tclass;
    
    
    protected function setUp()
    {
        $this->tclass = new xsd2php\Php2Xml("");
    }
    protected function tearDown()
    {
        $this->tclass = null;
    }
    
    public function testOrderClass()
    {
        $order = new Order_2\Order();
       
        $orderLine = new CAC2\OrderLine();
       
        $lineItem = new CAC2\LineItem();
        $lineItem->ID = 'DYE_SUB';
        $lineItem->Quantity = 110.5;
       
        $price = new CAC2\Price();
        $price->PriceAmount = 200.75;
        $lineItem->Price = $price;
       
        $quantity = new CBC2\Quantity();
        $quantity->value = 110.22;
        $quantity->unitCode = 'M2';
       
       
        $lineItem->Quantity = $quantity;
              
        $orderLine->LineItem = $lineItem;
        $order->OrderLine = $orderLine;
       
        $buyerCustomer = new CAC2\BuyerCustomerParty();
        $buyerCustomer->AccountingContact = '';
        $buyerCustomer->AdditionalAccountID = '';
        $buyerContact = new CAC2\BuyerContact();
        $buyerContact->ElectronicMail = "email@example.com";
        $buyerContact->ID = "CT2344332";
        $buyerContact->Name = 'Jon Doe';
        $buyerContact->Telephone = "24533223";
          
        $buyerCustomer->BuyerContact = $buyerContact;
        $buyerCustomer->SupplierAssignedAccountID = "CT02933822";
        
        $order->BuyerCustomerParty = $buyerCustomer;

        $php2xml = new xsd2php\Php2Xml("");
        
        $xml = $php2xml->getXml($order);
       //file_put_contents("data/expected/ubl2.0/Order.xml", $xml);
       $expected = file_get_contents("data/expected/ubl2.0/Order.xml");
       //print_r($xml);
       $this->assertEquals($expected, $xml);
    }
    
    public function testSimple1Schema()
    {
        require_once 'shiporder.php';
        require_once 'item.php';
        require_once 'note.php';
        require_once 'price.php';
        require_once 'quantity.php';
        require_once 'title.php';
        require_once 'orderperson.php';
        require_once 'shipto.php';
        require_once 'address.php';
        require_once 'city.php';
        require_once 'country.php';
        require_once 'name.php';
        
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
       
        
        $php2xml = new xsd2php\Php2Xml("");
        
        $xml = $php2xml->getXml($shiporder);
       
       //file_put_contents("data/expected/simple1/shiporder.xml", $xml);
       
       $expected = file_get_contents("data/expected/simple1/shiporder.xml");

        $this->assertEquals($expected, $xml);
       //print_r($xml);
    }
    
    public function testContactCompany()
    {
        $cc = new CCP\ContactCompany();
        $bilAd = new CCP\AddressType();
        $addLine = new CAC2\AddressLine();
        $line = new CBC2\Line();
        $line->value = "Address line";
        $addLine->Line = $line;
        $bilAd->Address = $addLine;
        
        $bilAd->City = "Aalborg";
        $bilAd->Country = "DK";
        $bilAd->PostalCode = "9200";
        $cc->BillingAddress = $bilAd;
        
        $cId = new CBC2\CompanyID();
        $cId->value = "23423423423";
        $cc->CompanyID = $cId;

        $id = new CBC2\ID();
        $id->value = "3242342323";
        $cc->ID = $id;
        
        $ships = array();
        
        $ship1 = new CCP\AddressType();
        
        $addLine1 = new CAC2\AddressLine();
        $sLine = new CBC2\Line();
        $sLine->value = "Gammelnibevej 122";
        $addLine1->Line = $sLine;
        $ship1->Address = $addLine1;
        
        array_push($ships, $ship1);
        
        $ship2 = new CCP\AddressType();
        
        $addLine2 = new CAC2\AddressLine();
        $sLine2 = new CBC2\Line();
        $sLine2->value = "Nyborgvej 23 st th";
        $addLine2->Line = $sLine2;
        
        $ship2->Address = $addLine2;
        
        
        array_push($ships, $ship2);
        
        
        $cc->ShippingAddress = $ships;
        
                
        $php2xml = new xsd2php\Php2Xml("");
        
        $xml = $php2xml->getXml($cc);
        //print_r($xml);
        
        //file_put_contents("data/expected/ContactCompany/ContactCompany.xml", $xml);
       
        $expected = file_get_contents("data/expected/ContactCompany/ContactCompany.xml");
       
        $this->assertEquals($expected, $xml);
    }
}
