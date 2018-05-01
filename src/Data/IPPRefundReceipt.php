<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPRefundReceipt
 * @var IPPRefundReceipt
 * @xmlDefinition Financial transaction representing a refund (or
                credit) of payment or part of a payment for goods or services that
                have been sold.
 */
class IPPRefundReceipt extends IPPSalesTransaction
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
            if (property_exists('IPPRefundReceipt', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPRefundReceipt', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Indicates the total credit amount still
                                available to apply towards the payment.
                                [b]QuickBooks
                                Notes[/b][br /]
                                Non QB-writable.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RemainingCredit
     * @var float
     */
    public $RemainingCredit;
    /**
     * @Definition Internal use only: extension place holder for
                                Refund
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RefundReceiptEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $RefundReceiptEx;
} // end class IPPRefundReceipt
