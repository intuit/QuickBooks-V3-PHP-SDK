<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPPriceLevel
 * @var IPPPriceLevel
 * @xmlDefinition
                Product: QBW
                Description: You can use price levels
                to specify custom pricing for specific customers. Once you create a
                price level for a customer, QuickBooks will automatically use the
                custom price in new invoices, sales receipts, sales orders or credit
                memos for that customer. You can override this automatic feature,
                however, when you create the invoices, sales receipts, etc. The user
                can now specify a price level on line items in the following
                supported sales transactions: invoices, sales receipts, credit
                memos, and sales orders. Notice that the response data for the
                affected sales transaction does not list the price level that was
                used. The response simply lists the Rate for the item, which was set
                using the price level.

 */
class IPPPriceLevel extends IPPIntuitEntity
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
            if (property_exists('IPPPriceLevel', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPriceLevel', $initPropName)) {
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
                                Product: QBW
                                Description: User-visible name of
                                the price level

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName Name
     */
    public $Name;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName PriceLevelType
     * @var com\intuit\schema\finance\v3\IPPPriceLevelTypeEnum
     */
    public $PriceLevelType;
    /**
     * @Definition
                                    Product: QBW
                                    Description: A positive value
                                    would increase the price by the given percentage, a negative
                                    value would decrease the base price by the given percentage.
                                    All prices are changed by the same given percentage.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName FixedPercentage
     * @var float
     */
    public $FixedPercentage;
    /**
     * @Definition
                                    Product: QBW
                                    Description: A list of items and
                                    the price or price percentage that applies to the item

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName PriceLevelPerItem
     * @var com\intuit\schema\finance\v3\IPPPriceLevelPerItem
     */
    public $PriceLevelPerItem;
    /**
     * @Definition
                                Product: QBW
                                Description: Reference to the
                                currency in which the price level is expressed.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CurrencyRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $CurrencyRef;
    /**
     * @Definition Internal use only: extension place holder for
                                PriceLevel
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PriceLevelEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $PriceLevelEx;
} // end class IPPPriceLevel
