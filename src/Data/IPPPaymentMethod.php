<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPPaymentMethod
 * @var IPPPaymentMethod
 * @xmlDefinition Method of payment for received goods.

 */
class IPPPaymentMethod extends IPPIntuitEntity
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
            if (property_exists('IPPPaymentMethod', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPaymentMethod', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition User recognizable name for the payment
                                method.[br /]
                                Length Restriction:
                                QBO: 15
                                QBW: 31

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition Whether or not active inactive payment methods
                                may be hidden from most display purposes and may not be used on
                                financial transactions.
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition Defines the type, or the ways the payment was
                                made. For QBW, the acceptable values are defined in
                                PaymentMethodEnum. For QBO, this field is restricted to
                                CREDIT_CARD or NON_CREDIT_CARD.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Type
     * @var string
     */
    public $Type;
    /**
     * @Definition Internal use only: extension place holder for
                                PaymentMethod
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PaymentMethodEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $PaymentMethodEx;
} // end class IPPPaymentMethod
