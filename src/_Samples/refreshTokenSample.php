<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'accessTokenKey' =>  'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  'refreshTokenKey' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'QBORealmID' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));
$dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");

$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
$OAuth2LoginHelper->setLogForOAuthCalls(true, false, "/Users/bsivalingam/Desktop/newFolderForLog");

$accessToken = $OAuth2LoginHelper->refreshToken();
$error = $OAuth2LoginHelper->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    return;
}
$dataService->updateOAuth2Token($accessToken);

$CompanyInfo = $dataService->getCompanyInfo();
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    $nameOfCompany = $CompanyInfo->CompanyName;
    echo "Test for OAuth Complete. Company Name is {$nameOfCompany}. Returned response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($CompanyInfo, $somevalue);
    echo $xmlBody . "\n";
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
