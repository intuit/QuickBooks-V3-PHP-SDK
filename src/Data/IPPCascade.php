<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCascade
 * @var IPPCascade
 * @xmlDefinition  Product: QBO Description: Object representing cascading events on entities resulting from a transaction event. Used by messaging. Not intended for external clients.
 */
class IPPCascade
{


        /**
         * Initializes this object, optionally with pre-defined property values
         *
         * Initializes this object and it's property members, using the dictionary
         * of key/value pairs passed as an optional argument.
         *
         * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
         * @param boolean    $verbose            specifies whether object should echo warnings
         */
    public function __construct($keyValInitializers = [], $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPCascade', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCascade', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

    /**
     * @Definition  Any IntuitEntity derived object name like Customer, Item, Invoice, ...
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlName EntityName
     * @var string
     */
    public $EntityName;

    /**
     * @Definition  Description: Unique identifier for an Intuit entity.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 1
     * @xmlName Id
     * @var com\intuit\schema\finance\v3\IPPid
     */
    public $Id;

    /**
     * @Definition  Cascading events resulting from a transaction event in the form of key value pairs. Key names are user defined.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName KeyValue
     * @var com\intuit\schema\finance\v3\IPPNameValue
     */
    public $KeyValue;
}//end class

 // end class IPPCascade
