<?php

require_once('../sdk/config.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('IPPTestsStatic.php');
require_once('IPPTestBase.php');

date_default_timezone_set('America/Chicago');

class IPP_Attachable_Test extends IPPTestBase {

	public function prep($dataServices, $serviceType) {

		$billTest = new IPP_Vendor_Test();
		$billTest->Create($dataServices);

		$billTest = new IPP_Bill_Test();
		$billTest->Create($dataServices);
	}

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {

		// Query to find an invoice to attribute this attachment to
		$objArray = $dataServices->Query("SELECT * FROM Bill", 1,10);
		if (!$objArray)
		{
			// IDS probably returned a payload containing AllowOnlinePayment, which we are unable to
			// parse because it is absent from the XSDs
			echo "Abort IPP_Attachable_Test run due to lack of pre-existing Bills.";
			return array();
		}
		$objId = $objArray[0]->Id;

		// Create Attachable					
		$EntityRef = new IPPEntityTypeRef(array('Type'=>'Bill', 'EntityRef'=> new IPPReferenceType(array('value'=>$objId))));
		$AttachableRef = array('AttachableRef'   => new IPPAttachableRef(array('EntityRef'=>$EntityRef)),
		                       'Note'            => 'Some description',
		                       );

		return $AttachableRef;		                       
	}
	
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		
		$oneObj = IPP_Attachable_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
		
		$oneObj['Note']='Some test 34';
		
		return $oneObj;
	}
	
}

class IPP_Account_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		return array(
		      'Name'        => 'Acct' . rand() . rand(),
		      'AccountType' => 'Expense',
		      'Description' => "Originally created @ " . date(DATE_ATOM)
		      );
	}
	
}

class IPP_Bill_Test extends IPPTestBase {

	public function prep($dataServices, $serviceType) {
		$vendorTest = new IPP_Vendor_Test();
		$vendorTest->prep($dataServices, $serviceType);
		$vendorTest->Create($dataServices);
	}

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		
		// Query to find an expense account to attribute this expense to
		$AccountArray=array();
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;

		// Query to find an Vendor to attribute this bill to
		$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
		if (!$VendorArray)
			return array();
		$vendorId = $VendorArray[0]->Id;
					
		// Create lines					
		$PaymentLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'7.50',
		                                 'DetailType' =>'AccountBasedExpenseLineDetail',
		                                 'AccountBasedExpenseLineDetail'=>
		                                  	new IPPAccountBasedExpenseLineDetail(
		                                  	    array('AccountRef'=>
		                                  	        new IPPReferenceType(array('value'=>$expenseAccountId))
		                                         )
		                                    ),
		                                 )
		                          );	
		$PaymentLines = array($PaymentLine,$PaymentLine);
							
		// Create bill					
		return array('Name'        => randTimestampString('Acct'),
		             'VendorRef'   => new IPPReferenceType(array('value'=>$vendorId)),
		             'TotalAmt'    => '15.00',
		             'Line'        => $PaymentLines
		            );
	}
		
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		
		// Query to find an bill to attribute this attachment to
		$objArray = $dataServices->Query("SELECT * FROM Bill", 1,200);
		if (!$objArray)
		{
			echo "Unable to dynamically generate Bill contents (1)\n";
			return array();
		}
		
		foreach($objArray as $oneObj)
		{
			$objectVars = get_object_vars($oneObj);
			
			// Trivial field update
			$objectVars['PrivateNote'] = 'Some private note';
			
			// Avoid situation where UPDATE is rejected due to Lines that had a 
			// pre-existing error (possible!)
			$randomBillObj = IPP_Bill_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
			$objectVars['Line'] = $randomBillObj['Line'];
			$objectVars['TotalAmt'] = $randomBillObj['TotalAmt'];
			
			return $objectVars;
		}

		echo "Unable to dynamically generate Bill contents (2)\n";
		return array();
	}
        
        public function isCustomVerification() {
            return true;
        }
        
        public function doCustomVerification($actual = null, $expected = null)
        {
            $result = $actual instanceof IPPBill;
            $result = $result && ( !empty($actual->HomeBalance)  );
            return array($result,__METHOD__ . ": one of the values failed verification");
        }
}


class IPP_BillPayment_Test extends IPPTestBase { 

	public function prep($dataServices, $serviceType) {
		$bankAccount = new IPPAccount();
		$bankAccount->Name = "Random Bank " . rand();
		$bankAccount->AccountType = "Bank";
		$bankAccount->Description = "Created by Estimate Test Case";
		$bankAccountResult = $dataServices->Add($bankAccount);
		
		$billTest = new IPP_Bill_Test();
		$billTest->prep($dataServices, $serviceType);
		$billTest->Create($dataServices);
	}
	
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		
		// Query to find an invoice to attribute this LinkedTxn to
		$billArray = $dataServices->Query("SELECT * FROM Bill WHERE TotalAmt > '0'", 1,100);
		if (!$billArray)
		{
			echo "No pre-existing Bills found, thus cannot proceed with this test case.\n";
			return array();
		}
		$billId = $billArray[0]->Id;
		$totalAmt =  $billArray[0]->TotalAmt;
		$AccountArray['Banks'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
		if (!$AccountArray['Banks'])
			return array();
		$bankAccountId = $AccountArray['Banks'][0]->Id;
					
		$linkedTxnLine = new IPPLine(array('Amount' => $totalAmt,
		                                 'LinkedTxn'=>
		                                  	new IPPLinkedTxn(array('TxnId'=>new IPPid(array('value'=>$billId)),
		                                    'TxnType'=>'Bill'
		                                   )
										)
									)
		                          );
								  
		$billPaymentLines = array($linkedTxnLine);
				
		// Create billpayment				
		return array('CheckPayment' => new IPPBillPaymentCheck(array('BankAccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)))),
					 'Line' => $billPaymentLines,
					 'PayType' => 'Check',
					 'PrivateNote' => 'Some private note',
		             'TotalAmt'    => $totalAmt,
					 'TxnDate'    => date("Y-m-d"),
		             //'VendorRef'    => new IPPReferenceType(array('value'=>$vendorId))
					 'VendorRef'    => $billArray[0]->VendorRef
		            );
	}
		
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array(
		       'PrivateNote'        => 'Note ' . rand()
		       );
	}
}


class IPP_Class_Test extends IPPTestBase {
	
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	   return array(
	          'Name'        => 'Class' . rand()
	          );
	}
	
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array(
		       'Description'        => 'Class Desc ' . rand()
		       );
	}
}

class IPP_CreditMemo_Test extends IPPTestBase {

	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
				
		$AccountArray=array();

