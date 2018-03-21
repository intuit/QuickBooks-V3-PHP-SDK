<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;


$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "Q0lCkcEshsGMHOEula2r5RKc2yhxvMsYEpKN1lw1WZwyfd1Si6",
  'ClientSecret' => "gE0F9hLgwx9OBzRpNxyOvWJH6L2fIhzAwBugPJHq",
  'accessTokenKey' =>  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..TXebi6e9BC-aOzSI7M4WUw.Z62GmowY3D_OmnkbWm-iFYssdFAxGHpAvmrj77rpe2d03ja713TOMidKHjooCTkSEplTyqwT9q4LEYgvZRgMGFogGQ2uG3HaiLOphPb32HWC4nEOdRdXwxIaevOw-dcXn1nVFxI7S0aTPrb39H3cmL0UOvNin6DFi_nNG-E58bUEMe-5AwLjFp36FZTBoKg6egCWyyUBXAQFnwLqlUbtqxq_0q2hSTS1TOmD65Fd48iisJHp7VecYcpUEUqaiW4Wo9VtcSvQu4HD9iuE1pZ5Rp4tliyerV7k2jqUrvLDCKxng2AMCcvDUknFu5aDz8o_0OAjBEAfO46VcJwLScHgHqPSSmwv5tbmppZCah_GEoiFTw6yLquDLX5wc-eK9vf8lxYJTOoiy6PvCIMUj_644R8r9rTzbZb8sCqI5_atk9RfKfA9h7cZyYCMUph_JLvVMnGj-V8NvgLdrDe5SDu9kheRZ_tmul4Rae7tTJ7-r5j1s5YcvWtmCM5yw7iXSeX8s7O7ch9LMkm0IV499g_FbHqfr11Ux9iZ2ML36mzc-c6epzuMBrrZJMnU4w_N4nnbOznN-10X6JP4mv072aTBVgupTnagpzCv8TR5rGAilDWOw88uTIAJw6vQIahuJF4KimNlM2tEhTYzRWeDwGdP0PZel2FBJoMhywsj4XT5MExplHoDu-34_iOuc3eUwDfB.YIF5Hdre3QgkIh7S1JsClA',
  'refreshTokenKey' => "L011511574974fGhEsYBWdVTxHcvSpp5fk2ucEeVVACWUU3JkT",
  'QBORealmID' => "123145857569084",
  'baseUrl' => "development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");


$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

$accessToken = $OAuth2LoginHelper->refreshToken();
$error = $OAuth2LoginHelper->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    return;
}
$dataService->updateOAuth2Token($accessToken);


$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

// Iterate through all Accounts, even if it takes multiple pages
$i = 1;
while (1) {
    $allAccounts = $dataService->FindAll('Account', $i, 500);
    $error = $dataService->getLastError();
    if ($error) {
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
