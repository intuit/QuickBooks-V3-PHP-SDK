<?php
/***
 *  PLEASE FIX ME!!
 * 
 * 
 * 
 */
require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

//Specify QBO or QBD
$serviceType = IntuitServicesType::QBO;

// Get App Config
$realmId = ConfigurationManager::AppSettings('RealmID');
if (!$realmId)
    exit("Please add realm to App.Config before running this sample.\n");

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
    ConfigurationManager::AppSettings('AccessTokenSecret'),
    ConfigurationManager::AppSettings('ConsumerKey'),
    ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);

if (!$serviceContext)
    exit("Problem while initializing ServiceContext.\n");

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
    exit("Problem while initializing DataService.\n");

$rnd = rand();
$taxRateDetails = new IPPTaxRateDetails();
$taxRateDetails->TaxRateName = "myNewTaxRateName_$rnd";
$taxRateDetails->RateValue = "7";
$taxRateDetails->TaxAgencyId = "1";
$taxRateDetails->TaxApplicableOn = "Sales";

$taxService = new IPPTaxService();
$taxService->TaxCode = 'MyTaxCodeName_' . $rnd;
$taxService->TaxRateDetails = array($taxRateDetails);


$result = $dataService->Add($taxService);
if(empty($result)) {
    echo "\n Something was wrong. Please check logs";
} else {
    print_r($result);
    
}


####
# Var-dump output
####
/**
 * 
object(IPPTaxService)#40 (4) {
  ["TaxCode"]=>
  string(23) "MyTaxCodeName_482378853"
  ["TaxCodeId"]=>
  string(2) "11"
  ["TaxRateDetails"]=>
  array(1) {
    [0]=>
    object(IPPTaxRateDetails)#61 (5) {
      ["TaxRateName"]=>
      string(26) "myNewTaxRateName_482378853"
      ["TaxRateId"]=>
      string(2) "21"
      ["RateValue"]=>
      int(7)
      ["TaxAgencyId"]=>
      string(1) "1"
      ["TaxApplicableOn"]=>
      string(5) "Sales"
    }
  }
  ["Fault"]=>
  NULL
}

 */
