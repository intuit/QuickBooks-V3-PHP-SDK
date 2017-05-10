# QuickBooks API PHP SDK

PHP client for connecting to the QuickBooks Online V3 REST API.

To find out more, visit the official documentation website:
http://developer.intuit.com/

**Help:** [Support](https://developer.intuit.com/help)<br/>
**Documentation:** [User Guide](https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_accounting/0200_java/0001_quick_start)<br/>
**Continuous Integration:**![Build status](https://travis-ci.org/intuit/QuickBooks-V3-PHP-SDK.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/quickbooks/v3-php-sdk/v/stable)](https://packagist.org/packages/quickbooks/v3-php-sdk)<br/>
**License:** [![License](https://poser.pugx.org/quickbooks/v3-php-sdk/license)](https://packagist.org/packages/quickbooks/v3-php-sdk)


Requirements
------------
To use PHP SDK, you need to have: 
- PHP 5.6 or greater
- PHP PECL OAuth 1.2.3 extension enabled

QuickBooks Online API use OAuth 1.0 as an authorization protocol. <br/>
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

### OAuth 1.0 Configuration
There are two ways to provide OAuth configration for prepare the service context for API call:
1)
Pass the OAuth configuration as an array:
~~~php
$dataService = DataService::Configure(array(
         	  'auth_mode' => 'oauth1',
		  'consumerKey' => "qyprdUSoVpIHrtBp0eDMTHGz8UXuSz",
		  'consumerSecret' => "TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7",
		  'accessTokenKey' => "lvprdePgDHR4kSxxC7KFb8sy84TjQMVJrbITqyeaRAwBrLuq",
		  'accessTokenSecret' => "VRm1nrr17JL1RhPAFGgEjepxWeSUbGGsOwsjrKLP",
		  'QBORealmID' => "123145812836282"
));
~~~

or

2)you use the sdk.config file located in /src as a template for the config file for preparing service context. You will need to pass the path of config file explicitly:
~~~php
$dataService = DataService::Configure("/Your/Path/To/sdk.config");
~~~

To set up Minor Version you want to use for the Request:
~~~php
$dataService->setMinorVersion("4");
~~~

To set up your own Log location for complete request and response:
~~~php
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
~~~

Connecting to the QuickBooks Online API
-----------------------
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
            "Deposit" => 100000,
            "DocNumber" => "12223322"
    ]);
  $resultingUpdatedInvoiceObj = $dataService->Add($updatedInvoice);
~~~

For other Entity Endpoints that are not in the list, you have to use the old object oriented way to create. 
Please refer to the CRUD Examples here: https://github.com/IntuitDeveloper/SampleApp-CRUD-PHP

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
To create a new resource in QuickBooks Online(Invoice will be used an Example here:

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
		 'QBORealmID' => "193514489870599",
		 'baseUrl' => "https://sandbox.api.intuit.com/"
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
		 'consumerKey' => "Your Cosumer Key",
		 'consumerSecret' => "Your Consumer secrets",
		 'accessTokenKey' => "Your Access Token",
		 'accessTokenSecret' => "Your Access Token Secrets",
		 'QBORealmID' => "193514489870599",
		 'baseUrl' => "https://sandbox.api.intuit.com/"
));

if (!$dataService)
	exit("Problem while initializing DataService.\n");

//You can also use Query to find the Invoice
$findInvoice = $dataService->FindById("Your Invoice ID");
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}

// Update the Invoice Obj
$updatedInvoice = Invoice::update($findInvoice, [
            "Deposit" => 100000,
            "DocNumber" => "12223322"
]);

$resultingUpdatedInvoiceObj = $dataService->Add($updatedInvoice);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Id={$resultingUpdatedInvoiceObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingUpdatedInvoiceObj, $urlResource);
    echo $xmlBody . "\n";
}
~~~


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

Handling Errors And Timeouts
----------------------------
For whatever reason, the HTTP requests at the heart of the API may not always
succeed.

Every method will return false if an error occurred, and you should always
check for this before acting on the results of the method call.

~~~php
$resultingCustomerObj = $dataService->Add($customerObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
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



