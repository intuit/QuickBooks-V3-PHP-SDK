<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\JournalEntry;
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
$dataService->setLogLocation("/Users/abisalehalliprasan/Desktop/logs");
$dataService->throwExceptionOnError(true);
$theResourceObj = JournalEntry::create([
    "Line" => [
    [
      "Id" => "0",
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Debit",
        "AccountRef" => [
            "value" => "30",
            "name" => "Billable Expense Income"
        ]
     ]
    ],
    [
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Credit",
          "AccountRef" => [
            "value" => "3",
            "name" => "Uncategorized Asset"
          ]
      ]
    ]
  ]
]);

var_dump($theResourceObj);
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
