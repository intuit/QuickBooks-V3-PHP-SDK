<?php

require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once(PATH_SDK_ROOT . 'QueryFilter/QueryMessage.php');

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

// Create a new Purchase Object
$randomPurchaseObj = CreatePurchaseObj($dataService);
$purchaseObjConfirmation = $dataService->Add($randomPurchaseObj);
echo "Created Purchase object, and received Id={$purchaseObjConfirmation->Id}\n";

// Delete the recently-created Purchase Object
$crudResultObj = $dataService->Delete($purchaseObjConfirmation);
if ($crudResultObj)
	echo "Delete the purchase object that we just created.\n";
else
	echo "Did not delete the purchase object that we just created.\n";



/**
 * Create a valid Purchase object locally, caller will convey to the cloud via CREATE
 */
function CreatePurchaseObj($dataServices)
{
	$AccountArray=array();

	$AccountArray['Banks'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
	if (!$AccountArray['Banks'])
		return array();
	$bankAccountId = $AccountArray['Banks'][0]->Id;

	$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
	if (!$AccountArray['Expense'])
		return array();
	$expenseAccountId = $AccountArray['Expense'][0]->Id;
				
	$oneLine = new IPPLine(array('Description'=>'some line item',
	                                 'Amount'     =>'7.50',
	                                 'DetailType' =>'AccountBasedExpenseLineDetail',
	                                 'AccountBasedExpenseLineDetail'=>
	                                  	new IPPAccountBasedExpenseLineDetail(
	                                  	    array('AccountRef'=>
	                                  	        new IPPReferenceType(array('value'=>$expenseAccountId)),
	                                  	        'DetailType' =>'AccountBasedExpenseLineDetail',
	                                         )
	                                    ),
	                                 )
	                          );	
	
	$targetObj = new IPPPurchase();
	$targetObj->Name = 'Some Name'.rand();
	$targetObj->TotalAmt='15.00';
	$targetObj->PaymentType='Check';
	$targetObj->AccountRef=new IPPReferenceType(array('value'=>$bankAccountId));
	$targetObj->Line=array($oneLine,$oneLine);

	return $targetObj;

}

/*
Example output:

Created Purchase object, and received Id=807
Found the purchase object that we just created.
*/

?>
