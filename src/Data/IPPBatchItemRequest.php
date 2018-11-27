<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPBatchItemRequest
 * @var IPPBatchItemRequest
 * @xmlDefinition QueryResponse entity describing the response of query
 */
class IPPBatchItemRequest
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
            if (property_exists('IPPBatchItemRequest', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPBatchItemRequest', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

    /**
     * @xmlType element
     * @xmlName IntuitObject
     * @var IntuitObject
     */
    public $IntuitObject;

    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Query
     * @var string
     */
    public $Query;

    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName ReportQuery
     * @var string
     */
    public $ReportQuery;

    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CDCQuery
     * @var com\intuit\schema\finance\v3\IPPCDCQuery
     */
    public $CDCQuery;

    /**
     * @Definition Specifies the batch id for which the response corresponds to
     * @xmlType attribute
     * @xmlName bId
     * @var string
     */
    public $bId;

    /**
     * @Definition Specifies the batch id for which the response corresponds to
     * @xmlType attribute
     * @xmlName operation
     * @var OperationEnum
     */
    public $operation;

    /**
     * @Definition Specifies name value pair of options other than operations
     * @xmlType attribute
     * @xmlName optionsData
     * @var string
     */
    public $optionsData;
}//end class

 // end class IPPBatchItemRequest
