<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPPaymentStatusEnum
 * @var IPPPaymentStatusEnum
 * @xmlDefinition
                Product: ALL
                Description: Enumeration of payable
                status for an invoice, as follows: A pending invoice is not yet
                approved/final/sent; not yet payable by customer. A payable invoice
                is now payable. Partial payments may have been received, but money
                still remains to be paid. No claim is made about due vs. overdue,
                past due etc... A paid invoice has been paid in full. No amount
                remains to be paid.

 */
class IPPPaymentStatusEnum
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
            if (property_exists('IPPPaymentStatusEnum', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPaymentStatusEnum', $initPropName)) {
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
} // end class IPPPaymentStatusEnum
