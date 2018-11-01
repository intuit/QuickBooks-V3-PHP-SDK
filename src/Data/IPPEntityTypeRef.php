<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPEntityTypeRef
 * @var IPPEntityTypeRef
 * @xmlDefinition
                Product: ALL
                Description: Reference information for
                an entity.

 */
class IPPEntityTypeRef
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
            if (property_exists('IPPEntityTypeRef', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEntityTypeRef', $initPropName)) {
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
                        Description: Entity type.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Type
     * @var com\intuit\schema\finance\v3\IPPEntityTypeEnum
     */
    public $Type;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to the entity.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EntityRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $EntityRef;
} // end class IPPEntityTypeRef
