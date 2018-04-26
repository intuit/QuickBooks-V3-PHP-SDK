<?php

namespace QuickBooksOnline\API\ReportService;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Diagnostics\ContentWriter;
use QuickBooksOnline\API\Core\Configuration\OperationControlList;
use QuickBooksOnline\API\DataService\Batch;
use QuickBooksOnline\API\DataService\IntuitCDCResponse;
use QuickBooksOnline\API\Core\Http\Serialization\SerializationFormat;
use QuickBooksOnline\API\Core\HttpClients\SyncRestHandler;
use QuickBooksOnline\API\Core\ServiceContext;
use QuickbooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\HttpClients\RequestParameters;

class ReportService
{
    /**
     * The Service context object.
     * @var ServiceContext
     */
    private $serviceContext;

    /**
     * Rest Request Handler.
     * @var IRestHandler
     */
    private $restHandler;

    /**
     * Serializer needs to be used fore responce object
     * @var IEntitySerializer
     */
    private $responseSerializer;

    /**
     * Throw exception on Error. Default is false;
     * @var Boolean
     */
    private $throwExceptionOnError = false;

    /**
     * If not false, the request from last dataService did not return 2xx
     * @var FaultHandler
     */
    private $lastError = false;

    /**
     * Serializer needs to be used for request object
     * @var IEntitySerializer
     */
    //private $requestSerializer;

    private $report_date = null;
    private $start_date = null;
    private $end_date = null;
    private $date_macro = null;
    private $past_due = null;
    private $end_duedate = null;
    private $start_duedate = null;
    private $duedate_macro = null;
    private $accounting_method = null;
    private $account = null;
    private $source_account = null;
    private $account_type = null;
    private $source_account_type = null;
    private $summarize_column_by = null;
    private $customer = null;
    private $vendor = null;
    private $item = null;
    private $classid = null;
    private $appaid = null;
    private $department = null;
    private $qzurl = null;
    private $aging_period = null;
    private $aging_method = null;
    private $num_periods = null;
    private $term = null;
    private $columns = null;
    private $sort_by = null;
    private $sort_order = null;
    private $group_by = null;
    private $createdate_macro = null;
    private $end_createdate = null;
    private $start_createdate = null;
    private $moddate_macro = null;
    private $end_moddate = null;
    private $start_moddate = null;
    private $payment_method = null;
    private $name = null;
    private $transaction_type = null;
    private $cleared = null;
    private $arpaid = null;
    private $printed = null;
    private $both_amount = null;
    private $memo = null;
    private $doc_num = null;

    /**
     * @return null
     */
    public function getReportDate()
    {
        return $this->report_date;
    }

    /**
     * @param null $report_date
     *
     * @return $this
     */
    public function setReportDate($report_date)
    {
        $this->report_date = $report_date;
        return $this;
    }

    /**
     * @return null
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param null $start_date
     *
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * @return null
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param null $end_date
     *
     * @return $this
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
        return $this;
    }

    /**
     * @return null
     */
    public function getDateMacro()
    {
        return $this->date_macro;
    }

    /**
     * @param null $date_macro
     *
     * @return $this
     */
    public function setDateMacro($date_macro)
    {
        $this->date_macro = $date_macro;
        return $this;
    }

    /**
     * @return null
     */
    public function getPastDue()
    {
        return $this->past_due;
    }

    /**
     * @param null $past_due
     *
     * @return $this
     */
    public function setPastDue($past_due)
    {
        $this->past_due = $past_due;
        return $this;
    }

    /**
     * @return null
     */
    public function getEndDuedate()
    {
        return $this->end_duedate;
    }

    /**
     * @param null $end_duedate
     *
     * @return $this
     */
    public function setEndDuedate($end_duedate)
    {
        $this->end_duedate = $end_duedate;
        return $this;
    }

    /**
     * @return null
     */
    public function getStartDuedate()
    {
        return $this->start_duedate;
    }

    /**
     * @param null $start_duedate
     *
     * @return $this
     */
    public function setStartDuedate($start_duedate)
    {
        $this->start_duedate = $start_duedate;
        return $this;
    }

    /**
     * @return null
     */
    public function getDuedateMacro()
    {
        return $this->duedate_macro;
    }

    /**
     * @param null $duedate_macro
     *
     * @return $this
     */
    public function setDuedateMacro($duedate_macro)
    {
        $this->duedate_macro = $duedate_macro;
        return $this;
    }

