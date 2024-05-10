<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\DataService\RecurringTransactionAdapter;

// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode'       => 'oauth2',
    'ClientID'        => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    'ClientSecret'    => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    'accessTokenKey'  => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX..XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
    'refreshTokenKey' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
    'QBORealmID'      => "xxxxxxxxxxxxxxxxxxx",
    'baseUrl'         => "development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

$dataService->throwExceptionOnError(true);

// Provide the Id for the recurringTrasanction
$resultingObj = $dataService->findRecurringTransactionById( 251);

$error = $dataService->getLastError();

if ($error) {
    echo "The Status code is: " . $error->getHttpStatusCode() . "\n";
    echo "The Helper message is: " . $error->getOAuthHelperError() . "\n";
    echo "The Response message is: " . $error->getResponseBody() . "\n";
}
else {
    echo "\n Find Recurring Transaction By ID : Below is the Raw Response \n\n";
    print_r($resultingObj) . PHP_EOL;
    // Example to show how to create an xml for the Entity : Invoice. Replace with the specific entity Name accordingly : ex : Bill, Estimate, SalesReceipt etc
    $xmlBody = RecurringTransactionAdapter::createRecurringTransactionObject($resultingObj->entities['Invoice'][0]);
    $xmlBody = RecurringTransactionAdapter::getRecurringTxnBody($xmlBody);
    echo "Find Recurring Transaction By ID : Below is the XML Response \n\n";
    echo $xmlBody . "\n";
}

/*
Find Recurring Transaction By ID : Below is the XML Response

<?xml version="1.0" encoding="UTF-8"?>
<ns0:RecurringTransaction xmlns:ns0="http://schema.intuit.com/finance/v3">
    <ns0:Invoice>
        <ns0:AllowIPNPayment>false</ns0:AllowIPNPayment>
        <ns0:AllowOnlinePayment>false</ns0:AllowOnlinePayment>
        <ns0:AllowOnlineCreditCardPayment>false</ns0:AllowOnlineCreditCardPayment>
        <ns0:AllowOnlineACHPayment>false</ns0:AllowOnlineACHPayment>
        <ns0:CustomerRef>26</ns0:CustomerRef>
        <ns0:BillAddr>
            <ns0:Id>27</ns0:Id>
            <ns0:Line1>78 First St.</ns0:Line1>
            <ns0:City>Monlo Park</ns0:City>
            <ns0:CountrySubDivisionCode>CA</ns0:CountrySubDivisionCode>
            <ns0:PostalCode>94304</ns0:PostalCode>
            <ns0:Lat>37.4585825</ns0:Lat>
            <ns0:Long>-122.1352789</ns0:Long>
        </ns0:BillAddr>
        <ns0:ShipAddr>
            <ns0:Id>27</ns0:Id>
            <ns0:Line1>78 First St.</ns0:Line1>
            <ns0:City>Monlo Park</ns0:City>
            <ns0:CountrySubDivisionCode>CA</ns0:CountrySubDivisionCode>
            <ns0:PostalCode>94304</ns0:PostalCode>
            <ns0:Lat>37.4585825</ns0:Lat>
            <ns0:Long>-122.1352789</ns0:Long>
        </ns0:ShipAddr>
        <ns0:FreeFormAddress>true</ns0:FreeFormAddress>
        <ns0:ShipFromAddr>
            <ns0:Id>177</ns0:Id>
            <ns0:Line1>123 Sierra Way</ns0:Line1>
            <ns0:Line2>San Pablo, CA  87999</ns0:Line2>
        </ns0:ShipFromAddr>
        <ns0:DueDate>2020-10-24</ns0:DueDate>
        <ns0:TotalAmt>100.00</ns0:TotalAmt>
        <ns0:ApplyTaxAfterDiscount>false</ns0:ApplyTaxAfterDiscount>
        <ns0:PrintStatus>NeedToPrint</ns0:PrintStatus>
        <ns0:EmailStatus>NotSet</ns0:EmailStatus>
        <ns0:BillEmail>
            <ns0:Address>Familiystore@intuit.com</ns0:Address>
        </ns0:BillEmail>
        <ns0:BillEmailCc>
            <ns0:Address>a@intuit.com</ns0:Address>
        </ns0:BillEmailCc>
        <ns0:BillEmailBcc>
            <ns0:Address>v@intuit.com</ns0:Address>
        </ns0:BillEmailBcc>
        <ns0:Balance>100.00</ns0:Balance>
        <ns0:CurrencyRef>USD</ns0:CurrencyRef>
        <ns0:Line>
            <ns0:Id>1</ns0:Id>
            <ns0:LineNum>1</ns0:LineNum>
            <ns0:Amount>100.00</ns0:Amount>
            <ns0:DetailType>SalesItemLineDetail</ns0:DetailType>
            <ns0:SalesItemLineDetail>
                <ns0:ItemRef>3</ns0:ItemRef>
                <ns0:ItemAccountRef>48</ns0:ItemAccountRef>
                <ns0:TaxCodeRef>NON</ns0:TaxCodeRef>
            </ns0:SalesItemLineDetail>
        </ns0:Line>
        <ns0:Line>
            <ns0:Amount>100.00</ns0:Amount>
            <ns0:DetailType>SubTotalLineDetail</ns0:DetailType>
        </ns0:Line>
        <ns0:TxnTaxDetail>
            <ns0:TotalTax>0</ns0:TotalTax>
        </ns0:TxnTaxDetail>
        <ns0:RecurDataRef>69</ns0:RecurDataRef>
        <ns0:RecurringInfo>
            <ns0:Name>RecurTemplate71</ns0:Name>
            <ns0:RecurType>Automated</ns0:RecurType>
            <ns0:Active>true</ns0:Active>
            <ns0:ScheduleInfo>
                <ns0:IntervalType>Monthly</ns0:IntervalType>
                <ns0:NumInterval>1</ns0:NumInterval>
                <ns0:DayOfMonth>1</ns0:DayOfMonth>
                <ns0:DaysBefore>2</ns0:DaysBefore>
                <ns0:MaxOccurrences>10</ns0:MaxOccurrences>
                <ns0:StartDate>2020-09-24</ns0:StartDate>
                <ns0:NextDate>2020-10-01</ns0:NextDate>
            </ns0:ScheduleInfo>
        </ns0:RecurringInfo>
        <ns0:Id>251</ns0:Id>
        <ns0:SyncToken>0</ns0:SyncToken>
        <ns0:MetaData>
            <ns0:CreateTime>2020-09-24T19:44:41-07:00</ns0:CreateTime>
            <ns0:LastUpdatedTime>2020-09-24T19:44:41-07:00</ns0:LastUpdatedTime>
        </ns0:MetaData>
        <ns0:CustomField>
            <ns0:DefinitionId>1</ns0:DefinitionId>
            <ns0:Name>Custom1</ns0:Name>
            <ns0:Type>StringType</ns0:Type>
        </ns0:CustomField>
        <ns0:CustomField>
            <ns0:DefinitionId>2</ns0:DefinitionId>
            <ns0:Name>Custom2</ns0:Name>
            <ns0:Type>StringType</ns0:Type>
        </ns0:CustomField>
        <ns0:CustomField>
            <ns0:DefinitionId>3</ns0:DefinitionId>
            <ns0:Name>Custom3</ns0:Name>
            <ns0:Type>StringType</ns0:Type>
        </ns0:CustomField>
    </ns0:Invoice>
</ns0:RecurringTransaction>
*/
