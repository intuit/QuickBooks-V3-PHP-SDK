# QuickBooks API PHP SDK

PHP client for connecting to the QuickBooks Online V3 REST API.

To find out more, visit the official documentation website:
https://developer.intuit.com/

For current known issues and progress for PHP SDK, please refer to the wiki page:
https://github.com/intuit/QuickBooks-V3-PHP-SDK/wiki

**Help:** [Support](https://developer.intuit.com/help)<br/>
**Documentation:** [User Guide](https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_accounting/0200_java/0001_quick_start)<br/>
**Continuous Integration:**![Build status](https://travis-ci.org/intuit/QuickBooks-V3-PHP-SDK.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/quickbooks/v3-php-sdk/v/stable)](https://packagist.org/packages/quickbooks/v3-php-sdk)<br/>
**License:** [![License](https://poser.pugx.org/quickbooks/v3-php-sdk/license)](https://packagist.org/packages/quickbooks/v3-php-sdk)


Requirements
------------
To use the PHP SDK, you need to have: 
- PHP 5.6 or greater

QuickBooks Online API uses OAuth 1.0 as an authorization protocol. 
<br/><br/>
**To generate OAuth 1.0 access tokens, you need:**

- Account with developer.intuit.com
- Consumer keys and consumer secrets in your app for starting the OAuth 1.0a flow

For a programming guide and description of how OAuth works, refer to our documentation here: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/connect_from_within_your_app

You can also generate OAuth tokens from the OAuth Playground: 
https://appcenter.intuit.com/Playground/OAuth/IA/

Installation
------------
##### Use the following Composer command to install the PHP SDK:

~~~shell
 $ composer require quickbooks/v3-php-sdk
 $ composer update
~~~

If you are not familiar with Composer, see the Getting Started for Composer here:
https://getcomposer.org/doc/00-intro.md

If you haven't installed PECL OAuth 1.2.3 library, you need to install it to run the PHP SDK. Please refer to the documentation here for how to install it:
https://developer.intuit.com/docs/0100_quickbooks_online/0400_tools/0005_sdks/0209_php/0002_install_the_php_sdk

##### Or you can use the "releases" page at https://github.com/intuit/QuickBooks-V3-PHP-SDK/releases to manually download the PHP SDK:

If you are not familiar with Composer, you can also go to the "releases" tab to download the zip file version of our PHP SDK. See example scripts here https://github.com/intuit/QuickBooks-V3-PHP-SDK/tree/master/src/_Samples for how to make QuickBooks Online API call without Composer. 

Configuration
-------------
To use the Composer library, put the following as the first line in your PHP script before calling other libraries/classes: 
~~~php
require "vendor/autoload.php";
~~~

You can declare your own spl autoloader; however, using Composer’s `vendor/autoload.php` hook is recommended.

To use the PHP SDK, the following class is required:
~~~php
use QuickBooksOnline\API\DataService\DataService;
~~~
You need to include these in the script before making your HTTP call.

### OAuth 1.0 & OAuth 2.0 configuration
There are two ways to configure OAuth to prepare the service context for an API call:
<br/>1)
Pass the OAuth configuration as an array:
For OAuth 1:
~~~php
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth1',
         'consumerKey' => "Your Consumer key",
         'consumerSecret' => "Your Consumer secret",
         'accessTokenKey' => "Your Access Token",
         'accessTokenSecret' => "Your Access Token secret",
         'QBORealmID' => "Your CompanyID",
         'baseUrl' => "Development/Production"
));
~~~
For OAuth 2:
~~~php
$dataService = DataService::Configure(array(
         'auth_mode' => 'oauth2',
         'ClientID' => "Your Client ID",
         'ClientSecret' => "Your Client Secret",
         'accessTokenKey' => 'Your Access Token',
         'refreshTokenKey' => "Your refresh Token",
         'QBORealmID' => "Your CompanyID",
         'baseUrl' => "Development/Production"
));
~~~
or:

<br/>2)
Use the sdk.config file located in /src as a template for the config file to prepare the service context. You will need to pass the path of config file explicitly:
~~~php
$dataService = DataService::Configure("/Your/Path/To/sdk.config");
~~~

