<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;


$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret' => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
));


$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

$accessToken = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";


$myarray = $OAuth2LoginHelper->getUserInfo($accessToken);
echo "the given name is:" . $myarray['givenName'] . "\n";
echo "the family name is:" . $myarray['familyName'] . "\n";
echo "the Email is:" . $myarray['email'] . "\n";

?>
