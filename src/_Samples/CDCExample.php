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
         'consumerKey' => "qyprdUSoVpIHrtBp0eDMTHGz8UXuSz",
         'consumerSecret' => "TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7",
         'accessTokenKey' => "qyprdxUakMagH93t01x1Z5wmIfIy3OiZcTqzI2EALXqhOaGE",
         'accessTokenSecret' => "QqQhCSvDgMvnJmoMbXI5d9TIVj9wKU1w4yIEaFNC",
         'QBORealmID' => "193514340994122",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

// Use CDC APIs
$entityList = array('Customer','Vendor');
$date = strtotime("-10 day");
$changedSince = date("Y-m-d", $date); // 10 days ago

$cdcResponse = $dataService->CDC($entityList, $changedSince);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

if ($cdcResponse->entities) {
    foreach ($cdcResponse->entities as $entityName => $entityArray) {
        echo "CDC Says " . count($entityArray) . " Updated Entities of Type = {$entityName}\n";
    }
}

/*
Example output:

CDC Says 318 Updated Entities of Type = Customer
CDC Says 278 Updated Entities of Type = Vendor
*/
