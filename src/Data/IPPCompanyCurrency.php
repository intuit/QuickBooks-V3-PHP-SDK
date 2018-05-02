<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCompanyCurrency
 * @var IPPCompanyCurrency
 * @xmlDefinition Company currency are the currencies used by the
                company. Each Company Currency describes the properties of that
                currency.
 */
class IPPCompanyCurrency extends IPPIntuitEntity
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
            if (property_exists('IPPCompanyCurrency', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCompanyCurrency', $initPropName)) {
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
                                currency code like USD, CAD, EUR, etc. Required for the
                                create/delete operation.
                                Max Length: 3

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Code
     * @var string
     */
    public $Code;
    /**
     * @Definition
                                Product: QBO
                                Description: Currency name (Output
                                only)

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition
                                Product: QBO
                                Description: Indicates whether this
                                currency is active in the company or not. Inactive Currency may
                                be hidden from most display purposes and may not be used on
                                financial transactions.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition Internal use only: extension place holder for
                                Company Currency
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyCurrencyEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $CompanyCurrencyEx;
} // end class IPPCompanyCurrency
