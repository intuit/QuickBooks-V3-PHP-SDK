<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Diagnostics\TraceLevel;

// Prep Data Services
$dataService = DataService::Configure(array(
  'auth_mode'       => 'oauth2',
  'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX..XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
  'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
  'QBORealmID'      => "xxxxxxxxxxxxxxxxxxx",
  'baseUrl'         => "development",
  'enableRequestLogging' => true,
  'loggingTraceLevel' => TraceLevel::Verbose,
));

$dataService->setLogLocation(CoreConstants::DEFAULT_LOGGINGLOCATION);

// Run a query
$entities = $dataService->Query("Select count(*) from Invoice");
$error = $dataService->getLastError();
if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
    exit();
}
// Echo some formatted output
var_dump($entities);

/*
Example output:

Customer[0] GivenName: Jimco LLC	(Created at 2013-06-29T22:06:45-07:00)
Customer[1] GivenName: ACME Corp	(Created at 2013-06-29T22:10:18-07:00)
Customer[2] GivenName: Smithco Inc.	(Created at 2013-06-29T22:11:57-07:00)
Customer[3] GivenName: Special Inc.	(Created at 2013-06-29T22:13:34-07:00)
*/
