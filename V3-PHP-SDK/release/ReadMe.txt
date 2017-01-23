IDG PHP SDK for QuickBooks V3

Version: 2.6.0

Requirements:  PHP 5.3 or greater

Dependencies:  PECL OAuth (http://pecl.php.net/package/oauth)



PHP SDK for QuickBooks REST API v3.0


BEFORE YOU GET STARTED
----------------------

In order to successfully use the SDK, you'll need to have:

* An app (even if pre-production) on developer.intuit.com.  See https://developer.intuit.com/Application/Create
* OAuth authentication keys and secrets for initial testing.  See https://developer.intuit.com/apiexplorer
* A QuickBooks Online or QuickBooks Desktop company file, and know it's RealmId.  See https://developer.intuit.com/.

To make full use of the SDK, including samples, tests, and your own production code, put your OAuth keys and secrets into three config files:

* sdk/sdk.config: for ongoing use of the SDK as you transition to production
* tests/App.config: for use of the tests
* samples/App.config: for use of the samples

The easiest way to start is to add your configuration to all three of these locations so that you have full use of the SDK, tests, and samples while you get started.

Do NOT run the samples or any of the tests against a RealmId that contains any real accounting data.  The tests and samples are highly invasive.


TERMINOLOGY
-----------

* POPO: Plain Old PHP Object, especially for PHP classes that mimic the IPP v3 entities
* IPP v3 XSD: XSDs that specify the objects that can be used with IPP v3 APIs


FOLDER STRUCTURE
----------------

Package structure:

* _PhpDocs: generated docs (via phpdocumentor)
* _Samples: A variety of isolated samples that demonstrate the use of the SDK for various operations including creating an entity, running a query, deleting entities, etc.
* Core: supporting classes required by SDK 
* DataService: Data Services, Service Context, Platform Services, and related functionality.
* Data: POPO classes that mimic the XSD object model for IPP v3 entities.  Auto-generated via build script, based on XSDs. 
* Diagnostics: classes that responsible for logging 
* Exception: custom exception types which handles most aspect of interaction with API
* PlatformService: Intuit Platform services class
* QueryFilter: contains class which helps construct complex queries (check _Samples/QueryBuilder.php)
* Security: oAuth validation
* Utility: classes that performs technical tasks such us serialization and compression 
* WebhooksService: Provide Webhooks Support
* XSD2PHP: 3th party library

Repository structure:

* sdk: Data Services, Service Context, Platform Services, and related functionality.
* sdk/Data: POPO classes that mimic the XSD object model for IPP v3 entities.  Auto-generated via build script, based on XSDs.
* docs: generated docs (via phpdocumentor)
* build: phing-based scripts to build POPO objects based on XSD inputs, generate docs, run tests, etc.
* dependencies: 3rd party external dependencies
* schemas: XSDs that specify the objects to be used with IPP v3
* tests: Currently contains unit tests for POPO objects, but will contain tests for other parts of the SDK in the future
* samples: A variety of isolated samples that demonstrate the use of the SDK for various operations including creating an entity, running a query, deleting entities, etc.


RUN-TIME DEPENDENCIES
---------------------

The XSD2PHP dependency is derived from https://github.com/moyarada/XSD-to-PHP with certain modifications that are believed to be of limited use beyond this SDK, therefore there is no plan to send a pull request to the broader project.

