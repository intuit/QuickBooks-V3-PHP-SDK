<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;


$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'RedirectURI' => "https://b200efd8.ngrok.io/OAuth2_c/OAuth_2/OAuth2PHPExample.php",
  'scope' => "com.intuit.quickbooks.accounting",
  'baseUrl' => "production"
));

$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();
$result = $OAuth2LoginHelper->OAuth1ToOAuth2Migration("qyprdfv4WnI3X47vpYJAkbvDKKT33J", "0mWGSoIWq2q8tDHEvmKjG34rBO8pqyhiJZdS1n4U", "qyprdEUxdMv94gvvJhQtZaCxJcU19RiEE9BLbVYBeicbWWis", "tKUFEl7fJTuzKrzgnouJYmqJaTSE31lgbGfY8hDb", "com.intuit.quickbooks.accounting", null, "Production");
var_dump($result);
