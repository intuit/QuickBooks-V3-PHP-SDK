<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPMemoRef
 * @var IPPMemoRef
 * @xmlDefinition
                Product: ALL
                Description: Captures a memo on a
                transaction that may (QBW) reference a company pre-defined message
                (See CustomerMsg)

 */
class IPPMemoRef
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
            if (property_exists('IPPMemoRef', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPMemoRef', $initPropName)) {
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
    /**
     * @Definition
                            Product: QBW: the ID of the CustomerMsg entity
                            used to provide the string content

     * @xmlType attribute
     * @xmlName id
     * @var id
     */
    public $id;
} // end class IPPMemoRef