		$incomeAccount = new IPPAccount();
		$incomeAccount->Name = "Random Income Acct " . rand();
		$incomeAccount->AccountType = "Income";
		$incomeAccount->Description = "Created by CreditMemo Test Case";
		$incomeAccountResult = $dataServices->Add($incomeAccount);
		$incomeAccountId = $incomeAccountResult->Id;
		
		$item = new IPPItem();
		$item->Name = randTimestampString('CreditMemo ItemA');
		$item->Type = 'Service';
		$item->IncomeAccountRef = new IPPReferenceType(array('value'=>$incomeAccountId));
		$createdItem = $dataServices->Add($item);
		$itemId = $createdItem->Id;
		
		$CustomerArray=array();
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1, 10);
		if (!$CustomerArray)
			return array();
		$customerId = $CustomerArray[0]->Id;
		$customerRef = new IPPReferenceType(array('value'=>$customerId,'type'=>'customer'));

		$PaymentLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'7.50',
		                                 'DetailType' =>'SalesItemLineDetail',
										 'SalesItemLineDetail'
										    =>new IPPSalesItemLineDetail(
										            array(
										     	          'ItemRef'=>new IPPReferenceType(array('value'=>$itemId))
										            )
										    )
		                                 )
		                          );	
		                          		
		return array('PrivateNote' => 'A credit memo',
		             'Line'        => array($PaymentLine,$PaymentLine),
		             'CustomerRef' => $customerRef
		            );
	}
	
	
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		
		// Query to find an invoice to attribute this attachment to
		$objArray = $dataServices->Query("SELECT *, Line.* FROM CreditMemo", 1,10);
		if (!$objArray)
		{
			return array();
		}
		
		foreach($objArray as $oneObj)
		{
			if (count($oneObj->Line)>=1)
			{
				$objectVars = get_object_vars($oneObj);
				
				// Trivial field update
				$objectVars['PrivateNote'] = 'Some private note';
				$randomInvoiceObj = IPP_CreditMemo_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
				$objectVars['Line'] = $randomInvoiceObj['Line'];
				
				return $objectVars;
			}
		}

		return array();
	}
        
        public function isCustomVerification() {
            return true;
        }
        
        public function doCustomVerification($actual = null, $expected = null)
        {
            $result = $actual instanceof IPPCreditMemo;
            $result = $result && ( !empty($actual->HomeBalance)  );
            return array($result,__METHOD__ . ": one of the values failed verification");
        }
}


class IPP_CompanyInfo_Test extends IPPTestBase {}
class IPP_Customer_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		return array(
		             'Name'        => 'Name' . rand(),
		             'CompanyName' => 'Co' . rand(),
		             'DisplayName' => 'Disp' . rand(),
		             'GivenName'   => 'Given' . rand(),
		             'Description' => "Originally created @ " . date(DATE_ATOM)
		             );
	}
	
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array(
		             'Description'        => 'Desc ' . rand()
		             );
	}
        
        public function customTestMinorVersion4($dataService) {
            $rand = "TI" . rand();
            $fields = self::getDynamicCreateKeyValues($dataService, null);
            $item = new IPPCustomer($fields);
            $item->PrimaryTaxIdentifier = $rand;
            $response = $dataService->Add($item);
            return $response->PrimaryTaxIdentifier === $rand;
        }


}

class IPP_Department_Test extends IPPTestBase {}


class IPP_Deposit_Test extends IPPTestBase { 

	public function prep($dataServices, $serviceType) {
		$bankAccount = new IPPAccount();
		$bankAccount->Name = "Random Bank " . rand();
		$bankAccount->AccountType = "Bank";
		$bankAccount->Description = "Created by Deposit Test Case";
		$bankAccountResult = $dataServices->Add($bankAccount);
	}
	
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		
		$AccountArray=array();
		
		$AccountArray['Banks'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
		if (!$AccountArray['Banks'])
			return array();
		$bankAccountId = $AccountArray['Banks'][0]->Id;
		$bankAccountName = $AccountArray['Banks'][0]->Name;
	
		$query = "SELECT * FROM TaxCode";
		$taxCodes = $dataServices->Query($query, 1,1);

		$txnTaxDetail = new IPPTxnTaxDetail();
		$txnTaxDetail->DefaultTaxCodeRef = new IPPReferenceType(array('value'=>$taxCodes[0]->Id));
		$txnTaxDetail->TotalTax = 100.00;
		
		$query = "SELECT * FROM Item";
		$items = $dataServices->Query($query, 1,1);
		
		// Create lines					
		$taxLine = new IPPLine(array('LineNum'=>'1',
									 'Description'=>'Description',
		                             'Amount'     =>'100.00',
		                             'DetailType' =>'SalesItemLineDetail',
		                             'SalesItemLineDetail'=>
		                                  	new IPPSalesItemLineDetail(
		                                  	    array('TaxCodeRef'=>new IPPReferenceType(array('value'=>$taxCodes[0]->Id)),
													  'ItemRef'=>new IPPReferenceType(array('value'=>$items[0]->Id))
		                                         )
		                                    ),
		                                 )
		                          );
	
		// Create Deposit
		return array('DepositToAccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)),
					 'TotalAmt' => '100.00',
		             'DocNumber'    => 'DocNum' . rand(10000,99999),
					 'TxnDate'    => date("Y-m-d"),
					 'PrivateNote'    => 'PrivateNote' . rand(),
					 'TxnTaxDetail' => $txnTaxDetail,
					 'Line' => array($taxLine)
		            );
	}
		
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array(
		       'PrivateNote'        => 'Note ' . rand()
		       );
	}
}

class IPP_Employee_Test extends IPPTestBase {}

class IPP_Estimate_Test extends IPPTestBase {

	// Set up any/all pre-requisites
	public function prep($dataServices, $serviceType) {
		$bankAccount = new IPPAccount();
		$bankAccount->Name = "Random Bank " . rand();
		$bankAccount->AccountType = "Bank";
		$bankAccount->Description = "Created by Estimate Test Case";
		$bankAccountResult = $dataServices->Add($bankAccount);
		
		$incomeAccount = new IPPAccount();
		$incomeAccount->Name = "Random Income Account " . rand();
		$incomeAccount->AccountType =  'Income';
		$incomeAccountResult = $dataServices->Add($incomeAccount);
		
		$incomeItem = new IPPItem();
		$incomeItem->Name = "Random Income Item " . rand();
		$incomeItem->Type = "Service";
		$incomeItem->IncomeAccountRef = new IPPReferenceType(array('value'=>$incomeAccountResult->Id));
		$incomeItemResult = $dataServices->Add($incomeItem);	
	}

	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	
		$AccountArray=array();
		
