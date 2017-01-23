<?php

require_once('IPPTestSummaryText.php');
require_once('IPPTestsStatic.php');


require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');



date_default_timezone_set('America/Chicago');

/**
* Base class from which all POPO Unit Test classes are derived
* 
* Typically, the base class can almost completely handle the testing
* of DELETE, UPDATE, FINDALL, and CREATE operations without custom
* code inside of a POPO-specific subclass.  Therefore, subclass
* implementations tend to be relatively minimal, and the design
* attempts to handle as much testing as possible from this base class.
*/
class IPPTestBase {

	private $verbose;
	static private $fieldTests;
        const EMAIL_TO_SEND = "non_existing_fake_email@fake.intuit.com";
	
	public function __construct()
	{
		$this->verbose = FALSE;
		if (!IPPTestBase::$fieldTests)
			IPPTestBase::$fieldTests = getStaticFieldTests();
	}

	/**
	* Prepare any prerequisites necessary for test execution
	*/
	public function prep($dataServices, $serviceType) {
		// Override in inherited classes
	}

	/**
	* Derives a target IDS object type to test, based on unit test class name
	*
	* Using a unit test class name as a basis, determine what IDS object type
	* the unit test is designed to test.  For example, IPP_Class_Test is designed
	* to test the IDS object 'Class'.
	*
	* @return 	string	decorated class name
	*/
	public function objectNameToTest()
	{
		$className = get_class($this);
		$className = str_replace('IPP_', '', $className);
		$className = str_replace('_Test', '', $className);
		return $className;
	}

	/**
	* Derives a PHP SDK class name, based on unit test class name
	*
	* Using a unit test class name as a basis, determine what PHP SDK
	* class the unit test will exercise.  For example, the unit test class
	* called IPPTestBase_Class is designed to test the PHP SDK class called
	* IPPClass
	*
	* @return 	string	decorated class name
	*/
	public function phpClassNameToTest()
	{
		return 'IPP'.$this->objectNameToTest();
	}

	/**
	* Conditionally echos verbose output to console
	*
	* If the $verbose member is set, causes verbose output to flow to the
	* console for debugging purposes.
	*
	* @return 	string	decorated class name
	*/
	private function echoVerboseOutput($output)
	{
		if ($this->verbose)
			echo $output;
	}

	
	/**
	* Virtual function that can be overridden with dynamic member fillers
	*
	* Unit tests need to modify various POPO object members during the course
	* of testing CRUD operations.  Sometimes those member value modifications
	* can be essentially "hard coded" values.  However, in situations where
	* a POPO unit test wants to dynamically generate some of the values to
	* be assigned to POPO members, it should override this function.  This
	* function is specific to POPO UPDATE tests.
	*
	* @return 	array	an array of dynamically generated key/value pairs
	*/
	static public function getDynamicUpdateKeyValues($dataServices, $serviceType) {
		return array();
	}

	/**
	* Virtual function that can be overridden with dynamic member fillers
	*
	* Unit tests need to modify various POPO object members during the course
	* of testing CRUD operations.  Sometimes those member value modifications
	* can be essentially "hard coded" values.  However, in situations where
	* a POPO unit test wants to dynamically generate some of the values to
	* be assigned to POPO members, it should override this function.  This
	* function is specific to POPO CREATE tests.
	*
	* @return 	array	an array of dynamically generated key/value pairs
	*/
	static public function getDynamicCreateKeyValues($dataServices, $serviceType) {
		return array();
	}

