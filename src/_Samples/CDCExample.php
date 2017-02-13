<?php

require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

//Specify QBO or QBD
$serviceType = IntuitServicesType::QBO;

// Get App Config
$realmId = ConfigurationManager::AppSettings('RealmID');
if (!$realmId)
	exit("Please add realm to App.Config before running this sample.\n");

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");


// Use CDC APIs
$entityList = array('Customer','Vendor');
$changedSince = time() - 50*(24*60*60); // 50 days ago

$cdcResponse = $dataService->CDC($entityList, $changedSince);
if ($cdcResponse->entities)
{
	foreach($cdcResponse->entities as $entityName => $entityArray)
	{
		echo "CDC Says " . count($entityArray) . " Updated Entities of Type = {$entityName}\n";
	}
}

/*
Example output:

CDC Says 318 Updated Entities of Type = Customer
CDC Says 278 Updated Entities of Type = Vendor
*/

?>
