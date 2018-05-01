<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPPurchaseByVendor
 * @var IPPPurchaseByVendor
 * @xmlDefinition Financial Transaction information that pertains to
                the entire Bill.
 */
class IPPPurchaseByVendor extends IPPTransaction
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
            if (property_exists('IPPPurchaseByVendor', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPurchaseByVendor', $initPropName)) {
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
                                Product: ALL
                                Description: Specifies the vendor reference for this transaction
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName VendorRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $VendorRef;
    /**
     * @Definition Specifies which AP account the bill will be
                                credited to. Many/most small businesses have a single AP
                                account, so the account is implied. When specified, the account
                                must be a Liability account, and further, the sub-type must be
                                of type "Payables"
                                [b]QuickBooks Notes[/b][br /]
                                The AP Account
                                should always be specified or a default will be used.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName APAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $APAccountRef;
    /**
     * @Definition
                                Product: ALL
                                Description: The total amount due, determined by taking the sum of all lines
                                associated. This includes all charges, allowances, taxes,
                                discounts, etc...
                                [b]QuickBooks Notes[/b][br /]
                                Non QB-writable.
                                Output only field in case of QBO
                                Filterable: QBW
                                Sortable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TotalAmt
     * @var float
     */
    public $TotalAmt;
    /**
     * @Definition
                                Product: QBW
                                Description: The email address to
                                which this bill is/was sent. [br/] Non QB-writable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillEmail
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $BillEmail;
    /**
     * @Definition
                                Product: QBW
                                Description: The email address to
                                which inquiries about the bill may be directed. (Also
                                appropriate for paypal payments). [br/] Non QB-writable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReplyEmail
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $ReplyEmail;
    /**
     * @Definition  QBW only. Memo to be visible to Payee

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Memo
     * @var string
     */
    public $Memo;
    /**
     * @Definition
                                Product: QBO
                                Description: Indicates the
                                GlobalTax model if the model inclusive of tax, exclusive of
                                taxes or not applicable

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName GlobalTaxCalculation
     * @var com\intuit\schema\finance\v3\IPPGlobalTaxCalculationEnum
     */
    public $GlobalTaxCalculation;
} // end class IPPPurchaseByVendor
