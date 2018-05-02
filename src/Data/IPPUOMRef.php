<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPUOMRef
 * @var IPPUOMRef
 * @xmlDefinition When a unit of measure is referenced, it must
                include the name of the specific unit used as well as the unit of
                measure set in which that unit is defined. This entity captures that
                concept.
 */
class IPPUOMRef
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
            if (property_exists('IPPUOMRef', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPUOMRef', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition The name of the unit selected. Examples: inch,
                        foot, yard.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlName Unit
     * @var string
     */
    public $Unit;
    /**
     * @Definition A reference to the UOM entity that defines the
                        set of related units from which the specified Unit is used.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlName UOMSetRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $UOMSetRef;
} // end class IPPUOMRef