	/**
	* Data-driven base class implementation for testing CREATE operation
	*
	* Data-driven base class implementation for testing CREATE operation of
	* just about any kind of POPO object.  The key/value pairs used to
	* customize/modify the contents of the POPO object are defined in the
	* global variable FieldTests which is normally defined in the source
	* file that calls IPPTestBase.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Create($dataServices, &$crudResultObj=NULL)
	{
		global $serviceType;
		static $keyName = 'Create';
			
		$targetClassName = $this->phpClassNameToTest();
		$targetObj = new $targetClassName();

		// Either retrieve field key-value pairs from hard-coded variable,
		// or retrieve from override in subclass (prefer override)
		$createElements = array();
		$createKeyValues = $this->getDynamicCreateKeyValues($dataServices, $serviceType);
		if (!count($createKeyValues))
		{
			if (array_key_exists($this->objectNameToTest(), IPPTestBase::$fieldTests) &&
			    array_key_exists($keyName,IPPTestBase::$fieldTests[$this->objectNameToTest()]))
			{
				$createKeyValues = IPPTestBase::$fieldTests[$this->objectNameToTest()][$keyName];
			}
			else
			{
				echo "No test cases found for (".$this->objectNameToTest().") - neither dynamic nor hard-coded test cases.\n";
				return FALSE;				
			}
		}
		
		foreach($createKeyValues as $member => $value)
		{
			if (is_string($value))
				$createElements[] = "[{$member}]=[{$value}]";
			else
				$createElements[] = "[{$member}]=[object]";
			$targetObj->{$member} = $value;
		}
		
		try {
			$crudResultObj = $dataServices->Add($targetObj);
		}
		catch(Exception $e)
		{
			return FALSE;
		}
		
		$this->echoVerboseOutput("CREATE: Passed? " . ($crudResultObj?'Yes':'No') . "\n");
		if (count($createElements)>0)
			$this->echoVerboseOutput("\t * ".implode("\n\t * ",$createElements).")\n");
                
                if($this->isCustomVerification()) {
                    list($result,$message) = $this->doCustomVerification($crudResultObj,$targetObj);
                    if(!$result) {
                        echo "Test {$this->objectNameToTest()} failed with \"$message\"\n";
                        return false;
                    }
                }

		return ($crudResultObj?TRUE:FALSE);
	}
        
        
        /**
         * Tests should overwrite this method to return true to apply test-specific verification
         * @return boolean
         */
        public function isCustomVerification()
        {
            return false;
        }
        
        /**
         * Tests should overwrite this method with expected behvior
         * @param mixed $actual item which was resived from the services
         * @param mixed $expected item which was sent to the services
         * @return array(), where first item is a result and second is a message
         */
        public function doCustomVerification($actual = null, $expected = null)
        {
            return array(false,"This method is expected to be overwritten.");
        }

