# QuickBooks API PHP SDK

PHP client for connecting to the QuickBooks Online V3 REST API.

To find out more, visit the official documentation website:
http://developer.intuit.com/

For current known issues and progress for PHP SDK, please refer to the wiki page:
https://github.com/intuit/QuickBooks-V3-PHP-SDK/wiki

**Help:** [Support](https://developer.intuit.com/help)<br/>
**Documentation:** [User Guide](https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_accounting/0200_java/0001_quick_start)<br/>
**Continuous Integration:**![Build status](https://travis-ci.org/intuit/QuickBooks-V3-PHP-SDK.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/quickbooks/v3-php-sdk/v/stable)](https://packagist.org/packages/quickbooks/v3-php-sdk)<br/>
**License:** [![License](https://poser.pugx.org/quickbooks/v3-php-sdk/license)](https://packagist.org/packages/quickbooks/v3-php-sdk)


Requirements
------------
To use PHP SDK, you need to have: 
- PHP 5.6 or greater

QuickBooks Online API use OAuth 1.0 as an authorization protocol. 
<br/><br/>
**To generate OAuth 1.0 access tokens, you need:**

- Account with developer.intuit.com
- Consumer keys and Consumer secrets in your app for starting OAuth 1.0a flow

For programming guide and how it worked, refer to our documentation here: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/connect_from_within_your_app

You can also generate OAuth tokens from OAuth playground: 
https://appcenter.intuit.com/Playground/OAuth/IA/

Installation
------------
Use the following Composer command to install the PHP SDK:

~~~shell
 $ composer require quickbooks/v3-php-sdk
 $ composer update
~~~

If you are not familiar with Composer. Please read the introduction guide for Composer here:
https://getcomposer.org/doc/00-intro.md

If you haven't installed PECL OAuth 1.2.3 libraray, you need to install it to run the PHP SDK. Please refer to the documentation here for how to install it:
https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_sdks/0209_php/0002_install_the_php_sdk

Configuration
-------------
To use Composer library, put: 
~~~php
require "vendor/autoload.php";
~~~

As the first line in your PHP Script before calling other libraries/Classes.
(You can declare your own spl autoloader; however, using Composer’s `vendor/autoload.php` hook is recommended).

For using PHP SDK, the following class is required:
~~~php
use QuickBooksOnline\API\DataService\DataService;
~~~
You need to include them in the script before making your HTTP call.

### OAuth 1.0 & OAuth 2.0 Configuration
There are two ways to provide OAuth configration for prepare the service context for API call:
<br/>1)
Pass the OAuth configuration as an array:
for oauth 1:
~~~php
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth1',
         'consumerKey' => "Your Consumer key",
         'consumerSecret' => "Your Consumer secret",
         'accessTokenKey' => "Your Access Tokens",
         'accessTokenSecret' => "Your Access Token secrets",
         'QBORealmID' => "Your CompanyID",
         'baseUrl' => "either sandbox or Production QBO URL"
));
~~~
for oauth 2:
~~~php
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Q0lCkcEshsGMHOEula2r5RKc2yhxvMsYEpKN1lw1WZwyfd1Si6",
         'ClientSecret' => "gE0F9hLgwx9OBzRpNxyOvWJH6L2fIhzAwBugPJHq",
         'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..4z4Assj4x1qt8H4DtQco6A.nmV2jTxaDMVdFWEUO16q5qhbd5aD6U-U-RYnSNywqg-HPC_3_jvwpMJU1a1S5X-PgPUy60WvVy_8p1awY7kIoFzTV4IhdFLrZpYtBUGCjcsvjxWeOSgP6oCayBEmCv7zzabtgB6vxU46jQqKX2IXYUGPPtyYO64hrgELFR4SKUK6boZiVnh8z19gnvsReKMmIINA3-NgC6QJqMRp6HWgzCa9RuDN9tCtrAK2dy5xmJRNSNgdv_gyg1bfdX4l4b30fLPzFk31fsTT9NTJq9PuGtdTsvUuCj7Hme6HPldD9TKYRXWU8TKrQQrQWEpdlbPr6F3rhP6IdmCv9t1XH_WzF_1IseRUoYhiTUjubig-j8gzwajIdYQTzpJQKJ92QiAEyt8k40WWg0v69hEC0w7WRBuUE-IJ50xWypqS_P28IWt1G14rovZ97soGOteSik-41g1icR2zxfNhXGq7zO7oU5B8r-ej5Pb52T0MCMktgd6y32bqwo2pcEzblL2bZs7DZ7LDx5peY4TIfGW21crTE6xjhRr7LdqB8K505pRqIOP20eaRgwtGHLZ3bdBt1_negw2AGjc409BM0nLzzmODxr3yo-YdGwkcOjm5QgbGAsrnpoSo9tSpxPHoN0vMRneRdsKCd6CZG5M1OIOMuj7spkm442tvwiAMCx2Fh-STG6fMnhOq7l_f8NW_3kscxtF2.obQxJKjPfi1KlaQQ_OUoNg',
         'refreshTokenKey' => "L011509163184Q0K7DT40SVXhJXAfyoj6B6EbSr3Ty64yVvF5A",
         'QBORealmID' => "123145857569084",
         'baseUrl' => "https://sandbox-quickbooks.api.intuit.com"
));
~~~
or:
<br/>2)
You use the sdk.config file located in /src as a template for the config file for preparing service context. You will need to pass the path of config file explicitly:
~~~php
$dataService = DataService::Configure("/Your/Path/To/sdk.config");
~~~

