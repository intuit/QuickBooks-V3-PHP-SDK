<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPCreditCardPaymentTxn;
use QuickBooksOnline\API\Data\IPPReferenceType;


$dataService = DataService::Configure(array(
      'auth_mode' => 'oauth2',
      'ClientID' => "ABQaXZTbHvQDB5aq0Gx9yDo8tjgyHxn393oN3uHyTNR6D7qxG5",
      'ClientSecret' => "oyl9ysQw9E8ni5wWg9dBaSDM7mTqRoO5jioAe1B1",
      'accessTokenKey' =>  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..DuLVn_D6oQ-wzYpB8pHKdg.yfA_Z4QcdxKy9It0uDqI_GXID6kRCUePOCXQzVuLqgXtOKG4mc-DjLfsZvN_dl9c315xF8damPVcVRCheHOCpu7VZyztc_9oDc0V8WTE4zFPyvPRwbzNiDUIyLBRj9CwuMP9QXgXqIdsDIHYkidJSBgQlEnhJaocC35QHFCpsF1f6Qxra76uC2dulcvqYpWsZWSvvYRly9thXaA0LDM5dV1O6VGSuQ4xyUewk9hbL0Em7LAVgud9fx6F69JvFjxPtM0RYWFguvxV9IhV3h0Eb2-eSub6B7dMxXVq6-K1X09VDw3NUFYbtlBIzlfmNHYBpU4oY7NdZZ0w7e3MSpHHpSKtYMU-Ux1qpQ_J9O8eC4N2DZrk50AF5_sx3710BT-ehjsu0dV1ie6_3fGzGjnORWccqepmW0_cYNWjyeAfWtjq2MLDCFE51gLhH-E8Mc8umOAq0cMFHwaC7TxsphstfSap9fNbndyD2p_8MknZuR217A45I42VJjv1Q4eB9L6LNLGlmDkXQWWiuHsTiZqgIQac_0idn38qP97y0mlEET0VJ8gYcqkQE-toGSuDVPK3rtfEOf01lCrni5HU5WxEc7C8b5UWp6hu15gh7TVXsfiAjNyxB4HM6J9flq3YZnYD6jwB_eEvYV_bTKsNTeCJ8cbxjy9ZKOHlk7GcgMzmROF2F5hBu5DQ4zqP-9su9UYivjeRdrxSK1uYc3YHhDKjY4KWUll3rBuNLYwomCN3IhM.SlNfwiJKlCuB78Tlic3WWw',
      'refreshTokenKey' => "AB11592029660juiMaK6LLvNzAwJtJU2y2MVxXgmOylKA2q2G0",
      'QBORealmID' => "4620816365026056700",
      'baseUrl' => "development"
    ));

$dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");


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


$dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");

// Iterate through all Accounts, even if it takes multiple pages
$i = 1;
while (1) {

  $ccp = new IPPCreditCardPaymentTxn();
  $ccp->Id = "157";
  $ccpObj = $dataService->FindById($ccp, "157");

  echo "\n Value before update is: " . $ccpObj->CreditCardAccountRef . "\n \n";

  $ccpObj->CreditCardAccountRef = 41;
  $result = $dataService->Update($ccpObj);

  echo "\n Value after update is: " . $result->CreditCardAccountRef . "\n \n";
  $error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    var_dump($result);
}
  exit;  
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
