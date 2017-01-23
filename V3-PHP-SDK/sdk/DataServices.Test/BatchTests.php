<?php
/**
 * This file contains test cases for OAuthRequestValidator
 */
 
require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for Batch class
*/
class BatchTests extends PHPUnit_Framework_TestCase
{
    private $verbose = true;
        
        /**
         * Print exception in a nice way if verbose mode is on
         * TODO - propoganate verbose from command line later or as sys prop
         * TODO - check/add logger library to it for us
         * @param type $e
         */
        private function printException(Exception $e)
        {
            if(!$this->verbose) return null;
            echo "\nException: " . $e->getMessage() 
                    ." in "      . $e->getFile()
                    ." at line " . $e->getLine();
            echo "\nException trace:\n" . $e->getTraceAsString();        
          
            
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
			$serviceType = IntuitServicesType::QBO;

			$accessToken = ConfigurationManager::AppSettings('AccessToken' . $serviceType);
			$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecret' . $serviceType);
			$consumerKey = ConfigurationManager::AppSettings('ConsumerKey' . $serviceType);
			$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecret' . $serviceType);
			$realmIAQBO = ConfigurationManager::AppSettings('RealmIA' . $serviceType);

		    $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			$serviceContext = new ServiceContext($realmIAQBO, $serviceType, $oauthValidator);
                        //this is hijack to overwrite base url settings from test config file (App.config)
                        $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
                        $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
			return new DataService($serviceContext);            
        }

	
    public function testUseSameBatchIDTwice()
    { 
		try
		{
			$service = $this->prepareDataServiceQBO(); 

			$customer = new IPPCustomer();
			$uniqueid = "A" . rand() . rand() . rand() . rand() . rand();
			$customer1->GivenName = substr($uniqueid, 0, 25);
			$customer1->Title = substr($uniqueid, 0, 15);
			$customer1->MiddleName = substr($uniqueid, 0, 5);
			$customer1->FamilyName = substr($uniqueid, 0, 25);
			$customer1->DisplayName = substr($uniqueid, 0, 20);

		    $batch = $service->CreateNewBatch();
            $batch->AddEntity($customer1, "Customer", OperationEnum::create);
            $batch->AddQuery("query * from Customer", "Customer");
			
			// Should not get here
		    $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		    $this->assertTrue(TRUE);
		}	
    }	
	
	public function testAddNullEntityInBatch()
	{
		try
		{
			$service = $this->prepareDataServiceQBO(); 

		    $customer = null;
		    $batch = $service->CreateNewBatch();
            $batch->AddEntity($customer, "Customer", OperationEnum::create);
            $batch->AddQuery("query * from Customer", "Customer");
			
			// Should not get here
		    $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		    $this->assertTrue(TRUE);
		}	
	}

	/**
	 * testAddMoreThanTwentyFiveItemsInBatch
	 */
	public function testAddMoreThanTwentyFiveItemsInBatch()
	{
		try
		{
			$service = $this->prepareDataServiceQBO(); 

		    $batch = $service->CreateNewBatch();
			for ($i = 0; $i <= 26; $i++)
			{
				$customer = new IPPCustomer();
				$customer->GivenName="RAND".rand().rand();
				$customer->Title="RAND".rand().rand();
				$customer->MiddleName="RAND".rand().rand();
				$customer->FamilyName="RAND".rand().rand();
				$customer->DisplayName="RAND".rand().rand();
				
				$batch->AddEntity($customer, "Customer{$i}", OperationEnum::create);
			}
			
			// Should not get here
		    $this->assertTrue(FALSE);
		}
		catch (Exception $e)
		{
		    $this->assertTrue(TRUE);
		}	
	}	
        
        public function testBatchItemId()
        {
          $restMock = $this->getMockBuilder('SyncRestHandler')->disableOriginalConstructor()->getMock();
          $restMock->method('GetResponse')->will($this->returnValue(array(200,$this->getSampleResponse())));
            
          $mock = $this->getFakeBatch(SerializationFormat::Xml,SerializationFormat::Xml);
          $mock->method('getRestHandler')->will($this->returnValue($restMock));
          $mock->Execute();
          $b1 = $mock->intuitBatchItemResponses[0];
          $b2 = $mock->intuitBatchItemResponses[1];
          $this->assertTrue($b1 instanceof IntuitBatchResponse);
          $this->assertTrue($b2 instanceof IntuitBatchResponse);
          $this->assertEquals("12",$b1->batchItemId);
          $this->assertEquals("13",$b2->batchItemId);
        }
        
        public function testBatchItemIdWithFault()
        {
          $restMock = $this->getMockBuilder('SyncRestHandler')->disableOriginalConstructor()->getMock();
          $restMock->method('GetResponse')->will($this->returnValue(array(200,$this->getSampleResponseWithFault())));
            
          $mock = $this->getFakeBatch(SerializationFormat::Xml,SerializationFormat::Xml);
          $mock->method('getRestHandler')->will($this->returnValue($restMock));
         // $mock->method('Execute')->will($this->returnSelf());
          //var_dump($mock);
          $mock->Execute();
          $b1 = $mock->intuitBatchItemResponses[0];
          $b2 = $mock->intuitBatchItemResponses[2];
          $this->assertTrue($b1 instanceof IntuitBatchResponse);
          $this->assertTrue($b2 instanceof IntuitBatchResponse);
          $this->assertTrue($b2->exception instanceof IdsException);
          $this->assertEquals("12",$b1->batchItemId);
          
        }
        
        
        public function testBatchFaults()
        {
          $restMock = $this->getMockBuilder('SyncRestHandler')->disableOriginalConstructor()->getMock();
          $restMock->method('GetResponse')->will($this->returnValue(array(200,$this->getSampleResponseWithAllFaults())));
            
          $mock = $this->getFakeBatch(SerializationFormat::Xml,SerializationFormat::Xml);
          $mock->method('getRestHandler')->will($this->returnValue($restMock));
          $mock->Execute();
          $expected = $this->getSampleFaults();
          $this->verifyException(array_shift($expected), $mock->intuitBatchItemResponses[0]->exception);
          $this->verifyException(array_shift($expected), $mock->intuitBatchItemResponses[1]->exception);
          $this->verifyException(array_shift($expected), $mock->intuitBatchItemResponses[2]->exception);
          $this->verifyException(array_shift($expected), $mock->intuitBatchItemResponses[3]->exception);
          
        }
        