For OAuth values under Development Keys, use "https://sandbox-quickbooks.api.intuit.com/" as baseUrl<br>
For OAuth values under Production Keys, use "https://quickbooks.api.intuit.com/" as baseUrl.

Currently the default minor version for PHP SDK is set to 8. To set up the minor Version with a different value, use:
~~~php
$dataService->setMinorVersion("9");
~~~

To set up your own Log location for complete request and response, use:
~~~php
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
~~~
For PHP SDK, the default log position is located at : tmp/IdsLogs 
(If the path does not exist. The request and response log will not be recored under IdsLogs directory.)

PHP SDK has two kinds of logs. One is the request/response log and the other one is the Executation log. Executation log will not be able to be turned off. However, you can always change the location of the request/response log, or disable it:
~~~php
$dataService->disableLog();
~~~

For using Platform Service to Reconnect/Disconnect your OAuth 1.0a tokens(As the documentation here listed: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/oauth_management_api), you can use the following platform methods:
~~~php
$serviceContext = $dataService->getServiceContext();
//Create a platform Service
$platformService = new PlatformService($serviceContext);
//Call Reconnect if you need to refresh your OAuth 1.0a tokens
$result = $platformService->Disconnect();
//QBO will always return 200 on status code, so look into the error msg
var_dump($result);
~~~


Test your OAuth settings
------------------------
To test that your configuration was correct and you can successfully connect to QuickBooks Online, ping the getCompanyInfo() method, which will return the CompanyInfo object representing the current company if successful or NULL if unsuccessful. When it is null, use the getLastError() to find out the actual error:

~~~php
$CompanyInfo = $dataService->getCompanyInfo();
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
} 
~~~

Connecting to the QuickBooks Online API
---------------------------------------
Currently the below API entity Endpoints support creating Objects from Array:
* Account
* Bill
* BillPayment
* CompanyCurrency
* CreditMemo
* Customer
* Class
* Department
* Deposit
* Employee
* Estimate
* Line  --- *For excessive usage of Line objects, we create easy way of contructing Line items as well. However, Line is not an API endpoint entity*
* Invoice
* Item
* JournalEntry
* Payment
* Purchase
* PurchaseOrder
* RefundReceipt
* SalesReceipt
* TimeActivity
* Transfer
* VendorCredit
* Vendor
* TaxSerivce and TaxRate (for Creation Only)

For create/update above entity endpoints, you are going to import corresponding facade class:
~~~php
<?php
use QuickBooksOnline\API\Facades\{Facade_Class_Name};
~~~

On the body, you can then use the static class to create corresponding objects. The array is based on the documentation on the link here: https://developer.intuit.com/docs/api/accounting/

