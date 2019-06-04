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
  'ClientID' => "L0vmMZIfwUBfv9PPM96dzMTYATnLs6TSAe5SyVkt1Z4MAsvlCU",
  'ClientSecret' => "2ZZnCnnDyoZxUlVCP1D9X7khxA3zuXMyJE4cHXdq",
  'accessTokenKey' =>
  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..bMBZb6bIX3TuiyBOx6Um3Q.34vwrQrbm71KvF9x0jcPflLTY7KkUflgyXHO7MwUSox98LpopyImu4VhWFwSrM-o44Yixf6zUMoYMRJbUz5M3-GV6WFUuTxzVn9lvWdNIMRfY75hVx87aARgJePAkKg0b3Jcq90hXJMCxIuEoCnfptG_nNkGihLjatcbdw_agMnJGcEm8GXV55tUDr_iok4xubZbGz1vxZo0Dsq0JxPoWcCdZ1nf4Fzt1xgL3SlzbbdbMyebPFT4z5RTIsf8E0nXPUaUuLWTarkOsDHx5gchNdXAHXECZlxCd-UKKN0M4EswwrsTLhxfb5pRtCa0EkRGkxTcWn0wYwRYa0iWj9B0H1J89vwp5-6aECanAp_LBs-KpBIp6MA-weFAZH5YLaQfGT3zk8JtGLrKuP82S60m3ydCUhSprHVtztOU8kXdWOWD-OtvRIk0exyKrHq-wcff8MWnP8GMvTT_nY9qnvxh6erOdtC5uQhGyNicRugU4T0NmEgoPBPaWVQi4dJh8aRZRczgHevwTHwSy6ihWM48MBj7_TiI7bdtAs61bZDqEXxDKrGcFA0Qi0VV0d1Pb_8ALyc2hPmGpPB-HgpTUnj5JpkxrQhrWhIKZbUn_2SgNRa3RWnxi0a0yr7zk0L61ZRPaBG9izUIxzj3oH8LP_OcsTkby2XhJdqqAntkVMlvkHMMDNlt0_VX9DWAYgydrl8RX-bx0r4jWxfsZ_eGuEXoCw.zifbqbeI8KAGr-dFKcB-oA',
  'refreshTokenKey' => "Q01152727758997PwQ3G6gLh4tlZYKrH499SSytAMt12r7uKwy",
  'QBORealmID' => "123146096284189",
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
$batch->ExecuteWithRequestID("ThisIsMyFirstBatchRequest");
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
