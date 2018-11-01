<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPSalesFormsPrefs
 * @var IPPSalesFormsPrefs
 * @xmlDefinition Defines Sales Form Prefs details
 */
class IPPSalesFormsPrefs
{

        /**
        * Initializes this object, optionally with pre-defined property values
        *
        * Initializes this object and it's property members, using the dictionary
        * of key/value pairs passed as an optional argument.
        *
        * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
        * @param boolean $verbose specifies whether object should echo warnings
        */
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPSalesFormsPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSalesFormsPrefs', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition
                        Product:All

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UsingProgressInvoicing
     * @var boolean
     */
    public $UsingProgressInvoicing;
    /**
     * @Definition
                        Product:QBO
                        Defines the CustomField definitions

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CustomField
     * @var com\intuit\schema\finance\v3\IPPCustomFieldDefinition
     */
    public $CustomField;
    /**
     * @Definition
                        Product:QBo
                        Custom Transaction Numbers enabled

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomTxnNumbers
     * @var boolean
     */
    public $CustomTxnNumbers;
    /**
     * @Definition
                        Product:QBO
                        Enable delayed charges

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DelayedCharges
     * @var boolean
     */
    public $DelayedCharges;
    /**
     * @Definition
                        Product:QBO
                        Cc Email Address for Sales forms

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesEmailCc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $SalesEmailCc;
    /**
     * @Definition
                        Product:QBO
                        Bcc Email Address for Sales forms

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesEmailBcc
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $SalesEmailBcc;
    /**
     * @Definition
                        Product:QBO
                        Email a Copy to the company for sales form
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmailCopyToCompany
     * @var boolean
     */
    public $EmailCopyToCompany;
    /**
     * @Definition
                        Product:QBO
                        Enable Deposit on Invoice

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowDeposit
     * @var boolean
     */
    public $AllowDeposit;
    /**
     * @Definition QBO:Enable specifying Discount
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowDiscount
     * @var boolean
     */
    public $AllowDiscount;
    /**
     * @Definition QBO:Default Discount account
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultDiscountAccount
     * @var string
     */
    public $DefaultDiscountAccount;
    /**
     * @Definition
                        Product:All
                        Enable specifying Estimates

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowEstimates
     * @var boolean
     */
    public $AllowEstimates;
    /**
     * @Definition
                        Product:QBO
                        Message to customers on estimates only

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EstimateMessage
     * @var string
     */
    public $EstimateMessage;
    /**
     * @Definition
                        Product:QBO
                        Specifies ETransaction preference status

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ETransactionEnabledStatus
     * @var com\intuit\schema\finance\v3\IPPETransactionEnabledStatusEnum
     */
    public $ETransactionEnabledStatus;
    /**
     * @Definition
                        Product:QBO
                        Specifies whether salesForm PDF should be attached with
                        ETransaction emails

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ETransactionAttachPDF
     * @var boolean
     */
    public $ETransactionAttachPDF;
    /**
     * @Definition
                        Product:QBO
                        Specifies whether online payments is activated

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ETransactionPaymentEnabled
     * @var boolean
     */
    public $ETransactionPaymentEnabled;
    /**
     * @Definition
                        Product:QBO
                        IPN integration support enable status, this allows emails to
                        include IPN link

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName IPNSupportEnabled
     * @var boolean
     */
    public $IPNSupportEnabled;
    /**
     * @Definition
                        Product:QBO
                        Specify Invoice Message

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName InvoiceMessage
     * @var string
     */
    public $InvoiceMessage;
    /**
     * @Definition
                        Product:QBO
                        Enable specifying Service Dates

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowServiceDate
     * @var boolean
     */
    public $AllowServiceDate;
    /**
     * @Definition
                        Product:QBO
                        Enable specifying Shipping Info

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AllowShipping
     * @var boolean
     */
    public $AllowShipping;
    /**
     * @Definition
                        Product:QBO
                        Default shipping account

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultShippingAccount
     * @var string
     */
    public $DefaultShippingAccount;
    /**
     * @Definition
                        Product:QBO
                        Default ItemId Reference type that is selected as part of company
                        setup

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultItem
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DefaultItem;
    /**
     * @Definition
                        Product:QBO
                        Default Terms

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultTerms
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DefaultTerms;
    /**
     * @Definition Product:QBO Default Delivery Method of Invoice
                        and other sales forms - Print, Email are normal options

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultDeliveryMethod
     * @var string
     */
    public $DefaultDeliveryMethod;
    /**
     * @Definition
                        Product:ALL
                        Apply Credit Automatically

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AutoApplyCredit
     * @var boolean
     */
    public $AutoApplyCredit;
    /**
     * @Definition
                        Product:All
                        Apply Payments Automatically

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AutoApplyPayments
     * @var boolean
     */
    public $AutoApplyPayments;
    /**
     * @Definition
                        Product:QBW
                        Print Item with Zero amount or not

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintItemWithZeroAmount
     * @var boolean
     */
    public $PrintItemWithZeroAmount;
    /**
     * @Definition
                        Product:QBW
                        Cloud Max Length: 256
                        [b]QuickBooks
                        Notes[/b][br /]
                        Max Length: 31

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultShipMethodRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DefaultShipMethodRef;
    /**
     * @Definition
                        Product:QBW
                        Default markup rate used to calculate
                        the markup amount on the transactions. To enter a markup rate of
                        8.5%, enter 8.5, not 0.085.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultMarkup
     * @var float
     */
    public $DefaultMarkup;
    /**
     * @Definition
                        Product:All

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TrackReimbursableExpensesAsIncome
     * @var boolean
     */
    public $TrackReimbursableExpensesAsIncome;
    /**
     * @Definition QBW: used by QB desktop, not used by QBO

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UsingSalesOrders
     * @var boolean
     */
    public $UsingSalesOrders;
    /**
     * @Definition QBW: used by QB desktop, not used by QBO

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UsingPriceLevels
     * @var boolean
     */
    public $UsingPriceLevels;
    /**
     * @Definition QBW: used by QB desktop, not used by QBO

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultFOB
     * @var string
     */
    public $DefaultFOB;
    /**
     * @Definition
                        Product:QBO
                        Default Customer message

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultCustomerMessage
     * @var string
     */
    public $DefaultCustomerMessage;
} // end class IPPSalesFormsPrefs
