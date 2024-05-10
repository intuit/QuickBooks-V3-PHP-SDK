<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

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