    /**
     * @return null
     */
    public function getAccountingMethod()
    {
        return $this->accounting_method;
    }

    /**
     * @param null $accounting_method
     *
     * @return $this
     */
    public function setAccountingMethod($accounting_method)
    {
        $this->accounting_method = $accounting_method;
        return $this;
    }

    /**
     * @return null
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param null $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }

    /**
     * @return null
     */
    public function getSourceAccount()
    {
        return $this->source_account;
    }

    /**
     * @param null $source_account
     *
     * @return $this
     */
    public function setSourceAccount($source_account)
    {
        $this->source_account = $source_account;
        return $this;
    }

    /**
     * @return null
     */
    public function getAccountType()
    {
        return $this->account_type;
    }

    /**
     * @param null $account_type
     *
     * @return $this
     */
    public function setAccountType($account_type)
    {
        $this->account_type = $account_type;
        return $this;
    }

    /**
     * @return null
     */
    public function getSourceAccountType()
    {
        return $this->source_account_type;
    }

    /**
     * @param null $source_account_type
     *
     * @return $this
     */
    public function setSourceAccountType($source_account_type)
    {
        $this->source_account_type = $source_account_type;
        return $this;
    }

    /**
     * @return null
     */
    public function getSummarizeColumnBy()
    {
        return $this->summarize_column_by;
    }

    /**
     * @param null $summarize_column_by
     *
     * @return $this
     */
    public function setSummarizeColumnBy($summarize_column_by)
    {
        $this->summarize_column_by = $summarize_column_by;
        return $this;
    }

    /**
     * @return null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param null $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return null
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param null $vendor
     *
     * @return $this
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
        return $this;
    }

    /**
     * @return null
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param null $item
     *
     * @return $this
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return null
     */
    public function getClassid()
    {
        return $this->classid;
    }

    /**
     * @param null $classid
     *
     * @return $this
     */
    public function setClassid($classid)
    {
        $this->classid = $classid;
        return $this;
    }

    /**
     * @return null
     */
    public function getAppaid()
    {
        return $this->appaid;
    }

    /**
     * @param null $appaid
     *
     * @return $this
     */
    public function setAppaid($appaid)
    {
        $this->appaid = $appaid;
        return $this;
    }

    /**
     * @return null
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param null $department
     *
     * @return $this
     */
    public function setDepartment($department)
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return null
     */
    public function getQzurl()
    {
        return $this->qzurl;
    }

    /**
     * @param null $qzurl
     *
     * @return $this
     */
    public function setQzurl($qzurl)
    {
        $this->qzurl = $qzurl;
        return $this;
    }

    /**
     * @return null
     */
    public function getAgingPeriod()
    {
        return $this->aging_period;
    }

    /**
     * @param null $aging_period
     *
     * @return $this
     */
    public function setAgingPeriod($aging_period)
    {
        $this->aging_period = $aging_period;
        return $this;
    }

    /**
     * @return null
     */
    public function getAgingMethod()
    {
        return $this->aging_method;
    }

    /**
     * @param null $aging_method
     *
     * @return $this
     */
    public function setAgingMethod($aging_method)
    {
        $this->aging_method = $aging_method;
        return $this;
    }

    /**
     * @return null
     */
    public function getNumPeriods()
    {
        return $this->num_periods;
    }

    /**
     * @param null $num_periods
     *
     * @return $this
     */
    public function setNumPeriods($num_periods)
    {
        $this->num_periods = $num_periods;
        return $this;
    }

    /**
     * @return null
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @param null $term
     *
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @return null
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param null $columns
     *
     * @return $this
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return null
     */
    public function getSortBy()
    {
        return $this->sort_by;
    }

    /**
     * @param null $sort_by
     *
     * @return $this
     */
    public function setSortBy($sort_by)
    {
        $this->sort_by = $sort_by;
        return $this;
    }

    /**
     * @return null
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * @param null $sort_order
     *
     * @return $this
     */
    public function setSortOrder($sort_order)
    {
        $this->sort_order = $sort_order;
        return $this;
    }

    /**
     * @return null
     */
    public function getGroupBy()
    {
        return $this->group_by;
    }

    /**
     * @param null $group_by
     *
     * @return $this
     */
    public function setGroupBy($group_by)
    {
        $this->group_by = $group_by;
        return $this;
    }

    /**
     * @return null
     */
    public function getCreatedateMacro()
    {
        return $this->createdate_macro;
    }

