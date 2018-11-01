<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType PurchaseByVendor
 * @xmlName IPPBill
 * @var IPPBill
 * @xmlDefinition Bill is an AP transaction representing a
                request-for-payment from a third party for goods/services rendered
                and/or received
 */
class IPPBill extends IPPPurchaseByVendor
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
            if (property_exists('IPPBill', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBill', $initPropName)) {
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
                                Product: QBW
                                Description: Payer information

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PayerRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $PayerRef;
    /**
     * @Definition SalesTerm Reference for the bill

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SalesTermRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $SalesTermRef;
    /**
     * @Definition The nominal date by which the bill must be
                                paid, not including any early-payment discount incentives, or
                                late payment penalties.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DueDate
     * @var string
     */
    public $DueDate;
    /**
     * @Definition Address to which the payment should be sent.
                                [b]QuickBooks Notes[/b][br /]
                                Non QB-writable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RemitToAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $RemitToAddr;
    /**
     * @Definition Address to which the vendor shipped or will
                                ship any goods associated with the purchase.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $ShipAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: The unpaid amount of the bill. When paid-in-full, balance will
                                be zero.
                                [b]QuickBooks Notes[/b][br /]
                                Non QB-writable.
                                Filterable: QBW
                                Sortable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Balance
     * @var float
     */
    public $Balance;
    /**
     * @Definition
                                Product: ALL
                                Description: The unpaid amount of the bill in home currency. Available only
                                for companies where multicurrency is enabled. When paid-in-full,
                                home balance will be zero.
                                [b]QuickBooks Notes[/b][br /]
                                Non
                                QB-writable.
                                Filterable: QBW
                                Sortable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeBalance
     * @var float
     */
    public $HomeBalance;
    /**
     * @Definition Internal use only: extension place holder for
                                Bill.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName BillEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $BillEx;
} // end class IPPBill
