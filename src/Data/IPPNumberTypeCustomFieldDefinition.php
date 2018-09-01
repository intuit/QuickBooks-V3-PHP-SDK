<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType CustomFieldDefinition
 * @xmlName IPPNumberTypeCustomFieldDefinition
 * @var IPPNumberTypeCustomFieldDefinition
 * @xmlDefinition
                Product: ALL
                Description: Provides for strong-typing of the NumberType CustomField.

 */
class IPPNumberTypeCustomFieldDefinition extends IPPCustomFieldDefinition
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
            if (property_exists('IPPNumberTypeCustomFieldDefinition', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPNumberTypeCustomFieldDefinition', $initPropName)) {
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
                                Description: Default decimal value for the NumberType CustomField.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultValue
     * @var float
     */
    public $DefaultValue;
    /**
     * @Definition
                                Product: ALL
                                Description: Minimum decimal value allowed when the NumberType CustomField is created/updated.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MinValue
     * @var float
     */
    public $MinValue;
    /**
     * @Definition
                                Product: ALL
                                Description: Maximum decimal value allowed when the NumberType CustomField is created/updated.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MaxValue
     * @var float
     */
    public $MaxValue;
} // end class IPPNumberTypeCustomFieldDefinition
