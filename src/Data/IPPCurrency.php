<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCurrency
 * @var IPPCurrency
 * @xmlDefinition Describes the properties of currencies defined in
                QuickBooks. QuickBooks supports the world's common currencies.

 */
class IPPCurrency extends IPPIntuitEntity
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
            if (property_exists('IPPCurrency', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCurrency', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Currency name.
                                Length Restriction:
                                QBO: 15
                                QBW:
                                1024

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition Whether or not active inactive Currency may be
                                hidden from most display purposes and may not be used on
                                financial transactions.
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                Inactive Currencies are not used when downloading the exchange
                                rates.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition Currency universal 3-letter code, like USD,
                                CAD, EUR, etc.
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                Required for
                                the create operation. [br /]
                                Max Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Code
     * @var com\intuit\schema\finance\v3\IPPcurrencyCode
     */
    public $Code;
    /**
     * @Definition "Thousand separator" character, used for the
                                display purpose.
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                Max Length:
                                1

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Separator
     * @var string
     */
    public $Separator;
    /**
     * @Definition Specifies how to present the value, used for
                                the display purpose for example, ##,###,### or #,##,##,###
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                Max Length: 32

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Format
     * @var string
     */
    public $Format;
    /**
     * @Definition Specifies how many decimal places can be shown.
                                Usually there will be 2, or 0 for currencies without "cents".
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                Max Length: 1

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DecimalPlaces
     * @var integer
     */
    public $DecimalPlaces;
    /**
     * @Definition Used for display purpose, can be a comma or a
                                period.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DecimalSeparator
     * @var string
     */
    public $DecimalSeparator;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Symbol
     * @var string
     */
    public $Symbol;
    /**
     * @Definition Used for display purpose to specify where to
                                show the Currency Symbol.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SymbolPosition
     * @var com\intuit\schema\finance\v3\IPPSymbolPositionEnum
     */
    public $SymbolPosition;
    /**
     * @Definition
                                [b][i]QuickBooks Notes[/i][/b] [br /]
                                QuickBooks predefines the most common world currencies, however
                                it does allow the user to define the new one.
                                The user-defined
                                currency however cannot have the exchange rates downloaded.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UserDefined
     * @var boolean
     */
    public $UserDefined;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ExchangeRate
     * @var float
     */
    public $ExchangeRate;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AsOfDate
     * @var string
     */
    public $AsOfDate;
    /**
     * @Definition Internal use only: extension place holder for
                                Currency
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CurrencyEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $CurrencyEx;
} // end class IPPCurrency
