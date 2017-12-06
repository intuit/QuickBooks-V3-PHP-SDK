==========
Authorization
==========

This page provides a quick introduction to QuickBooks Online Authorization Protocol: OAuth 1.0a and OAuth 2.0, and how to use it in the SDK. If you have not already installed QuickBooks V3 SDK, head over to the :ref:`installation`
page.


OAuth 1.0a
================

For all developer accounts registered at https://developer.intuit.com before **July.17th, 2017**, they will have OAuth 1.0a protocol default for their apps. 

The developer will see "App Token", "OAuth Consumer Key", and "OAuth Consumer Secret" on the "Keys" tab in the app.

QuickBooks V3 SDK didn't provide a way to generate OAuth 1.0a tokens from OAuth Consumer Key and OAuth Consumer Secret. Developers must generate their own OAuth 1.0a tokens *BEFORE* they use the SDK. 

.. note::

    QuickBooks Online provides an online tool called OAuth 1.0 Playground to help developers generate OAuth 1.0a tokens:
    https://appcenter.intuit.com/Playground/OAuth/IA/ without writing any code.
    For server side web application implementing OAuth 1.0a, please refer here:
    https://intuitdeveloper.github.io/ for sample code. For implementation details, please refer to here:
    https://developer.intuit.com/docs/00_quickbooks_online/2_build/10_authentication_and_authorization/40_oauth_1.0a
    
    
After developer managed to get OAuth 1.0a tokens, provides it to the DataService object:

.. code-block:: php

    use QuickBooksOnline\API\DataService\DataService;

    // Prep Data Services
    $dataService = DataService::Configure(array(
         'auth_mode' => 'oauth1',
         'consumerKey' => "The OAuth Consumer key Value from Keys tab",
         'consumerSecret' => "The OAuth Consumer secret Value from Keys tab",
         'accessTokenKey' => "The OAuth 1.0a access token returned from QuickBooks Online",
         'accessTokenSecret' => "The OAuth 1.0a access token secret retruned from QuickBooks Online",
         'QBORealmID' => "The Company ID which the app wants to access",
         //If you are using Development Keys, use Development here. If you are using Production Keys, use Production.
         'baseUrl' => "Development/Production"
    ));
    
Here is an actual example for configuring OAuth 1.0a value for a sandbox Company:

.. code-block:: php

    use QuickBooksOnline\API\DataService\DataService;

    // Prep Data Services
    $dataService = DataService::Configure(array(
         'auth_mode' => 'oauth1',
         'consumerKey' => "qyprdUSoVpIHrtBp0eDMTHGz8UXuSz",
         'consumerSecret' => "TKKBfdlU1I1GEqB9P3AZlybdC8YxW5qFSbuShkG7",
         'accessTokenKey' => "qyprdxccscoNl7KRbUJoaJQIhUvyXRzD9tNOlXn4DhRDoj4g",
         'accessTokenSecret' => "JqkHSBKzNHbqjMq0Njbcq8fjgJSpfjMvqHVWnDOW",
         'QBORealmID' => "193514464689044",
         'baseUrl' => "Development"
    ));    

OAuth 2.0
================


.. code-block:: php

    use GuzzleHttp\Client;

    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'http://httpbin.org',
        // You can set any number of default request options.
        'timeout'  => 2.0,
    ]);




Environment Variables
=====================

Guzzle exposes a few environment variables that can be used to customize the
behavior of the library.

``GUZZLE_CURL_SELECT_TIMEOUT``
    Controls the duration in seconds that a curl_multi_* handler will use when
    selecting on curl handles using ``curl_multi_select()``. Some systems
    have issues with PHP's implementation of ``curl_multi_select()`` where
    calling this function always results in waiting for the maximum duration of
    the timeout.
``HTTP_PROXY``
    Defines the proxy to use when sending requests using the "http" protocol.
    
    Note: because the HTTP_PROXY variable may contain arbitrary user input on some (CGI) environments, the variable is only used on the CLI SAPI. See https://httpoxy.org for more information.
``HTTPS_PROXY``
    Defines the proxy to use when sending requests using the "https" protocol.


Relevant ini Settings
---------------------

Guzzle can utilize PHP ini settings when configuring clients.

``openssl.cafile``
    Specifies the path on disk to a CA file in PEM format to use when sending
    requests over "https". See: https://wiki.php.net/rfc/tls-peer-verification#phpini_defaults
