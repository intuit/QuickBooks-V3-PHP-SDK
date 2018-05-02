<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPEmailAddress
 * @var IPPEmailAddress
 * @xmlDefinition
                Product: ALL
                Description: EmailAddress type definition. This entity is always manipulated in context of another parent entity like Person, Organization etc.

 */
class IPPEmailAddress
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
            if (property_exists('IPPEmailAddress', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEmailAddress', $initPropName)) {
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
                        Product: QBW
                        Description: Unique identifier for an Intuit entity.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Id
     * @var com\intuit\schema\finance\v3\IPPid
     */
    public $Id;
    /**
     * @Definition
                        Product: QBW
                        Description: Email address.[br /]Max. length: 1023 characters.
                        Product: QBO
                        Description: Email address.[br /]Max. length: 100 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Address
     * @var string
     */
    public $Address;
    /**
     * @Definition
                        Product: ALL
                        Description: True if this is the default email address.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Default
     * @var boolean
     */
    public $Default;
    /**
     * @Definition
                        Product: ALL
                        Description: Descriptive tag (or label) associated with the email address. Valid values are Business and Home, as defined in the EmailAddressLabelType.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Tag
     * @var string
     */
    public $Tag;
} // end class IPPEmailAddress
