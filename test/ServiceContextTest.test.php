<?php
/**
 * This is a test class for DataServiceTest and is intended
 * to contain all DataServiceTest Unit Tests
 */

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

date_default_timezone_set('America/Chicago');
/**
 * Using hard mock for DataService to run tests under PHP 5.2
 * For PHP 5.3 one can user ReflectionMethod::setAccessible()
 *
 */
class DataServiceMock extends DataService {

    public function getRequestSerializer() {
        return parent::getRequestSerializer();
    }

    public function getResponseSerializer() {
        return parent::getResponseSerializer();
    }

    public function verifyChangedSince($value) {
        return parent::verifyChangedSince($value);
    }

    public function processDownloadedContent(ContentWriter $writer, $responseCode, $fileName=null) {
        return parent::processDownloadedContent($writer, $responseCode,$fileName);
    }

    public function initPostRequest($entity, $uri) {
        return parent::initPostRequest($entity, $uri);
    }
}

/**
 * This is a test class for DataServiceTest and is intended
 * to contain all DataServiceTest Unit Tests
 */
class DataServiceQboTest extends \PHPUnit_Framework_TestCase
{

        /**
         * Test how class can be created and test exceptions
         */
        public function testInstance_wrong()
        {
            try {
                new DataService(NULL);
                $this->fail("Class was expected to send an exception");
            } catch(InvalidArgumentException $ex) {
                $this->assertEquals("Resources.ServiceContextCannotBeNull", $ex->getMessage());
            }

            try {
                new DataService("fake");
                $this->fail("Class was expected to send an exception");
            } catch(InvalidParameterException $ex) {
                $this->assertEquals("Wrong arg type passed - is not an object.", $ex->getMessage());
            }
        }


