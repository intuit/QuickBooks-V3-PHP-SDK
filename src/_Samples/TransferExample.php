<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Transfer;

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
$dataService->useJson();
$transfer = Transfer::create([
  "FromAccountRef" => [
      "value" => "35",
      "name" => "Checking"
  ],
  "ToAccountRef" => [
      "value" => "36",
      "name" => "Savings"
  ],
  "Amount" => "120.00"
]);

$result = $dataService->Add($transfer);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}
echo showMe($result);
print_r($result);

################################################################################
# Domain Objects example                                                       #
################################################################################
/**
 * Output function
 */
function showMe($entity)
{
    $className = get_class($entity);


    return <<<OUTTEXT
Hi!
I am an instance of $className object.
And I state that transfer was perfromed from "{$entity->FromAccountRef->name}" (id={$entity->FromAccountRef->name})
to "{$entity->ToAccountRef->name}" (id={$entity->ToAccountRef->name}) in amount \${$entity->Amount}

My id is {$entity->Id} and this was for {$entity->domain} domain.

See my whole object:

OUTTEXT;
}
