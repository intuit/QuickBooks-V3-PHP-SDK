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
class BatchIntgTests extends PHPUnit_Framework_TestCase
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
        
	/**
	 * test case
	 */
	public function testbatchtestall()
	{
		try
		{
                        
		$service = $this->prepareDataServiceQBO(); 
                
            $customer1 = new IPPCustomer();
            $uniqueid = "A" . rand() . rand() . rand() . rand() . rand();
            $customer1->GivenName = substr($uniqueid, 0, 25);
            $GivenNameCustomer1 = $customer1->GivenName;
            $customer1->Title = substr($uniqueid, 0, 15);
            $customer1->MiddleName = substr($uniqueid, 0, 5);
            $customer1->FamilyName = substr($uniqueid, 0, 25);
            $customer1->DisplayName = substr($uniqueid, 0, 20);

            $customer2 = new IPPCustomer();
            $uniqueid = "A" . rand() . rand() . rand() . rand() . rand();
            $customer2->GivenName = substr($uniqueid, 0, 25);
            $GivenNameCustomer2 = $customer2->GivenName;
            $customer2->Title = substr($uniqueid, 0, 15);
            $customer2->MiddleName = substr($uniqueid, 0, 5);
            $customer2->FamilyName = substr($uniqueid, 0, 25);
            $customer2->DisplayName = substr($uniqueid, 0, 20);

            $batch = $service->CreateNewBatch();
            $batch->AddEntity($customer1, "addcustomer1", OperationEnum::create);
            $batch->AddEntity($customer2, "addcustomer2", OperationEnum::create);
            $batch->AddQuery("select * from Customer startPosition 0 maxResults 10", "queryCustomer");
            $batch->Execute();


			
			// Response part 1
            $inuititemresponse = $batch->intuitBatchItemResponses[0];
		    $this->assertTrue($inuititemresponse->responseType == ResponseType::Entity);
		    try
		    {
				$resultcustomer1 = $inuititemresponse->entity;
				$this->assertFalse(!$resultcustomer1->Id);
				$this->assertTrue($resultcustomer1->GivenName == $GivenNameCustomer1);
			}
			catch(Exception $e)
			{
				$this->assertFalse('Unable to access customer 1 response');
			}

			// Response part 2
            $inuititemresponse = $batch->intuitBatchItemResponses[1];
		    $this->assertTrue($inuititemresponse->responseType == ResponseType::Entity);
		    try
		    {
				$resultcustomer2 = $inuititemresponse->entity;
				$this->assertFalse(!$resultcustomer2->Id);
				$this->assertTrue($resultcustomer2->GivenName == $GivenNameCustomer2);
			}
			catch(Exception $e)
			{
				$this->assertFalse('Unable to access customer 2 response');
			}

			// Response part 3
            $inuititemresponse = $batch->intuitBatchItemResponses[2];
		    $this->assertTrue($inuititemresponse->responseType == ResponseType::Query);
		    $this->assertTrue(count($inuititemresponse->entities)>=2);
		}
		catch (Exception $e)
		{
                    $this->printException($e);    
		    $this->assertTrue(FALSE);
		}	
	
	}
	
   
	
}