For example, to create Invoice, you can do the following:
~~~php
$myInvoiceObj = Invoice::create([
  "DocNumber" => "1070",
  "LinkedTxn" => [],
  "Line" => [[
      "Id" => "1",
      "LineNum" => 1,
      "Amount" => 150.0,
      "DetailType" => "SalesItemLineDetail",
      "SalesItemLineDetail" => [
          "ItemRef" => [
              "value" => "1",
              "name" => "Services"
          ],
          "TaxCodeRef" => [
              "value" => "NON"
          ]
      ]
  ], [
      "Amount" => 150.0,
      "DetailType" => "SubTotalLineDetail",
      "SubTotalLineDetail" => []
  ]],
  "CustomerRef" => [
      "value" => "1",
      "name" => "Amy's Bird Sanctuary"
  ]
]);
$resultingInvoiceObj = $dataService->Add($myInvoiceObj);
~~~

To update an Invoice with new content, here is the sample code:
~~~php
  $updatedInvoice = Invoice::update($myInvoiceObj, [
            "sparse" => true,
            "Deposit" => 100000,
            "DocNumber" => "12223322"
    ]);
  $resultingUpdatedInvoiceObj = $dataService->Add($updatedInvoice);
~~~

The Facade class members now can also accept objects as a reference in the array. For example, when we created multiple lines within the Line Facade, we can easily pass it to the Invoice Facade to create an Invoice:

~~~php
for($i = 1; $i<= 3; $i ++){
   $LineObj = Line::create([
       "Id" => $i,
       "LineNum" => $i,
       "Description" => "Pest Control Services",
       "Amount" => 35.0,
       "DetailType" => "SalesItemLineDetail",
       "SalesItemLineDetail" => [
           "ItemRef" => [
               "value" => "1",
               "name" => "Pest Control"
           ],
           "UnitPrice" => 35,
           "Qty" => 1,
           "TaxCodeRef" => [
               "value" => "NON"
           ]
       ]
   ]);
   $lineArray[] = $LineObj;
}
//Add a new Invoice
$theResourceObj = Invoice::create([
     "Line" =>  $lineArray,
    "CustomerRef"=> [
     "value"=> "1"
     ],
      "BillEmail" => [
            "Address" => "Familiystore@intuit.com"
      ],
      "BillEmailCc" => [
            "Address" => "a@intuit.com"
      ],
      "BillEmailBcc" => [
            "Address" => "v@intuit.com"
      ]
]);
~~~

**Be careful when you trying to use the update method. QuickBooks Online Provide Two Updates: Full Update and Sparse Update. The sparse update operation provides the ability to update a subset of attributes for a given object; only those specified in the request are updated. Missing attributes are left untouched.This is in contrast to the full update operation, where elements missing from the request are cleared.**

Considerations for using sparse updating include:
 1) Prevent unintended overwrites: A client application often does not use all the fields of an entity, so when it sends a full update request  with only fields they use, it results in an erroneous blanking out of fields that were not sent.
 2) Reduce request payload: Always desired, but is more relevant when the client application is mobile because of lower speeds, spotty connections, and the fact that mobile users are sensitive to amount of data usage in each billing cycle.
 3) Facilitate future field additions: New fields can be added to an entity without past versions of production applications clearing all other existing fields inadvertently, as would happen with a full update operation.


For other Entity Endpoints that are not in the list, you have to use the old object oriented way to create. 
Please refer to the CRUD Examples here: https://github.com/IntuitDeveloper/SampleApp-CRUD-PHP
and Class Library reference here: https://developer-static.intuit.com/SDKDocs/QBV3Doc/IPPPHPDevKitV3/index.html

For example, to create an Invoice, you can also do the following:
~~~php
<?php 
// Add an invoice
$invoice = new IPPInvoice();
$invoice->Deposit       = 0;
$invoice->domain        =  "QBO";
$invoice->AutoDocNumber = true;
$invoice->TxnDate = date('Y-m-d', time());
$invoice->CustomerRef   = "66";
$invoice->PrivateNote   = "SomeNote";
$invoice->TxnStatus     = "Payable";

$line = new IPPLine();
$line->Id = "0";
$line->LineNum          = "1";
$line->Description      = "test";
$line->Amount           = 1000;
$line->DetailType = "DescriptionOnly";

$sub_line = new IPPLine();
$sub_line->Id           = "0";
$sub_line->LineNum      = "2";
$sub_line->Description  = "Sub Total";
$sub_line->Amount       = 2000;
$sub_line->DetailType   = "SubtotalLineDetail";


