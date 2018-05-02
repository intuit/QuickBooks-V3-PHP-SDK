<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPOLBTransaction
 * @var IPPOLBTransaction
 * @xmlDefinition Describes OLBTransactions list that are downloaded

 */
class IPPOLBTransaction
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
            if (property_exists('IPPOLBTransaction', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPOLBTransaction', $initPropName)) {
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
                        Description: Last time OLB transactions where downloaded from the bank

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OLBDownloadTime
     * @var string
     */
    public $OLBDownloadTime;
    /**
     * @Definition List of OLB transactions
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OLBTxn
     * @var com\intuit\schema\finance\v3\IPPOLBTxn
     */
    public $OLBTxn;
} // end class IPPOLBTransaction
