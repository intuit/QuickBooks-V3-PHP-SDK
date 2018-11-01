<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCashBackInfo
 * @var IPPCashBackInfo
 */
class IPPCashBackInfo
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
            if (property_exists('IPPCashBackInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCashBackInfo', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition AccountReferenceGroup Identifies the Asset
                        Account (bank account) to be used for this Cash back.
                        [b]QuickBooks Notes[/b][br /]
                        Required for the create operation.
                        [br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AccountRef;
    /**
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
     * @xmlName Memo
     * @var string
     */
    public $Memo;
} // end class IPPCashBackInfo
