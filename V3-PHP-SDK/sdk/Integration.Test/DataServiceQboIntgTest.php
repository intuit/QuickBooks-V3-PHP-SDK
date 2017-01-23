<?php
/**
 * This is a test class for DataServiceTest and is intended
 * to contain all DataServiceTest Unit Tests
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
 * This is a test class for DataServiceTest and is intended
 * to contain all DataServiceTest Unit Tests
 */
class DataServiceQboIntgTest extends PHPUnit_Framework_TestCase
{

         
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

			$accessToken = ConfigurationManager::AppSettings('AccessTokenQBO');
			$accessTokenSecret = ConfigurationManager::AppSettings('AccessTokenSecretQBO');
			$consumerKey = ConfigurationManager::AppSettings('ConsumerKeyQBO');
			$consumerSecret = ConfigurationManager::AppSettings('ConsumerSecretQBO');
			$realmIAQBO = ConfigurationManager::AppSettings('RealmIAQBO');

		    $oauthValidator = new OAuthRequestValidator($accessToken, $accessTokenSecret, $consumerKey, $consumerSecret);
			$serviceContext = new ServiceContext($realmIAQBO, IntuitServicesType::QBO, $oauthValidator);
                        //this is hijack to overwrite base url settings from test config file (App.config)
                        $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
                        $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
			return new DataService($serviceContext);            
        }
	/**
	 * test case
	 */
	public function testCDCTest() {
            try {

                $dataService = $this->prepareDataServiceQBO();
                # end of duplicate 

                $entityList = array('Customer', 'Vendor');
                $changedSince = time() - 2 * 24 * 60 * 60; // 2 days ago

                $cdcResponse = $dataService->CDC($entityList, $changedSince);
                $customerList = $cdcResponse->entities['Customer'];
                $this->assertTrue(count($customerList) > 0);

                $vendorList = $cdcResponse->entities['Vendor'];
                $this->assertTrue(count($vendorList) > 0);
            } catch (Exception $e) {
                // should not land here
                $this->assertTrue(FALSE);
            }
         }
     

}
