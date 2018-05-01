<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPClass
 * @var IPPClass
 * @xmlDefinition Classes provide a way to track different segments
                of the business, and to break down the income and expenses for each
                segment. Classes can apply to all transactions, so they're not tied
                to a particular client or project.
 */
class IPPClass extends IPPIntuitEntity
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
            if (property_exists('IPPClass', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPClass', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition User recognizable name for the Class.[br /]
                                Length Restriction:
                                QBO: 100 characters
                                QBW: 31 characters
                                Sortable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition  Specifies the Class is a SubClass or Not. True
                                if subclass, false or null if it is top-level class

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SubClass
     * @var boolean
     */
    public $SubClass;
    /**
     * @Definition Reference to parent class entity

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ParentRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ParentRef;
    /**
     * @Definition
                                Product: ALL
                                Description: Output Only. Fully
                                qualified name of the entity. The fully qualified name prepends
                                the topmost parent, followed by each sub element separated by
                                colons. Takes the form of: [br
                                /]Parent:class1:Subclass1:Subclass2

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FullyQualifiedName
     * @var string
     */
    public $FullyQualifiedName;
    /**
     * @Definition Whether or not active inactive classes may be
                                hidden from most display purposes and may not be used on
                                financial transactions
                                Filterable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition Internal use only: extension place holder for
                                Class extensible element
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $ClassEx;
} // end class IPPClass