    /**
     * @param null $createdate_macro
     *
     * @return $this
     */
    public function setCreatedateMacro($createdate_macro)
    {
        $this->createdate_macro = $createdate_macro;
        return $this;
    }

    /**
     * @return null
     */
    public function getEndCreatedate()
    {
        return $this->end_createdate;
    }

    /**
     * @param null $end_createdate
     *
     * @return $this
     */
    public function setEndCreatedate($end_createdate)
    {
        $this->end_createdate = $end_createdate;
        return $this;
    }

    /**
     * @return null
     */
    public function getStartCreatedate()
    {
        return $this->start_createdate;
    }

    /**
     * @param null $start_createdate
     *
     * @return $this
     */
    public function setStartCreatedate($start_createdate)
    {
        $this->start_createdate = $start_createdate;
        return $this;
    }

    /**
     * @return null
     */
    public function getModdateMacro()
    {
        return $this->moddate_macro;
    }

    /**
     * @param null $moddate_macro
     *
     * @return $this
     */
    public function setModdateMacro($moddate_macro)
    {
        $this->moddate_macro = $moddate_macro;
        return $this;
    }

    /**
     * @return null
     */
    public function getEndModdate()
    {
        return $this->end_moddate;
    }

    /**
     * @param null $end_moddate
     *
     * @return $this
     */
    public function setEndModdate($end_moddate)
    {
        $this->end_moddate = $end_moddate;
        return $this;
    }

    /**
     * @return null
     */
    public function getStartModdate()
    {
        return $this->start_moddate;
    }

    /**
     * @param null $start_moddate
     *
     * @return $this
     */
    public function setStartModdate($start_moddate)
    {
        $this->start_moddate = $start_moddate;
        return $this;
    }

    /**
     * @return null
     */
    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    /**
     * @param null $payment_method
     *
     * @return $this
     */
    public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
        return $this;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * @param null $transaction_type
     *
     * @return $this
     */
    public function setTransactionType($transaction_type)
    {
        $this->transaction_type = $transaction_type;
        return $this;
    }

    /**
     * @return null
     */
    public function getCleared()
    {
        return $this->cleared;
    }

    /**
     * @param null $cleared
     *
     * @return $this
     */
    public function setCleared($cleared)
    {
        $this->cleared = $cleared;
        return $this;
    }

    /**
     * @return null
     */
    public function getArpaid()
    {
        return $this->arpaid;
    }

    /**
     * @param null $arpaid
     *
     * @return $this
     */
    public function setArpaid($arpaid)
    {
        $this->arpaid = $arpaid;
        return $this;
    }

    /**
     * @return null
     */
    public function getPrinted()
    {
        return $this->printed;
    }

    /**
     * @param null $printed
     *
     * @return $this
     */
    public function setPrinted($printed)
    {
        $this->printed = $printed;
        return $this;
    }

    /**
     * @return null
     */
    public function getBothAmount()
    {
        return $this->both_amount;
    }

    /**
     * @param null $both_amount
     *
     * @return $this
     */
    public function setBothAmount($both_amount)
    {
        $this->both_amount = $both_amount;
        return $this;
    }

    /**
     * @return null
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param null $memo
     *
     * @return $this
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
        return $this;
    }

    /**
     * @return null
     */
    public function getDocNum()
    {
        return $this->doc_num;
    }

    /**
     * @param null $doc_num
     *
     * @return $this
     */
    public function setDocNum($doc_num)
    {
        $this->doc_num = $doc_num;
        return $this;
    }

    /**
     * Returns serializer for responce objects
     * @return IEntitySerializer
     */
    public function getResponseSerializer()
    {
        return $this->responseSerializer;
    }

    public function getServiceContext()
    {
        return $this->serviceContext;
    }

    public function getRestHandler()
    {
        return $this->restHandler;
    }

    /**
     * If any non 200 status code is return, throw an exception.
     */
    public function turnOnThrowExceptionOnError(){
        $this->throwExceptionOnError = true;
    }

    /**
     * If any non 200 status code is return, do not throw an exception. Default is OFF.
     */
    public function turnOffThrowExceptionOnError(){
        $this->throwExceptionOnError = false;
    }

