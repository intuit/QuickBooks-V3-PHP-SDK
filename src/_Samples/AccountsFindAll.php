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
         'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..4z4Assj4x1qt8H4DtQco6A.nmV2jTxaDMVdFWEUO16q5qhbd5aD6U-U-RYnSNywqg-HPC_3_jvwpMJU1a1S5X-PgPUy60WvVy_8p1awY7kIoFzTV4IhdFLrZpYtBUGCjcsvjxWeOSgP6oCayBEmCv7zzabtgB6vxU46jQqKX2IXYUGPPtyYO64hrgELFR4SKUK6boZiVnh8z19gnvsReKMmIINA3-NgC6QJqMRp6HWgzCa9RuDN9tCtrAK2dy5xmJRNSNgdv_gyg1bfdX4l4b30fLPzFk31fsTT9NTJq9PuGtdTsvUuCj7Hme6HPldD9TKYRXWU8TKrQQrQWEpdlbPr6F3rhP6IdmCv9t1XH_WzF_1IseRUoYhiTUjubig-j8gzwajIdYQTzpJQKJ92QiAEyt8k40WWg0v69hEC0w7WRBuUE-IJ50xWypqS_P28IWt1G14rovZ97soGOteSik-41g1icR2zxfNhXGq7zO7oU5B8r-ej5Pb52T0MCMktgd6y32bqwo2pcEzblL2bZs7DZ7LDx5peY4TIfGW21crTE6xjhRr7LdqB8K505pRqIOP20eaRgwtGHLZ3bdBt1_negw2AGjc409BM0nLzzmODxr3yo-YdGwkcOjm5QgbGAsrnpoSo9tSpxPHoN0vMRneRdsKCd6CZG5M1OIOMuj7spkm442tvwiAMCx2Fh-STG6fMnhOq7l_f8NW_3kscxtF2.obQxJKjPfi1KlaQQ_OUoNg',
         'refreshTokenKey' => "L011509163184Q0K7DT40SVXhJXAfyoj6B6EbSr3Ty64yVvF5A",
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