		$AccountArray['Banks'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
		if (!$AccountArray['Banks'])
			return array();
		$bankAccountId = $AccountArray['Banks'][0]->Id;
		
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;

		$ItemArray=array();
		$ItemArray = $dataServices->Query("SELECT * FROM Item", 1, 10);
		if (!$ItemArray)
			return array();
		$itemId = NULL;
		foreach($ItemArray as $oneItem)
		{
			if ($oneItem->IncomeAccountRef)
			{
				$itemId = $oneItem->Id;
				break;
			}
		}
		if (!$itemId)
			return array();
		
		$CustomerArray=array();
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1, 10);
		if (!$CustomerArray)
			return array();
		$customerId = $CustomerArray[0]->Id;
		$customerRef = new IPPReferenceType(array('value'=>$customerId,'type'=>'customer'));
		

		$PaymentLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'7.50',
		                                 'DetailType' =>'SalesItemLineDetail',
										 'SalesItemLineDetail'
										    =>new IPPSalesItemLineDetail(
										            array(
										     	          'ItemRef'=>new IPPReferenceType(array('value'=>$itemId))
										            )
										    )
		                                 )
		                          );	
		                          		
		$PaymentLines = array($PaymentLine,$PaymentLine);
		
		if (IntuitServicesType::QBO == $serviceType)							
			return array('Name'        => randTimestampString('Acct'),
						 'AccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)),
						 'CustomerRef'=>$customerRef,
						 'TotalAmt'    => '15.00',
						 'PaymentType' => 'Check',
						 'Line'        => $PaymentLines
						);
		else
			return array('Name'        => randTimestampString('Acct'),
						 'AccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)),
						 'CustomerRef'=>$customerRef,
						 'TotalAmt'    => '15.00',
						 'Line'        => $PaymentLines
						);
	}
	
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return IPP_Estimate_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
	}
}

class IPP_Invoice_Test extends IPPTestBase {

	public function prep($dataServices, $serviceType) {

		// Prepare prereqs
		$AccountArray = array();
		$AccountArray['Income'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Income'", 1,10);
		if (!$AccountArray['Income'])
		{
			echo "No Income account found - please create one as a prerequisite\n";
			return array();
		}
		$incomeAccountId = $AccountArray['Income'][0]->Id;
		
		$safetyCount = 0;	
		$bFoundIncomeItem = FALSE;
		while (FALSE == $bFoundIncomeItem)
		{
			if ($safetyCount>10)
				return;	
	
			$bFoundIncomeItem = FALSE;
			$incomeItemFoundObj = FALSE;
			$ItemArray=array();
			$ItemArray = $dataServices->Query("SELECT * FROM Item", 1, 500);
			if ($ItemArray)
			{
				foreach($ItemArray as $oneItem)
				{
					if ($oneItem->Type == 'Service')
					{
						$bFoundIncomeItem = TRUE;
						$incomeItemFoundObj = $oneItem;
					}
				}
			}
			
			/* Always Create the item
			if ($bFoundIncomeItem)
			{
				$incomeAcctObj = new IPPAccount();
				$incomeAcctObj->Name = "Income " . rand();
				$incomeAcctObj->AccountType = 'Income';
				$incomeAcctResultObj = $dataServices->Add($incomeAcctObj);
				
				$incomeItemFoundObj->IncomeAccountRef = new IPPReferenceType(array('value'=>(string)$incomeAcctResultObj->Id));
				//$incomeItemFoundObj->ExpenseAccountRef = NULL;  // Unsure why this is necessary

				// Delete all sales receipts, because they may reference the item that we're about to modify
				$entities = $dataServices->Query("SELECT * FROM SalesReceipt");
				if ($entities)
				{
					foreach($entities as $oneSalesReceipt)
					{
						$dataServices->Delete($oneSalesReceipt);
					}
				}

				// Delete all Invoices, because they may reference the item that we're about to modify
				$entities = $dataServices->Query("SELECT * FROM Invoice");
				if ($entities)
				{
					foreach($entities as $oneInvoice)
					{
						try {
							$dataServices->Delete($oneInvoice);
						}
						catch(Exception $e)
						{
							//echo "Invoice deletion failed\n";
						}
					}
				}

				$dataServices->Update($incomeItemFoundObj);
			}
			else if (!$bFoundIncomeItem && (100==count($ItemArray)))
			{
				foreach($ItemArray as $oneItem)
				{
					$oneItem->Type = 'Service';
					$oneItem->IncomeAccountRef = new IPPReferenceType(array('value'=>$incomeAccountId));
	
					// Delete all sales receipts, because they may reference the item that we're about to modify
					$entities = $dataServices->Query("SELECT * FROM SalesReceipt");
					if ($entities)
					{
						foreach($entities as $oneSalesReceipt)
						{
							try {
								$dataServices->Delete($oneSalesReceipt);
							}
							catch(Exception $e)
							{
								echo "Sales Receipt deletion failed\n";
							}
						}
					}

					// Delete all Invoices, because they may reference the item that we're about to modify
					$entities = $dataServices->Query("SELECT * FROM Invoice");
					if ($entities)
					{
						foreach($entities as $oneInvoice)
						{
							$dataServices->Delete($oneInvoice);
						}
					}
	
					$dataServices->Update($oneItem);
					break;
				}
			}
			else
			{
				$itemObj = new IPPItem();
				$itemObj->Name = "Some income " . rand();
				$itemObj->Type = 'Service';
				$itemObj->IncomeAccountRef = new IPPReferenceType(array('value'=>$incomeAccountId));
				$itemResultObj = $dataServices->Add($itemObj);
			}*/
			
			$itemObj = new IPPItem();
			$itemObj->Name = "Some income " . rand();
			$itemObj->Type = 'Service';
			$itemObj->IncomeAccountRef = new IPPReferenceType(array('value'=>$incomeAccountId));
			$itemResultObj = $dataServices->Add($itemObj);
		}
	}

	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {


		$accountObj = new IPPAccount();
		$accountObj->AccountType='Expense';
		$accountObj->Name='Name' . rand();
		$expenseAccountObj = $dataServices->Add($accountObj);
		$expenseAccountId = $expenseAccountObj->Id;
		
		$CustomerArray=array();
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1, 10);
		if (!$CustomerArray)
		{
			echo "No pre-existing Customer found, thus cannot proceed with this test case.\n";
			return array();
		}
		$customerId = $CustomerArray[0]->Id;
//echo "\nCustomer Id found = $customerId \n";		
		$customerRef = new IPPReferenceType(array('value'=>$customerId,'type'=>'customer'));
//var_dump($customerRef);
//echo "\n";
		$ItemArray=array();
		$ItemArray = $dataServices->Query("SELECT * FROM Item", 1, 500);
		if (!$ItemArray)
		{
			echo "No pre-existing Item found, thus cannot proceed with this test case.\n";
			return array();
		}

		$itemId = NULL;
		foreach($ItemArray as $oneItem)
		{
			if ($oneItem->IncomeAccountRef)
			{
				$itemId = $oneItem->Id;
				break;
			}
		}
		if (!$itemId)
		{
			echo "No pre-existing Item with IncomeAccountRef found, thus cannot proceed with this test case.\n";
			return array();
		}

		$oneLine = new IPPLine(array('Description'=>'some line item',
		                             'Amount'     =>'7.50',
		                             'DetailType' =>'SalesItemLineDetail',
		                             'SalesItemLineDetail'
		                                 =>new IPPSalesItemLineDetail(
		                                         array(
		                                  	          'ItemRef'=>new IPPReferenceType(array('value'=>$itemId))
		                                         )
		                                 )
		                             )
		                          );	
		                          		
		$allLines = array($oneLine,$oneLine);
		
		//echo "\nCustomer Id Ref found = {$customerRef->value} \n";		
							
		return array('TotalAmt'    => '15.00',
		             'CustomerRef' => $customerRef,
		             'Name'        => randTimestampString('Some Name'),
		             'Line'        => $allLines
		            );
	}
	
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		
		// Query to find an invoice to attribute this attachment to
		$objArray = $dataServices->Query("SELECT * FROM Invoice", 1,200);
		if (!$objArray)
		{
			echo "Unable to dynamically generate Invoice contents (1)\n";
			return array();
		}
		
