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
       'auth_mode' => 'oauth1',
         'consumerKey' => "qyprdUSoVpIHrtBp0eDMTHGz8UXuSz",
         'consumerSecret' => "TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7",
         'accessTokenKey' => "lvprdBYrv22L2vEsSRJgcAeljxRkKdh0QLcYJDWcBU2GXVDE",
         'accessTokenSecret' => "T7F4DzbdU0bWWK5qIjZGEVhZEQytDEUM2XYASKnE",
         'QBORealmID' => "193514340994122",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));

/*
$dataService = DataService::Configure(array(
       'auth_mode' => 'oauth2',
         'ClientID' => "Q0lCkcEshsGMHOEula2r5RKc2yhxvMsYEpKN1lw1WZwyfd1Si6",
         'ClientSecret' => "gE0F9hLgwx9OBzRpNxyOvWJH6L2fIhzAwBugPJHq",
         'accessTokenKey' => "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..JeoaEgWW8VjXoBfGABrGkQ.f0XFa7IKDumJ4fLhUPhnnFsZD2Rkon7t_kTcWJyrb1_4RLU4s8L5RB714Kw8zcc0Q5Bn48gGvLcotO6uKY2_MQ_D9l2RGUCO5NsFRAgr4NN4FO6WK-3sJp454Ck7AawoR86INEYW5GYFzgvqFwguQE9h4P0G1_6Ve3_3Vo8sjDKRXIY39SjT_3FfrShhsDSJXUCTahBE32wYYHltEQdy-Z4hRHVDjB4NM5sGaxsoWdpAzKhp60RC3xSV6IhniyJiGA-_DyzXVEhT7lORD50QJU-gwn1dmHB3MlfJryO4U-kMA3hrE6EXhgld6xQ27cUBERthObs2aV22tT-_0ZznwYUrFA9lbBWP5tK_KpzvcHsAD0ujQvaXEFqSemrm9KiPCT-7ZvZZR0bRd2cbL0tQ44PxsVe2I2d7QwZIJqa6U0DAl1GALlaNgkF96JToxiI8NRrndZoEYDvepa8cf6PVt2O8KUwmmeTvpjgkQ7ucX68e81xN9R19MdAj8Mu46i40k-m4VK1UPpZ_cGuqLQojFiOerivOy_hJjalo2KWdLQYD9N_s5dfLH_BAB1ElVz5dPHz1aIPe_sxvc2VQEBkCu4xtmE0g4oLNszhD_Kh7-U7hK6RA5y7RQUGaZ1L05-9YIi5-XBx4FuVkYK3MZTqbHf9cmq6asAGvNNRKVe5mXOZeskZp25OUVU-QUHfFo_Pd.Rq4OPgznx4GamOXKam6Y1g",
         'refreshTokenKey' => 'Q01150906066615eVPaXZ1bJn7WhLJVu1cN0ngQXZeI5X1QziK',
         'QBORealmID' => "123145857569084",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));
*/
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");


// Add a customer
$customerObj = Customer::create([
  "BillAddr" => [
     "Line1"=>  "123 Main Street",
     "City"=>  "Mountain View",
     "Country"=>  "USA",
     "CountrySubDivisionCode"=>  "CA",
     "PostalCode"=>  "94042"
 ],
 "Notes" =>  "Here are other details.",
 "Title"=>  "Mr",
 "GivenName"=>  "Evil",
 "MiddleName"=>  "1B",
 "FamilyName"=>  "King",
 "Suffix"=>  "Jr",
 "FullyQualifiedName"=>  "Evil King",
 "CompanyName"=>  "King Evial",
 "DisplayName"=>  "Evil King",
 "PrimaryPhone"=>  [
     "FreeFormNumber"=>  "(555) 555-5555"
 ],
 "PrimaryEmailAddr"=>  [
     "Address" => "evilkingw@myemail.com"
 ]
]);
$resultingCustomerObj = $dataService->Add($customerObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    var_dump($resultingCustomerObj);
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
