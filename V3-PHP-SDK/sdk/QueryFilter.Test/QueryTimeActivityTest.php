<?php

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Core.Test/Initializer.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'QueryFilter/QueryMessage.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

date_default_timezone_set('America/Chicago');

/**
* Tests for QueryFilter class
 * @group integration
*/
class QueryTimeActivityTest extends PHPUnit_Framework_TestCase
{
    private $dataService;

    public function setUp() {
        parent::setUp();
        $this->dataService = new DataService(Initializer::InitializeServiceContextQbo());
    }


  /**
   * Test case expects response from the service without exceptions
   * 
   * Example responce payload: 
   * <?xml version="1.0" encoding="UTF-8" standalone="yes"?>
   *  <IntuitResponse xmlns="http://schema.intuit.com/finance/v3" time="2015-03-31T12:28:49.664-07:00">
   *        <QueryResponse/>
   * </IntuitResponse>
   * 
   * Current implementation of DataService returns Null in this case, so this 
   * test verifies that there is no other exceptions for this type of queries.
   * 
   */  
    public function testCreateTimeQuery() {
        try {
            $result = $this->dataService->Query("SELECT * FROM TimeActivity WHERE MetaData.CreateTime > '2015-10-19T04:00:00Z'");
        } catch (Exception $e) {
            $this->fail('Didn\'t expect exception here');
        }
        $this->isNull($result);
  }
  
  } 
  
?>