V3PHPSDK
========

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


BUILD-TIME DEPENDENCIES
-----------------------

Before attempting to rebuild/regenerate the POPO classes or documentation, install the following dependencies:

* phing (http://www.phing.info/trac/wiki/Users/Download)
* phpdocumentor (http://www.phpdoc.org/docs/latest/for-users/installation/using-pear.html#instructions)
* graphviz (http://www.graphviz.org/Download.php)
* xdebug (http://xdebug.org/docs/install)

Optional dependencies:

* You may wish to launch `phing` via a Jenkins build process, especially if inspecting the jUnit test output.  If so, install jenkins, the phing plug-in, and follow the steps here: http://webdevbyjoss.blogspot.com/2012/06/easy-start-with-jenkins-for-php.html 


BUILD NOTES
-----------

Do NOT run the samples or any of the tests against a RealmId that contains any real accounting data.  The tests and samples are highly invasive.

To build, run 'cd build; phing all'.  This will cause:

* Deletion of sdk/Data and /docs
* Auto-generation of new sdk/Data folder based on XSDs from /schemas
* Auto-generation of new /docs based on sdk/Data
* Auto-run of all tests


RUNNING THE SAMPLES
-------------------

Do NOT run the samples or any of the tests against a RealmId that contains any real accounting data.  The tests and samples are highly invasive.

Presuming that you've filled out your .config files as described earlier in this document, running the samples should be as easy as:

 * cd samples
 * php CustomerCreate.php
 

COMMON MISTAKES
---------------

The most common mistake is forgetting to configure the *.config files before using the SDK.  Forgetting this step, will lead to certain failure, likely including exceptions that output errors such as "The consumer key cannot be empty".  If you encounter an error similar to that, it is likely that you need to revisit the "BEFORE YOU GET STARTED" section.

