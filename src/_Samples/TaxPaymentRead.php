<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPTaxPayment;
use QuickBooksOnline\API\Data\IPPReferenceType;


$dataService = DataService::Configure(array(
      'auth_mode' => 'oauth2',
      'ClientID' => "ABQaXZTbHvQDB5aq0Gx9yDo8tjgyHxn393oN3uHyTNR6D7qxG5",
      'ClientSecret' => "oyl9ysQw9E8ni5wWg9dBaSDM7mTqRoO5jioAe1B1",
      'accessTokenKey' =>  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..6pMovzpSpoNsgy7z5gTY0w.u32jONYb1BdbCz17HlgtR2ALYPon_zvu-Y7bN--IuFMvi6j7XbzSC_Sq2CJ-fC7ah2qvckGV423_zpR5hvSuZZj91i2pT-Nn02A4gn0Qa8xBRbYp25q7e1HQeBfDKVvXqtu1jp-eYVw3I_pLIo_9vFenWhXDhCIeX_F7h_SdwSTg5NBns-fbEeJjtQIzBb32OPiR5GF3jdlVWKkbD4coWK5eECX_zc_NqzRf90Pi-Qa0lRUiDjzhc_kFpOEw_769Z5QzyKwoUKMSpX9DlBRR1VOnZ65-_bo4vjR4vexG7C9bnDRnT57mAQCjsXpNHh30Dh8R6LG2ouOpH6r95VNXj9AcqH0Yz17oKqgN2ybdE7ZGvNhvUZ5mH2vvOzQA0atJ21V_f9NlyjTAGqMC8ElqbnMWpjoadI9hKm6czBvjGzrP74k6bTvUfMVgUm5o3Fv5fZFqhSB_wjVq3VZ22IlgvuCnGvMP5JCJFGYkDw7jIuZ-_Csc3xs8F6Gp-xpIpVTD_shZGiyJzaoVFpUVHOILz33fT6Y8tK2jkBZWx5qMFcOg5yJIVwhJuPP-s6-ITLKCrQEDoUq2s9jCS1bJrVx0w01JTxIUqSZ1fa7o5a0aglpCfhK1fR93Gzm9DhminAsLP4bPk3AiasDW4NRYkJvVKBWlAdtCUNN5I3I0wuLEAsJohuoMeOSiwCljrzoD8xRZ5RIF49ejXzbRkx6ElL54Sfsz6grbywb0tXrwI8gAFgw.ph40cT69OamUtVWrxUx4Ew',
      'refreshTokenKey' => "AB11592103437dnbIY7IzrGzuWKWpmcmeNETNFUdzmz0290S2Z",
      'QBORealmID' => "4620816365037746310",
      'baseUrl' => "development"
    ));

$dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");

// Iterate through all Accounts, even if it takes multiple pages
$i = 1;
while (1) {

  $taxPayment = new IPPTaxPayment();
  $taxPayment->Id = 174;

  $result1 = $dataService->FindById($taxPayment);

  $result2 = $dataService->FindById("TaxPayment", 173);

  echo "\n Result id is: " .$result1->Id . "\n \n";
  echo "\n Result id is: " .$result2->Id . "\n \n";
  $error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    var_dump([$result1, $result2]);
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
