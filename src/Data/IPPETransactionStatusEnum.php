<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPETransactionStatusEnum
 * @var IPPETransactionStatusEnum
 * @xmlDefinition
                Product: ALL
                Description: Enumeration of
                eTransaction status values. The statuses (Sent, Viewed, Paid,
                Delivery Error, Updated, Sent With ICN Error) are used by QBO
                eInvoicing. The rest statuses are to be used for Tradeshift
                Integration

 */
class IPPETransactionStatusEnum
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
            if (property_exists('IPPETransactionStatusEnum', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPETransactionStatusEnum', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

        /**
         * @xmlType value
         * @var string
         */
    public $value;
} // end class IPPETransactionStatusEnum