        /**
	* Data-driven base class implementation for testing FindById operation
	*
	* Data-driven base class implementation for testing FindById operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function FindById($dataServices)
	{
		$crudResultObj = NULL;
		
		try {
			
			// In order to reliably FindById, better make sure we have a pre-existing
			// object ready in time for that query.
			$this->Create($dataServices);
			
			$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 5);
	
			if (!$queryResults || 0==count($queryResults))
			{
				//echo "No " . $this->objectNameToTest() . " exists, thus FindById will likely fail. ";
				
				// Worst case attempt, try to query for Id=1
				$className = "IPP" . $this->objectNameToTest();
				$fakeQueryResult = new $className;
				if ($fakeQueryResult)
					$fakeQueryResult->Id = 1;
				$queryResults = array($fakeQueryResult);
			}

			// In virtually all cases, the Ids of the objects retrieved via FindAll, are numeric.
			// And, that's good, because numeric Ids are the only ones accepted by the READ
			// operation.  However, there is one known situation (TaxCode FindAll on QBO) where
			// the IDs are sometimes non-numeric - e.g. "NON".  Because of that situation, we are
			// extra cautious to be sure that we are working with a numeric-format Id before
			// attempting the FindById test.
			//
			// Example of problem case described above:
			//
			//  <TaxCode>
			//    <Id>NON</Id>
			//    <MetaData><CreateTime>2013-08-12T10:54:31-07:00</CreateTime><LastUpdatedTime>2013-08-12T10:54:31-07:00</LastUpdatedTime></MetaData>
			//    <Name>NON</Name>
			//    <Description>NON</Description>
			//    <Taxable>false</Taxable>
			//    <TaxGroup>false</TaxGroup>
			//  </TaxCode>
			//
			$entityToFindById = NULL;
			foreach($queryResults as $queryResult)
			{

				if (NULL == $queryResult->Id)
				{
					// Rare.  Occurs for QBD Preferences object, but not for any other
					// known situation beyond that.
					$entityToFindById = $queryResult;
					break;
				}

				//
				// Normal situation.  Id is set.  Scrutinize the Id further
				//				
				$idString = $queryResult->Id;
				if (FALSE !== strpos($idString, ':'))
				{
					$entityToFindById = $queryResult;
					break;
				}
				else if (is_numeric($queryResult->Id))
				{
					$entityToFindById = $queryResult;
					break;
				}
				else
				{
					// Non-numeric, like "NON" or some other value that won't survive FindById
				}
			}

			$crudResultObj = $dataServices->FindById($entityToFindById);
		}
		catch(Exception $e)
		{
			return FALSE;
		}

		return ($crudResultObj?TRUE:FALSE);
	}

	/**
	* Data-driven base class implementation for testing Retrieve operation
	*
	* Data-driven base class implementation for testing Retrieve operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Retrieve($dataServices)
	{
		return $this->FindById($dataServices);
	}

	/**
	* Data-driven base class implementation for testing UPDATE operation
	*
	* Data-driven base class implementation for testing UPDATE operation of
	* just about any kind of POPO object.  The key/value pairs used to
	* customize/modify the contents of the POPO object are defined in the
	* global variable FieldTests which is normally defined in the source
	* file that calls IPPTestBase.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Update($dataServices)
	{
		global $serviceType;
		$targetClassName = $this->phpClassNameToTest();
		
		// In order to reliably FindById, better make sure we have a pre-existing
		// object ready in time for that query.
		$this->Create($dataServices);

		$targetObj = new $targetClassName();
		$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 1);

		$crudResultObj = NULL;
		$updatedElements = array();
		if ($queryResults && count($queryResults)>0)
		{
			$targetObj = $queryResults[0];
			
			// Either retrieve field key-value pairs from hard-coded variable,
			// or retrieve from override in subclass (prefer override)
			$updateKeyValues = $this->getDynamicUpdateKeyValues($dataServices, $serviceType);
			if (!count($updateKeyValues))
			{
				if (array_key_exists($this->objectNameToTest(), IPPTestBase::$fieldTests))
				{
					$keyValsAll = IPPTestBase::$fieldTests[$this->objectNameToTest()];
					if (array_key_exists('Update', $keyValsAll))
					{
						$updateKeyValues = $keyValsAll['Update'];
					}
					else
					{
						echo "NO UPDATE KEYS/VALS FOUND - NEITHER DYNAMIC NOR STATIC\n";
						return FALSE;				
					}
				}
				else
				{
					echo "NO TEST CASES FOUND FOR (".$this->objectNameToTest()."); ONLY FOR (".implode(",",array_keys(IPPTestBase::$fieldTests)).")\n";
					return FALSE;				
				}
			}
			
			foreach($updateKeyValues as $member => $value)
			{
				if (is_string($value))
					$updatedElements[] = "[{$member}]=[{$value}]";
				else
					$updatedElements[] = "[{$member}]=[object]";
				$targetObj->{$member} = $value;
			}

			try {
				$crudResultObj = $dataServices->Update($targetObj);
			}
			catch(Exception $e)
			{
				return FALSE;
			}
		}
		
		$this->echoVerboseOutput("UPDATE: Passed? " . ($crudResultObj?'Yes':'No') . "\n");
		if (count($updatedElements)>0)
			$this->echoVerboseOutput("\t * ".implode("\n\t * ",$updatedElements).")\n");
			
		return ($crudResultObj?TRUE:FALSE);
	}

	/**
	* Data-driven base class implementation for testing DELETE operation
	*
	* Data-driven base class implementation for testing DELETE operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Delete($dataServices)
	{
		// In order to reliably FindById, better make sure we have a pre-existing
		// object ready in time for that query.
		$this->Create($dataServices);
		
		$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 500);
		if (!$queryResults)
			return FALSE;
			
		try {
			$crudResultObj = $dataServices->Delete($queryResults[0]);
			$this->echoVerboseOutput("DELETE: Passed? " . ($crudResultObj?'Yes':'No') . "\n");
			return ($crudResultObj?TRUE:FALSE);
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	public function CDC($dataServices)
	{
		// In order to reliably call CDC, better make sure we have a pre-existing
		// object ready in time for that CDC call.
		
		if($this->objectNameToTest() != "CompanyInfo")
			$this->Create($dataServices);
		
		try {
			$changedSince = time() - 60*60*24*180;
			$objectName = $this->objectNameToTest();
			$cdcResponse = $dataServices->CDC(array($objectName),$changedSince);
			
			$resultObjs = NULL;
			if (array_key_exists($objectName, $cdcResponse->entities))
				$resultObjs = $cdcResponse->entities[$objectName];    
						      	
			if ($resultObjs && count($resultObjs)>0)		      	
				return TRUE;
			else
				return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	
	}
	
	/**
	* Data-driven base class implementation for testing SPARSE operation
	*
	* Data-driven base class implementation for testing SPARSE operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Sparse($dataServices)
	{
		global $serviceType;
		$targetClassName = $this->phpClassNameToTest();
		
		// In order to reliably FindById, better make sure we have a pre-existing
		// object ready in time for that query.
		$targetObj = NULL;
		$this->Create($dataServices, $targetObj);

		if (!$targetObj)
		{
			$targetObj = new $targetClassName();
			$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 1);
			if ($queryResults && count($queryResults)>0)
			{
				$targetObj = $queryResults[0];
			}
		}

		$crudResultObj = NULL;
		$updatedElements = array();
		if ($targetObj)
		{
			// Either retrieve field key-value pairs from hard-coded variable,
			// or retrieve from override in subclass (prefer override)
			$updateKeyValues = $this->getDynamicUpdateKeyValues($dataServices, $serviceType);
			if (!count($updateKeyValues))
			{
				if (array_key_exists($this->objectNameToTest(), IPPTestBase::$fieldTests))
				{
					$keyValsAll = IPPTestBase::$fieldTests[$this->objectNameToTest()];
					if (array_key_exists('Update', $keyValsAll))
					{
						$updateKeyValues = $keyValsAll['Update'];
					}
					else
					{
						echo "NO UPDATE KEYS/VALS FOUND - NEITHER DYNAMIC NOR STATIC\n";
						return FALSE;				
					}
				}
				else
				{
					echo "NO TEST CASES FOUND FOR (".$this->objectNameToTest()."); ONLY FOR (".implode(",",array_keys(IPPTestBase::$fieldTests)).")\n";
					return FALSE;				
				}
			}

			$sparseRemoveKeyValues = array();
			if (array_key_exists($this->objectNameToTest(), IPPTestBase::$fieldTests))
			{
				$keyValsAll = IPPTestBase::$fieldTests[$this->objectNameToTest()];
				if (array_key_exists('Sparse', $keyValsAll))
				{
					$sparseRemoveKeyValues = $keyValsAll['Sparse'];
				}
			}

			foreach($updateKeyValues as $member => $value)
			{
				if (is_string($value))
					$updatedElements[] = "[{$member}]=[{$value}]";
				else
					$updatedElements[] = "[{$member}]=[object]";
				$targetObj->{$member} = $value;
			}

			// Sparse testing causes us to want to suppress certain XML elements
			// that Sparse updates do not allow
			foreach($sparseRemoveKeyValues as $onePropToUnset)
			{
				try {
					unset($targetObj->{$onePropToUnset});
				}
				catch(Exception $e)
				{
				}
			}
			
			try {
				$targetObj->sparse = 'true';
				$crudResultObj = $dataServices->Update($targetObj);
			}
			catch(Exception $e)
			{
				echo "\nSparse Exception: ".$e->getMessage()."\n";
				return FALSE;
			}
		}
		
		$this->echoVerboseOutput("SPARSE UPDATE: Passed? " . ($crudResultObj?'Yes':'No') . "\n");
		if (count($updatedElements)>0)
			$this->echoVerboseOutput("\t * ".implode("\n\t * ",$updatedElements).")\n");
			
		return ($crudResultObj?TRUE:FALSE);
	}

	/**
	* Data-driven base class implementation for testing QUERY operation
	*
	* Data-driven base class implementation for testing QUERY operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Query($dataServices)
	{
		try {
			// In order to reliably Query, better make sure we have a pre-existing
			// object ready in time for that query.
			$this->Create($dataServices);
			$objName = $this->objectNameToTest();

			// Handle some special cases
			if (strtolower('company')==strtolower($objName))
				$objName='CompanyInfo';
			
			$queryResults = $dataServices->Query("SELECT * FROM " . $objName, 1,10);
			return ((count($queryResults)>0)?TRUE:FALSE);
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}
		
	/**
	* Data-driven base class implementation for testing BATCH operation
	*
	* Data-driven base class implementation for testing BATCH operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Batch($dataServices)
	{
		// In order to reliably Batch, better make sure we have a pre-existing
		// object ready in time for that Batch.
		
		if($this->objectNameToTest() != "CompanyInfo")
			$this->Create($dataServices);
		
		try {
			// Run a batch
			$maxSearch = 5;
			$batch = $dataServices->CreateNewBatch();
			$batch->AddQuery("SELECT * FROM " . $this->objectNameToTest() ." startPosition 0 maxResults {$maxSearch}", "queryid1");
			$batch->Execute();
			
			// Echo some formatted output
			$batchItemResponse = $batch->intuitBatchItemResponses[0];
			if (count($batchItemResponse->entities)>0)
				return TRUE;
			else
				return FALSE;
		}
		catch(Exception $e)
		{
			return FALSE;
		}
	}

	/**
	* Data-driven base class implementation for testing FINDALL operation
	*
	* Data-driven base class implementation for testing FINDALL operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function FindAll($dataServices)
	{
		// In order to reliably FindAll, better make sure we have a pre-existing
		// object ready in time for that query.
		$this->Create($dataServices);
		
		$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 500);
		return ((count($queryResults)>0)?TRUE:FALSE);
	}

	/**
	* Data-driven base class implementation for testing VOID operation
	*
	* Data-driven base class implementation for testing VOID operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Void($dataServices)
	{
		global $serviceType;
		$crudResultObj = NULL;
		
		try {
			
			// In order to reliably FindById, better make sure we have a pre-existing
			// object ready in time for that query.	
			$this->Create($dataServices);
			
			if (IntuitServicesType::QBO == $serviceType)	
				$queryResults = $dataServices->FindAll($this->objectNameToTest(), 1, 5);
			else
				$queryResults = $dataServices->Query("SELECT * From " . $this->objectNameToTest() . " WHERE Status='Synchronized'", 1, 5);
	
			if (!$queryResults || 0==count($queryResults))
			{
				// Worst case attempt, try to query for Id=1
				$className = "IPP" . $this->objectNameToTest();
				$fakeQueryResult = new $className;
				if ($fakeQueryResult)
					$fakeQueryResult->Id = 1;
				$queryResults = array($fakeQueryResult);
			}

			$crudResultObj = $dataServices->FindById($queryResults[0]);
			if (!$crudResultObj)
				return FALSE;
			
			$crudResultObj = $dataServices->Void($queryResults[0]);
                       
		}
		catch(Exception $e)
		{
			return FALSE;
		}
                if(!is_object($crudResultObj)) {
                     echo "Return result is not an object";
                     return false;
                }
                if(!isset($crudResultObj->PrivateNote)) {
                    echo "Test expects PrivateNote property for the pbject " . get_class($crudResultObj);
                    return false;
                }
                $result = ($crudResultObj->PrivateNote == "Voided");
                //Will atempt ot verify it using string lookup
                if(false == $result) {
                    $result = (false !== strpos($crudResultObj->PrivateNote, "Voided"));
                }
                if(!$result) {
                    echo "PrivateNote should be equal \"Voided\" property for the pbject " . get_class($crudResultObj);
                }
		return ($result?TRUE:FALSE);	
	}
        
        /**
         * Invokes any other tests which start from "custom" prefix.
         * It helps to specify not-default payload
         * @param type $dataServices
         * @return boolean
         */
        public function Custom($dataServices) {
            // means we want to execute every method which starts from customXXXXX
            $methodPrefix = strtolower(__FUNCTION__); 
            echo "\n\t Executing custom tests:\n";
            $executions = array();
            foreach(get_class_methods($this) as $method) {
                if(false === strpos($method,$methodPrefix)) {
                    continue;
                }
                $executions[] = $method;
            }
            $globalResult = true;
            foreach ($executions as $key => $method) {
                echo "\t\t[$key] $method:";
                $result = $this->$method($dataServices);
                if(!$result) {
                    $globalResult = false;
                }
                echo $result ? " ." : " F";
               
            }
            return $globalResult;
            
        }
	
