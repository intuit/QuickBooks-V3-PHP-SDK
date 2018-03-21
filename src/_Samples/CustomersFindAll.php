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
    'auth_mode' => 'oauth2',
    'ClientID' => "Q094uKi203zS1V1ZxH6dyff236cHa2CQhFiXs3JZFjRq1Gmu9f",
    'ClientSecret' => "NacL2Q92jmFEKjycARHEw8qrGGD1fv89OMxbjjbq",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..vnndgB6ep5asUsDzhZgrRA.YdIGb7DxfyKsB1yIp6_Ii2PXw-XveMa6pzWbPwU5YBQ8iJQYffwLaA2BqLDxNHub7rvF6q7BzZPCtcL47OIin-5LIx8g-QJUuAzstO14dP9Y8D-xWS8_qeCmWrVBhNNMrT86lyOmUcLOCIu_60smKUgcH7OnHWlBNYWGaaIis3axtotxkFJ_lqw2MN6kjYsle0PC_d2TWZhSEbrJgXG6_xM9hsU90rk3s2txOk8K_ERFFtRSBWtolNp2T3uhZIstkoRY_Ob_-TwSASEvTa75Av-_IB8v6JquPAEE01fJJotTxPoFszDYLm6agb6RqXVVAoNcqN_1s-DQjJ93ixY6dnMrf9f0vv-GEtfhV_MPwhtF0kGKa2f7k_5T4GPtiC8Pq819wPF9NSen9hHvRNAOd0N4oUjLSddeMEeIaYoLWFckc5VcBKJla59TQpRJWzV_8W7WiCUouRUe2G0V4fc2JHqz8kKFFBx0YH56np8gVwnWUjoVRMnd7l4NWWfKKw8ONhiIyZy8Dva8oFPHnXF1_UaM97nE5szLdIiL8mWP31WWLhvH6PvQ5L8CIsX_C93FaqiGyApMR0c31x8lQUJUyRtiY0ua0rkAIJOr8wdHLBpDCu0qQF-WHOc76Xd6drcElh8_WdT7n9cENnLLu90BLbXafFWhQjNuRzxPFsooc7dsogLQelixxjjLFOrE4oF-.IWkfHVtKf9bsU3Ghk3agMg',
    'refreshTokenKey' => "L011529104721Bb4GIrEKlXQ03Zw8pyGAHSsVxUt3prTKiNoVO",
    'QBORealmID' => "193514718078509",
    'baseUrl' => "Production"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

// Iterate through all Customers, even if it takes multiple pages
$i = 0;
while (1) {
    $allCustomers = $dataService->FindAll('Customer', $i, 500);
    $error = $dataService->getLastError();
    if ($error) {
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
