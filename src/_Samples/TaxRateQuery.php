<?php

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

// Run a query
$entities = $dataService->Query("SELECT * FROM TaxRate");

// Echo some formatted output
if (count($entities) > 0) {
    $i = 0;
    foreach ($entities as $oneTaxRate) {
        echo "TaxRate[$i] Name: {$oneTaxRate->Name}	Rate {$oneTaxRate->RateValue} AgencyRef {$oneTaxRate->AgencyRef} (SpecialTaxType {$oneTaxRate->SpecialTaxType})\n";
        $i++;
    }
}

/*
Example output:

TaxRate[0] Name: NOTAXP	Rate 0 AgencyRef 1 (SpecialTaxType NO_TAX)
TaxRate[1] Name: NOTAXS	Rate 0 AgencyRef 1 (SpecialTaxType NO_TAX)
TaxRate[2] Name: Purchase EC 2%	Rate 2 AgencyRef 3 (SpecialTaxType NONE)
TaxRate[3] Name: Purchase HEC 1%	Rate 1 AgencyRef 3 (SpecialTaxType NONE)
*/

?>