	/**
	* Data-driven base class implementation for testing UPLOAD operation
	*
	* Data-driven base class implementation for testing UPLOAD operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Upload($dataServices)
	{
		try
		{
			$res = $this->UploadAttachment($dataServices);
			if ($res)
			{
				return TRUE;
			}
		}
		catch(Exception $e)
		{
			return FALSE;
		}
			
		return FALSE;	
	}
	
	/**
	* Retrieves image contents for testing
	*
	* @return 	string	base64 image for testing
	*/
	private function GetBase64ImageForTesting()
	{
		// Prepare entities for attachment upload
		$imageBase64 = array();
		$imageBase64['image/jpeg'] = "" . 
			"/9j/4AAQSkZJRgABAQEAlgCWAAD/4ge4SUNDX1BST0ZJTEUAAQEAAAeoYXBwbAIgAABtbnRyUkdCIFhZ" . 
			"WiAH2QACABkACwAaAAthY3NwQVBQTAAAAABhcHBsAAAAAAAAAAAAAAAAAAAAAAAA9tYAAQAAAADTLWFw" . 
			"cGwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAtkZXNjAAABCAAA" . 
			"AG9kc2NtAAABeAAABWxjcHJ0AAAG5AAAADh3dHB0AAAHHAAAABRyWFlaAAAHMAAAABRnWFlaAAAHRAAA" . 
			"ABRiWFlaAAAHWAAAABRyVFJDAAAHbAAAAA5jaGFkAAAHfAAAACxiVFJDAAAHbAAAAA5nVFJDAAAHbAAA" . 
			"AA5kZXNjAAAAAAAAABRHZW5lcmljIFJHQiBQcm9maWxlAAAAAAAAAAAAAAAUR2VuZXJpYyBSR0IgUHJv" . 
			"ZmlsZQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAbWx1YwAA" . 
			"AAAAAAAeAAAADHNrU0sAAAAoAAABeGhySFIAAAAoAAABoGNhRVMAAAAkAAAByHB0QlIAAAAmAAAB7HVr" . 
			"VUEAAAAqAAACEmZyRlUAAAAoAAACPHpoVFcAAAAWAAACZGl0SVQAAAAoAAACem5iTk8AAAAmAAAComtv" . 
			"S1IAAAAWAAACyGNzQ1oAAAAiAAAC3mhlSUwAAAAeAAADAGRlREUAAAAsAAADHmh1SFUAAAAoAAADSnN2" . 
			"U0UAAAAmAAAConpoQ04AAAAWAAADcmphSlAAAAAaAAADiHJvUk8AAAAkAAADomVsR1IAAAAiAAADxnB0" . 
			"UE8AAAAmAAAD6G5sTkwAAAAoAAAEDmVzRVMAAAAmAAAD6HRoVEgAAAAkAAAENnRyVFIAAAAiAAAEWmZp" . 
			"RkkAAAAoAAAEfHBsUEwAAAAsAAAEpHJ1UlUAAAAiAAAE0GFyRUcAAAAmAAAE8mVuVVMAAAAmAAAFGGRh" . 
			"REsAAAAuAAAFPgBWAWEAZQBvAGIAZQBjAG4A/QAgAFIARwBCACAAcAByAG8AZgBpAGwARwBlAG4AZQBy" . 
			"AGkBDQBrAGkAIABSAEcAQgAgAHAAcgBvAGYAaQBsAFAAZQByAGYAaQBsACAAUgBHAEIAIABnAGUAbgDo" . 
			"AHIAaQBjAFAAZQByAGYAaQBsACAAUgBHAEIAIABHAGUAbgDpAHIAaQBjAG8EFwQwBDMEMAQ7BEwEPQQ4" . 
			"BDkAIAQ/BEAEPgREBDAEOQQ7ACAAUgBHAEIAUAByAG8AZgBpAGwAIABnAOkAbgDpAHIAaQBxAHUAZQAg" . 
			"AFIAVgBCkBp1KAAgAFIARwBCACCCcl9pY8+P8ABQAHIAbwBmAGkAbABvACAAUgBHAEIAIABnAGUAbgBl" . 
			"AHIAaQBjAG8ARwBlAG4AZQByAGkAcwBrACAAUgBHAEIALQBwAHIAbwBmAGkAbMd8vBgAIABSAEcAQgAg" . 
			"1QS4XNMMx3wATwBiAGUAYwBuAP0AIABSAEcAQgAgAHAAcgBvAGYAaQBsBeQF6AXVBeQF2QXcACAAUgBH" . 
			"AEIAIAXbBdwF3AXZAEEAbABsAGcAZQBtAGUAaQBuAGUAcwAgAFIARwBCAC0AUAByAG8AZgBpAGwAwQBs" . 
			"AHQAYQBsAOEAbgBvAHMAIABSAEcAQgAgAHAAcgBvAGYAaQBsZm6QGgAgAFIARwBCACBjz4/wZYdO9k4A" . 
			"giwAIABSAEcAQgAgMNcw7TDVMKEwpDDrAFAAcgBvAGYAaQBsACAAUgBHAEIAIABnAGUAbgBlAHIAaQBj" . 
			"A5MDtQO9A7kDugPMACADwAPBA78DxgOvA7sAIABSAEcAQgBQAGUAcgBmAGkAbAAgAFIARwBCACAAZwBl" . 
			"AG4A6QByAGkAYwBvAEEAbABnAGUAbQBlAGUAbgAgAFIARwBCAC0AcAByAG8AZgBpAGUAbA5CDhsOIw5E" . 
			"Dh8OJQ5MACAAUgBHAEIAIA4XDjEOSA4nDkQOGwBHAGUAbgBlAGwAIABSAEcAQgAgAFAAcgBvAGYAaQBs" . 
			"AGkAWQBsAGUAaQBuAGUAbgAgAFIARwBCAC0AcAByAG8AZgBpAGkAbABpAFUAbgBpAHcAZQByAHMAYQBs" . 
			"AG4AeQAgAHAAcgBvAGYAaQBsACAAUgBHAEIEHgQxBEkEOAQ5ACAEPwRABD4ERAQ4BDsETAAgAFIARwBC" . 
			"BkUGRAZBACAGKgY5BjEGSgZBACAAUgBHAEIAIAYnBkQGOQYnBkUARwBlAG4AZQByAGkAYwAgAFIARwBC" . 
			"ACAAUAByAG8AZgBpAGwAZQBHAGUAbgBlAHIAZQBsACAAUgBHAEIALQBiAGUAcwBrAHIAaQB2AGUAbABz" . 
			"AGV0ZXh0AAAAAENvcHlyaWdodCAyMDA3IEFwcGxlIEluYy4sIGFsbCByaWdodHMgcmVzZXJ2ZWQuAFhZ" . 
			"WiAAAAAAAADzUgABAAAAARbPWFlaIAAAAAAAAHRNAAA97gAAA9BYWVogAAAAAAAAWnUAAKxzAAAXNFhZ" . 
			"WiAAAAAAAAAoGgAAFZ8AALg2Y3VydgAAAAAAAAABAc0AAHNmMzIAAAAAAAEMQgAABd7///MmAAAHkgAA" . 
			"/ZH///ui///9owAAA9wAAMBs/+EAgEV4aWYAAE1NACoAAAAIAAUBEgADAAAAAQABAAABGgAFAAAAAQAA" . 
			"AEoBGwAFAAAAAQAAAFIBKAADAAAAAQACAACHaQAEAAAAAQAAAFoAAAAAAAA6mQAAAGQAADqZAAAAZAAC" . 
			"oAIABAAAAAEAAAAuoAMABAAAAAEAAAAUAAAAAP/bAEMAAgEBAgEBAgIBAgICAgIDBQMDAwMDBgQEAwUH" . 
			"BgcHBwYGBgcICwkHCAoIBgYJDQkKCwsMDAwHCQ0ODQwOCwwMC//bAEMBAgICAwIDBQMDBQsIBggLCwsL" . 
			"CwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLC//AABEIABQALgMBIgAC" . 
			"EQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0B" . 
			"AgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVG" . 
			"R0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3" . 
			"uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAA" . 
			"AAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGh" . 
			"scEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1" . 
			"dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri" . 
			"4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APkb41eONYtfi94oSDVdRVF1a74FzJgfvn96j+Km" . 
			"j+O/gj/wj3/C159Q0MeK9Et/EekmfU1IvdPuN/kzrtkO0N5b/K2GGOQKzvjnz8YPFX/YVvP/AEc9fePi" . 
			"v9qXwn4K+Eut674A8S+Br3xl4e/Zd8MaZ4dF0LPUHtvENte3TtbwwThla8h3RuYipI+UspFfueIryw6p" . 
			"8kOa+n5Ja62310Z+V4XDRxU5RlPl8z4O0S/8YeJfB+t+IfD1xrN7oPhpbZtV1GG7ZrXTxczeRb+bJvwD" . 
			"LLlEAyWYHA4OK/hTxP4i8ceKdI0Xwrq91eanr13FY6fANS2fappZFjRVdnCgF2UFiQozkkDmv0r+KX7V" . 
			"PhO/8JftJaX8I/HPwu0qXxf4c8C+JZIA1hDb63cpldfjtwI2WS7NvFGnkINyyMpXY7Fqq/GDUvhB4d+I" . 
			"XxP17TPHvwc1nTfiB8a/h/4o0O10zVbW4lstChubNbxpoto+zxARztLHyAgZnADc8NPN5ydpUbXtbfqo" . 
			"b6dOZ9vha8zu/smElpXXW+3eW2vku+5+fXjvw38RPhlZm58eRa7ptp/a97oCXT3m+3nv7Jtt3BDKkhWU" . 
			"wtwzISgPG4mux/ZD8Y6tefEO++06nqL7dOkxm6k4/exf7VfRX/BRD9oTTfiz+xBaaD8NPGfgK803wz8X" . 
			"vFf2nRLOWzjv30+XU5pNKntIUQSPbeU+8yxkKUK7i+AB8x/sc/8AJQ7/AP7Bz/8Ao2KuqlWnicLOdSKT" . 
			"u1b0em/danFVpRw+IjCnK60d/X0O/wDil+zfoWofE7xJNcXOqb31W7JxJHj/AF7/APTOsH/hmPw//wA/" . 
			"Gqf9/I//AI3RRXRTk+VamM4rmegv/DMfh/H/AB8ap/38j/8AjdB/Zj8Pn/l41Trn/WR9f+/dFFVzPuRZ" . 
			"XEP7Mfh89bjVOP8AppFx/wCQ69I/Zf8A2d9F0z4hXP2S61Qb9Olzl4z0lh/6Z+9FFY4mT9lLU1oJc6P/" . 
			"2Q==";
			
		return $imageBase64;				
	}
	
