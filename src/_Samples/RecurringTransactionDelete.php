<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\DataService\RecurringTransactionAdapter;

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

// Provide the Id for the recurringTrasanction
$recurringTxn = $dataService->findRecurringTransactionById( 251);

// Provide the resposne from findRecurringTransactionById to delete
$resultingObj = $dataService->deleteRecurringTransaction($recurringTxn);

$error = $dataService->getLastError();

if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "\n Recurring Transaction Deleted: Below is the Raw Response \n";
    print_r($resultingObj) . PHP_EOL;
    // Example to show how to create an xml for the Entity : Invoice. Replace with the specific entity Name accordingly : ex : Bill, Estimate, SalesReceipt etc
    $xmlBody = RecurringTransactionAdapter::createRecurringTransactionObject($resultingObj->entities['Invoice'][0]);
    $xmlBody = RecurringTransactionAdapter::getRecurringTxnBody($xmlBody);
    echo "Recurring Transaction Deleted: Below is the XML Response \n";
    echo $xmlBody . "\n";
}

/*
Recurring Transaction Deleted: Below is the XML Response

<?xml version="1.0" encoding="UTF-8"?>
<ns0:RecurringTransaction xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:Invoice>
    <ns0:Id>251</ns0:Id>
  </ns0:Invoice>
</ns0:RecurringTransaction>
 */