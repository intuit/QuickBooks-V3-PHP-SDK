<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'Utility/Serialization/JsonObjectSerializer.php');

date_default_timezone_set('America/Chicago');
/**
 * Covers JSON serializer
 *
 * @author amatiushkin
 */
class JsonObjectSerializerTest extends PHPUnit_Framework_TestCase
{
  
    /*public function testSerializer()
    {
        $instance = new JsonObjectSerializer();
        $this->assertEquals($this->getSimpleObjectJson(), $instance->Serialize( $this->getSimpleObject() ));
    }

    public function testDeserializer()
    {
        $instance = new JsonObjectSerializer();
        $this->assertEquals($this->getSimpleObject(), $instance->Deserialize( $this->getSimpleObjectJson(),TRUE));
    }

    public function testDeserializerExampleDomainEntity()
    {
         $instance = new JsonObjectSerializer();
         $this->verifyDomainObject( $instance->Deserialize($this->getDomainObject(), TRUE) );
    }

    public function testDeserializerExampleDomainEntity_Array()
    {
         $instance = new JsonObjectSerializer();
         $items = $instance->Deserialize($this->getDomainObject());
         $this->verifyDomainObject( $items[0] );
    }


    public function testDeserializerExampleDomainEntityWithArray()
    {
         $instance = new JsonObjectSerializer();
         $item = $instance->Deserialize($this->getDomainObjectWithArray(), true);
         $this->verifyDomainObjectWithArray( $item );
    }

    public function testGetResourceURI()
    {
        $instance = new JsonObjectSerializer();
        $this->assertEmpty($instance->getResourceURL());
        $instance->Serialize($this->getSimpleObject());
        $this->assertEquals('class',$instance->getResourceURL());
    }

    public function testDeserializerIPPNameValue()
    {
         $instance = new JsonObjectSerializer();
         $item = $instance->Deserialize($this->getCompanyInfo(), true);
         $verificationArray = array();
         $expected = array("SubscriptionStatus","OfferingSku","PayrollFeature","AccountantFeature");
         foreach($item->NameValue as $nameValue) {
            $this->assertTrue($nameValue instanceof IPPNameValue);
            if(in_array($nameValue->Name, $expected)) {
                $verificationArray[] = $nameValue->Name;
            }
         }
         $this->assertEquals($expected, $verificationArray);

    }*/


    public function testDeserializerTaxService()
    {
        $instance = new JsonObjectSerializer();
         //this line proves, that with additional layer json serializer produces valid object
         $item = $instance->Deserialize('{"TaxService":'.$this->getTaxServiceResponse().'}', true);
        var_dump($item);
        $this->assertTrue($item instanceof IPPTaxService);
        $details = $item->TaxRateDetails[0];
        $this->assertTrue($details instanceof IPPTaxRateDetails);
        $this->assertEquals("MyTaxCodeName_624792433", $item->TaxCode);
        $this->assertEquals("59", $details->TaxRateId);
    }
    
    /*public function testDeserializerUtilitLinkedTxnInBill()
    {
        $instance = new JsonObjectSerializer();
        //this line proves, that with additional layer json serializer produces valid object
        $item = $instance->Deserialize($this->getLinkedTxnInBill(), true);
        $this->assertTrue($item instanceof IPPBill);
        $this->assertNotEmpty($item->LinkedTxn);
        $this->assertTrue(is_array($item->LinkedTxn));
        $this->verifylinkedTxn($item->LinkedTxn[0], "118");
        $line = $item->Line[0];
        $this->assertNotEmpty($line->LinkedTxn);
        $this->assertTrue(is_array($line->LinkedTxn));
        $this->verifylinkedTxn($line->LinkedTxn[0], "29");
    }

    private function verifylinkedTxn($linked, $id)
    {
        $this->assertTrue($linked instanceof IPPLinkedTxn);
        $this->assertEquals($id,$linked->TxnId);
        $this->assertEquals("BillPaymentCheck",$linked->TxnType);
    }

    private function getSimpleObject()
    {
        $i = new stdClass();
        $i->RedProperty    = "some string";
        $i->GreenProperty  = "mixedstring";
        $i->Black_Property = "some string";
        $i->BlueProperty = new stdClass();
        $i->BlueProperty->SimpleAssocArray = array(1,2,"some string", 3, 5);
        $i->BlueProperty->SimpleIndexObjectArray = array(new stdClass(), new stdClass());
        $i->BrownProperty = new stdClass();
        $i->BrownProperty->NumberA = 7;
        $i->BrownProperty->NumberB = "7";
        return $i;
    }

    private function getSimpleObjectJson()
    {
        return '{"RedProperty":"some string","GreenProperty":"mixedstring","Black_Property":"some string","BlueProperty":{"SimpleAssocArray":[1,2,"some string",3,5],"SimpleIndexObjectArray":[{},{}]},"BrownProperty":{"NumberA":7,"NumberB":"7"}}';
    }

    private function getDomainObject()
    {
        return '{"Transfer":{"FromAccountRef":{"value":"35","name":"Random Bank 2088329469"},"ToAccountRef":{"value":"36","name":"Random Bank 147203516"},"Amount":10.00,"domain":"QBO","sparse":false,"Id":"72057","SyncToken":"0","MetaData":{"CreateTime":"2015-04-22T16:42:31-07:00","LastUpdatedTime":"2015-04-22T16:42:31-07:00"},"TxnDate":"2015-04-22"},"time":"2015-04-22T16:42:25.231-07:00"}';
    }

     private function getDomainObjectWithArray()
    {
        return '{"Transfer":{"Amount":10.00,"Line":[{"Amount":1,"Description":"box of goods"},{"Amount":2,"Description":"Bunch of services"}]},"time":"2015-04-22T16:42:25.231-07:00"}';
    }

    private function getCompanyInfo()
    {
        return '{"CompanyInfo":{"CompanyName":"TestCompany","LegalName":"TestCompany","CompanyAddr":{"Id":"4","CountrySubDivisionCode":"AK"},"CustomerCommunicationAddr":{"Id":"4","CountrySubDivisionCode":"AK"},"LegalAddr":{"Id":"4","CountrySubDivisionCode":"AK"},"PrimaryPhone":{},"CompanyStartDate":"2015-05-27","FiscalYearStartMonth":"January","Country":"US","Email":{"Address":"gxu1+testCompany@gmail.com"},"WebAddr":{},"SupportedLanguages":"en","NameValue":[{"Name":"NeoEnabled","Value":"true"},{"Name":"IndustryType","Value":"Pet food, dog and cat, manufacturing"},{"Name":"IndustryCode","Value":"311111"},{"Name":"SubscriptionStatus","Value":"TRIAL"},{"Name":"OfferingSku","Value":"QuickBooks Online Plus"},{"Name":"PayrollFeature","Value":"false"},{"Name":"AccountantFeature","Value":"false"}],"domain":"QBO","sparse":false,"Id":"1","SyncToken":"4","MetaData":{"CreateTime":"2015-05-27T01:05:47-07:00","LastUpdatedTime":"2015-06-03T16:06:06-07:00"}},"time":"2015-06-10T13:07:32.149-07:00"}';
    }*/
    