$invoice->Line          = array($line, $sub_line);
$invoice->RemitToRef    = "66";
$invoice->TotalAmt      = 1000;
$invoice->FinanceCharge = 'false';

// Add a invoice
$resultingInvoiceObj = $dataService->Add($invoice);
~~~

However, all corresponding objects need to be imported before using them.

Create new resources (PUT)
-----------------------------------------
To create a new resource in QuickBooks Online(Invoice will be used an Example here):

~~~php
<?php
require "vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;

$dataService = DataService::Configure(array(
	         'auth_mode' => 'oauth1',
		 'consumerKey' => "Your Cosumer Key",
		 'consumerSecret' => "Your Consumer secrets",
		 'accessTokenKey' => "Your Access Token",
		 'accessTokenSecret' => "Your Access Token Secrets",
		 'QBORealmID' => "Your RealmID",
		 //sandbox.api.intuit.com/ will be the sandbox url and quickbooks.api.intuit.com/ will be the product url
		 'baseUrl' => "Your sandbox URL or Product URL"
));

if (!$dataService)
	exit("Problem while initializing DataService.\n");

// Add the Invoice resource
$theResourceObj = Invoice::create([
       "Deposit" => 0,
      "domain" => "QBO",
      "sparse" => false,
      "Id" => $IdGenerated,
      "SyncToken" => 0,
      "MetaData" => [
          "CreateTime" => "2015-07-24T10:35:08-07:00",
          "LastUpdatedTime" => "2015-07-24T10:35:08-07:00"
      ],
      "CustomField"=>  [ [
          "DefinitionId" => "1",
          "Name" => "Crew #",
          "Type" => "StringType"
      ]],
      "DocNumber" => "1070",
      "TxnDate" => "2015-07-24",
      "LinkedTxn" => [],
      "Line" => [[
          "Id" => "1",
          "LineNum" => 1,
          "Amount" => 150.0,
          "DetailType" => "SalesItemLineDetail",
          "SalesItemLineDetail" => [
              "ItemRef" => [
                  "value" => "1",
                  "name" => "Services"
              ],
              "TaxCodeRef" => [
                  "value" => "NON"
              ]
          ]
      ], [
          "Amount" => 150.0,
          "DetailType" => "SubTotalLineDetail",
          "SubTotalLineDetail" => []
      ]],
      "TxnTaxDetail" => [
          "TotalTax" => 0
      ],
      "CustomerRef" => [
          "value" => "1",
          "name" => "Amy's Bird Sanctuary"
      ],
      "CustomerMemo" => [
          "value" => "Added customer memo."
      ],
      "BillAddr" => [
          "Id" => "2",
          "Line1" => "4581 Finch St.",
          "City" => "Bayshore",
          "CountrySubDivisionCode" => "CA",
          "PostalCode" => "94326",
          "Lat" => "INVALID",
          "Long"=> "INVALID"
      ],
      "ShipAddr" => [
          "Id" => "109",
          "Line1" => "4581 Finch St.",
          "City" => "Bayshore",
          "CountrySubDivisionCode" => "CA",
          "PostalCode" => "94326",
          "Lat" => "INVALID",
          "Long" => "INVALID"
      ],
      "DueDate" => "2015-08-23",
      "TotalAmt" => 150.0,
      "ApplyTaxAfterDiscount" => false,
      "PrintStatus" => "NeedToPrint",
      "EmailStatus" => "NotSet",
      "Balance" => 150.0
]);
$resultingObj = $dataService->Add($theResourceObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";
}
else {
    echo "Created Id={$resultingObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingObj, $urlResource);
    echo $xmlBody . "\n";
}
?>
~~~


Update existing resources (PUT)
---------------------------------
To update a single resource, take Invoice as an example here. You will need to read the resource first and then update it:

~~~php
<?php
require "vendor/autoload.php";
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;


$dataService = DataService::Configure(array(
	         'auth_mode' => 'oauth1',
		 'consumerKey' => "qyprdUSoVpIHrtBp0eDMTHGz8UXuSz",
		 'consumerSecret' => "TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7",
		 'accessTokenKey' => "lvprdzNckPXUquNnptGJXw84tgnAUQ7HQw9j7vbZdJQmc2Wj",
		 'accessTokenSecret' => "qSmQj5RLl0jA4HRvova3xwmZwRMclQcsNLU1XwXO",
		 'QBORealmID' => "193514464689044",
		 'baseUrl' => "https://sandbox-quickbooks.api.intuit.com/"
));
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

