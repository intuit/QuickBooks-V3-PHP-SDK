<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPBillPaymentCheck
 * @var IPPBillPaymentCheck
 */
class IPPBillPaymentCheck
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
            if (property_exists('IPPBillPaymentCheck', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBillPaymentCheck', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BankAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $BankAccountRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintStatus
     * @var com\intuit\schema\finance\v3\IPPPrintStatusEnum
     */
    public $PrintStatus;
    /**
     * @Definition
                        [b]QuickBooks Notes[/b][br /]
                        [i]Unsupported
                        field.[/i]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CheckDetail
     * @var com\intuit\schema\finance\v3\IPPCheckPayment
     */
    public $CheckDetail;
    /**
     * @Definition Address to which the payment should be sent.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PayeeAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $PayeeAddr;
    /**
     * @Definition Internal use only: extension place holder for
                        BillPaymentCheck.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillPaymentCheckEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $BillPaymentCheckEx;
} // end class IPPBillPaymentCheck