		foreach($objArray as $oneObj)
		{
			$objectVars = get_object_vars($oneObj);
			
			// Trivial field update
			$objectVars['PrivateNote'] = 'Some private note';
			
			// Avoid situation where UPDATE is rejected due to Lines that had a 
			// pre-existing error (possible!)
			$randomInvoiceObj = IPP_Invoice_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
			$objectVars['Line'] = $randomInvoiceObj['Line'];
			$objectVars['TotalAmt'] = $randomInvoiceObj['TotalAmt'];
			
			return $objectVars;
		}

		echo "Unable to dynamically generate Invoice contents (2)\n";
		return array();
	}
        
        
        public function isCustomVerification() {
            return true;
        }
        
        public function doCustomVerification($actual = null, $expected = null)
        {
            $result = $actual instanceof IPPInvoice;
            $result = $result && ( !empty($actual->HomeBalance)  );
            return array($result,__METHOD__ . ": one of the values failed verification");
        }
        
        public function customTestMinorVersion4($dataService) {
            $fields = self::getDynamicCreateKeyValues($dataService, null);
            $item = new IPPInvoice($fields);
            $item->GovtTxnRefIdentifier = "TI" . rand();
            $response = $dataService->Add($item);
            return $response->GovtTxnRefIdentifier === $item->GovtTxnRefIdentifier ;
        }
}

class IPP_Item_Test extends IPPTestBase {
	
	// Example of how to use dynamic vals for CREATE operation
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {

		$result = array(
		     'Name'        => randTimestampString('Item A'),
		     'Type'        => 'Service'
		     );

		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;
		     
		$result['ExpenseAccountRef'] = new IPPReferenceType(array('value'=>$expenseAccountId));
		$result['Sku'] = "SKU_" . time() . "_" . rand(1000,9999) ;
                
		return $result;
	}			
        
        public function customTestMinorVersion4($dataService) {
            $fields = self::getDynamicCreateKeyValues($dataService, null);
            $item = new IPPItem($fields);
            $item->Type = "Category";
            $response = $dataService->Add($item);
            return $response->Type === "NonInventory";
        }

}

class IPP_JournalEntry_Test extends IPPTestBase {

	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	
		// Query to find an expense account to attribute this expense to
		$AccountArray=array();
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;
		$AccountArray['Asset'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
		if (!$AccountArray['Asset'])
			return array();
		$assetAccountId = $AccountArray['Asset'][0]->Id;

			
		$JournalEntryDebitLine = new IPPLine(array('Description'=>'nov portion of rider insurance"',
		                                 'Amount'     =>'100.00',
		                                 'DetailType' =>'JournalEntryLineDetail',
										 'JournalEntryLineDetail'
										    =>new IPPJournalEntryLineDetail(
										            array(
										     	          'PostingType'=>'Debit',
														  'AccountRef'=>new IPPReferenceType(array('value'=>$expenseAccountId ))
										            )
										    )
		                                 )
		                          );	
		                          		
		$JournalEntryCreditLine = new IPPLine(array('Description'=>'nov portion of rider insurance"',
		                                 'Amount'     =>'100.00',
		                                 'DetailType' =>'JournalEntryLineDetail',
										 'JournalEntryLineDetail'
										    =>new IPPJournalEntryLineDetail(
										            array(
										     	          'PostingType'=>'Credit',
														  'AccountRef'=>new IPPReferenceType(array('value'=>$assetAccountId ))
										            )
										    )
		                                 )
		                          );	
								  
		$JournalEntryLines = array($JournalEntryDebitLine,$JournalEntryCreditLine);	
							
		return array('TxnDate'    => date("Y-m-d"),
		             'Adjustment' => true,
		             'DocNumber'        => 'Doc' . rand(),
		             'Line'        => $JournalEntryLines
		            );
	}
	
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array(
		       'DocNumber'        => 'DocUp ' . rand()
		       );
	}
	
	}

class IPP_Location_Test extends IPPTestBase {}

class IPP_Payment_Test extends IPPTestBase {

	// Payment requires existence of an Invoice
	public function prep($dataServices, $serviceType) {

		//
		// To make a payment, better have: an Invoice, a Payment Method, an A/R Account, an Expense Account
		// Try to satisfy all of these prerequisites:
		//

		$invoiceTest = new IPP_Invoice_Test();
		$invoiceTest->prep($dataServices, $serviceType);
		$invoiceTest->Create($dataServices);

		$paymentMethodTest = new IPP_PaymentMethod_Test();
		$paymentMethodTest->Create($dataServices);
		
		$accountObj = new IPP_Account_Test();
		$accountObj->Create($dataServices);


		// Query to find an ARAccountRef to attribute this LinkedTxn to
		$bFoundARA = FALSE;
		$objArray = $dataServices->Query("SELECT * FROM Account", 1,500);
		if (!$objArray)
			return array();
		
		foreach($objArray as $oneObj)
		{
			if (($oneObj->AccountSubType == 'AccountsReceivable') || // QBO
			    ($oneObj->AccountType == 'Accounts Receivable'))     // QBD
			{
				$ARAccountRef = new IPPReferenceType(array('value'=>$oneObj->Id));
				$bFoundARA = TRUE;
			}
		}
		
		// Must make sure we have an Accounts Receivable account - required in
		// order to successfully create a Payment
		if (!$bFoundARA)
		{
			// Add an account set up as an Accounts Receivable account
			$accountObj = new IPPAccount();
			$accountObj->Name = "Accounts Recv (" . rand() . ")";
			if (IntuitServicesType::QBO == $serviceType)
			{
				$accountObj->AccountSubType = 'AccountsReceivable';
			}
			else
			{
				$accountObj->AccountType = 'Accounts Receivable';
			}
			
			$resultingObj = $dataServices->Add($accountObj);
		}
	}

