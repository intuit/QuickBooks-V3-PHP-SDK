<?php

require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

// Tell us whether to use your QBO vs QBD settings, from App.config
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

// Prep Platform Services
$platformService = new PlatformService($serviceContext);

// Get App Menu HTML
$html = $platformService->GetAppMenu();

echo $html;


/*
Example output:

<span class="intuitPlatformAppMenuDropdownHeader">My apps for MyCo Production LLC:</span>
    <div id="intuitPlatformAppMenuDropdownAppsListScroll">
        <div class="intuitPlatformAppMenuDropdownAppsListScrollbar">

...etc...
*/

?>