    /**
     * Initializes a new instance of the DataService class.
     *
     * @param ServiceContext $serviceContext IPP Service Context
     * @throws
     */
    public function __construct($serviceContext)
    {
        if (null == $serviceContext) {
            throw new InvalidArgumentException('Resources.ServiceContextCannotBeNull');
        }

        if (!is_object($serviceContext)) {
            throw new InvalidParameterException('Wrong arg type passed - is not an object.');
        }

        $serviceContext->IppConfiguration->Message->Request->SerializationFormat = SerializationFormat::Json;
        $serviceContext->IppConfiguration->Message->Response->SerializationFormat = SerializationFormat::Json;

        //ServiceContextValidation(serviceContext);
        $this->serviceContext = $serviceContext;

        $this->setupSerializers();
        $this->useMinorVersion();

        $this->restHandler = new SyncRestHandler($serviceContext);

        // Set the Service type to either QBO or QBD by calling a method.
        //$this->serviceContext->UseDataServices();
    }

    /**
     * Setups serializers objects for responces and requests based on service context
     */
    private function setupSerializers()
    {
        $this->responseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
    }

    private function useMinorVersion()
    {
        $version = $this->serviceContext->IppConfiguration->minorVersion;
        if (is_numeric($version) && !empty($version)) {
            $this->serviceContext->minorVersion = $version;
        }
    }

    private function getReportQueryParameters()
    {
        $uriParameterList = array();
        $uriParameterString = null;

        if (!is_null($this->report_date)) {
            array_push($uriParameterList, array("report_date", $this->getReportDate()));
        }
        if (!is_null($this->start_date)) {
            array_push($uriParameterList, array("start_date", $this->getStartDate()));
        }
        if (!is_null($this->end_date)) {
            array_push($uriParameterList, array("end_date", $this->getEndDate()));
        }
        if (!is_null($this->date_macro)) {
            array_push($uriParameterList, array("date_macro", $this->getDateMacro()));
        }
        if (!is_null($this->past_due)) {
            array_push($uriParameterList, array("past_due", $this->getPastDue()));
        }
        if (!is_null($this->end_duedate)) {
            array_push($uriParameterList, array("end_duedate", $this->getEndDuedate()));
        }
        if (!is_null($this->start_duedate)) {
            array_push($uriParameterList, array("start_duedate", $this->getStartDuedate()));
        }
        if (!is_null($this->duedate_macro)) {
            array_push($uriParameterList, array("duedate_macro", $this->getDuedateMacro()));
        }
        if (!is_null($this->accounting_method)) {
            array_push($uriParameterList, array("accounting_method", $this->getAccountingMethod()));
        }
        if (!is_null($this->account)) {
            array_push($uriParameterList, array("account", $this->getAccount()));
        }
        //-----------------------------------------------------------------------------------------------
        if (!is_null($this->source_account)) {
            array_push($uriParameterList, array("source_account", $this->getSourceAccount()));
        }
        if (!is_null($this->account_type)) {
            array_push($uriParameterList, array("account_type", $this->getAccountType()));
        }
        if (!is_null($this->source_account_type)) {
            array_push($uriParameterList, array("source_account_type", $this->getSourceAccountType()));
        }
        if (!is_null($this->summarize_column_by)) {
            array_push($uriParameterList, array("summarize_column_by", $this->getSummarizeColumnBy()));
        }
        if (!is_null($this->customer)) {
            array_push($uriParameterList, array("customer", $this->getCustomer()));
        }
        if (!is_null($this->vendor)) {
            array_push($uriParameterList, array("vendor", $this->getVendor()));
        }
        if (!is_null($this->item)) {
            array_push($uriParameterList, array("item", $this->getItem()));
        }
        if (!is_null($this->classid)) {
            array_push($uriParameterList, array("class", $this->getClassid()));
        }
        if (!is_null($this->appaid)) {
            array_push($uriParameterList, array("appaid", $this->getAppaid()));
        }
        if (!is_null($this->department)) {
            array_push($uriParameterList, array("department", $this->getDepartment()));
        }
        //---------------------------------------------------------------------------------------------
        if (!is_null($this->qzurl)) {
            array_push($uriParameterList, array("qzurl", $this->getQzurl()));
        }
        if (!is_null($this->aging_period)) {
            array_push($uriParameterList, array("aging_period", $this->getAgingPeriod()));
        }
        if (!is_null($this->aging_method)) {
            array_push($uriParameterList, array("aging_method", $this->getAgingMethod()));
        }
        if (!is_null($this->num_periods)) {
            array_push($uriParameterList, array("num_periods", $this->getNumPeriods()));
        }
        if (!is_null($this->term)) {
            array_push($uriParameterList, array("term", $this->getTerm()));
        }
        if (!is_null($this->columns)) {
            array_push($uriParameterList, array("columns", $this->getColumns()));
        }
        if (!is_null($this->sort_by)) {
            array_push($uriParameterList, array("sort_by", $this->getSortBy()));
        }
        if (!is_null($this->sort_order)) {
            array_push($uriParameterList, array("sort_order", $this->getSortOrder()));
        }
        if (!is_null($this->group_by)) {
            array_push($uriParameterList, array("group_by", $this->getGroupBy()));
        }
        if (!is_null($this->createdate_macro)) {
            array_push($uriParameterList, array("createdate_macro", $this->getCreatedateMacro()));
        }
        //-----------------------------------------------------------------------------------------------
        if (!is_null($this->end_createdate)) {
            array_push($uriParameterList, array("end_createdate", $this->getEndCreatedate()));
        }
        if (!is_null($this->start_createdate)) {
            array_push($uriParameterList, array("start_createdate", $this->getStartCreatedate()));
        }
        if (!is_null($this->moddate_macro)) {
            array_push($uriParameterList, array("moddate_macro", $this->getModdateMacro()));
        }
        if (!is_null($this->end_moddate)) {
            array_push($uriParameterList, array("end_moddate", $this->getEndModdate()));
        }
        if (!is_null($this->start_moddate)) {
            array_push($uriParameterList, array("start_moddate", $this->getStartModdate()));
        }
        if (!is_null($this->payment_method)) {
            array_push($uriParameterList, array("payment_method", $this->getPaymentMethod()));
        }
        if (!is_null($this->name)) {
            array_push($uriParameterList, array("name", $this->getName()));
        }
        if (!is_null($this->transaction_type)) {
            array_push($uriParameterList, array("transaction_type", $this->getTransactionType()));
        }
        if (!is_null($this->cleared)) {
            array_push($uriParameterList, array("cleared", $this->getCleared()));
        }
        if (!is_null($this->arpaid)) {
            array_push($uriParameterList, array("arpaid", $this->getArpaid()));
        }
        //-------------------------------------------------------------------------------------------------
        if (!is_null($this->printed)) {
            array_push($uriParameterList, array("printed", $this->getPrinted()));
        }
        if (!is_null($this->both_amount)) {
            array_push($uriParameterList, array("both_amount", $this->getBothAmount()));
        }
        if (!is_null($this->memo)) {
            array_push($uriParameterList, array("memo", $this->getMemo()));
        }
        if (!is_null($this->doc_num)) {
            array_push($uriParameterList, array("doc_num", $this->getDocNum()));
        }


        foreach ($uriParameterList as $uriParameter) {
            if (sizeof($uriParameterString) > 0) {
                $uriParameterString .= "&";
            }
            $uriParameterString .= $uriParameter[0];
            $uriParameterString .= "=";
            $uriParameterString .= $uriParameter[1];
        }
        return $uriParameterString;
    }

