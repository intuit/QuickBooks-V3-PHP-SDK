<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType string
 * @xmlName IPPTaxReportBasisTypeEnum
 * @var IPPTaxReportBasisTypeEnum
 * @xmlDefinition
                Product: QBO
                Description: Enumeration of Tax Report Basis for France

 */
class IPPTaxReportBasisTypeEnum
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
            if (property_exists('IPPTaxReportBasisTypeEnum', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTaxReportBasisTypeEnum', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

        /**
         * @xmlType value
         * @var string
         */
    public $value;
} // end class IPPTaxReportBasisTypeEnum
