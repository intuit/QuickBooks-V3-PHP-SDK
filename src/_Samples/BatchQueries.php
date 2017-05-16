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

// Run a batch
$maxSearch = 500;
$batch = $dataService->CreateNewBatch();
$batch->AddQuery("select * from Customer startPosition 0 maxResults {$maxSearch}", "queryCustomer");
$batch->AddQuery("select * from Vendor startPosition 0 maxResults {$maxSearch}", "queryVendor");
$batch->Execute();
$error = $batch->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

// Echo some formatted output
$batchItemResponse = $batch->intuitBatchItemResponses[0];
echo "Looked for up to {$maxSearch} customers; found " . count($batchItemResponse->entities) . "\n";

$batchItemResponse = $batch->intuitBatchItemResponses[1];
echo "Looked for up to {$maxSearch} vendors; found " . count($batchItemResponse->entities) . "\n";

/*
Example output:

Looked for up to 500 customers; found 318
Looked for up to 500 vendors; found 278
*/
