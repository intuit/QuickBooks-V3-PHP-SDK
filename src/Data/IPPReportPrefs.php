<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPReportPrefs
 * @var IPPReportPrefs
 * @xmlDefinition Defines Report Prefs details
 */
class IPPReportPrefs
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
            if (property_exists('IPPReportPrefs', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPReportPrefs', $initPropName)) {
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
                        Product:All
                        report basis

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReportBasis
     * @var com\intuit\schema\finance\v3\IPPReportBasisEnum
     */
    public $ReportBasis;
    /**
     * @Definition
                        Product:QBW
                        If true, the Aging Reports are based
                        on the transaction date.[br /]
                        If false, the Aging Reports are
                        based on the due date.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CalcAgingReportFromTxnDate
     * @var boolean
     */
    public $CalcAgingReportFromTxnDate;
} // end class IPPReportPrefs
