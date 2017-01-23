<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'QueryFilter/QueryMessage.php');

date_default_timezone_set('America/Chicago');
 
/**
* Tests for QueryFilter class
*/
class QueryFilterTest extends PHPUnit_Framework_TestCase
{
	private static function setupFullQuery()
	{
		$oneQuery = new QueryMessage();
		$oneQuery->sql = "SELECT";
		$oneQuery->projection = array('Metadata.CreateTime','Metadata.Synchronized');
		$oneQuery->entity = "Employee";
		$oneQuery->whereClause = array("Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700'","Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700'");
		$oneQuery->orderByClause = "FamilyName";
		$oneQuery->startposition = "1";
		$oneQuery->maxresults = "10";
		
		return $oneQuery;
	}
	
	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilterFullTest()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();

		$expectedResult = "SELECT Metadata.CreateTime, Metadata.Synchronized FROM Employee WHERE Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700' AND Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700' ORDERBY FamilyName STARTPOSITION 1 MAXRESULTS 10";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}

	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoSQL_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->sql = NULL; // << Key part that makes this test case unique

		$expectedResult = NULL;
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}
	
	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoProjection_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->projection = NULL; // << Key part that makes this test case unique

		$expectedResult = "SELECT * FROM Employee WHERE Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700' AND Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700' ORDERBY FamilyName STARTPOSITION 1 MAXRESULTS 10";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}


	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoEntity_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->entity = NULL; // << Key part that makes this test case unique

		$expectedResult = NULL;
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}
	
	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoWhereClause_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->whereClause = NULL; // << Key part that makes this test case unique

		$expectedResult = "SELECT Metadata.CreateTime, Metadata.Synchronized FROM Employee ORDERBY FamilyName STARTPOSITION 1 MAXRESULTS 10";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}

	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoOrderByClause_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->orderByClause = NULL; // << Key part that makes this test case unique

		$expectedResult = "SELECT Metadata.CreateTime, Metadata.Synchronized FROM Employee WHERE Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700' AND Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700' STARTPOSITION 1 MAXRESULTS 10";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}

	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoStartPositionClause_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->startposition = NULL; // << Key part that makes this test case unique

		$expectedResult = "SELECT Metadata.CreateTime, Metadata.Synchronized FROM Employee WHERE Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700' AND Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700' ORDERBY FamilyName MAXRESULTS 10";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}

	/**
	 * Test case that verifies that generated SQL still matches manually verified
	 * SQL.  Helps us catch any regression in functionality.
	 */
	public function testQueryFilter_NoMaxResultsClause_Test()
	{
		$oneQuery = QueryFilterTest::setupFullQuery();
		$oneQuery->maxresults = NULL; // << Key part that makes this test case unique

		$expectedResult = "SELECT Metadata.CreateTime, Metadata.Synchronized FROM Employee WHERE Metadata.LastUpdatedTime > '2010-08-10T10:20:30-0700' AND Metadata.LastUpdatedTime < '2014-08-10T10:20:30-0700' ORDERBY FamilyName STARTPOSITION 1";
		$actualResult = $oneQuery->getString();

        $this->assertEquals($expectedResult, $actualResult, "Generated query had incorrect contents.");
	}

}
?>
