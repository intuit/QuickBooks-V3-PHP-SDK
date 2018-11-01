<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPOLBTxn
 * @var IPPOLBTxn
 * @xmlDefinition Describes OLBTransactions list that are downloaded

 */
class IPPOLBTxn
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
            if (property_exists('IPPOLBTxn', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPOLBTxn', $initPropName)) {
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
                        Description: AccountId of the transaction

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountId
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AccountId;
    /**
     * @Definition
                        Product: ALL
                        Description: Last Posting date of OLB transactions where downloaded from the
                        bank

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LastPostingDate
     * @var string
     */
    public $LastPostingDate;
    /**
     * @Definition
                        Product: ALL
                        Description: Last time OLB transactions were downloaded from the bank

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TxnsDownloadTime
     * @var string
     */
    public $TxnsDownloadTime;
    /**
     * @Definition Details of OLB transactions
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OLBTxnDetail
     * @var com\intuit\schema\finance\v3\IPPOLBTxnDetail
     */
    public $OLBTxnDetail;
    /**
     * @Definition Specifies the starting row number in this result

     * @xmlType attribute
     * @xmlName startPosition
     * @var integer
     */
    public $startPosition;
    /**
     * @Definition Specifies the number of records in this result

     * @xmlType attribute
     * @xmlName maxResults
     * @var integer
     */
    public $maxResults;
    /**
     * @Definition Specifies the total count of records that satisfy
                    the filter condition
     * @xmlType attribute
     * @xmlName totalCount
     * @var integer
     */
    public $totalCount;
} // end class IPPOLBTxn
