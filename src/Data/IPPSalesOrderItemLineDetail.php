<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesItemLineDetail
 * @xmlName IPPSalesOrderItemLineDetail
 * @var IPPSalesOrderItemLineDetail
 * @xmlDefinition
                Product: ALL
                Description: SalesOrder item detail for
                a transaction line.

 */
class IPPSalesOrderItemLineDetail extends IPPSalesItemLineDetail
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
            if (property_exists('IPPSalesOrderItemLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSalesOrderItemLineDetail', $initPropName)) {
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
                                Description: The item on the line
                                is marked as if fully received, but it is closed as no longer
                                available.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ManuallyClosed
     * @var boolean
     */
    public $ManuallyClosed;
} // end class IPPSalesOrderItemLineDetail
