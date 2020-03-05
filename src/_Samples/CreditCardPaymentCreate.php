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
      'accessTokenKey' =>  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..cPqdQNffhx2nig6znQekUA.mB3fxjqhLE1AgbcB7bxv9WxS1W8To0eFO9bpkmiO4XHcqjari0Pwxuuj9LqEalgxCKRre0RtW5W5iT89-YLr6rmx57Sj-ML1I3x6jk2d2fZectYuwHyERPqHMPyODZxcHFvPBSi5EL4NHck_R60JMHPhfLmH57gtcUO16iAs2U4J008gVZQ3v42c2qUtn7ZqUJNkAPcW75Uuh3Hq4njerqBqLKlQ3TGdEL1MZlxTy1O1c5zLM4Fb-P2IoPAp8RZxITUOc-uZg7BVQ0RVkC8V_gT2ooljfMTcS0Lwh9-IBOuPgo8SdXDXZ8oRes5vx_F1sMNBw5BzX5laX1U_Ot-l1LWc2w8XF3_mUpH6wiTSoxxzz5o2vhsuRmS8UcdQTsnhFiskvquW3bvAbh85c0tc4H82Uop3W_3kIdiFC64ZN4evDcXsMOjTXe9LNne8vw6gCzRX4L6Wx0wCS9AE80xKahW_qzoNTTxkbsIZh6ScQmBeXYpOeE8KHFYbk9-af2cc9ctG0J3u-dka3XLUNis6rg-hTmxPsYx6HUWXEQ0laCNrVeHWIsv6yvkuqkPvll8QSBsm5x_b33bNwuFTV0CQqaixC-xkzUCIv8JbDIbsVewMN-GXxRxp_17oCY69joF5HIAu-5NjRjpIRrU36uPJj6_0clBrFVwOtYGAT-zvqRnKPiUMQqRJ8T3TaNHIrQBy1S8O10xPVskaBHDPD638tTp73DlDgjxlwMaKTpXQlnI.UmSkfwDljLJJw6aVQOimAg',
      'refreshTokenKey' => "AB11592100222CtcTHTZItiMfHgtdtCQW6tv6iKH7PzgpvZdAS",
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
  $ccp->TxnDate = "2019-10-15";

  $BankAccountRef = new IPPReferenceType();
  $BankAccountRef->value = "35";
  $BankAccountRef->name = "null";
  $ccp->BankAccountRef = $BankAccountRef;

  $CreditCardAccountRef = new IPPReferenceType();
  $CreditCardAccountRef->value = "41";
  $CreditCardAccountRef->name = "null";
  $ccp->CreditCardAccountRef = $CreditCardAccountRef;
  $ccp->Amount = 10;

  $result = $dataService->add($ccp);

  echo "\n Result id is: " .$result->Id . "\n \n";
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
