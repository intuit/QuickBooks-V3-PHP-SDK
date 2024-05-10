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
  'ClientID'        => "XXXXXXXXXX",
  'ClientSecret'    => "XXXXXXXXXX",
  'accessTokenKey'  => "XXXXXXXXXX",
  'refreshTokenKey' => 'XXXXXXXXXX',
  'QBORealmID'      => "XXXXXXXXXX",
  'baseUrl'         => "development"
));

$dataService->setLogLocation("/Users/XXXXXXXXX/Desktop/newFolderForLog");

// Run a query
$entities = $dataService->recurringTransaction("SELECT * FROM RecurringTransaction");
if (count($entities) > 0) {
    $i = 0;
    var_dump($entities);
}