	// Example of how to use dynamic vals for CREATE operation
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {

		// Dependencies to prep
		$paymentMethodRef = NULL;
		$customerRef = NULL;
		$invoiceId = NULL;
		$invoiceAmount = NULL;
		$ARAccountRef = NULL;
				
		// Query to find an ARAccountRef to attribute this LinkedTxn to
		if (IntuitServicesType::QBO == $serviceType)
		{
			$objArray = $dataServices->Query("SELECT * FROM Account WHERE AccountSubType='AccountsReceivable'", 1,500);
		}
		else
		{
			$objArray = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Accounts Receivable'", 1,500);
		}
		if (!$objArray)
			return array();
		
		foreach($objArray as $oneObj)
		{
			if (($oneObj->AccountSubType == 'AccountsReceivable') || // QBO
			    ($oneObj->AccountType == 'Accounts Receivable'))     // QBD
			{
				$ARAccountRef = new IPPReferenceType(array('value'=>$oneObj->Id));
				break;
			}
		}
		
		if (!$ARAccountRef)
		{
			echo "No pre-existing Accounts Receivable account found, thus cannot proceed with this test case.\n";
			return array();
		}

				
		// Query to find an invoice to attribute this LinkedTxn to
		$objArray = $dataServices->Query("SELECT * FROM Invoice", 1,100);
		if (!$objArray)
		{
			echo "No pre-existing Invoices found, thus cannot proceed with this test case.\n";
			return array();
		}
		
		foreach($objArray as $oneObj)
		{
			//echo "Invoice Balance: ".$oneObj->Balance."\n";	
			if ($oneObj->Balance>0)
			{
				// Invoice seems normal, suitable for applying a Payment to.
			}
			else if ($oneObj->Line &&
			         is_array($oneObj->Line) &&
			         (count($oneObj->Line)>0))
			{
				// Invoice well-formed, but has no outstanding balance.  In order to
				// create a Payment, we need this invoice to have an outstanding balance.
				// Make it have a balance:
				$oneObj->Balance = 5;
				$oneObj->Line[0]->Amount = $oneObj->Line[0]->Amount+5;	
				$oneObj = $dataServices->Update($oneObj);
			}
			else
			{
				// Invoice is of questionable status - it seems like it should have at
				// least one Line, but it doesn't.  Repair it now, so that we can
				// reasonably expect to create a Payment that references this Invoice.
				$randomInvoiceObj = IPP_Invoice_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
				if (!$randomInvoiceObj || (0 == count($randomInvoiceObj)))
				{
					echo "Unable to gather replacement fields for Invoice - IPP_Payment_Test will fail.\n";
					return array();
				}
				
				$oneObj->Line = array($randomInvoiceObj['Line'][0]);
				$oneObj->Balance = $randomInvoiceObj['Line'][0]->Amount;
			}
			
			$invoiceId = $oneObj->Id;
			$invoiceAmount = number_format($oneObj->Balance,2,'.','');
			$customerRef = $oneObj->CustomerRef;
			break;
		}

		if (!$customerRef)		
		{
			echo "No Customer available, therefore unable to create a Payment\n";	
			return array();
		}

		// Query to find an PaymentMethod to attribute this LinkedTxn to
		$objArray = $dataServices->Query("SELECT * FROM PaymentMethod", 1,100);
		if (!$objArray)
		{
			echo "No Payment Method available, therefore unable to create a Payment\n";	
			return array();
		}
		
		foreach($objArray as $oneObj)
		{
			$paymentMethodRef = new IPPReferenceType(array('value'=>$oneObj->Id));
			break;
		}
		

		$linkedTxn = new IPPLinkedTxn(array('TxnId'=>new IPPid(array('value'=>$invoiceId)),
		                                    'TxnType'=>'Invoice'
		                                   )
		                             );
		$oneLine = new IPPLine(array('Amount'=>$invoiceAmount,
		                             'DetailType'=>'PaymentLineDetail',
		                             'LinkedTxn'=>$linkedTxn));
				                       
		$objectVars = array('PrivateNote'      => 'Test Created',
		                    'Line'             => array($oneLine),
		                    'TotalAmt'         => $invoiceAmount,
		                    'CustomerRef'      => $customerRef,
		                    'PaymentMethodRef' => $paymentMethodRef,
		                    'TotalAmt'         => $invoiceAmount,
		                    'ARAccountRef'     => $ARAccountRef);
		                    
		return $objectVars;		                    
	}

	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {

		$paymentMethodArray=array();
		$paymentMethodArray = $dataServices->Query("SELECT * FROM Payment", 1,10);
		if (!$paymentMethodArray)
			return array();
			
			
		foreach($paymentMethodArray as $onePaymentMethod)
		{
			$objectVars = get_object_vars($onePaymentMethod);
			$objectVars['PrivateNote'] = 'Something new';
			
			return $objectVars;
		}
		return array();
	}
}

class IPP_PaymentMethod_Test extends IPPTestBase {
	
	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		$res = array(
		     'Name'                => randTimestampString('Method A'),
		     'Active'              => 'true'
		     );
		     
		if ($serviceType == IntuitServicesType::QBD)
			$res['Type']='Other';
		else 
			$res['Type']='NON_CREDIT_CARD';
		     
		return $res;
	}
	
	// Example of how to use dynamic vals for UPDATE operation
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {

		$paymentMethodArray=array();
		$paymentMethodArray = $dataServices->Query("SELECT * FROM PaymentMethod", 1,10);
		if (!$paymentMethodArray)
			return array();
			
			
		foreach($paymentMethodArray as $onePaymentMethod)
		{
			// Not allowed to update 'Cash' payment method -- business rule
			if ('Cash'==$onePaymentMethod->Name)
				continue;
			
			$objectVars = get_object_vars($onePaymentMethod);
			$objectVars['PrivateNote'] = 'something';
			
			return $objectVars;
		}
		return array();
	}
}


class IPP_Preferences_Test extends IPPTestBase {

	// Dynamic vals
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array('sparse'                  => 'false',
		             'VendorAndPurchasesPrefs' => NULL,
		             'SalesFormsPrefs'         => NULL);
	}

}

