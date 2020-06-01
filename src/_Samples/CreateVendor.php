<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Vendor;

// Prep Data Services
$dataService = DataService::Configure(array(
  'auth_mode'       => 'oauth2',
  'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX..XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  'QBORealmID'      => "xxxxxxxxxxxxxxxxxxx",
  'baseUrl'         => "development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

//Add a new Invoice
$theResourceObj = Vendor::create([
  "BillAddr" => [
        "Line1"=> "Dianne's Auto Shop",
        "Line2"=> "Dianne Bradley",
        "Line3"=> "29834 Mustang Ave.",
        "City"=> "Millbrae",
        "Country"=> "U.S.A",
        "CountrySubDivisionCode"=> "CA",
        "PostalCode"=> "94030"
    ],
    "TaxIdentifier"=> "99-5688293",
    "AcctNum"=> "35372649",
    "Title"=> "Ms.",
    "GivenName"=> "DianneA",
    "FamilyName"=> "BradleyF",
    "Suffix"=> "Sr.",
    "CompanyName"=> "ADianne's Auto Shop",
    "DisplayName"=> "ADianne's Auto Shop",
    "PrintOnCheckName"=> "ADianne's Auto Shop",
    "PrimaryPhone"=> [
        "FreeFormNumber"=> "(650) 555-2342"
    ],
    "Mobile"=> [
        "FreeFormNumber"=> "(650) 555-2000"
    ],
    "PrimaryEmailAddr"=> [
        "Address"=> "Adbradley@myemail.com"
    ],
    "WebAddr"=> [
        "URI"=> "http://ADiannesAutoShop.com"
    ]
]);
$resultingObj = $dataService->Add($theResourceObj);
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
