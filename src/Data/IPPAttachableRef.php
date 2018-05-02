<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPAttachableRef
 * @var IPPAttachableRef
 * @xmlDefinition
                Product: ALL
                Description: Describes the details of the attachable and provides information such as where they are referenced and custom fields.

 */
class IPPAttachableRef
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
            if (property_exists('IPPAttachableRef', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPAttachableRef', $initPropName)) {
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
                        Description: Reference to the entity.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EntityRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $EntityRef;
    /**
     * @Definition
                        Product: ALL
                        Description:

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LineInfo
     * @var com\intuit\schema\finance\v3\IPPid
     */
    public $LineInfo;
    /**
     * @Definition
                        Product: ALL
                        Description:

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName IncludeOnSend
     * @var boolean
     */
    public $IncludeOnSend;
    /**
     * @Definition
                        Product: ALL
                        Description: Custom field (or data extension).
                        Filterable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName CustomField
     * @var com\intuit\schema\finance\v3\IPPCustomField
     */
    public $CustomField;
    /**
     * @Definition  Specifies extension entity to allow extension

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AttachableRefEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $AttachableRefEx;
} // end class IPPAttachableRef
