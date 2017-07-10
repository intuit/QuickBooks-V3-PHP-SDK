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
         'consumerKey' => "qyprdQeRsU0OsSOCTSuW5AXk9vX9zO",
         'consumerSecret' => "XEMeUBjCTe6p2La5W7Rxs4TIxAeaaRpTRaI6Omf2",
         'accessTokenKey' => "qyprdDmNTnw0NGHlV06qMNxaVbpjwufIEiCA4ovwYJfEGyhg",
         'accessTokenSecret' => "cq3iOkgECsObGSlutChdmyZTVuCoQ5oqxUTW4tRY",
         'QBORealmID' => "123145730633004",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$serviceContext = $dataService->getServiceContext();
//Add a new Invoice
$platformService = new PlatformService($serviceContext);
$result = $platformService->Disconnect();
//QBO will always return 200 on status code, so look into the error msg
var_dump($result);
