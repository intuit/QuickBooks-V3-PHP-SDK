<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Utility/Serialization/XmlObjectSerializer.php');

date_default_timezone_set('America/Chicago');

/**
 * Covers JSON serializer
 *
 * @author amatiushkin
 */
class XmlObjectSerializerTest extends PHPUnit_Framework_TestCase
{
    public function testDeserializerIPPNameValue()
    {
        $instance = new XmlObjectSerializer();
        $item = $instance->Deserialize($this->getCompanyInfoXML(), true);
        $verificationArray = array();
        $expected = array("SubscriptionStatus", "OfferingSku", "PayrollFeature", "AccountantFeature");
        foreach ($item->NameValue as $nameValue) {
            $this->assertTrue($nameValue instanceof IPPNameValue);
            if (in_array($nameValue->Name, $expected)) {
                $verificationArray[] = $nameValue->Name;
            }
        }
        $this->assertEquals($expected, $verificationArray);
    }

    public function testDeserializerLinkedTxnForBill()
    {
        $instance = new XmlObjectSerializer();
        $item = $instance->Deserialize($this->getBillWithLinkedTxn(), true);
        $this->assertTrue($item instanceof IPPBill);
        $this->assertNotEmpty($item->LinkedTxn);
        $this->verifylinkedTxn($item->LinkedTxn, "118");
        $line = $item->Line;
        $this->assertNotEmpty($line->LinkedTxn);
        $this->verifylinkedTxn($line->LinkedTxn, "29");
    }
    
    public function testDeserializerLinkedTxnForBillArray()
    {
        $instance = new XmlObjectSerializer();
        $item = $instance->Deserialize($this->getBillWithDoubleLinkedTxn(), true);
        $this->assertTrue($item instanceof IPPBill);
        $this->assertNotEmpty($item->LinkedTxn);
        $this->assertTrue(is_array($item->LinkedTxn));
        $this->verifylinkedTxn($item->LinkedTxn[0], "118");
        $this->verifylinkedTxn($item->LinkedTxn[1], "119");
        $line = $item->Line;
        $this->assertNotEmpty($line->LinkedTxn);
        $this->assertTrue(is_array($line->LinkedTxn));
        $this->verifylinkedTxn($line->LinkedTxn[0], "29");
        $this->verifylinkedTxn($line->LinkedTxn[1], "30");
    }
    
    
    public function testSerializerLinkedTxnForBill()
    {
        $e = new IPPBill();
        $e->LinkedTxn = new IPPLinkedTxn();
        $e->LinkedTxn->TxnId = "123";
        $e->Line = new IPPLine();
        $e->Line->LinkedTxn = new IPPLinkedTxn();
        $e->Line->LinkedTxn->TxnId = "456";
        $instance = new XmlObjectSerializer();
        $result = $instance->Serialize($e);
        $this->assertXmlStringEqualsXmlString($this->getBillWithKLinkedTxnResult(), $result);
    }
    
    private function verifylinkedTxn($linked, $id)
    {
        $this->assertTrue($linked instanceof IPPLinkedTxn);
        $this->assertEquals($id, $linked->TxnId);
        $this->assertEquals("BillPaymentCheck", $linked->TxnType);
    }