$entities = $dataService->Query("select * from Invoice where docNumber='1566'");
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}
if(!empty($entities) && sizeof($entities) == 1){
    $theInvoice = current($entities);
    $updatedInvoice = Invoice::update($theInvoice, [
         'sparse' => true,
         'DocNumber' => '8999'
    ]);
    $dataService->add($updatedInvoice);
    
}

?>
~~~

**Be careful when you trying to use the update method. QuickBooks Online Provide Two Updates: Full Update and Sparse Update. The sparse update operation provides the ability to update a subset of attributes for a given object; only those specified in the request are updated. Missing attributes are left untouched.This is in contrast to the full update operation, where elements missing from the request are cleared.**

Considerations for using sparse updating include:
 1) Prevent unintended overwrites: A client application often does not use all the fields of an entity, so when it sends a full update request  with only fields they use, it results in an erroneous blanking out of fields that were not sent.
 2) Reduce request payload: Always desired, but is more relevant when the client application is mobile because of lower speeds, spotty connections, and the fact that mobile users are sensitive to amount of data usage in each billing cycle.
 3) Facilitate future field additions: New fields can be added to an entity without past versions of production applications clearing all other existing fields inadvertently, as would happen with a full update operation.

Delete resources (DELETE)
-------------------------------------------
To delete a single resource you can call the delete method on the dataService object:

~~~php
//Same as constructing the DataService
...
$targetInvoiceObj = $dataService->FindById("The ID of the Invoice");
$currentResultObj = $dataService->Delete($targetObject);
if ($crudResultObj)
	echo "Delete the purchase object that we just created.\n";
else
	echo "Did not delete the purchase object that we just created.\n";

~~~


Query resources (Query)
-------------------------------------------
To use Query, you will construct the Query String and call the $dataService->Query() method:
~~~php
//Same for constructing the DataService object
...
$allInvoices = $dataServices->Query("SELECT * FROM Invoice");
~~~

The query statement you will use is very similar to a SQL query. If you go to the documentation page for each API entity endpoint(use Invoice as an example here): https://developer.intuit.com/docs/api/accounting/invoice

You will find that a few keywords like "filterable, sortable" are listed for some fields. For those fields that are filterable and sortable, you can use the SQL query to match them. For example, to match an invoice with a specific docNumber, you will use:

~~~php
$theInvoice = $dataServices->Query("select * from Invoice where docNumber='1038'");
~~~

For QuickBooks Online, SQL comparision value is required to use *SINGLE QUOTATION MARKS*. SQL statements using double quote or just integer value for comparision  *WILL NOT WORK*
~~~sql
//You will get a 400 from QBO for error parsing string
$theInvoice = $dataServices->Query("select * from Invoice where docNumber=1038");
~~~

Handling Errors And Timeouts
----------------------------
For whatever reason, the HTTP requests at the heart of the API may not always
succeed.

Every method will return false if an error occurred, and you should always
check for this before acting on the results of the method call.

After v3.2.6, you can also check for Intuit Error Message in the code:
~~~php
$resultingCustomerObj = $dataService->Add($customerObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    echo "The Intuit Helper message is: IntuitErrorType:{" . $error->getIntuitErrorType() . "} IntuitErrorCode:{" . $error->getIntuitErrorCode() . "} IntuitErrorMessage:{" . $error->getIntuitErrorMessage() . "} IntuitErrorDetail:{" . $error->getIntuitErrorDetail() . "}";

}
else {
    # code...
    // Echo some formatted output
    echo "Created Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
    echo $xmlBody . "\n";
}
~~~

See our Tool documentation for more information: https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_sdks/0209_php

Examples
--------
Under the /src folder, there is a directory called "_Samples". You can find working examples for PUT, GET, QUERY, and UPDATE QuickBooks Online API Entities there. If you have any other questions or need technique support, feel free to create a ticket @ https://help.developer.intuit.com/s/contactsupport or Email me: Hao_Lu@intuit.com

