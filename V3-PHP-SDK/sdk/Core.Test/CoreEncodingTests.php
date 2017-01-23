<?php

require_once('../sdk/config.php');

date_default_timezone_set('America/Chicago');

/**
 * Description of CoreEncodingTests
 *
 * @author amatiushkin
 */
class CoreEncodingTests extends PHPUnit_Framework_TestCase {
    //put your code here
    
    /**
     * Current version DetectTests doesn't support 
     * @dataProvider customerEntityProvider
     * //TODO improve DetectTests to support data providers 
     */
    public function nonLatinCharctersXML($entity, $urlExpected, $xmlExpected )
    {
        $urlResource = "";
        $r = XmlObjectSerializer::getPostXmlFromArbitraryEntity($entity, $urlResource);
        
        $this->assertEquals($urlExpected, $urlResource);
        $this->assertEquals($xmlExpected, $r);
    }
    
    /**
     * Wrapper for nonLatinCharctersXML
     */
    public function testNonLatinCharctersXML()
    {
        
        foreach($this->customerEntityProvider() as $data) {
            list($entity, $urlExpected, $xmlExpected) = $data; 
            $this->nonLatinCharctersXML($entity, $urlExpected, $xmlExpected);
        }
    }
    
    public function customerEntityProvider()
    {
        $base = new IPPCustomer();
        $rand = rand();
        $base->Name = "Name$rand";
        $base->CompanyName = "CompanyName$rand";
        $base->GivenName = "GivenName$rand";
        $base->DisplayName = "DisplayName$rand";
        
        $nonLatin = clone $base;
        $nonLatin->GivenName = "Given\"Name ÄãºÃ†á" . $rand;
        $nonLatin->DisplayName = "DisplayName Stèphanie" . $rand;        
        return array(
            array($base, "customer", "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<ns0:Customer xmlns:ns0=\"http://schema.intuit.com/finance/v3\">
  <ns0:GivenName>GivenName$rand</ns0:GivenName>
  <ns0:CompanyName>CompanyName$rand</ns0:CompanyName>
  <ns0:DisplayName>DisplayName$rand</ns0:DisplayName>
</ns0:Customer>
"),
            array($nonLatin, "customer","<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<ns0:Customer xmlns:ns0=\"http://schema.intuit.com/finance/v3\">
  <ns0:GivenName>Given\"Name ÄãºÃ†á$rand</ns0:GivenName>
  <ns0:CompanyName>CompanyName$rand</ns0:CompanyName>
  <ns0:DisplayName>DisplayName Stèphanie$rand</ns0:DisplayName>
</ns0:Customer>
" ));
    }
    
    /**
     * Example of code as is from SDK-78
     */
    public function testValueCasting_RealCase() {

        $InvoiceNumber=123;
        $CustomerRef = 321;
        
        $oInvoice = new IPPInvoice();
        // Scheduling revenue line item
        $oItemRef = new IPPReferenceType();
        $oItemRef->value = '2';
        $oItemRef->name = 'Scheduling Revenue';
        $oSalesItemLineDetail = new IPPSalesItemLineDetail();
        $oSalesItemLineDetail->ItemRef = $oItemRef;
        $oLine1 = new IPPLine();
        $oLine1->Amount = 0; // exception
        $oLine1->DetailType = 'SalesItemLineDetail';
        $oLine1->SalesItemLineDetail = $oSalesItemLineDetail;
        $oInvoice->Line = array($oLine1);
        $oInvoice->DocNumber = (string) $InvoiceNumber;
        $oCustomerRef = new IPPReferenceType();
        $oCustomerRef->value = (string) $CustomerRef;
        $oInvoice->CustomerRef = $oCustomerRef;
  
        
        $urlResource = "";
        $xml = XmlObjectSerializer::getPostXmlFromArbitraryEntity($oInvoice, $urlResource);
        $this->assertContains("<ns0:Amount>0</ns0:Amount>", $xml);
    }
    
    /**
     * Complete test for zero values
     */
    public function testValueCasting_Float() {
        $inv = new IPPInvoice();
        // integer zero
        $line = new IPPLine();
        $line->Amount = 0; 
        // float zero
        $line1 = new IPPLine();
        $line1->Amount = 0.0;
        // odd float zero
        $line2 = new IPPLine();
        $line2->Amount = 000000.00000000; 
        // hexadecimal zero
        $line3 = new IPPLine();
        $line3->Amount = 0x0; 
        // float exponent zero
        $line4 = new IPPLine();
        $line4->Amount = 0E-10; 
        // string zero (it worked before)
        $line5 = new IPPLine();
        $line5->Amount = '0';         
        
        $inv->Line = array($line,$line1,$line2,$line3, $line4, $line5);
        $urlResource = "";
        $xml = XmlObjectSerializer::getPostXmlFromArbitraryEntity($inv, $urlResource);
     
        $this->assertContains("<ns0:Invoice xmlns:ns0=\"http://schema.intuit.com/finance/v3\">
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
  <ns0:Line>
    <ns0:Amount>0</ns0:Amount>
  </ns0:Line>
</ns0:Invoice>", $xml);
    }
    
    public function testValueCasting_NormalCase()
    {
       $transfer = new IPPTransfer();
       $transfer->Amount = 10; 
       $urlResource = "";
       $xml = XmlObjectSerializer::getPostXmlFromArbitraryEntity($transfer, $urlResource);
       $this->assertContains("<ns0:Amount>10</ns0:Amount>", $xml);
    }


    public function testSpecialCharactesInNames()
    {
        $this->markTestIncomplete("Need to confirm changes");
        $c = new IPPCustomer();
        $addr = new IPPPhysicalAddress();
        $addr->Line1 = "Test & Bad";
        $c->BillAddr = $addr;
        
        
        $urlResource = "";
        $xml = XmlObjectSerializer::getPostXmlFromArbitraryEntity($c, $urlResource);
        var_dump($xml);
    }

}