	/**
	* Data-driven base class implementation for testing UPLOAD operation
	*
	* Helper function that handles an IPPAttachment upload.
	*
	* @return 	IntuitEntity	result of DataServices::Upload
	*/
	private function UploadAttachment($dataServices)
	{
		// ONLY FOR ATTACHABLE ENTITY
		
		$imageBase64 = $this->GetBase64ImageForTesting();
		$sendMimeType = "image/jpeg";			
			
		// Query to find an expense account to attribute this expense to
		$AccountArray=array();
		$AccountArray['Expense'] = $dataServices->Query("SELECT * FROM Account WHERE AccountType='Expense'", 1,10);
		if (!$AccountArray['Expense'])
			return NULL;
		$expenseAccountId = $AccountArray['Expense'][0]->Id;
	
		// Query to find an Vendor to attribute this bill to
		$VendorArray = $dataServices->Query("SELECT * FROM Vendor", 1,10);
		if (!$VendorArray)
			return NULL;
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
	
		// Create Bill Obj
		$billObj = new IPPBill();
		$billObj->Name = 'Bill' . rand();
		$billObj->VendorRef = new IPPReferenceType(array('value'=>$vendorId));
		$billObj->TotalAmt = '15.00';
		$billObj->Line = array($PaymentLine,$PaymentLine);
		
		$billObj = $dataServices->Add($billObj);
			
		if (!$billObj)
		{
			echo "Problem creating bill\n";
			return NULL;
		}
		
		// Create a new IPPAttachable
		$randId = rand();
		$entityRef = new IPPReferenceType(array('value'=>$billObj->Id, 'type'=>'Bill'));
		$attachableRef = new IPPAttachableRef(array('EntityRef'=>$entityRef));
		$objAttachable = new IPPAttachable();
		$objAttachable->FileName = $randId.".jpg";
		$objAttachable->AttachableRef = $attachableRef;
		$objAttachable->Category = 'Image';
		$objAttachable->Tag = 'Tag_' . $randId;
		
		// Upload the attachment to the Bill
		$resultObj = $dataServices->Upload(base64_decode($imageBase64[$sendMimeType]),
		                                   $objAttachable->FileName,
		                                   $sendMimeType,
		                                   $objAttachable);
	
		return $resultObj;	
	}

