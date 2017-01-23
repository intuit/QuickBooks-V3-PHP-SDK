<?php


//require_once('../config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');

require_once(PATH_SDK_ROOT . 'ReportService/ReportService.php');
require_once(PATH_SDK_ROOT . 'ReportService/ReportName.php');

class ReportServiceIntegrationTest extends PHPUnit_Framework_TestCase{

    private $reportService = null;

    protected function setUp(){
        global $minorVersion;

        $serviceType = IntuitServicesType::QBO;

        $realmIAId = ConfigurationManager::AppSettings('RealmIAQBO');

        $oauthValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessTokenQBO'),
            ConfigurationManager::AppSettings('AccessTokenSecretQBO'),
            ConfigurationManager::AppSettings('ConsumerKeyQBO'),
            ConfigurationManager::AppSettings('ConsumerSecretQBO'));


        $serviceContext  = new ServiceContext($realmIAId,$serviceType, $oauthValidator);

        if (IntuitServicesType::QBO==$serviceType) {
            $serviceContext->IppConfiguration->BaseUrl->Qbo = ConfigurationManager::BaseURLSettings(strtolower(IntuitServicesType::QBO));
            $serviceContext->baseserviceURL = $serviceContext->GetBaseURL();
        }
        if(!is_null($minorVersion)  && $minorVersion > 0){
            $serviceContext->minorVersion = $minorVersion;
        }

        $this->reportService = new ReportService($serviceContext);
        if (!$this->reportService)
            exit("Problem While Initializing ReportService.\n");

