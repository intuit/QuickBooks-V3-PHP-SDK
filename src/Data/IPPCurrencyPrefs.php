<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPCurrencyPrefs
 * @var IPPCurrencyPrefs
 */
class IPPCurrencyPrefs
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
            if (property_exists('IPPCurrencyPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCurrencyPrefs', $initPropName)) {
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
                        Description: Multicurrency enabled
                        for this company

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MultiCurrencyEnabled
     * @var boolean
     */
    public $MultiCurrencyEnabled;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to the Home
                        currency of the company

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HomeCurrency
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $HomeCurrency;
} // end class IPPCurrencyPrefs
