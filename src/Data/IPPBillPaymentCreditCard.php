<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPBillPaymentCreditCard
 * @var IPPBillPaymentCreditCard
 */
class IPPBillPaymentCreditCard
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
            if (property_exists('IPPBillPaymentCreditCard', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBillPaymentCreditCard', $initPropName)) {
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
     * @xmlName CCAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $CCAccountRef;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CCDetail
     * @var com\intuit\schema\finance\v3\IPPCreditCardPayment
     */
    public $CCDetail;
    /**
     * @Definition Internal use only: extension place holder for
                        BillPayTypeCreditCard
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillPaymentCreditCardEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $BillPaymentCreditCardEx;
} // end class IPPBillPaymentCreditCard
