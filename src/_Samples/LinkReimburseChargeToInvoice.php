<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;

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

$dataService->throwExceptionOnError(true);
//Add a new Invoice
$theResourceObj = Invoice::create([
   "LinkedTxn" => [
        "TxnId" => 9,
        "TxnType" => "ReimburseCharge"
   ],
     "Line" => [
       [
         "Amount" => 100.00,
         "DetailType" => "SalesItemLineDetail",
         "SalesItemLineDetail" => [
           "ItemRef" => [
             "value" => 2
           ],
           "UnitPrice" => 10
         ],
         "LinkedTxn" => [
             "TxnId" => 9,
             "TxnType" => "ReimburseCharge"
         ],
       ]
    ],
"CustomerRef"=> [
  "value"=> 2
],
      "BillEmail" => [
            "Address" => "Familiystore@intuit.com"
      ],
      "BillEmailCc" => [
            "Address" => "a@intuit.com"
      ],
      "BillEmailBcc" => [
            "Address" => "v@intuit.com"
      ]
]);
$resultingObj = $dataService->Add($theResourceObj);


$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
