<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;


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

// Create a new Purchase Object
$randomPurchaseObj = Purchase::create([
  "AccountRef" => [
 "value"=> "42",
 "name"=> "Visa"
],
"PaymentType"=> "CreditCard",
"Line"=> [
 [
   "Amount"=> 10.00,
   "DetailType"=> "AccountBasedExpenseLineDetail",
   "AccountBasedExpenseLineDetail"=> [
    "AccountRef"=> [
       "name"=> "Meals and Entertainment",
       "value"=> "13"
     ]
   ]
 ]
]
]);
$purchaseObjConfirmation = $dataService->Add($randomPurchaseObj);
echo "Created Purchase object, and received Id={$purchaseObjConfirmation->Id}\n";

// Delete the recently-created Purchase Object
$crudResultObj = $dataService->Delete($purchaseObjConfirmation);
if ($crudResultObj) {
    echo "Delete the purchase object that we just created.\n";
} else {
    echo "Did not delete the purchase object that we just created.\n";
}



/*
Example output:

Created Purchase object, and received Id=807
Found the purchase object that we just created.
*/
