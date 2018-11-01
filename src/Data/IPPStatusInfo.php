<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPStatusInfo
 * @var IPPStatusInfo
 * @xmlDefinition
                Product: QBO
                Description: Log of Statuses for Transactions. Currently is used for Invoice. Can be extended to others.

 */
class IPPStatusInfo
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
            if (property_exists('IPPStatusInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPStatusInfo', $initPropName)) {
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
                        Description: Holds status information

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName status
     * @var string
     */
    public $status;
    /**
     * @Definition
                        Product: QBO
                        Description: Holds the status update date.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName statusDate
     * @var string
     */
    public $statusDate;
    /**
     * @Definition
                        Product: QBO
                        Description: call to action for this status

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName callToAction
     * @var string
     */
    public $callToAction;
} // end class IPPStatusInfo
