<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPIntuitResponse
 * @var IPPIntuitResponse
 * @xmlDefinition IntuitResponse is a holder of all types of entities that come as part of response
 */
class IPPIntuitResponse
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
            if (property_exists('IPPIntuitResponse', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPIntuitResponse', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

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
     * @Definition Any IntuitEntity derived entity like Customer, Invoice can be part of response
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
     * @Definition Returns BatchItems in response in case of Batch request
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName BatchItemResponse
     * @var com\intuit\schema\finance\v3\IPPBatchItemResponse
     */
    public $BatchItemResponse;

    /**
     * @Definition Returns CDCResponse
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CDCResponse
     * @var com\intuit\schema\finance\v3\IPPCDCResponse
     */
    public $CDCResponse;

    /**
     * @Definition Returns AttachableResponse entity with response to file upload requests
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName AttachableResponse
     * @var com\intuit\schema\finance\v3\IPPAttachableResponse
     */
    public $AttachableResponse;

    /**
     * @Definition Any IntuitResponseType type derived from IntuitResponseType
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName SyncErrorResponse
     * @var com\intuit\schema\finance\v3\IPPSyncErrorResponse
     */
    public $SyncErrorResponse;

    /**
     * @Definition OLBTransaction object in the response
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OLBTransaction
     * @var com\intuit\schema\finance\v3\IPPOLBTransaction
     */
    public $OLBTransaction;

    /**
     * @Definition OLBStatus object in the response
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName OLBStatus
     * @var com\intuit\schema\finance\v3\IPPOLBStatus
     */
    public $OLBStatus;

    /**
     * @Definition Specifies the RequestId associated with the request
     * @xmlType attribute
     * @xmlName requestId
     * @var string
     */
    public $requestId;

    /**
     * @Definition Specifies the time at which request started processing in the server
     * @xmlType attribute
     * @xmlName time
     * @var string
     */
    public $time;

    /**
     * @Definition Specifies the HTTP codes result of the operation
     * @xmlType attribute
     * @xmlName status
     * @var string
     */
    public $status;
}//end class

 // end class IPPIntuitResponse
