<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;
use QuickBooksOnline\API\Data\IPPPurchase;
use QuickBooksOnline\API\QueryFilter\QueryMessage;
use QuickBooksOnline\API\ReportService\ReportService;
use QuickBooksOnline\API\ReportService\ReportName;


// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' => 'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..JhEgS-y5JY_xgsjs8znS7A.UYF61RHkH4W9Z4ErSz2uI5FReB09ne2axDdmYU7zj7ui7FBH0-fw_eZaCAxXY_n4uzf8yW-QOC9qqBTkVAI9WbljSGUmP56eYlW2v7lstR_4Iu-ej2G7AWc_ddg92ydebeY7stjDaYCy_VuI7WW3bjidbYvN5NWlYGNNIJ_cItkalOywsIpf4KKvyrQnau6Ek-zWq4kMoHbZyEBmVc5txvpE82M5VdmjBl_BQh4o0c5XGqGarNxUN_6zDKKW6hlw_mASoFRAB3tPK8InkQ66ESbMN5mRAVyPD-f8hrZVEN8ImJVBIxJq1UDISzeqQwsPwUQfMQgUeQCnzXTAEOdqiPlRR5Lz8cOt1ETdx3scSFvF49RyufPoZxAqC5CxfbUvt1q7yVNr1gRNUKDNXYpJovLCFgFEg9bmART5CphlwUFX8ZO2IQnf5O5meY4MIIGoaR5nm5IqX1CO5eHZZ6BFa5aBrAHTY2Nxipz1L7fTmKQopZ5y9EwBqe4jEpSgSxo-91tJOQXUC5t9hvcHuEbpkxCOZcTcP9PRFJ4ZoBJbmLnY1ElPbT0wLGRsYlCpiWdKQ9uIF5iExP2LiE5O6xW5eyJcHS7OtiNVRD-9m3mju-ICHaq7kh4AindvXBemhtMyCiReWyu51RKnvfM2z8ezDMzY5jn7I_FfQ_9KPIrFsW0RzjhJmzlyTZ8qOoz11k_N.J36u_tG2CDM1DOp2MDhVCA',
    'refreshTokenKey' => "L011529104721Bb4GIrEKlXQ03Zw8pyGAHSsVxUt3prTKiNoVO",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$serviceContext = $dataService->getServiceContext();

// Prep Data Services
$reportService = new ReportService($serviceContext);
if (!$reportService) {
    exit("Problem while initializing ReportService.\n");
}


$reportService->setStartDate("2015-01-01");
$reportService->setAccountingMethod("Accrual");
$profitAndLossReport = $reportService->executeReport(ReportName::PROFITANDLOSS);

if (!$profitAndLossReport) {
    exit("ProfitAndLossReport Is Null.\n");
} else {
    $reportName = strtolower($profitAndLossReport->Header->ReportName);
    echo("ReportName: " . $reportName . "\n");
    echo("Profit And Loss Report Execution Successful!" . "\n");
}