    // This modification is done to add a Report envelope for proper deserialization.
    private function modifyReportResponse($reportResponse)
    {
        $modifiedReportResponse = '{"Report":' . $reportResponse . '}';
        return $modifiedReportResponse;
    }
    public function executeReport($reportName)
    {
        $urlResource = "reports";
        $querySeparator = "?";
        $reportQueryParameters = $this->getReportQueryParameters();

        if ($reportQueryParameters) {
            $httpRequestUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource, $reportName, $querySeparator));
            $httpRequestUri .=  $reportQueryParameters;
        } else {
            $httpRequestUri = implode(CoreConstants::SLASH_CHAR, array('company', $this->serviceContext->realmId, $urlResource, $reportName));
        }


        // Creates request parameters
        if ($this->serviceContext->IppConfiguration->Message->Request->SerializationFormat == SerializationFormat::Json) {
            $requestParameters = new RequestParameters($httpRequestUri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONJSON, null);
        } else {
            $requestParameters = new RequestParameters($httpRequestUri, 'GET', CoreConstants::CONTENTTYPE_APPLICATIONXML, null);
        }

        $restRequestHandler = $this->getRestHandler();
        list($responseCode, $responseBody) = $restRequestHandler->sendRequest($requestParameters, null, null, $this->throwExceptionOnError);
        $faultHandler = $restRequestHandler->getFaultHandler();
        if ($faultHandler) {
            $this->lastError = $faultHandler;
            return null;
        } else {
            $this->lastError = false;
            $parsedResponseBody = $this->getResponseSerializer()->Deserialize($responseBody, true);
            return ($parsedResponseBody);
        }
    }
}
