<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType Transaction
 * @xmlName IPPTransfer
 * @var IPPTransfer
 * @xmlDefinition Financial transaction representing transfer of
                funds between accounts.
                Non QB-writable.

 */
class IPPTransfer extends IPPTransaction
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
            if (property_exists('IPPTransfer', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTransfer', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Must be a Balance Sheet account.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FromAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $FromAccountRef;
    /**
     * @Definition Must be a Balance Sheet account.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ToAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ToAccountRef;
    /**
     * @Definition Total amount of the transfer.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Amount
     * @var float
     */
    public $Amount;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition Internal use only: extension place holder for
                                Transfer
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName TransferEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $TransferEx;
} // end class IPPTransfer
