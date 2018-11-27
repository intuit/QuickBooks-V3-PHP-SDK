<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCheckPurchase
 * @var IPPCheckPurchase
 * @xmlDefinition Financial Transaction information that pertains to
                the entire Check.
 */
class IPPCheckPurchase
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
            if (property_exists('IPPCheckPurchase', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCheckPurchase', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AccountRef;
    /**
     * @Definition Address to which the payment should be sent.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PayeeAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $PayeeAddr;
    /**
     * @Definition In case of check expense, MemoOnCheck represent
                        the data written on the check as message written to the Payee to
                        physically read on the check

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MemoOnCheck
     * @var string
     */
    public $MemoOnCheck;
    /**
     * @Definition ReadToPrint is a flag indicating if the Check is
                        ready for printing

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintStatus
     * @var com\intuit\schema\finance\v3\IPPPrintStatusEnum
     */
    public $PrintStatus;
} // end class IPPCheckPurchase