class IPP_Purchase_Test extends IPPTestBase {

	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {

		// Make a new bank account on-the-fly
		$bankAccountId = '';
		$bankObj = new IPPAccount();
		$bankObj->Name = "Bank (" . rand() . ")";
		$bankObj->AccountType = 'Bank';
		$bankObjResult = $dataServices->Add($bankObj);
		if ($bankObjResult->domain)
			$bankAccountId = "{$bankObjResult->domain}:{$bankObjResult->Id}";
		else	
			$bankAccountId = "{$bankObjResult->Id}";

		// Determine what expense account we want to attribute this purchase to
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

		$allLines = array($oneLine,$oneLine);

		// For AccountRef: Check should have bank account, CreditCard should specify credit card account.
		return array('Name'        => randTimestampString('Some Name'),
		             'PaymentType' => 'Check',
		             'TotalAmt'    => '15.00',
		             'AccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)),
		             'Line'        => $allLines
		            );
	}
		
	// Dynamic vals
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		$exampleObj = IPP_Purchase_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
		
		return array('Line'     => $exampleObj['Line'],
		             'TotalAmt' => $exampleObj['TotalAmt']);
	}
	
}


class IPP_PurchaseOrder_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		
		// Query to find an expense account to attribute this expense to
		$AccountArray=array();
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;

		// Query to find an Vendor to attribute this bill to
		$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
		if (!$VendorArray)
			return array();
		$vendorId = $VendorArray[0]->Id;
					
		// Create lines					
		$PaymentLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'7.50',
		                                 'DetailType' =>'AccountBasedExpenseLineDetail',
		                                 'AccountBasedExpenseLineDetail'=>
		                                  	new IPPAccountBasedExpenseLineDetail(
		                                  	    array('AccountRef'=>
		                                  	        new IPPReferenceType(array('value'=>$expenseAccountId))
		                                         )
		                                    ),
		                                 )
		                          );	
		$PaymentLines = array($PaymentLine,$PaymentLine);
							
		// Create bill					
		return array('VendorRef'   => new IPPReferenceType(array('value'=>$vendorId)),
		             'TotalAmt'    => '15.00',
		             'Line'        => $PaymentLines,
		             'ShipAddr'    => new IPPPhysicalAddress(array('Line1'=>'123 Main Street',
		                                                         'Line2'=>'Suite 12',
		                                                         'City'=>'Chicago',
		                                                         'CountrySubDivisionCode'=>'IL',
		                                                         'PostalCode'  => '60011'))
		             
		            );
	}

}

class IPP_SalesOrder_Test extends IPPTestBase {
	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	
		$ItemArray=array();
		$ItemArray = $dataServices->Query("SELECT * FROM Item Where Type='Service'", 1, 10);
		if (!$ItemArray)
			return array();
		$itemId = NULL;
		foreach($ItemArray as $oneItem)
		{
			if ($oneItem->IncomeAccountRef)
			{
				$itemId = $oneItem->Id;
				break;
			}
		}
		if (!$itemId)
			return array();
		
		$CustomerArray=array();
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1, 10);
		if (!$CustomerArray)
			return array();
		$customerId = $CustomerArray[0]->Id;
		$customerRef = new IPPReferenceType(array('value'=>$customerId,'type'=>'customer'));
		
		$salesOrderLine = new IPPLine(array('Description'=>'Sales Order line item generated by Php Sdk',
		                                 'Amount'     =>'1000.00',
		                                 'DetailType' =>'SalesOrderItemLineDetail',
										 'SalesOrderItemLineDetail'
										    =>new IPPSalesItemLineDetail(
										            array(
										     	          'ItemRef'=>new IPPReferenceType(array('value'=>$itemId)),
										     	          'UnitPrice'=>'10',
										     	          'Qty'=>'100',
										            )
										    )
		                                 )
		                          );	
		                          		
		$salesOrderLines = array($salesOrderLine);
							
		return array('DocNumber'        => 'Doc' . rand(),
					 'TxnDate'    => date("Y-m-d"),
		             'Line'        => $salesOrderLines,
		             'CustomerRef'=>$customerRef,
		             'CustomerMemo'    => 'This is a sales order.'
		            );
	}
	
	// Dynamic vals
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		$createVals = IPP_SalesReceipt_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
		$createVals['CustomerMemo']='Customer Memo updated on '. date("Y-m-d");
		return $createVals;
	}
}

class IPP_SalesReceipt_Test extends IPPTestBase {
	// Dynamic vals
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	
		$AccountArray=array();
		
		$AccountArray['Banks'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Bank'", 1,10);
		if (!$AccountArray['Banks'])
			return array();
		$bankAccountId = $AccountArray['Banks'][0]->Id;
		
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;

		$ItemArray=array();
		$ItemArray = $dataServices->Query("SELECT * FROM Item", 1, 10);
		if (!$ItemArray)
			return array();
		$itemId = NULL;
		foreach($ItemArray as $oneItem)
		{
			if ($oneItem->IncomeAccountRef)
			{
				$itemId = $oneItem->Id;
				break;
			}
		}
		if (!$itemId)
			return array();
		
		$CustomerArray=array();
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1, 10);
		if (!$CustomerArray)
			return array();
		$customerId = $CustomerArray[0]->Id;
		$customerRef = new IPPReferenceType(array('value'=>$customerId,'type'=>'customer'));
		

		$PaymentLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'7.50',
		                                 'DetailType' =>'SalesItemLineDetail',
										 'SalesItemLineDetail'
										    =>new IPPSalesItemLineDetail(
										            array(
										     	          'ItemRef'=>new IPPReferenceType(array('value'=>$itemId))
										            )
										    )
		                                 )
		                          );	
		                          		
		$PaymentLines = array($PaymentLine,$PaymentLine);
							
		return array('Name'        => randTimestampString('Acct'),
		             'AccountRef'  => new IPPReferenceType(array('value'=>$bankAccountId)),
		             'CustomerRef'=>$customerRef,
		             //'TotalAmt'    => '15.00',
		             'Line'        => $PaymentLines
		            );
	}
	
	// Dynamic vals
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		$createVals = IPP_SalesReceipt_Test::getDynamicCreateKeyValues($dataServices, $serviceType);
		$createVals['PrivateNote']='Some info';
		return $createVals;
	}
        
                
        public function isCustomVerification() {
            return true;
        }
        
        public function doCustomVerification($actual = null, $expected = null)
        {
            $result = $actual instanceof IPPSalesReceipt;
            $result = $result && ( $actual->HomeBalance === "0"  );
            return array($result,__METHOD__ . ": one of the values failed verification");
        }
}


class IPP_TaxCode_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {

		// TaxCode name has to be unique, so proceed with caution.
		$query = "SELECT * FROM TaxCode";
		$objArray = $dataServices->Query($query, 1,500);
		if (!$objArray)
			$objArray = array();

