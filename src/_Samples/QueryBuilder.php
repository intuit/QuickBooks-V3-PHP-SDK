<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;
use QuickBooksOnline\API\Data\IPPPurchase;
use QuickBooksOnline\API\QueryFilter\QueryMessage;


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

// Build a query
$oneQuery = new QueryMessage();
$oneQuery->sql = "SELECT";
$oneQuery->entity = "Customer";
$oneQuery->orderByClause = "FamilyName";
$oneQuery->startposition = "1";
$oneQuery->maxresults = "4";

// Run a query
$queryString = $oneQuery->getString();
$entities = $dataService->Query($queryString);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}
// Echo some formatted output
$i = 0;
if ($entities) {
    foreach ($entities as $oneCustomer) {
        echo "Customer[$i] GivenName: {$oneCustomer->GivenName}	(Created at {$oneCustomer->MetaData->CreateTime})\n";
        $i++;
    }
}

/*
Example output:

Customer[0] GivenName: Jimco LLC	(Created at 2013-06-29T22:06:45-07:00)
Customer[1] GivenName: ACME Corp	(Created at 2013-06-29T22:10:18-07:00)
Customer[2] GivenName: Smithco Inc.	(Created at 2013-06-29T22:11:57-07:00)
Customer[3] GivenName: Special Inc.	(Created at 2013-06-29T22:13:34-07:00)
*/
