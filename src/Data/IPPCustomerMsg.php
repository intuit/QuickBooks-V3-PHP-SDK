<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCustomerMsg
 * @var IPPCustomerMsg
 * @xmlDefinition A standard message to a customer that can be
                included at the bottom of a sales form.

 */
class IPPCustomerMsg extends IPPIntuitEntity
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
            if (property_exists('IPPCustomerMsg', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomerMsg', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Contains the message to a customer.[br /]
                                Length Restriction:
                                QBO: 15
                                QBW: 1024

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition Whether or not active inactive customer message
                                may be hidden from most display purposes and may not be used on
                                financial transactions.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition Internal use only: extension place holder for
                                CustomerMsg
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomerMsgEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $CustomerMsgEx;
} // end class IPPCustomerMsg
