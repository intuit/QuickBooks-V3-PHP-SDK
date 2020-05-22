<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;

$dataService = DataService::Configure(array(
       'auth_mode' => 'oauth2',
         'ClientID' => "AB8mwwMzieGcS6BftIYx5v96xmED16oh4ED9If4Ij78ewdieOS",
         'ClientSecret' => "HDc9V7McPHJTk0PTytZEUfYGT3GhlTDzVPkbz1HK",
         'accessTokenKey' =>  "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..uNS2RMVKI2-UdHflSdr4GA.n-iG7J-SIDV10f2PFuo9WYSgax2b_KzebTNYOqOWO8MfU3M2mbo7TkGjOIU1FJxXUqIAtBBV7Yak_psyIsEWWg5iAcNzn0twoFIIcZRn6wmk0tGfbJ_nHlcrVY026Uw1rLgg7Y0leapQ1i5YnP2Cg1MoqS32hKineXVZJYNE5t2vBaYjKVMkFyn2BaeYcR7uouHDw90fYWyadNxWm6CvSwyP2gWJXR-lSx0M0tBc-WlTU9o8UZjlIe3LJ-mFOVX1--eEZtQg90RneaXuva9SBDCo0w3noTsAzQ9sjN87ZTbjJzzaSN9iE-WM-0N7l-2jEsGPORjOZ2Tjkx_Yxq-6rwJuaLlRPWpvo98rrG1pPfRU2YdQtt1d3v3K4gy2otwHAt4O8bqYUYXupzsKDbQGXEn4o-OGQY73F2RDQxMgMKeoekZJ0bc5E_N3GjjwKWtce0nEnz8LjD1KDCS3U9_2yNWYTDubhRJNTAImBxw5y5qVEMl_TWVakbDK5iXny96JdBM-mc1lnZbJD2y4SJ-SQ5LlGb7ezgFTGQUA7Gwo7bYwardsh73nlbot826vK0sgP_73NuLs24QJ-Z86XvJLZOhEKnqasJapxLtVPS0r3tvevL4HnDcmJd_d4nP9aazcSggd0ynQRM0Aw4cnNYg5WOO1m9CAcw9momyO9XJguH4m6dkd7b2DOUxC21pNRh13iJYJ-cS-8QwjjMGHlnoAnlE9F4GLUDMcV28qq_Sd9c2CEUnWDAaHw04N3Q2JiKF3VeEA7Gv8BB-ZkQBXEQB4FLeH5OZ_s2zGlbO3yQqyUBqv_-2rvRkowWlfXWgurMFMcbmeAKgxeuXajoSY0hCEPjE1zAg1Fv_vhUD087e9hgkWnuBP2KGR5Z6Lj06ioENk.gt5aiIiBeawMdgmdJMjAbQ",
         'refreshTokenKey' => 'AB115988354734PUgx5h4HUNdqog6KRBTJjZCV2GK0WSRO1rKi',
         'QBORealmID' => "4620816365006687740",
         'baseUrl' => "development"
));

$dataService->setLogLocation("/Users/bsivalingam/Desktop/newFolderForLog");


$resultingCustomerObj = $dataService->getEntitlementsResponse();
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
} else {
    var_dump($resultingCustomerObj);
}