For Development Keys, use URL "https://sandbox-quickbooks.api.intuit.com/" or the **"Development"** keyword as baseUrl<br>
For Production Keys, use URL "https://quickbooks.api.intuit.com/" or the **"Production"** keyword as baseUrl.


Currently the default minor version for PHP SDK is set to 8. To set up the minor version with a different value, use:
~~~php
$dataService->setMinorVersion("9");
~~~

To set up your own log location for complete request and response, use:
~~~php
$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
~~~
For the PHP SDK, the default log position is located at: tmp/IdsLogs 
(If the path does not exist, the request and response log will not be recorded under the IdsLogs directory.)

The PHP SDK has two kinds of logs. One is the request/response log and the other one is the executation log. The executation log cannot be turned off. You can change the location of the request/response log, or disable it:
~~~php
$dataService->disableLog();
~~~

To use Platform Service to reconnect/disconnect your OAuth 1.0a tokens (as described in the documentation here: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/oauth_management_api), you can use the following platform methods:
~~~php
$serviceContext = $dataService->getServiceContext();
//Create a platform Service
$platformService = new PlatformService($serviceContext);
//Call Reconnect if you need to refresh your OAuth 1.0a tokens
$result = $platformService->Disconnect();
//QBO will always return 200 on status code, so look into the error msg
var_dump($result);
~~~

### OAuth 2.0 refresh token 
To get a refresh token, use the OAuth2LoginHelper object from $dataService to make a refreshToken() function call. You can find an example at https://github.com/intuit/QuickBooks-V3-PHP-SDK/blob/master/src/_Samples/refreshTokenSample.php. The core function is listed below:
~~~php
$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
$accessToken = $OAuth2LoginHelper->refreshToken();
$error = $OAuth2LoginHelper->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    return;
}
$dataService->updateOAuth2Token($accessToken);
~~~

### OAuth 2.0 SSL certificate settings 
The PHP SDK uses the Mozilla CA certificates (https://curl.haxx.se/ca/cacert.pem) for authorizing peer certificates.<br/>

To disable the cURL certificate settings from the PHP SDK, comment out Line 106 at https://github.com/intuit/QuickBooks-V3-PHP-SDK/blob/master/src/Core/HttpClients/CurlHttpClient.php <br/>

or you can append your self-signed certificate at https://github.com/intuit/QuickBooks-V3-PHP-SDK/blob/master/src/Core/OAuth/OAuth2/certs/cacert.pem <br/>

Test your OAuth settings
------------------------
To test that your configuration is correct and that you can successfully connect to QuickBooks Online, ping using the getCompanyInfo() method, which will return the CompanyInfo object representing the current company if successful or NULL if unsuccessful. When it is null, use the getLastError() to find out the actual error:

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
Currently the following API entity endpoints support creating objects from array:
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

To create/update using the above entity endpoints, import the corresponding facade class:
~~~php
<?php
use QuickBooksOnline\API\Facades\{Facade_Class_Name};
~~~

In the body, you can then use the static class to create corresponding objects. The array is based on the documentation here: https://developer.intuit.com/docs/api/accounting/

For example, to create an invoice, you can do the following:
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

To update an invoice with new content, here is the sample code:
~~~php
  $updatedInvoice = Invoice::update($myInvoiceObj, [
            "sparse" => true,
            "Deposit" => 100000,
            "DocNumber" => "12223322"
    ]);
  $resultingUpdatedInvoiceObj = $dataService->Add($updatedInvoice);
~~~

The Facade class members can also accept objects as a reference in the array. For example, when we created multiple lines within the Line facade, we can easily pass it to the Invoice facade to create an invoice:

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

**Be careful when you use the update method. QuickBooks Online provides two updates: full update and sparse update. The sparse update operation provides the ability to update a subset of attributes for a given object; only those specified in the request are updated. Missing attributes are left untouched. This is in contrast to the full update operation, where elements missing from the request are cleared.**

Considerations for using sparse updates include:
 1) Prevent unintended overwrites: A client application often does not use all the fields of an entity, so when it sends a full update request  with only fields they use, it results in an erroneous blanking out of fields that were not sent.
 2) Reduce request payload: Always desired, but is more relevant when the client application is mobile because of lower speeds, spotty connections, and the fact that mobile users are sensitive to amount of the data usage in each billing cycle.
 3) Facilitate future field additions: New fields can be added to an entity without past versions of production applications clearing all other existing fields inadvertently, as would happen with a full update operation.


