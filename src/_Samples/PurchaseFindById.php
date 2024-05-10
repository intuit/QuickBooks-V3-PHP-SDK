<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;
use QuickBooksOnline\API\Data\IPPPurchase;


// Prep Data Services
$dataService = DataService::Configure(array(
  'auth_mode'       => 'oauth2',
  'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX..XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  'QBORealmID'      => "xxxxxxxxxxxxxxxxxxx",
  'baseUrl'         => "development"
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

// Find the recently-created Purchase Object by Id
$purchaseObj = new IPPPurchase();
$purchaseObj->Id=$purchaseObjConfirmation->Id;
$purchaseObj->domain=$purchaseObjConfirmation->domain;
$crudResultObj = $dataService->FindById($purchaseObj);
if ($crudResultObj) {
    echo "Found the purchase object that we just created.\n";
} else {
    echo "Did not find the purchase object that we just created.\n";
}




/*
Example output:

Created Purchase object, and received Id=807
Found the purchase object that we just created.
*/