		$preExistingNames = array();
		foreach($objArray as $oneObj)
		{
			$preExistingNames[] = (string)$oneObj->Name;
		}
		
		$desiredName = NULL;
		do {
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
			
			$random3CharName = substr(str_shuffle($chars), 0, 1) .
			                   substr(str_shuffle($chars), 0, 1) .
			                   substr(str_shuffle($chars), 0, 1);
			$desiredName = $random3CharName;
			
		} while (in_array($desiredName, $preExistingNames));
		

		 return array('Name'           => $desiredName,
		              'Description'    => 'some description',
		              'Active'         => 'false',
		              'Taxable'        => 'false',
		              'TaxGroup'       => 'false');
	}
}


class IPP_TaxRate_Test extends IPPTestBase {}
class IPP_Term_Test extends IPPTestBase {}

class IPP_TimeActivity_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		
		// Query to find an Vendor to attribute this bill to
		$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
		if (!$VendorArray)
			return array();
		$vendorId = $VendorArray[0]->Id;
            
		// Query to find an Customer to attribute this bill to
		$CustomerArray = $dataServices->Query("SELECT * FROM Customer", 1,10);
		if (!$CustomerArray)
			return array();
		$customerId = $CustomerArray[0]->Id;
            
		// Query to find an Item to attribute this bill to
		$ItemArray = $dataServices->Query("SELECT * FROM Item", 1,10);
		if (!$ItemArray)
			return array();
		$itemId = $ItemArray[0]->Id;
						
		// Create TimeActivity				
		return array('Description' => 'Description'. rand(),
			'TxnDate'    => date("Y-m-d"),
            'NameOf' => 'Vendor',
            'BillableStatus' => 'NotBillable',
            'Taxable' => false,
            'HourlyRate' => '10',
            'Hours' => '10',
            'Minutes' => '0',
			'VendorRef'   => new IPPReferenceType(array('value'=>$vendorId)),
			'CustomerRef'   => new IPPReferenceType(array('value'=>$customerId)),
			'ItemRef'   => new IPPReferenceType(array('value'=>$itemId))
		 );
	}
}

class IPP_UserAlert_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		$rnd = rand();
		return array(
		  'Notes'        => 'UserAlert Note' . $rnd,
		  'Done' => false,
		  'DoneSpecified' => true,
		  );
	}}

class IPP_Vendor_Test extends IPPTestBase {

	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		$rnd = rand();
		return array(
		  'Name'        => 'Vendor Test' . $rnd,
		  'DisplayName' => 'Vendor Test' . $rnd,
		  'PaymentType' => 'Check',
		  'ShipAddr'    => new IPPPhysicalAddress(array('Line1'=>'123 Main Street',
		                                                'Line2'=>'Suite 10',
		                                                'City'=>'Chicago',
		                                                'CountrySubDivisionCode'=>'IL',
		                                                'PostalCode'  => '60011')),
		  'BillAddr'    => new IPPPhysicalAddress(array('Line1'=>'123 Main Street',
		                                                'Line2'=>'Suite 10',
		                                                'City'=>'Chicago',
		                                                'CountrySubDivisionCode'=>'IL',
		                                                'PostalCode'  => '60011')),
		  );
	}
}



class IPP_TaxService_Test extends IPPTestBase {
/*
{
  "TaxCode": "MyTaxCodeName",
  "TaxRateDetails": [
    {
      "TaxRateName": "myNewTaxRateName",
      "RateValue": "8",
      "TaxAgencyId": "1",
      "TaxApplicableOn": "Sales"
    }
  ]
}
 */
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		$rnd = rand();
                $taxRateDetails = new IPPTaxRateDetails();
                $taxRateDetails->TaxRateName = "myNewTaxRateName_$rnd";
                $taxRateDetails->RateValue = "7";
                $taxRateDetails->TaxAgencyId = "1";
                $taxRateDetails->TaxApplicableOn = "Sales";
                
		return array(
		  'TaxCode'        => 'MyTaxCodeName_' . $rnd,
		  'TaxRateDetails' => array($taxRateDetails)
		  );
	}
}

class IPP_VendorCredit_Test extends IPPTestBase {

	public function prep($dataServices, $serviceType) {
		$vendorTest = new IPP_Vendor_Test();
		$vendorTest->prep($dataServices, $serviceType);
		$vendorTest->Create($dataServices);
	}
	
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
	
		$rnd = rand();
		
		// Query to find an Vendor to attribute this bill to
		$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
		if (!$VendorArray)
			return array();
		$vendorId = $VendorArray[0]->Id;
		
		$AccountArray['Accounts_Payable'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Accounts Payable'", 1,10);
		if (!$AccountArray['Accounts_Payable'])
			return array();
		$apAccountId = $AccountArray['Accounts_Payable'][0]->Id;
		
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return array();
		$expenseAccountId = $AccountArray['Expense'][0]->Id;

		// Create lines					
		$CreditLine = new IPPLine(array('Description'=>'some line item',
		                                 'Amount'     =>'50.00',
		                                 'DetailType' =>'AccountBasedExpenseLineDetail',
		                                 'AccountBasedExpenseLineDetail'=>
		                                  	new IPPAccountBasedExpenseLineDetail(
		                                  	    array('AccountRef'=>
		                                  	        new IPPReferenceType(array('value'=>$expenseAccountId))
		                                         )
		                                    ),
		                                 )
		                          );	
		$CreditLines = array($CreditLine);		
			
		return array(
		  'VendorRef'   => new IPPReferenceType(array('value'=>$vendorId)),
		  'TotalAmt'    => '50.00',
		  'TxnDate'    => date("Y-m-d"),
		  'PrivateNote' => 'Private Note' . $rnd,
		  'APAccountRef' => new IPPReferenceType(array('value'=>$apAccountId)),
		  'Line'        => $CreditLines
		  );
	}
}


class IPP_JournalCode_Test extends IPPTestBase {
    static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
        $rnd = time().rand(1000,9999);    
        $x = new IPPJournalCodeTypeEnum;
        return array (
            "Name" => "JCP$rnd",
            "Type" => "Cash"
        );
        
    }
    
    	// Dynamic vals
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array('Description' => "Journal code description");
	}
}

/**
* PHPUnit compatible test case to be used from the POPO Test Suite
* 
* PHPUnit compatible test case to be used from the POPO Test Suite;
* however, this test case is highly parameterized as shown in it's
* constructor, so as to be able to test virtually any object-operation
* pair.
*/
class POPOUnitTest extends PHPUnit_Framework_TestCase
{
	/**
	 * IPP object type to test
	 * @var targetObjectType 
	 */
	private $targetObjectType;