        //return $reportService;
    }

    private function printTestStatus($testName){
        $failTime = time();
        echo "\n" . "QBO CRUD Test for " . $testName . " @ " . $failTime;
    }

    public function testGetBalanceSheetReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2016-01-01");
        $reportService->setAccountingMethod("Accrual");
        $balanceSheetReport = $reportService->executeReport(ReportName::BALANCESHEET);

        $this->assertNotNull($balanceSheetReport);

        $this->assertEquals(strtolower(ReportName::BALANCESHEET), strtolower($balanceSheetReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($balanceSheetReport->Header->ReportBasis) );

        $this->assertEquals(strtolower($reportService->getStartDate()),
            strtolower($balanceSheetReport->Header->StartPeriod));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);

    }

    public function testGetProfitAndLossReport(){
        $reportService = $this->reportService;
        $reportService->setStartDate("2016-01-01");
        $reportService->setAccountingMethod("Accrual");
        $profitAndLossReport = $reportService->executeReport(ReportName::PROFITANDLOSS);

        $this->assertNotNull($profitAndLossReport);

        $this->assertEquals(strtolower(ReportName::PROFITANDLOSS), strtolower($profitAndLossReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($profitAndLossReport->Header->ReportBasis) );

        $this->assertEquals(strtolower($reportService->getStartDate()),
            strtolower($profitAndLossReport->Header->StartPeriod));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);

    }

    public function testGetCashFlowReport(){
        $reportService = $this->reportService;
        $reportService->setStartDate("2016-01-01");
        $cashFlowReport = $reportService->executeReport(ReportName::CASHFLOW);

        $this->assertNotNull($cashFlowReport);

        $this->assertEquals(strtolower(ReportName::CASHFLOW), strtolower($cashFlowReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getStartDate()),
            strtolower($cashFlowReport->Header->StartPeriod));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetAPAgingSummaryReport(){
        $reportService = $this->reportService;
        $aPAgingSummaryReport = $reportService->executeReport(ReportName::AGEDPAYABLES);

        $this->assertNotNull($aPAgingSummaryReport);

        $this->assertEquals(strtolower(ReportName::AGEDPAYABLES), strtolower($aPAgingSummaryReport->Header->ReportName));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetARAgingSummaryReport(){
        $reportService = $this->reportService;
        $aRAgingSummaryReport = $reportService->executeReport(ReportName::AGEDRECEIVABLES);

        $this->assertNotNull($aRAgingSummaryReport);

        $this->assertEquals(strtolower(ReportName::AGEDRECEIVABLES), strtolower($aRAgingSummaryReport->Header->ReportName));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetCustomerIncomeReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2016-01-01");
        $reportService->setAccountingMethod("Accrual");
        $customerIncomeReport = $reportService->executeReport(ReportName::CUSTOMERINCOME);

        $this->assertNotNull($customerIncomeReport);

        $this->assertEquals(strtolower(ReportName::CUSTOMERINCOME), strtolower($customerIncomeReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($customerIncomeReport->Header->ReportBasis) );

        $this->assertEquals(strtolower($reportService->getStartDate()),
            strtolower($customerIncomeReport->Header->StartPeriod));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetCustomerBalanceReport(){
        $reportService = $this->reportService;

        $customerBalanceReport = $reportService->executeReport(ReportName::CUSTOMERBALANCE);

        $this->assertNotNull($customerBalanceReport);

        $this->assertEquals(strtolower(ReportName::CUSTOMERBALANCE), strtolower($customerBalanceReport->Header->ReportName));

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetCustomerSalesReport(){
        $reportService = $this->reportService;
        $reportService->setStartDate("2014-06-01");
        $reportService->setAccountingMethod("Accrual");
        $customerSalesReport = $reportService->executeReport(ReportName::CUSTOMERSALES);

        $this->assertNotNull($customerSalesReport);

        $this->assertEquals(strtolower(ReportName::CUSTOMERSALES), strtolower($customerSalesReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($customerSalesReport->Header->ReportBasis) );

        $this->assertNotNull($customerSalesReport->Header->StartPeriod);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetItemSalesReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $itemSalesReport = $reportService->executeReport(ReportName::ITEMSALES);

        $this->assertNotNull($itemSalesReport);

        $this->assertEquals(strtolower(ReportName::ITEMSALES), strtolower($itemSalesReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($itemSalesReport->Header->ReportBasis) );

        $this->assertNotNull($itemSalesReport->Header->StartPeriod);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetDepartmentSalesReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $departmentSalesReport = $reportService->executeReport(ReportName::DEPARTMENTSALES);

        $this->assertNotNull($departmentSalesReport);

        $this->assertEquals(strtolower(ReportName::DEPARTMENTSALES), strtolower($departmentSalesReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($departmentSalesReport->Header->ReportBasis) );

        $this->assertNotNull($departmentSalesReport->Header->StartPeriod);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetBASReport(){

        $this->markTestSkipped(
            "BAS Report Test Skipped"
        );
        /*$reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $basReport = $reportService->executeReport(ReportName::BAS);

        $this->assertNotNull($basReport);

        $this->assertEquals(strtolower(ReportName::BAS), strtolower($basReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($basReport->Header->ReportBasis) );

        $this->assertNotNull($basReport->Header->StartPeriod);*/


    }

    public function testGetInventoryReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $inventoryReport = $reportService->executeReport(ReportName::INVENTORYVALUATIONSUMMARY);

        $this->assertNotNull($inventoryReport);

        $this->assertEquals(strtolower(ReportName::INVENTORYVALUATIONSUMMARY), strtolower($inventoryReport->Header->ReportName));

        $this->assertNotNull($inventoryReport->Header->StartPeriod);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetVendorBalanceReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $vendorBalanceReport = $reportService->executeReport(ReportName::VENDORBALANCE);

        $this->assertNotNull($vendorBalanceReport);

        $this->assertEquals(strtolower(ReportName::VENDORBALANCE), strtolower($vendorBalanceReport->Header->ReportName));

        $this->assertNotNull($vendorBalanceReport->Header->Option[0]->Value);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetVendorExpenseReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $vendorExpenseReport = $reportService->executeReport(ReportName::VENDOREXPENSES);

        $this->assertNotNull($vendorExpenseReport);

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($vendorExpenseReport->Header->ReportBasis) );

        $this->assertEquals(strtolower(ReportName::VENDOREXPENSES), strtolower($vendorExpenseReport->Header->ReportName));

        $this->assertNotNull($vendorExpenseReport->Header->Option[0]->Value);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetTrialBalanceReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $trailBalanceReport = $reportService->executeReport(ReportName::TRIALBALANCE);

        $this->assertNotNull($trailBalanceReport);

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($trailBalanceReport->Header->ReportBasis) );

        $this->assertEquals(strtolower(ReportName::TRIALBALANCE), strtolower($trailBalanceReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($trailBalanceReport->Header->ReportBasis) );

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

    public function testGetClassSalesReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $classSalesReport = $reportService->executeReport(ReportName::CLASSSALES);

        $this->assertNotNull($classSalesReport);

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($classSalesReport->Header->ReportBasis) );

        $this->assertEquals(strtolower(ReportName::CLASSSALES), strtolower($classSalesReport->Header->ReportName));

        $this->assertNotNull($classSalesReport->Header->StartPeriod);

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);

    }

    public function testGetGeneralLedgerReport(){
        $reportService = $this->reportService;

        $reportService->setStartDate("2015-01-01");
        $reportService->setAccountingMethod("Accrual");
        $generalLedgerReport = $reportService->executeReport(ReportName::GENERALLEDGER);
        $this->assertNotNull($generalLedgerReport);

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($generalLedgerReport->Header->ReportBasis) );

        $this->assertEquals(strtolower(ReportName::GENERALLEDGER), strtolower($generalLedgerReport->Header->ReportName));

        $this->assertEquals(strtolower($reportService->getAccountingMethod()),
            strtolower($generalLedgerReport->Header->ReportBasis) );

        ReportServiceIntegrationTest::printTestStatus(__FUNCTION__);
    }

}
