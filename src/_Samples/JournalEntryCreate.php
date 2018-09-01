<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\JournalEntry;
// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..qMhDp-FoKX9dtjmkN62gpQ.VmnY8diZN3FNxI5Wz1axd70pkexOZU9vrimA8PvGDdshOP9OmpA6TsqhxggYf631Q_77zGKDQW2-feNZFKan7jDakTsCUoZCYn9N3RRGy8CI4NVeGfgMJokqhK6rxxcajdjBqQ5EDS_uJKEAPUEfJ1JzEcEHF7Yyp0e6Mj13pkNtvFNTmyvmIoLOU9dfwWbDlvPxJFm_bpjPXM8m4-3wzIr0AXMDqjNlmCZpht9-W5r_UtkkZ66O4Ob06gFGt2t2NYU7jCrW_hOhQwM1urtRjusb9aTh7jElohX7yIipfWyU4nLUIC4QeZOOuKgphuYyej3PgbuoQQCgf0rEvyZ_gkpfmITB684m596RUhiVMvZYPPGd578qcMMwTawpf1fl9bh5p7uvS0izIoGAWWh-l16Gm8al2nJ9_iMIsnNpCPTFuVglu5fckCciByjlOz60OMJHWI0M3uhHu6-22VpUzNpOp3rZ6DDkeVLPWh6KVYDc2JeDJMHkt4TaDK0yb9Xu4qDY-ZPKXAY4eZocdZSTelmldTqXC1oq2E2-HmuGQRuMWdlMzM1UyF8GPlOztTwpuP9GSsfWZJ-TY85Hhv623zcmNYbk21c1YpGryJ-PN4KCRnjaLahlj2pBiPn4_HpYC9z_FrR2G1tzIR-RgZTq2qx47Ppuv5iAPWwQR222aKqVg2XruBsjusU7Ks0wLWp3.VzeZzhi19SkswkLvuXmw9g',
    'refreshTokenKey' => "L011530994357pUIdF4rZSpMC5XCZ2TV4ypu4pOpfen4VRvYzl",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$dataService->throwExceptionOnError(true);
$theResourceObj = JournalEntry::create([
    "Line" => [
    [
      "Id" => "0",
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Debit",
        "Entity" => [
           "Type" => "Vendor",
           "EntityRef" => [
               "value" => "something",
               "name" => "somethingelse"
           ]
        ],
        "AccountRef" => [
            "value" => "39",
            "name" => "Opening Bal Equity"
        ]
     ]
    ],
    [
      "Description" => "nov portion of rider insurance",
      "Amount" => 100.0,
      "DetailType" => "JournalEntryLineDetail",
      "JournalEntryLineDetail" => [
        "PostingType" => "Credit",
        "Entity" => [
           "Type" => "Vendor",
           "EntityRef" => [
               "value" => "something",
               "name" => "somethingelse"
           ]
        ],
          "AccountRef" => [
            "value" => "44",
            "name" => "Notes Payable"
          ]
      ]
    ]
  ]
]);

var_dump($theResourceObj);
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