For other entity endpoints that are not in the list, you have to use the old object-oriented way to create. 
Please refer to the CRUD examples here: https://github.com/IntuitDeveloper/SampleApp-CRUD-PHP
and class library reference here: https://developer-static.intuit.com/SDKDocs/QBV3Doc/IPPPHPDevKitV3/index.html

For example, to create an invoice, you can also do the following:
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
To create a new resource in QuickBooks Online (Invoice will be used an example here):
See https://github.com/intuit/QuickBooks-V3-PHP-SDK/blob/master/src/_Samples/LineSample.php


Update existing resources (PUT)
---------------------------------
To update a single resource, take invoice as an example here. You will need to read the resource first and then update it:

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

**Be careful when you use the Update method. QuickBooks Online provides two updates: full update and sparse update. The sparse update operation provides the ability to update a subset of attributes for a given object; only those specified in the request are updated. Missing attributes are left untouched. This is in contrast to the full update operation, where elements missing from the request are cleared.**

Considerations for using sparse updates include:
 1) Prevent unintended overwrites: A client application often does not use all the fields of an entity, so when it sends a full update request with only fields they use, it results in an erroneous blanking out of fields that were not sent.
 2) Reduce request payload: Always desired, but is more relevant when the client application is mobile because of lower speeds, spotty connections, and the fact that mobile users are sensitive to the amount of data usage in each billing cycle.
 3) Facilitate future field additions: New fields can be added to an entity without past versions of production applications clearing all other existing fields inadvertently, as would happen with a full update operation.

Delete resources (DELETE)
-------------------------------------------
To delete a single resource, call the Delete method on the dataService object:

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
To use Query, you will construct the query string and call the $dataService->Query() method:
~~~php
//Same for constructing the DataService object
...
$allInvoices = $dataServices->Query("SELECT * FROM Invoice");
~~~

The query statement you will use is very similar to a SQL query. If you go to the documentation page for each API entity endpoint (use Invoice as an example here: https://developer.intuit.com/docs/api/accounting/invoice), you will find that a few keywords like "filterable, sortable" are listed for some fields. For those fields that are filterable and sortable, you can use the SQL query to match them. For example, to match an invoice with a specific docNumber, you will use:

~~~php
$theInvoice = $dataServices->Query("select * from Invoice where docNumber='1038'");
~~~

For QuickBooks Online, a SQL comparision value is required to use *SINGLE QUOTATION MARKS*. SQL statements that use double quotes or only an integer value for comparision *WILL NOT WORK*
~~~sql
//You will get a 400 from QBO for error parsing string
$theInvoice = $dataServices->Query("select * from Invoice where docNumber=1038");
~~~

For Query *ReferenceType* (ending with keyword **Ref**), DO NOT USE **TypeRef.value**. Just use **TypeRef**. For example, to query an invoice from customer ID 59, you will use:
~~~sql
SELECT * FROM Invoice WHERE CustomerRef='58' 
~~~


Pagination (Query)
-------------------------------------------
Pagination is supported for QuickBooks Online; however, it needs to be specified in the query itself. To page through the results, specify STARTPOSITION (position of the entity in the query results) and MAXRESULTS (maximum number of entities in the result). For example:
~~~php
$entities = $dataService->Query("SELECT * FROM Invoice STARTPOSITION 1 MAXRESULTS 10");
~~~

More information can be found here: https://developer.intuit.com/docs/0100_quickbooks_online/0300_references/0000_programming_guide/0050_data_queries

Handling errors and timeouts
----------------------------
For whatever reason, the HTTP requests at the heart of the API may not always
succeed.

Every method will return false if an error occurs, and you should always
check for this before acting on the results of the method call.

After v3.2.6, you can also check for an Intuit Error Message in the code:
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
Under the /src folder, there is a directory called "_Samples". You can find working examples for PUT, GET, QUERY, and UPDATE QuickBooks Online API entities there. If you have any other questions or need technique support, feel free to create a ticket @ https://help.developer.intuit.com/s/contactsupport or email me: Hao_Lu@intuit.com

