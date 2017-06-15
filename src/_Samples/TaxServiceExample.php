<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
//The TaxService is still the old example. Add TaxService Support will be on later release
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPTaxRateDetails;
use QuickBooksOnline\API\Data\IPPTaxService;

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

$rnd = rand();
$taxRateDetails = new IPPTaxRateDetails();
$taxRateDetails->TaxRateName = "myNewTaxRateName_$rnd";
$taxRateDetails->RateValue = "7777";//As Invalid number
$taxRateDetails->TaxAgencyId = "1";
$taxRateDetails->TaxApplicableOn = "Sales";

$taxService = new IPPTaxService();
$taxService->TaxCode = 'MyTaxCodeName_' . $rnd;
$taxService->TaxRateDetails = array($taxRateDetails);


$result = $dataService->Add($taxService);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}


print_r($result);



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