	/**
	* Data-driven base class implementation for testing DOWNLOAD operation
	*
	* Data-driven base class implementation for testing DOWNLOAD operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function Download($dataServices)
	{
		try
		{
			$res = $this->UploadAttachment($dataServices);
			if (!$res)
			{
				return FALSE;
			}
			
			if ($res->Attachable->Id)			
			{
				$resultDownloadedObj = $dataServices->Download($res->Attachable);
				if (!$resultDownloadedObj)
					return FALSE;

				$fileContents = file_get_contents((string)$resultDownloadedObj->TempDownloadUri);
				if (!$fileContents)
					return FALSE;

				// REFERENCE IMAGE
				$imageBase64 = $this->GetBase64ImageForTesting();
				$referenceImgBase64 = $imageBase64['image/jpeg'];
				
				// RETRIEVED IMAGE
				$retrievedImgBase64 = base64_encode($fileContents);
				
				// Did REFERENCE image match the RETRIEVED image?
				if (0==strcmp($referenceImgBase64, $retrievedImgBase64))
					return TRUE;
					
				return FALSE;
			}
		}
		catch(Exception $e)
		{
			return FALSE;
		}
			
		return FALSE;
	}

	/**
	* Data-driven base class implementation for testing DOWNLOADPDF operation
	*
	* Data-driven base class implementation for testing DOWNLOADPDF operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function DownloadPDF($dataServices)
	{
		try
		{
                        $createdEntity = null;
			$res = $this->Create($dataServices,$createdEntity);
                        $result = $dataServices->DownloadPDF($createdEntity);
                        //Check that downloaded file is PDF
                        $handler = fopen($result, "r");  
                        $check = ("%PDF" === fread($handler, 4));
                        fclose($handler);
                        if(!$check) {
                            echo "\n Download was successful, but expected content is wrong!";
                        }
                        unlink($result);
                        return $check;
                        
		}
		catch(Exception $e)
		{
                       echo $e->getMessage();
			return FALSE;
		}
			
		return FALSE;
	}
        
        /**
	* Data-driven base class implementation for testing SENDEMAIL operation
	*
	* Data-driven base class implementation for testing SENDEMAIL operation of
	* just about any kind of POPO object.
	*
	* @return 	BOOL	TRUE if test succeeds; false otherwise
	*/
	public function SendEmail($dataServices)
	{
		try
		{
                        $createdEntity = null;
			$res = $this->Create($dataServices,$createdEntity);
                        
                        $result = $dataServices->SendEmail($createdEntity, self::EMAIL_TO_SEND);
                        $isSent = ("EmailSent" === $result->EmailStatus);
                        if(!$isSent) {
                            echo "\n\n Actual status was {$result->EmailStatus}";
                            echo "Here is response:";
                            var_dump($result);
                        }
                        return $isSent;
                        
		}
		catch(Exception $e)
		{
                       echo $e->getMessage();
			return FALSE;
		}
			
		return FALSE;
	}
        
        
}
