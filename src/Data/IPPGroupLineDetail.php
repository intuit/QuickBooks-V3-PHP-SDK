<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPGroupLineDetail
 * @var IPPGroupLineDetail
 * @xmlDefinition
                Product: ALL
                Description: Detail for a group item
                line, including the lines expanded from the group item.

 */
class IPPGroupLineDetail
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
            if (property_exists('IPPGroupLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPGroupLineDetail', $initPropName)) {
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
                        Description: Reference to a group
                        item for all the lines that belong to the group.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlName GroupItemRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $GroupItemRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Quantity of the group
                        item.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Quantity
     * @var float
     */
    public $Quantity;
    /**
     * @Definition
                        Product: ALL
                        Description: Unit of Measure
                        reference.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UOMRef
     * @var com\intuit\schema\finance\v3\IPPUOMRef
     */
    public $UOMRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Date when the service is
                        performed.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ServiceDate
     * @var string
     */
    public $ServiceDate;
    /**
     * @Definition
                        Product: ALL
                        Description: The list of lines
                        expanded from the group item. Note that a group line cannot itself
                        contain group lines.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Line
     * @var com\intuit\schema\finance\v3\IPPLine
     */
    public $Line;
    /**
     * @Definition
                        Product: ALL
                        Description: Internal use only:
                        extension place holder for GroupLineDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName GroupLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $GroupLineDetailEx;
} // end class IPPGroupLineDetail
