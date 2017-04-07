# QuickBooks API PHP SDK
=====================

PHP client for connecting to the QuickBooks Online V3 REST API.

To find out more, visit the official documentation website:
http://developer.intuit.com/

![Build status](https://travis-ci.org/hlu2/QuickBooks_Demo.svg?branch=master)
[![Latest Stable Version](https://poser.pugx.org/hlu2/quick-books_demo/v/stable)](https://packagist.org/packages/hlu2/quick-books_demo)
[![Total Downloads](https://poser.pugx.org/hlu2/quick-books_demo/downloads)](https://packagist.org/packages/hlu2/quick-books_demo)

Requirements
------------

- PHP 5.6 or greater
- PHP OAuth 1.2.3 extension enabled

**To connect to the API with OAuth1 you need the following:**

- Account with developer.intuit.com
- Consumer keys and Consumer secrets in your app for starting OAuth 1.0a flow
- Access Token and Access Token Secrets

To generate OAuth Access Token and Access Token Secrets, refer to our documentation here: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/connect_from_within_your_app

We also suggest you play with OAuth playground: 
https://appcenter.intuit.com/Playground/OAuth/IA/

You can use it generate access tokens for either QuickBooks Online production or sandbox. 


Installation
------------

Use the following Composer command to install the
API client from [the Intuit vendor on Packagist](composer require quickbooks/v3-php-sdk):

~~~shell
 $ composer require quickbooks/v3-php-sdk
 $ composer update
~~~

If you are not familiar with Composer. Please read the introduction guide for Composer here:
https://getcomposer.org/doc/00-intro.md

Configuration
-------------

To use Class library, put: 

~~~php
require "vendor/autoload.php";
~~~

As the first line in your PHP Script before calling other libraries/Classes.
(You can declare your own spl autoloader; however, using Composer’s `vendor/autoload.php` hook is recommended).

There are two ways to provide static configration for prepare the service context for API call:

### OAuth 1.0
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

or you use the sdk.config file as the config file for preparing service context. You will need to pass the path of config file explicitly:
~~~php
$dataService = DataService::Configure("/Your/Path/To/sdk.config");
~~~

Connecting to the QuickBooks Online API
-----------------------
Referring to class methods may be required sometime. To access to the Class reference Entity, go to:
https://developer-static.intuit.com/SDKDocs/QBV3Doc/IPPPHPDevKitV3/entities/index.html

Create new resources (PUT)
-----------------------------------------
To create a Customer in QuickBooks Online:

~~~php
<?php
require "vendor/autoload.php";

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPCustomer;


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

// Add a customer
$customerObj = new IPPCustomer();
$customerObj->Name = "Name" . rand();
$customerObj->CompanyName = "CompanyName" . rand();
$customerObj->GivenName = "GivenName" . rand();
$customerObj->DisplayName = "DisplayName" . rand();
$resultingCustomerObj = $dataService->Add($customerObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
    echo $xmlBody . "\n";
}
?>
~~~


Update existing resources (PUT)
---------------------------------
To update a single resource, you will need to read the resource first and then update it:
~~~php
// Same as adding a customer before
....
$customerObj = new IPPCustomer();
$customerObj->Name = "Name" . rand();
$customerObj->CompanyName = "CompanyName" . rand();
$customerObj->GivenName = "GivenName" . rand();
$customerObj->DisplayName = "DisplayName" . rand();
$resultingCustomerObj = $dataService->Add($customerObj);
$error = $dataService->getLastError();
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
    echo $xmlBody . "\n";
}

// Update Customer Obj
$resultingCustomerObj->GivenName = "New Name " . rand();
$resultingCustomerUpdatedObj = $dataService->Add($resultingCustomerObj);
if ($error != null) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "Created Customer Id={$resultingCustomerObj->Id}. Reconstructed response body:\n\n";
    $xmlBody = XmlObjectSerializer::getPostXmlFromArbitraryEntity($resultingCustomerObj, $urlResource);
    echo $xmlBody . "\n";
}
~~~


Delete resources (DELETE)
-------------------------------------------
To delete a single resource you can call the delete method on the dataService object:

~~~php
...
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
$allAccounts = $dataServices->Query("SELECT * FROM Account");
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



