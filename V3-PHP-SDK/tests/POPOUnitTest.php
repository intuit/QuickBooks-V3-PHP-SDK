<?php

require_once('POPODynamicTestCase.php');

/**
* PHPUnit compatible Test Suite definition for POPO class testing
* 
* PHPUnit compatible Test Sutie definition that dynamically generates
* test cases for each combination of {Object Type}, {Operation}, even
* those for which IPP v3 server-side does not yet support the operation.
* Better to have the full matrix of test cases defined now, rather than
* add test cases as the server-side support catches up.
*/
class POPOTestSuite extends PHPUnit_Framework_TestSuite {  // 

	/**
	* Dynamically generates test cases to populate the POPO test suite
	*
	* Taking into consideration a list of all possible IPP v3 objects and
	* operations, dynamically generates test cases for each combination
	*
	* @return 	PHPUnit_Framework_TestSuite test suite
	*/
	public static function suite()
	{
		global $serviceType;
		
		$bSkipKnownFailures = TRUE;
	
		$suite = new PHPUnit_Framework_TestSuite('POPOUnitTest');
				
		$objectNamesToTest    = require('listEntitiesToTest.php');		                         
		$operationNamesToTest = require('listOperationsToTest.php');
		
		$FailureExpect = array();	                              
		$FailureExpect['QBD'] = require('listExpectedFailureQBD.php');
		$FailureExpect['QBO'] = require('listExpectedFailureQBO.php');
		                 

		/*// Need to do a fast turnaround debugging on one specific test case?  Uncomment + specify it here
		$RunOnly = array(array(	'Object'=>'Account',      'Operation'=>'Retrieve'));
		if (count($RunOnly)>0)
		{
			$FailureExpect['QBO'] = array();
			$FailureExpect['QBD'] = array();
			foreach($objectNamesToTest as $oneObjectName)
			{
				foreach($operationNamesToTest as $oneOperationName)
				{
					if ((0==strcmp($oneObjectName, $RunOnly[0]['Object'])) &&
					    (0==strcmp($oneOperationName, $RunOnly[0]['Operation'])))
					{
						continue;
					}

					$FailureExpect['QBO'][] = array('Object'=>$oneObjectName, 'Operation'=>$oneOperationName);
					$FailureExpect['QBD'][] = array('Object'=>$oneObjectName, 'Operation'=>$oneOperationName);
				}
			}
		}*/


		foreach($objectNamesToTest as $oneObjectNameToTest)
		{
			foreach($operationNamesToTest as $oneOperationNameToTest)
			{
				if (('Account'==$oneObjectNameToTest) && ('Create'==$oneOperationNameToTest))
				{
					// Because PHPUnit detects the presence of POPOUnitTest, and runs it with it's default
					// constructor params (Account, Create), it has already run that combination without us
					// specifying it here.  So, skip the addTest call for that combo.
					continue;
				}

				$bFailExpected = FALSE;
				if ($bSkipKnownFailures)
				{
					foreach($FailureExpect[$serviceType] as $oneFailureExpected)
					{
						if (($oneFailureExpected['Object']==$oneObjectNameToTest) && 
						    ($oneFailureExpected['Operation']==$oneOperationNameToTest))
						{
							$bFailExpected = TRUE;
						}					    
					}
				}
					
				if (!$bFailExpected)
				{
					//echo "Run: $oneObjectNameToTest ($oneOperationNameToTest) \n";				
					$suite->addTest(new POPOUnitTest($oneObjectNameToTest,$oneOperationNameToTest));
				}
				else
				{
					//echo "Skip: $oneObjectNameToTest ($oneOperationNameToTest) \n";				
				}
			}
		}
		
		return $suite;	
		
	}
}

?>