         public function testSerializerSetup_XML()
         {
           $i = new DataServiceMock($this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml));
           $this->assertTrue($i->getResponseSerializer() instanceof XmlObjectSerializer);
           $this->assertTrue($i->getRequestSerializer() instanceof XmlObjectSerializer);
         }

          public function testSerializerSetup_JSON()
         {
           $i = new DataServiceMock($this->getFakeContext(SerializationFormat::Json,SerializationFormat::Json));
           $this->assertTrue($i->getResponseSerializer() instanceof JsonObjectSerializer);
           $this->assertTrue($i->getRequestSerializer() instanceof JsonObjectSerializer);
         }

         public function testMinorVersion()
         {
           $i = new DataServiceMock($this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml));
           $this->assertEquals("123", $i->getMinorVersion());
         }


         private function getFakeContext($responce = null, $request = null)
         {
           //create mock of ServiceContext without and ignore it's construct
           $fake = $this->getMockBuilder('ServiceContext')
                        ->disableOriginalConstructor()
                        ->getMock();

           $fake->realmId = "myfakerealm";
           //$fake->realmId="123145705986809";
           //Imitate data structure
           $fake->IppConfiguration = new stdClass();
           //fake logger
           $fake->IppConfiguration->Logger = new stdClass();
            $fake->IppConfiguration->SSLCheckStatus = false;
           $fake->IppConfiguration->Logger->RequestLog = new Logger();
           //fake message
           $fake->IppConfiguration->Message = new stdClass();
           $fake->IppConfiguration->Message->Response = new stdClass();
           $fake->IppConfiguration->Message->Response->SerializationFormat = $responce;
           $fake->IppConfiguration->Message->Response->CompressionFormat = null;

           $fake->IppConfiguration->Message->Request = new stdClass();
           $fake->IppConfiguration->Message->Request->SerializationFormat = $request;
           $fake->IppConfiguration->Message->Request->CompressionFormat = null;

           $fake->IppConfiguration->ContentWriter = new ContentWriterSettings();
           LocalConfigReader::initOperationControlList($fake->IppConfiguration, LocalConfigReader::getRules());
           $fake->IppConfiguration->OpControlList->appendRules(array('IPPTaxService'=>array("jsonOnly"=>true)));

           $fake->IppConfiguration->minorVersion="123";
           $fake->requestValidator=  new stdClass();
           $fake->requestValidator->ConsumerKey ="qyprdUSoVpIHrtBp0eDMTHGz8UXuSz";
           $fake->requestValidator->ConsumerSecret="TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7";
           $fake->requestValidator->AccessToken="qyprdkRjzCOK3pthWOvlbwqTZlKswA6C9EtwJtjyxaohnDs4";
           $fake->requestValidator->AccessTokenSecret="kiaq6QsbtJ0IZWcAwEFHSz1BOdzuVuMG3q0Wtg3h";
           return $fake;
         }


         /**
         * Returns QBO data service using credentials from App.config
         *
         * TODO: this is common method which should be available across tests
         * TODO: extract it to helper class
         *
         * @return \DataService
         */
        private function prepareDataServiceQBO()
        {
			       $accessToken = "123";
			       $accessTokenSecret = "345";
			       $consumerKey = "abc";
			       $consumerSecret = "xyz";
			       $realmIAQBO = "098";

		         $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			       $serviceContext = new ServiceContext($realmIAQBO, IntuitServicesType::QBO, $oauthValidator);
             //this is hijack to overwrite base url settings from test config file (App.config)
             $serviceContext->IppConfiguration->BaseUrl->Qbo = "https://quickbooks.api.intuit.com/";
             $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
			       return new DataService($serviceContext);
        }


         public function testVerifyChangedSince()
         {
             $i = new DataServiceMock($this->getFakeContext(SerializationFormat::Json,SerializationFormat::Json));
             $this->assertEquals(123123, $i->verifyChangedSince(123123));
             $this->assertEquals("123123", $i->verifyChangedSince("123123"));
             $this->assertEquals("123123", $i->verifyChangedSince("    123123"));
             $this->assertEquals("123123", $i->verifyChangedSince("    123123    "));
             $this->assertEquals("123123", $i->verifyChangedSince("\t123123\r\n"));
             $this->assertEquals("1076620761", $i->verifyChangedSince("2004-02-12T15:19:21+00:00"));
             $this->assertEquals("977436067", $i->verifyChangedSince("Thu, 21 Dec 2000 16:01:07 +0200"));

         }


         /**
          * Dataprovider doesn't work with current tests organization
          */
         public function testVerifyChangedSince_Negative()
         {
             $i = new DataServiceMock($this->getFakeContext(SerializationFormat::Json,SerializationFormat::Json));
             try {
                $i->verifyChangedSince("1.1");
                $this->fail("SDK expected to fail for value 0xFF");
             } catch (SdkException $ex) {
                 $this->assertTrue($ex instanceof SdkException);
             }

             try {
                $i->verifyChangedSince("0xFF");
                $this->fail("SDK expected to fail for value 0xFF");
              } catch (SdkException $ex) {
                 $this->assertTrue($ex instanceof SdkException);
             }

             try {
                $i->verifyChangedSince("abc");
                $this->fail("SDK expected to fail for value \"abc\"");
             } catch (SdkException $ex) {
                 $this->assertTrue($ex instanceof SdkException);
             }

             try {
                $i->verifyChangedSince("0123");
                $this->fail("SDK expected to fail for value \"0123\"");
             } catch(SdkException $ex) {
                $this->assertTrue($ex instanceof SdkException);
             }

         }


         public function testAdd_TaxService()
         {
             $i = new IPPTaxService();
             $dataService = $this->createDataServiceMockWithRestAndSerialization('JsonObjectSerializer', "{\"TaxCode\":{}}");
             $this->assertEquals('{"TaxService":{"TaxCode":{}}}', $dataService->Add($i));
         }


        public function testAdd_TaxService_Object()
         {
             $i = new IPPTaxService();
             $dataService = $this->createDataServiceMockWithRestHandler(
                     $this->createRestHandlerMock($this->returnValue(array(200,"{\"TaxCode\":{\"TaxCode\":\"Fake\"}}"))));
             $this->assertTrue($dataService->Add($i) instanceof IPPTaxService);
         }

         public function testAdd_TaxService_ObjectNull()
         {
            $i = new IPPTaxService();
            $dataService = $this->createDataServiceMockWithRestHandler(
                     $this->createRestHandlerMock($this->returnValue(array(200,"{\"TaxCode\":{}}"))));
            $this->assertTrue($dataService->Add($i) instanceof IPPTaxService);
         }

         public function testInitPostRequest()
         {
            $entity = new IPPPurchase();
            $fakeContext = $this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml);
            $i = new DataServiceMock($fakeContext);

            $this->assertRequest($i->initPostRequest($entity, "/x/y/z"),
                                "application/xml",
                                "/x/y/z",
                                'POST');
         }

         public function testInitPostRequestJson()
         {
            $entity = new IPPPurchase();
            $fakeContext = $this->getFakeContext(SerializationFormat::Json,SerializationFormat::Json);
            $i = new DataServiceMock($fakeContext);

            $this->assertRequest($i->initPostRequest($entity, "/x/y/z"),
                                "application/json",
                                "/x/y/z",
                                'POST');
         }

         public function testInitPostRequestForcedJson()
         {
            $entity = new IPPTaxService();
            $fakeContext = $this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml);
            $i = new DataServiceMock($fakeContext);
            $this->assertRequest($i->initPostRequest($entity, "/x/y/z"),
                                "application/json",
                                "/x/y/z",
                                'POST');
         }

        /**
          * @expectedException IdsException
          * @expectedExceptionMessage Property ID is not set
          */
         public function testGetExportFileNameForPDF_ExceptionNoID()
         {

            $fakeContext = $this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml);
            $i = new DataServiceMock($fakeContext);
            $i->getExportFileNameForPDF(new IPPTaxService(), 'ext');
         }

          /**
          * @expectedException IdsException
          * @expectedExceptionMessage Property ID is empty
          */
         public function testGetExportFileNameForPDF_ExceptionEmptyId()
         {
            $e = new IPPTaxService();
            $e->Id = "";
            $fakeContext = $this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml);
            $i = new DataServiceMock($fakeContext);

            $i->getExportFileNameForPDF($e, 'ext');
         }

                   /**
          * @expectedException IdsException
          * @expectedExceptionMessage Argument Null Exception
          */
         public function testGetExportFileNameForPDF_ExceptionNullEntity()
         {

            $fakeContext = $this->getFakeContext(SerializationFormat::Xml,SerializationFormat::Xml);
            $i = new DataServiceMock($fakeContext);

            $i->getExportFileNameForPDF(null, 'ext');
         }

         /**
          * @expectedException IdsException
          * @expectedExceptionMessage Property ID is not set
          */
         public function testSendEmail_Exception()
         {
             $entity = new IPPSalesReceipt();
             $this->invokeSendEmail($entity);
         }


        public function testSendEmail_UsualCase()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";
             $result = $this->invokeSendEmail($entity,$this->returnValue(array(200,$this->getSendEmailXMLResponseString())),"fake@fake.com",SerializationFormat::Xml);
             $this->assertTrue($result->BillEmail instanceof IPPEmailAddress);
             $this->assertEquals("EmailSent",$result->EmailStatus);
             $this->assertEquals("fakeadr@test.com",$result->BillEmail->Address);
         }


        public function testSendEmail_Parameter()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";
             $result = $this->invokeSendEmail($entity,$this->returnValue(array(200,$this->getSendEmailXMLResponseString())),"fake@fake.com",SerializationFormat::Xml);
             $this->assertTrue($result->BillEmail instanceof IPPEmailAddress);
             $this->assertEquals("EmailSent",$result->EmailStatus);
             $this->assertEquals("fakeadr@test.com",$result->BillEmail->Address);
         }

        public function testSendEmail_JsonParameter()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";
             $result = $this->invokeSendEmail($entity,$this->returnValue(array(200,$this->getSendEmailJsonResponseString())),"fake@fake.com",SerializationFormat::Json);
             $this->assertTrue($result->BillEmail instanceof IPPEmailAddress);
             $this->assertEquals("EmailSent",$result->EmailStatus);
             $this->assertEquals("fakeadr@test.com",$result->BillEmail->Address);
         }

        /*
         * This tests checks that we are no relyhing on changed email
         */
        public function testSendEmail_Exception_WrongEmail_Negative()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";
             $entity->BillEmail = new IPPEmailAddress();
             $entity->BillEmail->Address = "fake123";
             $result = $this->invokeSendEmail($entity,$this->returnValue(array(200,$this->getSendEmailXMLResponseString())),NULL,SerializationFormat::Xml);
             $this->assertTrue($result->BillEmail instanceof IPPEmailAddress);
             $this->assertEquals("EmailSent",$result->EmailStatus);
             $this->assertEquals("fakeadr@test.com",$result->BillEmail->Address);
         }

         public function testSendEmail_Entity()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";
             $entity->BillEmail = new IPPEmailAddress();
             $entity->BillEmail->Address = "fake123@fake.com";

             $restMock = $this->createRestHandlerMock($this->returnValue(null));
             $mock = $this->createDataServiceMockWithRestHandler($restMock,array('getRequestParameters'));
             $mock->expects($this->once())
                  ->method('getRequestParameters')
                  ->with(
                          $this->equalTo("company/myfakerealm/salesreceipt/123/send"),
                          $this->equalTo("POST"),
                          $this->equalTo("application/octet-stream")
                          );
             $mock->SendEmail($entity);
         }



         public function testSendEmail_WithParam()
         {
             $entity = new IPPSalesReceipt();
             $entity->Id = "123";

             $restMock = $this->createRestHandlerMock($this->returnValue(null));
             $mock = $this->createDataServiceMockWithRestHandler($restMock,array('getRequestParameters'));
             $mock->expects($this->once())
                  ->method('getRequestParameters')
                  ->with(
                          $this->equalTo("company/myfakerealm/salesreceipt/123/send?sendTo=fake123@fake.com"),
                          $this->equalTo("POST"),
                          $this->equalTo("application/octet-stream")
                          );
             $mock->SendEmail($entity, "fake123@fake.com");
         }


         //*************************************** DataService Mock**********************************************
         private function getSendEmailXMLResponseString()
         {
          return '<?xml version="1.0" encoding="UTF-8" standalone="yes"?><IntuitResponse xmlns="http://schema.intuit.com/finance/v3" time="2015-06-24T10:38:01.099-07:00"><SalesReceipt domain="QBO" sparse="false"><Id>27914</Id><SyncToken>0</SyncToken><MetaData><CreateTime>2015-06-24T10:37:59-07:00</CreateTime><LastUpdatedTime>2015-06-24T10:38:01-07:00</LastUpdatedTime></MetaData><DocNumber>4843</DocNumber><TxnDate>2015-06-24</TxnDate><CurrencyRef name="United States Dollar">USD</CurrencyRef><ExchangeRate>1</ExchangeRate><Line><Id>1</Id><LineNum>1</LineNum><Description>some line item</Description><Amount>7.50</Amount><DetailType>SalesItemLineDetail</DetailType><SalesItemLineDetail><ItemRef name="CreditMemo ItemA0 11 28 00667">2373</ItemRef><TaxCodeRef>NON</TaxCodeRef></SalesItemLineDetail></Line><Line><Id>2</Id><LineNum>2</LineNum><Description>some line item</Description><Amount>7.50</Amount><DetailType>SalesItemLineDetail</DetailType><SalesItemLineDetail><ItemRef name="CreditMemo ItemA0 11 28 00667">2373</ItemRef><TaxCodeRef>NON</TaxCodeRef></SalesItemLineDetail></Line><Line><Amount>15.00</Amount><DetailType>SubTotalLineDetail</DetailType><SubTotalLineDetail/></Line><TxnTaxDetail><TotalTax>0</TotalTax></TxnTaxDetail><CustomerRef name="$%^(&amp;">5935</CustomerRef><TotalAmt>15.00</TotalAmt><HomeTotalAmt>15.00</HomeTotalAmt><ApplyTaxAfterDiscount>false</ApplyTaxAfterDiscount><PrintStatus>NeedToPrint</PrintStatus><EmailStatus>EmailSent</EmailStatus><BillEmail><Address>fakeadr@test.com</Address></BillEmail><Balance>0</Balance><DepositToAccountRef name="Undeposited Funds">4</DepositToAccountRef><DeliveryInfo><DeliveryType>Email</DeliveryType><DeliveryTime>2015-06-24T10:38:01-07:00</DeliveryTime></DeliveryInfo></SalesReceipt></IntuitResponse>';
         }

         private function getSendEmailJsonResponseString()
         {
          return '{"SalesReceipt":{"domain":"QBO","sparse":false,"Id":"27089","SyncToken":"0","MetaData":{"CreateTime":"2015-06-23T16:43:27-07:00","LastUpdatedTime":"2015-06-24T16:17:29-07:00"},"CustomField":[],"DocNumber":"4715","TxnDate":"2015-06-23","CurrencyRef":{"value":"USD","name":"United States Dollar"},"ExchangeRate":1,"Line":[{"Id":"1","LineNum":1,"Description":"some line item","Amount":7.50,"DetailType":"SalesItemLineDetail","SalesItemLineDetail":{"ItemRef":{"value":"2243","name":"updatedName2ee55"},"TaxCodeRef":{"value":"NON"}}},{"Id":"2","LineNum":2,"Description":"some line item","Amount":7.50,"DetailType":"SalesItemLineDetail","SalesItemLineDetail":{"ItemRef":{"value":"2243","name":"updatedName2ee55"},"TaxCodeRef":{"value":"NON"}}},{"Amount":15.00,"DetailType":"SubTotalLineDetail","SubTotalLineDetail":{}}],"TxnTaxDetail":{"TotalTax":0},"CustomerRef":{"value":"5935","name":"$%^(&"},"TotalAmt":15.00,"HomeTotalAmt":15.00,"ApplyTaxAfterDiscount":false,"PrintStatus":"NeedToPrint","EmailStatus":"EmailSent","BillEmail":{"Address":"fakeadr@test.com"},"Balance":0,"DepositToAccountRef":{"value":"4","name":"Undeposited Funds"},"DeliveryInfo":{"DeliveryType":"Email","DeliveryTime":"2015-06-24T16:17:29-07:00"}},"time":"2015-06-24T16:17:28.635-07:00"}';
         }


         private function assertRequest(RequestParameters $actual, $expectedType, $expectedURL, $expectedVerb, $expectedAPIName=null)
         {
             $this->assertEquals($expectedType, $actual->ContentType);
             $this->assertEquals($expectedURL, $actual->ResourceUri);
             $this->assertEquals($expectedVerb, $actual->HttpVerbType);
             $this->assertEquals($expectedAPIName, $actual->ApiName);
         }



         private function createDataServiceMockWithRestAndSerialization($serializerMockClassName, $httpResponse)
         {
             $i = new IPPTaxService();
             $dataService = $this->createDataServiceMockWithRestHandler(
                     $this->createRestHandlerMock($this->returnValue(array(200,$httpResponse))),
                     array('getResponseSerializer')
                     );
             $serializerMock = $this->getMockBuilder($serializerMockClassName)
                               ->setMethods(array('Deserialize'))
                               ->getMock();
             $serializerMock->method('Deserialize')->will($this->returnArgument(0));
             $dataService->method('getResponseSerializer')->will($this->returnValue($serializerMock));
             return $dataService;
         }

         private function createDataServiceMockWithRestHandler($restMock,$methods=array())
         {
            $dataServiceMock = $this->createDataServiceMock(array_merge(array('getRestHandler'),$methods),SerializationFormat::Json);
            $dataServiceMock->method('getRestHandler')->will($this->returnValue($restMock));
            return $dataServiceMock;
         }

         private function createDataServiceMock($methods,$format = null)
         {

             return $this->getMockBuilder('DataService')
                               ->setConstructorArgs(array($this->getFakeContext($format,$format), null))
                               ->setMethods($methods)
                               ->getMock();
         }


         private function invokeRestHandlerViaDownloadPDF($attribute, $expected)
         {
             $entity = new IPPSalesReceipt();
            $entity->Id = 123;
            $restMock = $this->getMockBuilder('SyncRestHandler')->disableOriginalConstructor()->getMock();

            $restMock->expects($this->once())->method('GetResponse')->with(
                    $this->attributeEqualTo($attribute,$expected),
                    $this->isNull(),
                    $this->isNull()

            );
            $this->createDataServiceMockWithRestHandler($restMock)->DownloadPDF($entity);

         }

         private function createRestHandlerMock($restHandlerValue)
         {
            $restMock = $this->getMockBuilder('SyncRestHandler')->disableOriginalConstructor()->getMock();
            $restMock->method('GetResponse')->will($restHandlerValue);
            return $restMock;
         }


         private function invokeDownloadPDF($entity,$restHandlerValue = NULL)
         {
            if(is_null($restHandlerValue)) {
                $restHandlerValue = $this->returnValue(NULL);
            }

            $dataServiceMock = $this->createDataServiceMock(array('getRestHandler','processDownloadedContent'),SerializationFormat::Json);
            $dataServiceMock->method('getRestHandler')->will($this->returnValue($this->createRestHandlerMock($restHandlerValue)));
            $dataServiceMock->method('processDownloadedContent')->will($this->returnArgument(0));
            return $dataServiceMock->DownloadPDF($entity);
         }

         private function invokeSendEmail($entity,$restHandlerValue = NULL,$email=NULL,$format=NULL)
         {
            if(is_null($restHandlerValue)) {
                $restHandlerValue = $this->returnValue(NULL);
            }

            $dataServiceMock = $this->createDataServiceMock(array('getRestHandler'),$format);
            $dataServiceMock->method('getRestHandler')->will($this->returnValue($this->createRestHandlerMock($restHandlerValue)));
            return $dataServiceMock->SendEmail($entity,$email);
         }

}
