<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPNameBase
 * @var IPPNameBase
 * @xmlDefinition
                Product: ALL
                Description: Describes the base class of name entities (Customer, Employee, Vendor, OtherName)

 */
class IPPNameBase extends IPPIntuitEntity
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
            if (property_exists('IPPNameBase', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPNameBase', $initPropName)) {
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
                                Description: IntuitId represents the realm id, authid or an entity id. An entity is a new type of IAM identity that represents a person or a business which has no Intuit authentication context

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName IntuitId
     * @var string
     */
    public $IntuitId;
    /**
     * @Definition
                                Product: QBW
                                Description: True if the entity represents an organization; otherwise the entity represents a person. Default is NULL or False, representing a person.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Organization
     * @var boolean
     */
    public $Organization;
    /**
     * @Definition
                                Product: ALL
                                Description: QBW: Title of the person. The person can have zero or more titles.
                                Description: QBO: Title of the person. The person can have zero or more titles.
                                InputType: ReadWrite
                                ValidRange: QBW: Min=0, Max=15
                                ValidationRules: QBW: At least one of the name elements is required: Title, GivenName, MiddleName, or FamilyName.
                                ValidationRules: QBO: At least one of the name elements is required: Title, GivenName, MiddleName, FamilyName, or Suffix.
                                I18n: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Title
     * @var string
     */
    public $Title;
    /**
     * @Definition
                                Product: QBW
                                Description: Given name or first name of a person.[br /]Max. length: 25 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, or FamilyName.
                                Product: QBO
                                Description: Given name or first name of a person.[br /]Max. length: 25 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, FamilyName, or Suffix.
                                Filterable: ALL
                                Sortable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName GivenName
     * @var string
     */
    public $GivenName;
    /**
     * @Definition
                                Product: QBW
                                Description: Middle name of the person. The person can have zero or more middle names.[br /]Max. length: 5 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, or FamilyName.
                                Product: QBO
                                Description: Middle name of the person. The person can have zero or more middle names.[br /]Max. length: 15 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, FamilyName, or Suffix.
                                Filterable: ALL
                                Sortable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MiddleName
     * @var string
     */
    public $MiddleName;
    /**
     * @Definition
                                Product: QBW
                                Description: Family name or the last name of the person.[br /]Max. length: 25 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, or FamilyName.
                                Product: QBO
                                Description: Family name or the last name of the person.[br /]Max. length: 15 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, FamilyName, or Suffix.
                                Filterable: ALL
                                Sortable: ALL

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FamilyName
     * @var string
     */
    public $FamilyName;
    /**
     * @Definition
                                Product: QBO
                                Description: Suffix appended to the name of a person. For example, Senior, Junior, etc. QBO only field.[br /]Max. length: 15 characters.[br /]At least one of the name elements is required: Title, GivenName, MiddleName, FamilyName, or Suffix.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Suffix
     * @var string
     */
    public $Suffix;
    /**
     * @Definition
                                Product: ALL
                                Description: Fully qualified name of the entity. The fully qualified name prepends the topmost parent, followed by each sub element separated by colons. Takes the form of Parent:Customer:Job:Sub-job. Limited to 5 levels.[br /]Max. length: 41 characters (single name) or 209 characters (fully qualified name).

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FullyQualifiedName
     * @var string
     */
    public $FullyQualifiedName;
    /**
     * @Definition
                                Product: ALL
                                Description: The name of the company associated with the person or organization.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyName
     * @var string
     */
    public $CompanyName;
    /**
     * @Definition
                                Product: QBO
                                Description: The name of the person or organization as displayed. If not provided, this is populated from FullName.
                                Product: QBW
                                Description: The name of the person or organization as displayed.
                                Required: ALL
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DisplayName
     * @var string
     */
    public $DisplayName;
    /**
     * @Definition
                                Product: ALL
                                Description: Name of the person or organization as printed on a check. If not provided, this is populated from FullName.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrintOnCheckName
     * @var string
     */
    public $PrintOnCheckName;
    /**
     * @Definition
                                Product: QBW
                                Description: The ID of the Intuit user associated with this name.  Note: this is NOT the Intuit AuthID of the user.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UserId
     * @var string
     */
    public $UserId;
    /**
     * @Definition
                                Product: ALL
                                Description: If true, this entity is currently enabled for use by QuickBooks. The default value is true.
                                Filterable: QBW

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition
                                Product: ALL
                                Description: Primary phone number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrimaryPhone
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $PrimaryPhone;
    /**
     * @Definition
                                Product: ALL
                                Description: Alternate phone number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName AlternatePhone
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $AlternatePhone;
    /**
     * @Definition
                                Product: ALL
                                Description: Mobile phone number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Mobile
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $Mobile;
    /**
     * @Definition
                                Product: ALL
                                Description: Fax number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName Fax
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $Fax;
    /**
     * @Definition
                                Product: ALL
                                Description: Primary email address.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrimaryEmailAddr
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $PrimaryEmailAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: Website address (URI).

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName WebAddr
     * @var com\intuit\schema\finance\v3\IPPWebSiteAddress
     */
    public $WebAddr;
    /**
     * @Definition
                                Product: QBW
                                Description: List of ContactInfo entities of any contact info type. The ContactInfo Type values are defined in the ContactTypeEnum.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OtherContactInfo
     * @var com\intuit\schema\finance\v3\IPPContactInfo
     */
    public $OtherContactInfo;
    /**
     * @Definition
                                Product: ALL
                                Description: Reference to the tax code associated with the Customer or Vendor by default for sales or purchase taxes.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultTaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DefaultTaxCodeRef;
} // end class IPPNameBase
