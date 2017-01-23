<?php
/**
 * This file makes it easy for PHPUnit to discover all tests in this folder,
 * which eliminates the need to maintain /build/build.xml and /build/build.properties
 * every time a test case is added.
 */
//require_once 'PHPUnit/Autoload.php';


/**
 * Dynamically generated test suite that contains all test cases detected
 * in target path
 */
class DetectTests extends PHPUnit_Framework_TestSuite
{
	/**
	 * Initialize the test suite, dynamically
	 */
    public static function suite()
    {
		$suite = new PHPUnit_Framework_TestSuite(TESTSUITE_NAME);
		
		
		list($currentFile,) = explode(".",pathinfo(__FILE__,PATHINFO_BASENAME));
		
		$curDir = PATH_SDK_ROOT.PATH_TAIL.'/*.php';
		foreach (glob($curDir) as $oneFilename)
		{
			list($className,) = explode(".",pathinfo($oneFilename,PATHINFO_BASENAME));
			if ($currentFile==$className)
				continue;

			if ('DetectTests'==$className)
				continue;
			
			require_once($oneFilename);
			$classMethods = get_class_methods($className);
			if ($classMethods)
			{
				foreach($classMethods as $oneClassMethod)
				{
					if (0===strpos($oneClassMethod, 'test') &&
					    'testAt'!=$oneClassMethod &&
					    'tests'!=$oneClassMethod)
					{
						// By convention, PHPUnit test case methods begin with 'test'
						$testObj = new $className($oneClassMethod);
						$suite->addTest($testObj);
						
					}
				}
			}
			else
			{
				echo "Surprised to find no test cases in $currentFile ($className) \n";	
			}
		}
		
		/*
		$suite->addTest(new PHPUnit_Framework_TestCase_Gatherer());
		*/
		return $suite;
    }
}


/**
 * Traverses the list of class member functions for classes that we know contain
 * test cases, and run each of the detected test case methods
 */
//abstract class PHPUnit_Framework_TestCase_Gatherer extends PHPUnit_Framework_TestCase
class PHPUnit_Framework_TestCase_Gatherer extends PHPUnit_Framework_TestCase
{
	/**
	 * Provide PHPUnit a dynamically generated name for the currently-executing test case
	 * @return string Dynamically generated test case name
	 */	
	public function getName($withDataSet = true)
	{
		return $this->name;
	}
	
	/**
	 * Initialize an object of type PHPUnit_Framework_TestCase_Gatherer
	 */
	/*	
	public function __construct()
	{
		parent::__construct();
	}
	*/

public function __construct($targetName)
{
	$this->name = $targetName;
	parent::__construct();
}

	/**
	 * Conforms to PHPUnit_Framework_TestCase::run, dynamically running detected test cases
	 * @param PHPUnit_Framework_TestResult $result outcome of test case
	 */	
	public function run(PHPUnit_Framework_TestResult $result = NULL)
	{
		if ($result === NULL) {
			$result = new PHPUnit_Framework_TestResult;
		}
		
		
		$result->startTest($this);
		PHP_Timer::start();
	
		try {
			$this->{$this->name}();
			$stopTime = PHP_Timer::stop();
		}
		catch(Exception $e)
		{
			$stopTime = PHP_Timer::stop();
			$failResult = new PHPUnit_Framework_AssertionFailedError($e->getMessage());
			$result->addFailure($this, $failResult, $stopTime);
		}
		$result->endTest($this, $stopTime);
	
		return $result;    
	}
}

?>