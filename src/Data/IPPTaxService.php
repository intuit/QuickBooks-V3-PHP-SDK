<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPTaxService
 * @var IPPTaxService
 * @xmlDefinition Describes SalesTax details
 */
class IPPTaxService
{


        /**
         * Initializes this object, optionally with pre-defined property values
         *
         * Initializes this object and it's property members, using the dictionary
         * of key/value pairs passed as an optional argument.
         *
         * @param dictionary $keyValInitializers key/value pairs to be populated into object's properties
         * @param boolean    $verbose            specifies whether object should echo warnings
         */
    public function __construct($keyValInitializers = [], $verbose = false)
    {
        foreach ($keyValInitializers as $initPropName => $initPropVal) {
            if (property_exists('IPPTaxService', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxService', $initPropName)) {
                    $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                        echo "Property does not exist ($initPropName) in class (".get_class($this).')';
                }
            }
        }
    }//end __construct()

    /**
     * @Definition
                        Product: QBO
                        Description: Describes the taxcode

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxCode
     * @var string
     */
    public $TaxCode;

    /**
     * @Definition
                        Product: QBO
                        Description: Describes the taxcode Id, this is output only

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName TaxCodeId
     * @var string
     */
    public $TaxCodeId;

    /**
     * @Definition
                        Product: QBO
                        Description: TaxRate details

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName TaxRateDetails
     * @var com\intuit\schema\finance\v3\IPPTaxRateDetails
     */
    public $TaxRateDetails;

    /**
     * @Definition  Fault or Object should be returned
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Fault
     * @var com\intuit\schema\finance\v3\IPPFault
     */
    public $Fault;
}//end class

 // end class IPPTaxService
