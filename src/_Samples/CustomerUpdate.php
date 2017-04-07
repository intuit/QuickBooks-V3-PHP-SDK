<?php

require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

//Specify QBO or QBD
$serviceType = IntuitServicesType::QBO;

// Get App Config
$realmId = ConfigurationManager::AppSettings('RealmID');
if (!$realmId) {
    exit("Please add realm to App.Config before running this sample.\n");
}

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext) {
    exit("Problem while initializing ServiceContext.\n");
}

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService) {
    exit("Problem while initializing DataService.\n");
}

// Add a customer
$customerObj = new IPPCustomer();
$customerObj->Name = "Name" . rand();
$customerObj->CompanyName = "CompanyName" . rand();
$customerObj->GivenName = "GivenName" . rand();
$customerObj->DisplayName = "DisplayName" . rand();
$resultingCustomerObj = $dataService->Add($customerObj);
echo "Created Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
echo $xmlBody . "\n";


// Update Customer Obj
$resultingCustomerObj->GivenName = "New Name " . rand();
$resultingCustomerUpdatedObj = $dataService->Add($resultingCustomerObj);
echo "\n" . "Updated Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerUpdatedObj, $urlResource);
echo $xmlBody . "\n";



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
