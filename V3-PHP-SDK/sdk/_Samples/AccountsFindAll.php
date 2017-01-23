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

// Iterate through all Accounts, even if it takes multiple pages
$i = 1;
while (1) {
	$allAccounts = $dataService->FindAll('Account', $i, 500);
	if (!$allAccounts || (0==count($allAccounts)))
		break;
	
	foreach($allAccounts as $oneAccount)
	{
		echo "Account[".($i++)."]: {$oneAccount->Name}\n";
		echo "\t * Id: [{$oneAccount->Id}]\n";
		echo "\t * AccountType: [{$oneAccount->AccountType}]\n";
		echo "\t * AccountSubType: [{$oneAccount->AccountSubType}]\n";
		echo "\t * Active: [{$oneAccount->Active}]\n";
		echo "\n";
	}
}

/*

Example output:

Account[0]: Travel Meals
	 * Id: NG:42315
	 * AccountType: Expense
	 * AccountSubType: 

Account[1]: COGs
	 * Id: NG:40450
	 * AccountType: Cost of Goods Sold
	 * AccountSubType: 

...

*/
?>
