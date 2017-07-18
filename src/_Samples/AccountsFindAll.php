<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

// Prep Data Services
/*
$dataService = DataService::Configure(array(
       'auth_mode' => 'oauth1',
         'consumerKey' => "lve2eZN6ZNBrjN0Wp26JVYJbsOOFbF1",
         'consumerSecret' => "fUhPIeu6jrq1UmNGXSMsIsl0JaHuHzSkFf3tsmrW",
         'accessTokenKey' => "qye2etcpyquO3B1t8ydZJI8OTelqJCMiLZlY5LdX7qZunwoo",
         'accessTokenSecret' => "2lEUtSEIvXf64CEkMLaGDK5rCwaxE9UvfW1dYrrH",
         'QBORealmID' => "123145727942829",
         'baseUrl' => "https://qbonline-e2e.api.intuit.com/"
));

*/
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Q0lCkcEshsGMHOEula2r5RKc2yhxvMsYEpKN1lw1WZwyfd1Si6",
         'ClientSecret' => "gE0F9hLgwx9OBzRpNxyOvWJH6L2fIhzAwBugPJHq",
         'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..2A8sAgD1oVGJaovNRpUOtQ.4kDdLuDZBis2rk035s1wFQUsK7rG6MzexKc8raeLsQbrym3Q3IZHoIhEFZZD3zhVGwvWXDhQIcKOj0YeJTFoNjmNb-fhncFuCHvQ2hbyRTS94TP7V4tHItQOKLOuXyZ2g5sAkXKQcCa2UuC5pdiFOHGovyH_ArwWPGt0ILqYDp0me8e_a4uDBdvvryaP7tApkuDOsx77BMoILUOZvRhLmpGI_USBhh6IiSvTp15RsIugXBzwp9cgxs1e13RdWKd3M26Y4hqBp7yGsnESRAqlTEtXbMQHMyBEtuBsrF4Y7E2-mE1TkQJty6BNR-ybgDZJZ2ZwrXZun-UTqyxmQvpdvd85ZgIXVfSf3IOHyOeR8FUhY5UpTKjpgGYOv4HZee0_NrN-9FMl-xZaHjEfq0QZLoeVJmYyRSVGXSVpAzFQO9EuQ6EfM6-ISz4vzeL5ORBq3giiXCnON9B0Hu5vGTWzB5DyP-17U2ekVMEaNQP8UjmDYoPijD16SJT2bi6rK0Ra52Xdb2sODEQL2Ei1Fyh-bK6Rqp8IpLlVbps1i3i6bA5UpR4hhAX3DDrz0sxHEF12HmEmBAEnjHdSrj1uEQYjapxdghr5tROmQrVdKKUA8dXSixa_2BS82lKWsbQD-WJ75YWDnQgqCu9Hk7UL68m4v-BXKf62PaWX28TOigWneEvPIDRGvIY9oxVIMkTvKKnp.pQZImFgCTVSj5urAUt-1nw',
        'refreshTokenKey' => "Q0115090826043l7H5cupxrBYHKEJ5JIgXRPSKQffXMjOrs6Ry",
         'QBORealmID' => "123145857569084",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));


$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

// Iterate through all Accounts, even if it takes multiple pages
$i = 1;
while (1) {
    $allAccounts = $dataService->FindAll('Account', $i, 500);
    $error = $dataService->getLastError();
    if ($error != null) {
        echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
        echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
        echo "The Response message is: " . $error->getResponseBody() . "\n";
        exit();
    }

    if (!$allAccounts || (0==count($allAccounts))) {
        break;
    }

    foreach ($allAccounts as $oneAccount) {
        echo "Account[".($i++)."]: {$oneAccount->Name}\n";
        echo "\t * Id: [{$oneAccount->Id}]\n";
        echo "\t * AccountType: [{$oneAccount->AccountType}]\n";
        echo "\t * AccountSubType: [{$oneAccount->AccountSubType}]\n";
        echo "\t * Active: [{$oneAccount->Active}]\n";
        echo "\n";
    }
}

/*

Example output:

Account[0]: Travel Meals
     * Id: NG:42315
     * AccountType: Expense
     * AccountSubType:

Account[1]: COGs
     * Id: NG:40450
     * AccountType: Cost of Goods Sold
     * AccountSubType:

...

*/
 ?>
