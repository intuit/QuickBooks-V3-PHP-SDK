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
if (!$realmId)
	exit("Please add realm to App.Config before running this sample.\n");

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");

// Add a customer
$customerObj = new IPPCustomer();
$customerObj->Name = "Name" . rand();
$customerObj->CompanyName = "CompanyName" . rand();
$customerObj->GivenName = "GivenName" . rand();
$customerObj->DisplayName = "DisplayName" . rand();
$resultingCustomerObj = $dataService->Add($customerObj);
echo "Created Customer Id={$resultingCustomerObj->Id}.\n\n";

//
// Sparse Update Customer Obj
//
//  * Change the value of an element
//  * Turn on the 'sparse' flag
//  * unset some element that you've decided to suppress from the Sparse Update
//  * Check response body and see that the suppressed element's prior value lives on (desirable)
//
$resultingCustomerObj->GivenName = "New Name " . rand();
$resultingCustomerObj->sparse = 'true';
unset($resultingCustomerObj->PrintOnCheckName); // remove some elements that would normally be present
$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
echo "About to do a Sparse Update on {$resultingCustomerObj->Id}:\n{$xmlBody}\n\n";
$resultingCustomerUpdatedObj = $dataService->Update($resultingCustomerObj);
$xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerUpdatedObj, $urlResource);
echo "Completed a Sparse Update on {$resultingCustomerObj->Id} - updated object state is:\n{$xmlBody}\n\n";



/*
Created Customer Id=1139.

About to do a Sparse Update on 1139:
<?xml version="1.0" encoding="UTF-8"?>
<ns0:Customer xmlns:ns0="http://schema.intuit.com/finance/v3" sparse="true">
  <ns0:Id>1139</ns0:Id>
  <ns0:SyncToken>0</ns0:SyncToken>
  <ns0:MetaData>
    <ns0:CreateTime>2013-08-26T10:25:55-07:00</ns0:CreateTime>
    <ns0:LastUpdatedTime>2013-08-26T10:25:55-07:00</ns0:LastUpdatedTime>
  </ns0:MetaData>
  <ns0:GivenName>New Name 860282650</ns0:GivenName>
  <ns0:FullyQualifiedName>GivenName1429529389</ns0:FullyQualifiedName>
  <ns0:CompanyName>CompanyName491310918</ns0:CompanyName>
  <ns0:DisplayName>GivenName1429529389</ns0:DisplayName>
  <ns0:Active>true</ns0:Active>
  <ns0:Taxable>true</ns0:Taxable>
  <ns0:Job>false</ns0:Job>
  <ns0:BillWithParent>false</ns0:BillWithParent>
  <ns0:Balance>0</ns0:Balance>
  <ns0:BalanceWithJobs>0</ns0:BalanceWithJobs>
  <ns0:PreferredDeliveryMethod>Print</ns0:PreferredDeliveryMethod>
</ns0:Customer>


Completed a Sparse Update on 1139 - updated object state is:
<?xml version="1.0" encoding="UTF-8"?>
<ns0:Customer xmlns:ns0="http://schema.intuit.com/finance/v3">
  <ns0:Id>1139</ns0:Id>
  <ns0:SyncToken>1</ns0:SyncToken>
  <ns0:MetaData>
    <ns0:CreateTime>2013-08-26T10:25:55-07:00</ns0:CreateTime>
    <ns0:LastUpdatedTime>2013-08-26T10:25:56-07:00</ns0:LastUpdatedTime>
  </ns0:MetaData>
  <ns0:GivenName>New Name 860282650</ns0:GivenName>
  <ns0:FullyQualifiedName>GivenName1429529389</ns0:FullyQualifiedName>
  <ns0:CompanyName>CompanyName491310918</ns0:CompanyName>
  <ns0:DisplayName>GivenName1429529389</ns0:DisplayName>
  <ns0:PrintOnCheckName>CompanyName491310918</ns0:PrintOnCheckName>
  <ns0:Active>true</ns0:Active>
  <ns0:Taxable>true</ns0:Taxable>
  <ns0:Job>false</ns0:Job>
  <ns0:BillWithParent>false</ns0:BillWithParent>
  <ns0:Balance>0</ns0:Balance>
  <ns0:BalanceWithJobs>0</ns0:BalanceWithJobs>
  <ns0:PreferredDeliveryMethod>Print</ns0:PreferredDeliveryMethod>
</ns0:Customer>
*/

?>
