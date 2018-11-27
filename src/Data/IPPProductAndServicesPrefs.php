<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPProductAndServicesPrefs
 * @var IPPProductAndServicesPrefs
 * @xmlDefinition Defines Product and Services Prefs details

 */
class IPPProductAndServicesPrefs
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
            if (property_exists('IPPProductAndServicesPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPProductAndServicesPrefs', $initPropName)) {
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
                        Product:QBO
                        ProductAndServices for Sales enabled

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ForSales
     * @var boolean
     */
    public $ForSales;
    /**
     * @Definition
                        Product:QBO
                        ProductAndServices for purchases
                        enabled

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ForPurchase
     * @var boolean
     */
    public $ForPurchase;
    /**
     * @Definition
                        Product:QBW
                        Inventory and PO are active

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName InventoryAndPurchaseOrder
     * @var boolean
     */
    public $InventoryAndPurchaseOrder;
    /**
     * @Definition
                        Product:QBO
                        Enable quantity with price and rate
                        enabled

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName QuantityWithPriceAndRate
     * @var boolean
     */
    public $QuantityWithPriceAndRate;
    /**
     * @Definition
                        Product:QBO
                        Enable QuantityOnHand enabled

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName QuantityOnHand
     * @var boolean
     */
    public $QuantityOnHand;
    /**
     * @Definition Product:QBW. Possible values are
                        Disabled,SinglePerItem and MultiplePerItem
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UOM
     * @var com\intuit\schema\finance\v3\IPPUOMFeatureTypeEnum
     */
    public $UOM;
} // end class IPPProductAndServicesPrefs
