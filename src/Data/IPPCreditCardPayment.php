<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCreditCardPayment
 * @var IPPCreditCardPayment
 * @xmlDefinition
                Product: ALL
                Description: Information about a
                payment received by credit card.

 */
class IPPCreditCardPayment
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
            if (property_exists('IPPCreditCardPayment', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCreditCardPayment', $initPropName)) {
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
     * @xmlName CreditChargeInfo
     * @var com\intuit\schema\finance\v3\IPPCreditChargeInfo
     */
    public $CreditChargeInfo;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CreditChargeResponse
     * @var com\intuit\schema\finance\v3\IPPCreditChargeResponse
     */
    public $CreditChargeResponse;
} // end class IPPCreditCardPayment
