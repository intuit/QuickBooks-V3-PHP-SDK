<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesItemLineDetail
 * @xmlName IPPPurchaseOrderItemLineDetail
 * @var IPPPurchaseOrderItemLineDetail
 * @xmlDefinition
                Product: ALL
                Description: PurchaseOrder item detail
                for a transaction line.

 */
class IPPPurchaseOrderItemLineDetail extends IPPSalesItemLineDetail
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
            if (property_exists('IPPPurchaseOrderItemLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPurchaseOrderItemLineDetail', $initPropName)) {
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
                                Description: The identifier
                                provided by manufacturer for the Item. For example, the model
                                number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ManPartNum
     * @var string
     */
    public $ManPartNum;
    /**
     * @Definition
                                Product: ALL
                                Description: The item on the line
                                is marked as if fully receiveded, but it is closed as no longer
                                available.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ManuallyClosed
     * @var boolean
     */
    public $ManuallyClosed;
    /**
     * @Definition
                                Product: ALL
                                Description: Represents the
                                difference between the quantity ordered and actually
                                received.[br /]Cannot be written to QuickBooks.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OpenQty
     * @var float
     */
    public $OpenQty;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only:
                                extension place holder for PurchaseOrderItemDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PurchaseOrderItemLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $PurchaseOrderItemLineDetailEx;
} // end class IPPPurchaseOrderItemLineDetail