    private function getTaxServiceResponse()
    {
        return '{"TaxCode":"MyTaxCodeName_624792433","TaxCodeId":"31","TaxRateDetails":[{"TaxRateName":"myNewTaxRateName_624792433","TaxRateId":"59","RateValue":7,"TaxAgencyId":"1","TaxApplicableOn":"Sales"}]}';
    }
    
    /*private function getLinkedTxnInBill()
    {
        return '{"Bill":{"SalesTermRef":{"value":"3"},"DueDate":"2015-03-27","Balance":0,"domain":"QBO","sparse":false,"Id":"25","SyncToken":"1","MetaData":{"CreateTime":"2015-02-25T15:37:25-08:00","LastUpdatedTime":"2015-02-28T12:56:17-08:00"},"TxnDate":"2015-02-25","LinkedTxn":[{"TxnId":"118","TxnType":"BillPaymentCheck"}],"Line":[{"Id":"1","Description":"Lumber","Amount":103.55,"LinkedTxn":[{"TxnId":"29","TxnType":"BillPaymentCheck"}],"DetailType":"AccountBasedExpenseLineDetail","AccountBasedExpenseLineDetail":{"CustomerRef":{"value":"26","name":"Travis Waldron"},"AccountRef":{"value":"64","name":"Job Expenses:Job Materials:Decks and Patios"},"BillableStatus":"Billable","TaxCodeRef":{"value":"NON"}}}],"VendorRef":{"value":"46","name":"Norton Lumber and Building Materials"},"APAccountRef":{"value":"33","name":"Accounts Payable (A/P)"},"TotalAmt":103.55},"time":"2015-06-29T14:56:35.120-07:00"}';
    }

    private function verifyDomainObject($item)
    {
        $this->assertInstanceOf("IPPTransfer", $item);
        $this->assertInstanceOf('IPPReferenceType', $item->FromAccountRef);
        $this->assertInstanceOf('IPPReferenceType', $item->ToAccountRef);
        $this->assertInstanceOf('IPPModificationMetaData', $item->MetaData);
        $this->assertEquals("Random Bank 2088329469", $item->FromAccountRef->name);
        $this->assertEquals("35", $item->FromAccountRef->value);
        $this->assertEquals("Random Bank 147203516", $item->ToAccountRef->name);
        $this->assertEquals("36", $item->ToAccountRef->value);
        $this->assertEquals(10, $item->Amount);
        $this->assertEquals("72057", $item->Id);
        $this->assertEquals("2015-04-22T16:42:31-07:00", $item->MetaData->CreateTime);
    }

    private function verifyDomainObjectWithArray($item)
    {
        $this->assertInstanceOf("IPPTransfer", $item);
        $this->assertTrue(is_array($item->Line));
        $line1 = $item->Line[0];
        $this->assertInstanceOf("IPPLine", $line1);
        $this->assertEquals("1", $line1->Amount);
        $this->assertEquals("box of goods", $line1->Description);

        $line2 = $item->Line[1];
        $this->assertInstanceOf("IPPLine", $line2);
        $this->assertEquals("2", $line2->Amount);
        $this->assertEquals("Bunch of services", $line2->Description);
    }*/
}
