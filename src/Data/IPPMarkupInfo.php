<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPMarkupInfo
 * @var IPPMarkupInfo
 * @xmlDefinition
                Product: ALL
                Description: Markup information.

 */
class IPPMarkupInfo
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
            if (property_exists('IPPMarkupInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPMarkupInfo', $initPropName)) {
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
                        Description: True if the markup is
                        expressed as a percentage.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PercentBased
     * @var boolean
     */
    public $PercentBased;
    /**
     * @Definition
                        Product: ALL
                        Description: Markup value.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Value
     * @var float
     */
    public $Value;
    /**
     * @Definition
                        Product: ALL
                        Description: Markup amount expressed
                        as a percent of charges already entered in the current
                        transaction. To enter a rate of 10% use 10.0, not 0.01.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Percent
     * @var float
     */
    public $Percent;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to a
                        PriceLevel for the markup.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PriceLevelRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $PriceLevelRef;
    /**
     * @Definition
                        Product: ALL
                        Description: An account associated with markup info.
                        Cannot be updated or modified.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MarkUpIncomeAccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $MarkUpIncomeAccountRef;
} // end class IPPMarkupInfo
