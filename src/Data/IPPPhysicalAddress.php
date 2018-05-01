<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPPhysicalAddress
 * @var IPPPhysicalAddress
 * @xmlDefinition
                Product: ALL
                Description: Physical (or postal) address type, this entity is always manipulated in context of another parent entity like Person, Organization etc.

 */
class IPPPhysicalAddress
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
            if (property_exists('IPPPhysicalAddress', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPPhysicalAddress', $initPropName)) {
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
                        Description: Unique identifier of the Intuit entity for the address, mainly used for modifying the address.[br /]Note: There is no SyncToken for this entity because it is always associated with the IntuitEntity type that is the top level or parent entity.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Id
     * @var com\intuit\schema\finance\v3\IPPid
     */
    public $Id;
    /**
     * @Definition
                        Product: QBW
                        Description: First line of the address.[br /]Max. length: 41 characters.
                        Product: QBO
                        Description: First line of the address.[br /]Max. length: 500 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Line1
     * @var string
     */
    public $Line1;
    /**
     * @Definition
                        Product: QBW
                        Description: Second line of the address.[br /]Max. length: 41 characters.
                        Product: QBO
                        Description: Second line of the address.[br /]Max. length: 500 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Line2
     * @var string
     */
    public $Line2;
    /**
     * @Definition
                        Product: QBW
                        Description: Third line of the address.[br /]Max. length: 41 characters.
                        Product: QBO
                        Description: Third line of the address.[br /]Max. length: 500 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Line3
     * @var string
     */
    public $Line3;
    /**
     * @Definition
                        Product: QBW
                        Description: Fourth line of the address.[br /]Max. length: 41 characters.
                        Product: QBO
                        Description: Fourth line of the address.[br /]Max. length: 500 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Line4
     * @var string
     */
    public $Line4;
    /**
     * @Definition
                        Product: QBW
                        Description: Fifth line of the address.[br /]Max. length: 41 characters.
                        Product: QBO
                        Description: Fifth line of the address.[br /]Max. length: 500 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Line5
     * @var string
     */
    public $Line5;
    /**
     * @Definition
                        Product: QBW
                        Description: City name.[br /]Max. length: 31 characters.
                        Product: QBO
                        Description: City name.[br /]Max. length: 255 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName City
     * @var string
     */
    public $City;
    /**
     * @Definition
                        Product: QBW
                        Description: Country name.[br /]Max. length: 31 characters.
                        Product: QBO
                        Description: Country name.[br /]Max. length: 255 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Country
     * @var string
     */
    public $Country;
    /**
     * @Definition
                        Product: ALL
                        Description: Country code per ISO 3166.[br /]Unsupported field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CountryCode
     * @var string
     */
    public $CountryCode;
    /**
     * @Definition
                        Product: QBW
                        Description: Region within a country.  For example, state name for USA, province name for Canada.[br /]Max. length: 21 characters.
                        Product: QBO
                        Description: Globalized representation of a region. For example, state name for USA, province name for Canada.[br /]Max. length: 255 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CountrySubDivisionCode
     * @var string
     */
    public $CountrySubDivisionCode;
    /**
     * @Definition
                        Product: QBW
                        Description: Postal code. For example, zip code for USA and Canada.[br /]Max. length: 13 characters.
                        Product: QBO
                        Description: Postal code. For example, zip code for USA and Canada.[br /]Max. length: 30 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PostalCode
     * @var string
     */
    public $PostalCode;
    /**
     * @Definition
                        Product: ALL
                        Description: Postal Code extension. For example, in the USA this is a 4 digit extension of the zip code.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PostalCodeSuffix
     * @var string
     */
    public $PostalCodeSuffix;
    /**
     * @Definition
                        Product: ALL
                        Description: Latitude coordinate of Geocode (Geospatial Entity Object Code).[br /]Unsupported field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Lat
     * @var string
     */
    public $Lat;
    /**
     * @Definition
                        Product: ALL
                        Description: Longitude coordinate of Geocode (Geospatial Entity Object Code).[br /]Unsupported field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Long
     * @var string
     */
    public $Long;
    /**
     * @Definition
                        Product: ALL
                        Description: Descriptive tag (or label) associated with the physical address. Valid values are Shipping and Billing, as defined in the PhysicalAddressLabelType.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Tag
     * @var string
     */
    public $Tag;
    /**
     * @Definition
                        Product: ALL
                        Description: Note for .

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Note
     * @var string
     */
    public $Note;
} // end class IPPPhysicalAddress
