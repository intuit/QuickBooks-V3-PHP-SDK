<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPExternalKey
 * @var IPPExternalKey
 * @xmlDefinition
                Product: ALL
                Description: ExternalKey type allows an associated external ID like QuickBooks ID to be represented in Data Services.

 */
class IPPExternalKey
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
            if (property_exists('IPPExternalKey', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPExternalKey', $initPropName)) {
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
} // end class IPPExternalKey