        private function verifyException($expected, $actual)
        {
          $this->assertTrue($actual instanceof IdsException);
          $this->assertEquals($expected['message'],$actual->getMessage());
        }




        private function getFakeBatch($responce = null, $request = null)
         {
           $fakeContext = new stdClass();
           $fakeContext->realmId = '12312312';
            //Imitate data structure
           $fakeContext->IppConfiguration = new stdClass();
           //fake logger
           $fakeContext->IppConfiguration->Logger = new stdClass();
           $fakeContext->IppConfiguration->Logger->RequestLog = new Logger();
            $fakeContext->IppConfiguration->Logger->CustomLogger = new Logger();
           //fake message
           $fakeContext->IppConfiguration->Message = new stdClass();
           $fakeContext->IppConfiguration->Message->Response = new stdClass();
           $fakeContext->IppConfiguration->Message->Response->SerializationFormat = $responce;
           $fakeContext->IppConfiguration->Message->Response->CompressionFormat = null;
 
           $fakeContext->IppConfiguration->Message->Request = new stdClass();
           $fakeContext->IppConfiguration->Message->Request->SerializationFormat = $request; 
           $fakeContext->IppConfiguration->Message->Request->CompressionFormat = null;
           
            //create mock of ServiceContext without and ignore it's construct  
           $fake = $this->getMockBuilder('Batch')
                        ->setConstructorArgs(array($fakeContext, null))
                        ->setMethods(array('getRestHandler'))
                        ->getMock();
           

           return $fake;
         }
        
        private function getSampleResponseWithFault()
        {
            return "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><IntuitResponse xmlns=\"http://schema.intuit.com/finance/v3\" time=\"2012-08-14T05:43:59.649Z\"><BatchItemResponse bId=\"12\"><Customer status=\"Pending\"><Id>NG:2285964</Id><SyncToken>204</SyncToken><MetaData><CreateTime>2012-07-23T11:17:56Z</CreateTime><LastUpdatedTime>2012-08-14T05:43:59Z</LastUpdatedTime></MetaData><Organization>false</Organization><CompanyName>Company Name 34</CompanyName><DisplayName>L 34</DisplayName><Active>false</Active><Job>false</Job><OpenBalanceDate>2012-07-23T11:17:15Z</OpenBalanceDate><CurrencyRef name=\"US Dollar\"/></Customer></BatchItemResponse><BatchItemResponse bId=\"13\"><QueryResponse maxResults=\"1\" startPosition=\"1\"><Customer><Id>NG:2293936</Id><DisplayName>0588e717-4c0f-4fb3-8e7c-7</DisplayName></Customer></QueryResponse></BatchItemResponse><BatchItemResponse bId=\"14\"><Fault type=\"Validation\"><Error code=\"500\"><Message>Unsupported operation requested</Message></Error></Fault></BatchItemResponse></IntuitResponse>";
        }
        
        private function getSampleResponse()
        {
            return "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><IntuitResponse xmlns=\"http://schema.intuit.com/finance/v3\" time=\"2012-08-14T05:43:59.649Z\"><BatchItemResponse bId=\"12\"><Customer status=\"Pending\"><Id>NG:2285964</Id><SyncToken>204</SyncToken><MetaData><CreateTime>2012-07-23T11:17:56Z</CreateTime><LastUpdatedTime>2012-08-14T05:43:59Z</LastUpdatedTime></MetaData><Organization>false</Organization><CompanyName>Company Name 34</CompanyName><DisplayName>L 34</DisplayName><Active>false</Active><Job>false</Job><OpenBalanceDate>2012-07-23T11:17:15Z</OpenBalanceDate><CurrencyRef name=\"US Dollar\"/></Customer></BatchItemResponse><BatchItemResponse bId=\"13\"><QueryResponse maxResults=\"1\" startPosition=\"1\"><Customer><Id>NG:2293936</Id><DisplayName>0588e717-4c0f-4fb3-8e7c-7</DisplayName></Customer></QueryResponse></BatchItemResponse></IntuitResponse>";
        }
        
        private function getSampleFaults()
        {
            return array( 
                        14=>array("type"=>"Validation", "code"=>"500","message"=>"Unsupported operation requested"),
                        21=>array("type"=>"ServiceFault", "code"=>"500","message"=>"service is bad"),
                        22=>array("type"=>"Authorization", "code"=>"500","message"=>"credentials are wrong"),
                        24=>array("type"=>"my", "code"=>"500","message"=>"one two three"));
        }
        
        
        private function getSampleResponseWithAllFaults()
        {
            $faults = "";
            foreach ($this->getSampleFaults() as $key => $ex) {
                     $faults .= "<BatchItemResponse bId=\"$key\"><Fault type=\"{$ex['type']}\"><Error code=\"{$ex['code']}\"><Message>{$ex['message']}</Message></Error></Fault></BatchItemResponse>";
            }
            
            return "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?><IntuitResponse xmlns=\"http://schema.intuit.com/finance/v3\" time=\"2012-08-14T05:43:59.649Z\">" . $faults . "</IntuitResponse>";
        }
	
}


