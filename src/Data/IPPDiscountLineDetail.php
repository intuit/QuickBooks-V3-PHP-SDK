<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType DiscountOverride
 * @xmlName IPPDiscountLineDetail
 * @var IPPDiscountLineDetail
 * @xmlDefinition
                Product: ALL
                Description: Discount detail for a
                transaction line.
                Product: QBO
                Description: Discount detail
                representing the total discount on a transaction.

 */
class IPPDiscountLineDetail extends IPPDiscountOverride
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
            if (property_exists('IPPDiscountLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPDiscountLineDetail', $initPropName)) {
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
                                Description: Date when the service
                                is performed.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ServiceDate
     * @var string
     */
    public $ServiceDate;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the Class
                                for the discount.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the
                                TaxCode for the discount.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxCodeRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only:
                                extension place holder for DiscountDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName DiscountLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $DiscountLineDetailEx;
} // end class IPPDiscountLineDetail
