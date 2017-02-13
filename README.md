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
- Consumer keys and Consumer secrets in your app for starting OAuth 1 flow
- Access Token and Access Token Secrets

To generate OAuth Access Token and Access Token Secrets, refer to our documentation here: https://developer.intuit.com/docs/0100_quickbooks_online/0100_essentials/000500_authentication_and_authorization/connect_from_within_your_app

Installation
------------

Use the following Composer command to install the
API client from [the Intuit vendor on Packagist](https://packagist.org/packages/hlu2/quick-books_demo):

~~~shell
 $ composer require hlu2/quick-books_demo
 $ composer update
~~~

You can also install composer for your specific project by running the following in the library folder.

~~~shell
 $ curl -sS https://getcomposer.org/installer | php
 $ php composer.phar install
 $ composer install
~~~

Configuration
-------------

To use the PHP SDK in your PHP code, ensure that you can access `src/sdk.config`
in your autoload path (using Composer’s `vendor/autoload.php` hook is recommended).

Provide your credentials to the static configuration hook to prepare the API client
for connecting to a store on the Bigcommerce platform:


### OAuth 1.0
~~~php
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
~~~

Connecting to the QuickBooks Online API
-----------------------

To test that your configuration was correct and you can successfully connect to
the store, Provide Some methods for the PHP SDK to test connections:

~~~php
//To be Implemented, call getTime()

if ($ping) echo $ping->format('H:i:s');
~~~

Accessing collections and resources (QUERY)
-----------------------------------------

To find all customers in QuickBooks Online:

~~~php
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");
// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");
// Run a query
$entities = $dataService->Query("SELECT * FROM Customer");
~~~

To find a company by its id:

~~~php
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");
// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");
$allCompanies = $dataService->FindAll('CompanyInfo');
~~~

Update existing resources (PUT)
---------------------------------

To update a single resource:

~~~php
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
~~~

Creating new resources (POST)
-----------------------------

Here is an example how to create Customer, it is similar to Update a Customer:

~~~php
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
~~~


Deleting resources and collections (DELETE)
-------------------------------------------

To delete a single resource you can call the delete method on the dataService object:

~~~php
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");
// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");
// Create a new Purchase Object
$randomPurchaseObj = CreatePurchaseObj($dataService);
$purchaseObjConfirmation = $dataService->Add($randomPurchaseObj);
echo "Created Purchase object, and received Id={$purchaseObjConfirmation->Id}\n";
// Delete the recently-created Purchase Object
$crudResultObj = $dataService->Delete($purchaseObjConfirmation);

~~~

Handling Errors And Timeouts
----------------------------

For whatever reason, the HTTP requests at the heart of the API may not always
succeed.

Every method will return false if an error occurred, and you should always
check for this before acting on the results of the method call.

In some cases, you may also need to check the reason why the request failed.
This would most often be when you tried to save some data that did not validate
correctly.

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

More Examples
----------------------------
We provide CRUD(create, read, update and delete) examples in the SDK. You can go to PHP_CRUD_OPERATIONS folders to find all examples)

