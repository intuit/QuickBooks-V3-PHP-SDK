<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCustomFieldDefinition
 * @var IPPCustomFieldDefinition
 * @xmlDefinition
                Product: ALL
                Description: The definition of a custom field for an Intuit type to add additional columns dynamically on a existing Intuit entities. This entity is not extended from IntuitEntity so that it can be manipulated by specifying the DefinitionId.

 */
class IPPCustomFieldDefinition extends IPPIntuitEntity
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
            if (property_exists('IPPCustomFieldDefinition', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCustomFieldDefinition', $initPropName)) {
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
                                Description: Intuit entity type to which the CustomFieldDefinition is associated. Valid values are defined in the objectNameEnumType.[br /]Required for the create operation.
                                Required: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EntityType
     * @var string
     */
    public $EntityType;
    /**
     * @Definition
                                Product: ALL
                                Description: Name of the CustomField entity.[br /]Required for the create operation.
                                Required: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Name
     * @var string
     */
    public $Name;
    /**
     * @Definition
                                Product: ALL
                                Description: True if the custom field is Private; false if Public and can be shared among different applications.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Hidden
     * @var boolean
     */
    public $Hidden;
    /**
     * @Definition
                                Product: ALL
                                Description: True if the custom field must be specified for every instance of the Parent entity for which the CustomFieldDefinition is defined. Data Services dpes not verify the value of that field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Required
     * @var boolean
     */
    public $Required;
    /**
     * @Definition
                            Product: ALL
                            Description: Identifier of Partner AppId that corresponds to this CustomField.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AppId
     * @var string
     */
    public $AppId;
} // end class IPPCustomFieldDefinition
