<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPColData
 * @var IPPColData
 * @xmlDefinition One ColData can contain one column
 */
class IPPColData
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
            if (property_exists('IPPColData', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPColData', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

    /**
     * @Definition Describes the column attributes
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Attributes
     * @var com\intuit\schema\finance\v3\IPPAttributes
     */
    public $Attributes;

    /**
     * @xmlType attribute
     * @xmlName value
     * @var string
     */
    public $value;

    /**
     * @xmlType attribute
     * @xmlName id
     * @var string
     */
    public $id;

    /**
     * @Definition Reference url
     * @xmlType attribute
     * @xmlName href
     * @var string
     */
    public $href;
}//end class

 // end class IPPColData
