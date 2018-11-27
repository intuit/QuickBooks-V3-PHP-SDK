<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCDCResponse
 * @var IPPCDCResponse
 * @xmlDefinition QueryResponse entity describing the response of query
 */
class IPPCDCResponse
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
            if (property_exists('IPPCDCResponse', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCDCResponse', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

    /**
     * @Definition Any IntuitEntity derived object like Customer, Invoice can be part of response
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName QueryResponse
     * @var com\intuit\schema\finance\v3\IPPQueryResponse
     */
    public $QueryResponse;

    /**
     * @Definition  Fault or Object should be returned
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Fault
     * @var com\intuit\schema\finance\v3\IPPFault
     */
    public $Fault;

    /**
     * @Definition Specifies the number of rows in this result
     * @xmlType attribute
     * @xmlName size
     * @var integer
     */
    public $size;
}//end class

 // end class IPPCDCResponse
