<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;

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

// Iterate through all Customers, even if it takes multiple pages
$i = 0;
while (1) {
    $allCustomers = $dataService->FindAll('Customer', $i, 500);
    $error = $dataService->getLastError();
    if ($error != null) {
        echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
        echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
        echo "The Response message is: " . $error->getResponseBody() . "\n";
        exit();
    }
    if (!$allCustomers || (0==count($allCustomers))) {
        break;
    }

    foreach ($allCustomers as $oneCustomer) {
        echo "Customer[".($i++)."]: {$oneCustomer->DisplayName}\n";
        echo "\t * Id: [{$oneCustomer->Id}]\n";
        echo "\t * Active: [{$oneCustomer->Active}]\n";
        echo "\n";
    }
}

/*

Example output:

Customer[0]: JIMCO
     * Id: [NG:953957]
     * Active: [true]

Customer[1]: ACME Corp
     * Id: [NG:953955]
     * Active: [true]

Customer[2]: Smith Inc.
     * Id: [NG:952359]
     * Active: [true]


...

*/
