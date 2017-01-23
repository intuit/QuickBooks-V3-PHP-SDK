<?php


/**
 * This is a test class for DataServiceTest and is intended
 * to contain all ReportService Unit Tests
 */

require_once('../sdk/config.php');

require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'Security/OAuthRequestValidator.php');
require_once(PATH_SDK_ROOT . 'Security/RequestValidator.php');
require_once(PATH_SDK_ROOT . 'Exception/SdkExceptions/InvalidTokenException.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once(PATH_SDK_ROOT. 'ReportService/ReportService.php');

date_default_timezone_set('America/Chicago');

class MockReportService extends ReportService{

    public function getResponseSerializer() {
        return parent::getResponseSerializer();
    }

}


class ReportServiceTest extends PHPUnit_Framework_TestCase {

    private function getMockServiceContext($response=null, $request=null){
        echo "\n" . "QBO Report Unit Tests";
        $mockServiceContext= $this->getMockBuilder('ServiceContext')->disableOriginalConstructor()->getMock();
        
        $mockServiceContext->realmId = "mockRealmId";
        
        $mockServiceContext->IppConfiguration = new stdClass();
        $mockServiceContext->IppConfiguration->Logger = new stdClass();
        $mockServiceContext->IppConfiguration->Logger->RequestLog = new Logger();

        $mockServiceContext->IppConfiguration->Message = new stdClass();
        $mockServiceContext->IppConfiguration->Message->Response = new stdClass();
        $mockServiceContext->IppConfiguration->Message->Response->SerializationFormat = $response;
        $mockServiceContext->IppConfiguration->Message->Response->CompressionFormat = null;

        $mockServiceContext->IppConfiguration->Message->Request = new stdClass();
        $mockServiceContext->IppConfiguration->Message->Request->SerializationFormat = $request;
        $mockServiceContext->IppConfiguration->Message->Request->CompressionFormat = null;

        $mockServiceContext->IppConfiguration->ContentWriter = new ContentWriterSettings();
        LocalConfigReader::initOperationControlList($mockServiceContext->IppConfiguration, LocalConfigReader::getRules());
        //$mockServiceContext->IppConfiguration->OpControlList->appendRules(array('IPPTaxService'=>array("jsonOnly"=>true)));

        $mockServiceContext->IppConfiguration->minorVersion="3";
        return $mockServiceContext;
    }

    private function getReportService(){
        $serviceContext = $this->getMockServiceContext();
        $reportService = new MockReportService($serviceContext);
        return $reportService;
    }

    public function testInstance_Incorrect()
    {
        try {
            new ReportService(NULL);
            $this->fail("Class was expected to send an exception");
        } catch(InvalidArgumentException $ex) {
            $this->assertEquals("Resources.ServiceContextCannotBeNull", $ex->getMessage());
        }

        try {
            new ReportService("fake");
            $this->fail("Class was expected to send an exception");
        } catch(InvalidParameterException $ex) {
            $this->assertEquals("Wrong arg type passed - is not an object.", $ex->getMessage());
        }
    }

    public function testSetupSerializer(){

        $responseSerializer = $this->getReportService()->getResponseSerializer();
        $this->assertTrue($responseSerializer instanceof  JsonObjectSerializer);

    }

    public function testSerializationFormat(){
        $requestSerializationFormat = $this->getReportService()->getServiceContext()->IppConfiguration->Message->Request
            ->SerializationFormat;
        $responseSerializationFormat = $this->getReportService()->getServiceContext()->IppConfiguration->Message->Response
            ->SerializationFormat;
        $this->assertEquals(2, $requestSerializationFormat);
        $this->assertEquals(2, $responseSerializationFormat);
    }

    public function testRestHandler(){
        $restHandler = $this->getReportService()->getRestHandler();
        $this->assertTrue($restHandler instanceof SyncRestHandler);
    }

    public function testReportSerialization(){
        $responseBody = '{"Report":{"Header":{"Time":"2015-11-20T13:37:28-08:00","ReportName":"BalanceSheet","ReportBasis":"Accrual","StartPeriod":"2014-01-01","EndPeriod":"2014-12-31","SummarizeColumnsBy":"Total","Currency":"USD","Option":[{"Name":"AccountingStandard","Value":"GAAP"},{"Name":"NoReportData","Value":"true"}]},"Columns":{"Column":[{"ColTitle":"","ColType":"Account","MetaData":[{"Name":"ColKey","Value":"account"}]}]},"Rows":{"Row":[{"Header":{"ColData":[{"value":"ASSETS"}]},"Summary":{"ColData":[{"value":"TOTAL ASSETS"}]},"type":"Section","group":"TotalAssets"},{"Header":{"ColData":[{"value":"LIABILITIES AND EQUITY"}]},"Rows":{"Row":[{"Header":{"ColData":[{"value":"Liabilities"}]},"Summary":{"ColData":[{"value":"Total Liabilities"}]},"type":"Data","group":"Liabilities"},{"Header":{"ColData":[{"value":"Equity"}]},"Rows":{"Row":[{"ColData":[{"value":"Retained Earnings","id":"2"}],"type":"Data"},{"ColData":[{"value":"Net Income"}],"type":"Data","group":"NetIncome"}]},"type":"Section","group":"Equity"},{"ColData":[{"value":"Total Equity"}],"type":"Data","group":"Equity"}]},"type":"Section","group":"TotalLiabilitiesAndEquity"},{"ColData":[{"value":"TOTAL LIABILITIES AND EQUITY"}],"group":"TotalLiabilitiesAndEquity"}]}}}';
        $parsedResponseBody = $this->getReportService()->getResponseSerializer()->Deserialize($responseBody, TRUE);
        $this->assertFalse(is_null($parsedResponseBody) );
        $this->assertTrue($parsedResponseBody instanceof IPPReport);

    }
}