	/**
	 * IPP operation to perform on the specified IPP object
	 * @var targetOperationType 
	 */
	private $targetOperationType;
	
	/**
	 * OAuth Validator object
	 * @var oauthValidator 
	 */
	private static $oauthValidator;
	
	/**
	 * SDK service context object
	 * @var serviceContext 
	 */
	private static $serviceContext;
	
	/**
	 * SDK data services object
	 * @var dataServices 
	 */
	private static $dataServices;
	
	/**
	* Initialize POPOUnitTest
	* @param string $objectType one of the IPP object types (Customer, Employee, ...)
	* @param string $operationType one of the IPP operation types (Create, Delete, ...)
	*/	
	public function __construct($objectType='Account', $operationType='Create')
	{
		$this->targetObjectType = $objectType;
		$this->targetOperationType = $operationType;
	}


	public function testPlaceholder() {
	}
	
	/**
	 * Provide PHPUnit a dynamically generated name for the currently-executing test case
	 * @return string Dynamically generated test case name
	 */	
	public function getName($withDataSet = true)
	{
		global $serviceType;
		return "{$serviceType} CRUD Test for ({$this->targetObjectType},{$this->targetOperationType})";
	}

	protected function setUp()
	{
		if ((''==$this->targetObjectType) && (''==$this->targetOperationType))
		{
			$this->markTestSkipped(
			              'SETUP: This dynamic test case can only be initialized by POPOTestSuite'
			            );
			
		}
	}
	
	private function getLastFile($path){

		$latest_ctime = 0;
		$latest_filename = '';    

		$d = dir($path);
		while (false !== ($entry = $d->read())) {
		  $filepath = "{$path}/{$entry}";
		  // could do also other checks than just checking whether the entry is a file
		  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
			$latest_ctime = filectime($filepath);
			$latest_filename = $entry;
		  }
		}
		
		return $latest_filename;

	}

	/**
	 * PHPUnit-compatible 'run' method for running a test case
	 * @param PHPUnit_Framework_TestResult $result a properly-typed PHP test case result object
	 * @return PHPUnit_Framework_TestResult test case result
	 */	
    public function run(PHPUnit_Framework_TestResult $result = NULL)
    {
		global $serviceType;
		global $minorVersion;

        if ($result === NULL) {
            $result = new PHPUnit_Framework_TestResult;
        }
		
		if (!POPOUnitTest::$serviceContext)		
		{
			$oauthValidator = NULL;
			if (IntuitServicesType::QBD==$serviceType)
			{
				$realmIA = ConfigurationManager::AppSettings('RealmIAQBD');
				$oauthValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessTokenQBD'),
				                                            ConfigurationManager::AppSettings('AccessTokenSecretQBD'),
				                                            ConfigurationManager::AppSettings('ConsumerKeyQBD'),
				                                            ConfigurationManager::AppSettings('ConsumerSecretQBD'));
			}
			else
			{
				$realmIA = ConfigurationManager::AppSettings('RealmIAQBO');
				$oauthValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessTokenQBO'),
				                                            ConfigurationManager::AppSettings('AccessTokenSecretQBO'),
				                                            ConfigurationManager::AppSettings('ConsumerKeyQBO'),
				                                            ConfigurationManager::AppSettings('ConsumerSecretQBO'));
                                            
			}
			$serviceContext  = new ServiceContext($realmIA,$serviceType, $oauthValidator);
                        if (IntuitServicesType::QBO==$serviceType) {
                            $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
                            $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
                        }
			if(!is_null($minorVersion)  && $minorVersion > 0){
				$serviceContext->minorVersion = $minorVersion;
			}
			POPOUnitTest::$serviceContext = $serviceContext;
		}
				
		if (!POPOUnitTest::$dataServices)
			POPOUnitTest::$dataServices = new DataService(POPOUnitTest::$serviceContext);
		
		$testClassName = "IPP_".(string)$this->targetObjectType."_Test"; // e.g., IPP_Customer_Test
		$testObj = new $testClassName;

		try {
			$testObj->prep(POPOUnitTest::$dataServices, $serviceType);
		}
		catch (Exception $e) {
			echo $e->getMessage() . "\n";
		}
		
		usleep(1000000);
		$result->startTest($this);
		PHP_Timer::start();
		$stopTime = NULL;
		
		$testResult = $testObj->{$this->targetOperationType}(POPOUnitTest::$dataServices); // e.g., IPP_Item_Test::Create()

		$failTime = time();
		echo "\n" . $this->getName() . " @ " . $failTime . " ";
		
		try {
			PHPUnit_Framework_Assert::assertEquals($testResult, 1);
			//echo "CRUD Operation Succeeded ({$testClassName}): " . $this->getName() . " @ " . time() . "\n";
		}
		catch (PHPUnit_Framework_AssertionFailedError $e) {

			// Gather recent request/response output
			$requestLogger = CoreHelper::GetRequestLogging(POPOUnitTest::$serviceContext);
			$logFolder = $requestLogger->GetLogDestination();
			
			//$cmd = "ls -l {$logFolder} | grep '{$failTime}' -A 0 -B 2 | tail -n 2 | awk '{print \"".$logFolder."/\"$9}' | xargs cat";
			//exec($cmd, $output);
			
			//get last file writtern
		$latest_ctime = 0;
		$latest_filename = '';    
		$d = dir($logFolder);
		while (false !== ($entry = $d->read())) {
		  $filepath = "{$logFolder}/{$entry}";
		  // could do also other checks than just checking whether the entry is a file
		  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
			$latest_ctime = filectime($filepath);
			$latest_filename = $entry;
		  }
		}
						
			//change to read file
			$output = file_get_contents($logFolder . '/' . $latest_filename);
			
			// Organize/concatenate debug output
			$failText  = "CRUD Operation Failed ({$testClassName}): " . $this->getName();
			$failText .= "\n\nRECENT REQUEST/RESPONSE LOG PRIOR TO FAILURE:" . "\n";
			$failText .= "=============================================" . "\n\n";
			//$failText .= "{$cmd}\n\n";
			//$failText .= implode("\n",$output) . "\n";
			
			// Convey debug output to to PHPUnit
			$failResult = new PHPUnit_Framework_AssertionFailedError($failText);
			$stopTime = PHP_Timer::stop();
			$result->addFailure($this, $failResult, $stopTime);

		}
		catch (Exception $e) {
			$stopTime = PHP_Timer::stop();
			$result->addError($this, $e, $stopTime);
		}
		
		if ($stopTime === NULL) {
			$stopTime = PHP_Timer::stop();
		}
		
		$result->endTest($this, $stopTime);
		usleep(1000000);
		
        return $result;
    }
    
}


?>