    private function getCompanyInfoXML()
    {
        return <<< XML
<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<IntuitResponse time="2015-06-10T16:11:56.717-07:00">
 <CompanyInfo domain="QBO" sparse="false">
<Id>1</Id>
<SyncToken>4</SyncToken>
 <MetaData>
<CreateTime>2015-05-27T01:05:47-07:00</CreateTime>
<LastUpdatedTime>2015-06-03T16:06:06-07:00</LastUpdatedTime>
 </MetaData>
<CompanyName>TestCompany</CompanyName>
<LegalName>TestCompany</LegalName>
 <CompanyAddr>
<Id>4</Id>
<CountrySubDivisionCode>AK</CountrySubDivisionCode>
 </CompanyAddr>
 <CustomerCommunicationAddr>
<Id>4</Id>
<CountrySubDivisionCode>AK</CountrySubDivisionCode>
 </CustomerCommunicationAddr>
 <LegalAddr>
<Id>4</Id>
<CountrySubDivisionCode>AK</CountrySubDivisionCode>
 </LegalAddr>
<PrimaryPhone />
<CompanyStartDate>2015-05-27</CompanyStartDate>
<FiscalYearStartMonth>January</FiscalYearStartMonth>
<Country>US</Country>
<Email>
<Address>gxu1+testCompany@gmail.com</Address>
</Email>
<WebAddr />
<SupportedLanguages>en</SupportedLanguages>
 <NameValue>
<Name>NeoEnabled</Name>
<Value>true</Value>
 </NameValue>
 <NameValue>
<Name>IndustryType</Name>
<Value>Pet food, dog and cat, manufacturing</Value>
 </NameValue>
 <NameValue>
<Name>IndustryCode</Name>
<Value>311111</Value>
 </NameValue>
 <NameValue>
<Name>SubscriptionStatus</Name>
<Value>TRIAL</Value>
 </NameValue>
 <NameValue>
<Name>OfferingSku</Name>
<Value>QuickBooks Online Plus</Value>
 </NameValue>
 <NameValue>
<Name>PayrollFeature</Name>
<Value>false</Value>
 </NameValue>
 <NameValue>
<Name>AccountantFeature</Name>
<Value>false</Value>
 </NameValue>
 </CompanyInfo>
</IntuitResponse>        
XML;
    }
    
    
    private function getBillWithLinkedTxn()
    {
        return <<< XML
<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<IntuitResponse time="2015-06-29T14:53:09.806-07:00">
 <Bill domain="QBO" sparse="false">
<Id>25</Id>
<SyncToken>1</SyncToken>
 <MetaData>
<CreateTime>2015-02-25T15:37:25-08:00</CreateTime>
<LastUpdatedTime>2015-02-28T12:56:17-08:00</LastUpdatedTime>
 </MetaData>
<TxnDate>2015-02-25</TxnDate>
 <LinkedTxn>
<TxnId>118</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>        
 <Line>
<Id>1</Id>
<Description>Lumber</Description>
<Amount>103.55</Amount>
<DetailType>AccountBasedExpenseLineDetail</DetailType>
 <AccountBasedExpenseLineDetail>
<CustomerRef name="Travis Waldron">26</CustomerRef>
<AccountRef name="Job Expenses:Job Materials:Decks and Patios">64</AccountRef>
<BillableStatus>Billable</BillableStatus>
<TaxCodeRef>NON</TaxCodeRef>
 </AccountBasedExpenseLineDetail>
         <LinkedTxn>
<TxnId>29</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>
 </Line>
<VendorRef name="Norton Lumber and Building Materials">46</VendorRef>
<APAccountRef name="Accounts Payable (A/P)">33</APAccountRef>
<TotalAmt>103.55</TotalAmt>
<SalesTermRef>3</SalesTermRef>
<DueDate>2015-03-27</DueDate>
<Balance>0</Balance>
 </Bill>
</IntuitResponse>        
XML;
    }
    
   
    private function getBillWithDoubleLinkedTxn()
    {
        return <<< XML
<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>
<IntuitResponse time="2015-06-29T14:53:09.806-07:00">
 <Bill domain="QBO" sparse="false">
<Id>25</Id>
<TxnDate>2015-02-25</TxnDate>
 <LinkedTxn>
<TxnId>118</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>  
 <LinkedTxn>
<TxnId>119</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>       
 <Line>
<Id>1</Id>
<Description>Lumber</Description>
<Amount>103.55</Amount>
<DetailType>AccountBasedExpenseLineDetail</DetailType>
 <AccountBasedExpenseLineDetail>
<CustomerRef name="Travis Waldron">26</CustomerRef>
<AccountRef name="Job Expenses:Job Materials:Decks and Patios">64</AccountRef>
<BillableStatus>Billable</BillableStatus>
<TaxCodeRef>NON</TaxCodeRef>
 </AccountBasedExpenseLineDetail>
         <LinkedTxn>
<TxnId>29</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>
<LinkedTxn>
<TxnId>30</TxnId>
<TxnType>BillPaymentCheck</TxnType>
 </LinkedTxn>
 </Line>
 </Bill>
</IntuitResponse>        
XML;
    }
    
    private function getBillWithKLinkedTxnResult()
    {
        return <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<ns0:Bill xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:LinkedTxn>
    <ns0:TxnId>123</ns0:TxnId>
  </ns0:LinkedTxn>
  <ns0:Line>
    <ns0:LinkedTxn>
      <ns0:TxnId>456</ns0:TxnId>
    </ns0:LinkedTxn>
  </ns0:Line>
</ns0:Bill>
XML;
    }
}
