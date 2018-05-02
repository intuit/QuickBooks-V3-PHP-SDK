<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPBatchItemResponse
 * @var IPPBatchItemResponse
 * @xmlDefinition QueryResponse entity describing the response of query
 */
class IPPBatchItemResponse
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
    public function __construct($keyValInitializers = array(), $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPBatchItemResponse', $initPropName)|| property_exists('QuickBooksOnline\API\Data\IPPBatchItemResponse', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }


    /**
     * @Definition Indication that a request was processed, but with possible exceptional circumstances (i.e. ignored unsupported fields) that the client may want to be aware of
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Warnings
     * @var com\intuit\schema\finance\v3\IPPWarnings
     */
    public $Warnings;
    /**
     * @Definition Any IntuitEntity derived object like Customer, Invoice can be part of response
     * @xmlType element
     * @xmlName IntuitObject
     * @var IntuitObject
     */
    public $IntuitObject;
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
     * @Definition Returns Report entity in case of report request
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Report
     * @var com\intuit\schema\finance\v3\IPPReport
     */
    public $Report;
    /**
     * @Definition Returns QueryResponse entity in case of query
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName QueryResponse
     * @var com\intuit\schema\finance\v3\IPPQueryResponse
     */
    public $QueryResponse;
    /**
     * @Definition Returns CDCResponse in this envelop
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CDCResponse
     * @var com\intuit\schema\finance\v3\IPPCDCResponse
     */
    public $CDCResponse;
    /**
     * @Definition Returns CascadeResponse in this envelop
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CascadeResponse
     * @var com\intuit\schema\finance\v3\IPPCascadeResponse
     */
    public $CascadeResponse;
    /**
     * @Definition Specifies the batch id for which the response corresponds to
     * @xmlType attribute
     * @xmlName bId
     * @var string
     */
    public $bId;
} // end class IPPBatchItemResponse
