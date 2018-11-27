<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType CustomFieldDefinition
 * @xmlName IPPStringTypeCustomFieldDefinition
 * @var IPPStringTypeCustomFieldDefinition
 * @xmlDefinition
                Product: ALL
                Description: Provides for strong-typing of the StringType CustomField.

 */
class IPPStringTypeCustomFieldDefinition extends IPPCustomFieldDefinition
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
            if (property_exists('IPPStringTypeCustomFieldDefinition', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPStringTypeCustomFieldDefinition', $initPropName)) {
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
                                Description: Default string value of the StringType CustomField.[br /]Max. length: 31 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultString
     * @var string
     */
    public $DefaultString;
    /**
     * @Definition
                                Product: ALL
                                Description: The regular expression string used to validate the StringType CustomField value.[br /]Max. length: 31 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName RegularExpression
     * @var string
     */
    public $RegularExpression;
    /**
     * @Definition
                                Product: ALL
                                Description: Maximum length allowed for the value of the string when creating/updating a StringType CustomField.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MaxLength
     * @var integer
     */
    public $MaxLength;
} // end class IPPStringTypeCustomFieldDefinition
