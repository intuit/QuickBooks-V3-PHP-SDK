<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

// Prep Data Services
$dataService = DataService::Configure(array(
       'auth_mode' => 'oauth1',
         'consumerKey' => "lve2eZN6ZNBrjN0Wp26JVYJbsOOFbF",
         'consumerSecret' => "fUhPIeu6jrq1UmNGXSMsIsl0JaHuHzSkFf3tsmrW",
         'accessTokenKey' => "qye2etcpyquO3B1t8ydZJI8OTelqJCMiLZlY5LdX7qZunwoo",
         'accessTokenSecret' => "2lEUtSEIvXf64CEkMLaGDK5rCwaxE9UvfW1dYrrH",
         'QBORealmID' => "193514489870599",
         'baseUrl' => "https://qbonline-e2e.api.intuit.com/"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

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
