<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Payment;
use QuickBooksOnline\API\Facades\Invoice;


// Prep Data Services
$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "L0I9uqpOVAXN0MKrK15dCHLWqqfvWzvFS5S0VnKezX0cDbsLlI",
  'ClientSecret' => "qJEjqG3wyzOFvl9WhwSnskJYHWoFlvID7k1iF1as",
  'accessTokenKey' =>
  'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..PInt3iMxbSZpMcxeeIuNGg.6SJGZRcAQFAyyg80yZxryAwtnnso-cj4WjDrEJNekNWwm736YNI9Yse5ogU2g9C6ZarwINv0pLHASNP1H7R7yIIKDRfZrvRpn_wOlFfAZTuc7rA10TptQ-Dcx8O0u5URGtQ80BPJjQDA-k0t3Sq97amuilXgX9Axe6JFvS0dCVpnvo4jA_IS8CPdqEGWV7V1igROgR-Y_AUZT-k-2MozIt9VnMfazN9DHXtuPyFvn0cBdZ-mO-a5_akPwNIWsYBwf6BnhHQ0p4KYplEeuK-iNpM14QRlLG49ShRIpckZtGpu7d4f5GsCva0BXk1FV_mnge5L-jNxKSvYky_R4wt84taCxtMxTiQ63rZfGzr_uQtWqMfxlUN5ehI6uuCIPuR_wWugweMwTe_zTt601jGLW3Osidy5DLaMq3ED_ijuIwRCRlsiKVZ3AeBQS9MLycMZDysjXxBfUyDMl2mp210LbSuirOLGOZFydusng_UZkDseprddbnC2R3EDWfLISPY88H9irrEmmS-vXj0DP25qcqic6W1frND3WlQQffuWv-9v-Zi706i0IS9rWO0pBoBYKFqjqVe_zXwn_BLkn6RqxAY0vOwrrHP_E2wxd3m0lYHzmuyMOcWSAYIoxfLq3mp_zn_j_IvldVWQojfSiALrldBiI0XrfFbtduurxFaiTTA6tx0m9K0SWAfQUlVrMVvluKyUZDwtA1E2z9Ok6LZQKw.oR0umZDSfaqkVS_yTXpwpg',
  'refreshTokenKey' => "AB11587344132yUt2XC8QSUEftZRtBFj7UUVfcjOJLHFET76gb",
  'QBORealmID' => "123145796620484",
  'baseUrl' => "production"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

$dataService->throwExceptionOnError(true);
//Add a new Invoice
$theResourceObj = Payment::create([
  "SyncToken" => "1",
  "Id" => "66",
  "sparse" => true
]);

$resultingObj = $dataService->void($theResourceObj);


$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}

/*
Created Customer Id=801. Reconstructed response body:

<?xml version="1.0" encoding="UTF-8"?>
<ns0:Customer xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:Id>801</ns0:Id>
  <ns0:SyncToken>0</ns0:SyncToken>
  <ns0:MetaData>
    <ns0:CreateTime>2013-08-05T07:41:45-07:00</ns0:CreateTime>
    <ns0:LastUpdatedTime>2013-08-05T07:41:45-07:00</ns0:LastUpdatedTime>
  </ns0:MetaData>
  <ns0:GivenName>GivenName21574516</ns0:GivenName>
  <ns0:FullyQualifiedName>GivenName21574516</ns0:FullyQualifiedName>
  <ns0:CompanyName>CompanyName426009111</ns0:CompanyName>
  <ns0:DisplayName>GivenName21574516</ns0:DisplayName>
  <ns0:PrintOnCheckName>CompanyName426009111</ns0:PrintOnCheckName>
  <ns0:Active>true</ns0:Active>
  <ns0:Taxable>true</ns0:Taxable>
  <ns0:Job>false</ns0:Job>
  <ns0:BillWithParent>false</ns0:BillWithParent>
  <ns0:Balance>0</ns0:Balance>
  <ns0:BalanceWithJobs>0</ns0:BalanceWithJobs>
  <ns0:PreferredDeliveryMethod>Print</ns0:PreferredDeliveryMethod>
</ns0:Customer>
*/
