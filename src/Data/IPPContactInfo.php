<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPContactInfo
 * @var IPPContactInfo
 * @xmlDefinition
                Product: ALL
                Description: Contact information identified by Type.

 */
class IPPContactInfo
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
            if (property_exists('IPPContactInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPContactInfo', $initPropName)) {
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
                        Description: The type of contact information.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Type
     * @var com\intuit\schema\finance\v3\IPPContactTypeEnum
     */
    public $Type;
    /**
     * @Definition
                            Product: ALL
                            Description: Telephone number information.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Telephone
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $Telephone;
    /**
     * @Definition
                            Product: ALL
                            Description: Email address information.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Email
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $Email;
    /**
     * @Definition
                            Product: ALL
                            Description: Website address (URI) information.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName WebSite
     * @var com\intuit\schema\finance\v3\IPPWebSiteAddress
     */
    public $WebSite;
    /**
     * @Definition
                            Product: ALL
                            Description: Generic contact information.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName OtherContact
     * @var com\intuit\schema\finance\v3\IPPGenericContactType
     */
    public $OtherContact;
} // end class IPPContactInfo
