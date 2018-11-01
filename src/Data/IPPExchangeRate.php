<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPExchangeRate
 * @var IPPExchangeRate
 * @xmlDefinition Describes properties of an exchange rate between
                source and target currencies.
 */
class IPPExchangeRate extends IPPIntuitEntity
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
            if (property_exists('IPPExchangeRate', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPExchangeRate', $initPropName)) {
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
                                Product: QBO
                                Description: Universal 3-letter
                                code of source currency from which exchange rate is required,
                                usually LHS of the equation. Example: 1 USD = 65 INR. Here USD
                                would be the source currency.
                                Max Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SourceCurrencyCode
     * @var string
     */
    public $SourceCurrencyCode;
    /**
     * @Definition
                                Product: QBO
                                Description: Universal 3-letter
                                currency code of target currency against which exchange rate is
                                required, usually RHS of the equation. Usually this would be the
                                home currency.
                                Max Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TargetCurrencyCode
     * @var string
     */
    public $TargetCurrencyCode;
    /**
     * @Definition
                                Product: QBO
                                Description: Exchange rate to be
                                set between these two currencies for the mentioned date.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Rate
     * @var float
     */
    public $Rate;
    /**
     * @Definition
                                Product: QBO
                                Description: Date as on which the
                                exchange rate needs to be set.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AsOfDate
     * @var string
     */
    public $AsOfDate;
    /**
     * @Definition Internal use only: extension place holder for
                                Exchange Rate
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ExchangeRateEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $ExchangeRateEx;
} // end class IPPExchangeRate
