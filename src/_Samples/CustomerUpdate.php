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
  'auth_mode'       => 'oauth2',
  'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX..XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  'QBORealmID'      => "xxxxxxxxxxxxxxxxxxx",
  'baseUrl'         => "development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

$entities = $dataService->Query("SELECT * FROM Customer where Id='48'");
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

if(empty($entities)) exit();//No Record for the Customer with Id = 48

//Get the first element
$theCustomer = reset($entities);
$updateCustomer = Customer::update($theCustomer, [
    //If you are going to do a full Update, set sparse to false
    'sparse' => 'false',
    'DisplayName' => 'Something different'
]);
$resultingCustomerUpdatedObj = $dataService->Update($updateCustomer);
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerUpdatedObj, $urlResource);
echo "Completed a Sparse Update on {$resultingCustomerUpdatedObj->Id} - updated object state is:\n{$xmlBody}\n\n";




/*
Created Customer Id=519. Reconstructed response body:

<?xml version="1.0" encoding="UTF-8"?>
<ns0:Customer xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:Id>519</ns0:Id>
  <ns0:SyncToken>0</ns0:SyncToken>
  <ns0:MetaData>
    <ns0:CreateTime>2013-08-18T10:39:45-07:00</ns0:CreateTime>
    <ns0:LastUpdatedTime>2013-08-18T10:39:45-07:00</ns0:LastUpdatedTime>
  </ns0:MetaData>
  <ns0:GivenName>GivenName588312171</ns0:GivenName>
  <ns0:FullyQualifiedName>GivenName588312171</ns0:FullyQualifiedName>
  <ns0:CompanyName>CompanyName305463250</ns0:CompanyName>
  <ns0:DisplayName>GivenName588312171</ns0:DisplayName>
  <ns0:PrintOnCheckName>CompanyName305463250</ns0:PrintOnCheckName>
  <ns0:Active>true</ns0:Active>
  <ns0:Taxable>true</ns0:Taxable>
  <ns0:Job>false</ns0:Job>
  <ns0:BillWithParent>false</ns0:BillWithParent>
  <ns0:Balance>0</ns0:Balance>
  <ns0:BalanceWithJobs>0</ns0:BalanceWithJobs>
  <ns0:PreferredDeliveryMethod>Print</ns0:PreferredDeliveryMethod>
</ns0:Customer>


Updated Customer Id=519. Reconstructed response body:

<?xml version="1.0" encoding="UTF-8"?>
<ns0:Customer xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:Id>519</ns0:Id>
  <ns0:SyncToken>1</ns0:SyncToken>
  <ns0:MetaData>
    <ns0:CreateTime>2013-08-18T10:39:45-07:00</ns0:CreateTime>
    <ns0:LastUpdatedTime>2013-08-18T10:39:46-07:00</ns0:LastUpdatedTime>
  </ns0:MetaData>
  <ns0:GivenName>New Name 307355046</ns0:GivenName>
  <ns0:FullyQualifiedName>GivenName588312171</ns0:FullyQualifiedName>
  <ns0:CompanyName>CompanyName305463250</ns0:CompanyName>
  <ns0:DisplayName>GivenName588312171</ns0:DisplayName>
  <ns0:PrintOnCheckName>CompanyName305463250</ns0:PrintOnCheckName>
  <ns0:Active>true</ns0:Active>
  <ns0:Taxable>true</ns0:Taxable>
  <ns0:Job>false</ns0:Job>
  <ns0:BillWithParent>false</ns0:BillWithParent>
  <ns0:Balance>0</ns0:Balance>
  <ns0:BalanceWithJobs>0</ns0:BalanceWithJobs>
  <ns0:PreferredDeliveryMethod>Print</ns0:PreferredDeliveryMethod>
</ns0:Customer>
*/
