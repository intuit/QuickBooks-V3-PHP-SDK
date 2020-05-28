<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "ABQaXZTbHvQDB5aq0Gx9yDo8tjgyHxn393oN3uHyTNR6D7qxG5",
  'ClientSecret' => "oyl9ysQw9E8ni5wWg9dBaSDM7mTqRoO5jioAe1B1",
  'accessTokenKey' =>  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0.._4JWEOTm0hAHgyzY4kt6Mg.umlX9YBX1mVm9QM-35kCr4tu0VLlUAm1OM4AKr-VKhHQk1TNyddhlP17X2nFR229ymJcsG3DdLlF6I6kTHImYbUbIlWrx-zfjfVZgvHfetShuy2SQTrQ5C_u3-BZh6I0Btw8f9IjSt4RHoPWCdR2XSzQABZ-EYljWBuO_kUxIRJrShgIK0KspYdO_dDabuXKhjZt7ssnhx98Y0xT5sfwF3k898Nrc_3apRp_RM41XXJbGuCn5QSVlHAI2qUzfjP5dH3EVL_lKBAbmxL2vGr3sFAVlmTkTxTADnys--GQMdqCwCvVYnHUzAXXH6GSDXoezkYonZ4go0ihUlcw7IACM4ngF7y6BOoydLq4kBk1Hbh3MGQX6CqaOaK8vxyn9pDx5uW3NtZHK6XdcjXjhDPwfTA-WfeuDxHJi1QB4ldl6kw7mQfFX2gab6aK6KM6OyiMsFe1NrzpzzTwZ6zbqxr-Ja9Q6qnv4-Pit0LJm_RqryZYZUxuWY6divZ8HvDel_-6Po-NHhVP-wBY57mtcc72Kaxq1W4AJ6BZADqFz9D6VPGDaUy3W_4jx6hdYvU0sQV0JpU0f-HUo3Z4unIyOjylTRJ_V6ZsF2Gd6DHv43pUf3u1mFi7MHxiBRYUbDy3OWxZa8y9SwWzR9hQ8BSysTNZ6BTxML-jKOfdXYzuyGcQlZSmv59LIxWf5pLxxsxLVHgW3pWpKkyBNaisXu1uZcZiiHUNQLtkfwaPFqzRkAloEEU.4aS-ZoQ_DqnwGXTLmAdWfg',
  'refreshTokenKey' => "AB115993527862WxAxxVmKCWTtraTLIRUDvgAij1TuwLgHZKqp",
  'QBORealmID' => "4620816365006687740",
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
