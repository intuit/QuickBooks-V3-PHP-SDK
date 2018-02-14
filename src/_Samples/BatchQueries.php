<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Invoice;

// Prep Data Services
$dataService = DataService::Configure([
  'auth_mode' => 'oauth2',
  'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
  'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
  'accessTokenKey' =>
  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..3jjOsnri0wWe_0nyKLB2SA.OaSJHdewrPVGRMbQNI8lKIhH3bOiCVhmyDLxn8W6zoiJrRnEhHuJ-GFWiO9sRS_4BaPLnlbEDsp3PUfPpGUmveD8CloaLXjgp0nPIApvqbKDA0La0zX5OhWGmvShZVwtZ-T_qAR3hU3f2TzqfaoeRTtO23S9idKSCDiSJVLdVMIbHM8DZFJvKDdKFDus5EjtEX_LNx-6vCnpWNCUU0_vu4Pjyyp1iAz2c3GgpYMbnx56985r2LA7td8mZgiXKxkpVKy2yWrXZSgmG62SDDKeqD9KRCsF7QBgYU5sqa4mts8CAR_jQr4pRMlbresPw16fVmh2n-6uoKJYXkCkLmSMZ4PtjIZ85cbpx3ECo8Te5uW4bz03EtXGdM75yJYbiuhOTP7Z8wGaPQcnZbGcMbux_Kqb5ReQWHmDNP05W6h-c61AouY0SLTbup6gXqTaYtUH8o9m6_WNUh77gMUj9rPRfMjAOrEpBfPIa_FqsQENzMFe2me-5jMNaMlVPpL0u7itmXyFU6zvHs-sUcOIFoTVEzef9felpjdNUnrv9g1uxDIY7NHS4fPuUHCo3tbqZeUavGEMKXrIN7ytILMfRdhxU1ANf__iOTby-ZRjQAQH-tXC6itPk5l6zji62LSt89Cuqp-Adm4_LHCj-3F4slEhqogKamb27v8P6gry9tLkKEjSUqtaec9i09mcnJNel93w.cBA70qRF375xICHD0GFEYQ',
  'refreshTokenKey' => "Q01152727758997PwQ3G6gLh4tlZYKrH499SSytAMt12r7uKwy",
  'QBORealmID' => "193514611894164",
  'baseUrl' => "development"
]);


$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

$theResourceObj = Invoice::create([
     "Line" => [
   [
     "Amount" => 100.00,
     "DetailType" => "SalesItemLineDetail",
     "SalesItemLineDetail" => [
       "ItemRef" => [
         "value" => 1,
         "name" => "Services"
        ]
      ]
      ]
    ],
   "CustomerRef"=> [
      "value"=> 1
   ]
]);
// Run a batch
$batch = $dataService->CreateNewBatch();
$batch->AddQuery("select * from Customer startPosition 0 maxResults 5", "queryCustomer");
$batch->AddQuery("select * from Vendor startPosition 0 maxResults 5", "queryVendor");
$batch->AddEntity($theResourceObj, "CreateInvoice", "Create");
$batch->Execute();
$error = $batch->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

// Echo some formatted output
$batchItemResponse_createInvoice = $batch->intuitBatchItemResponses["CreateInvoice"];
if($batchItemResponse_createInvoice->isSuccess()){
    $createdInvoice = $batchItemResponse_createInvoice->getResult();
    echo "Create Invoice success!:\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($createdInvoice, $something);
    echo $xmlBody . "\n";
}else{
    $result = $batchItemResponse_createInvoice->getError();
    var_dump($result);
}

$batchItemResponse_queryCustomer = $batch->intuitBatchItemResponses["queryCustomer"];
if($batchItemResponse_queryCustomer->isSuccess()){
    $customers = $batchItemResponse_queryCustomer->getResult();
    echo "Query success!:\n";
    foreach($customers as $oneCustomer){
        $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($oneCustomer, $something);
        echo $xmlBody . "\n";
    }

}else{
    $result = $batchItemResponse_queryCustomer->getError();
    var_dump($result);
}

$batchItemResponse_queryVendor = $batch->intuitBatchItemResponses["queryVendor"];
if($batchItemResponse_queryVendor->isSuccess()){
    echo "Query success!:\n";
    $vendors = $batchItemResponse_queryVendor->getResult();
    foreach($vendors as $oneVendor){
      $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($oneVendor , $something);
      echo $xmlBody . "\n";
    }

}else{
    $result = $batchItemResponse_queryVendor->getError();
    var_dump($result);
}

//$batchItemResponse = $batch->intuitBatchItemResponses[1];
//echo "Looked for up to {$maxSearch} vendors; found " . count($batchItemResponse->entities) . "\n";

/*
Example output:

Looked for up to 500 customers; found 318
Looked for up to 500 vendors; found 278
*/
