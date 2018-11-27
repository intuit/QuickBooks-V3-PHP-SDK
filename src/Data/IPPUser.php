<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPUser
 * @var IPPUser
 * @xmlDefinition
                Represents a User with an Intuit account.  Note that based on privacy restrictions, information returned may be
                limited depending on calling origin and/or calling user permissions (ex: a user may be able to look up all of
                their information, but not the information regarding other users).
 */
class IPPUser extends IPPIntuitEntity
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
            if (property_exists('IPPUser', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPUser', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DisplayName
     * @var string
     */
    public $DisplayName;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Title
     * @var string
     */
    public $Title;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName GivenName
     * @var string
     */
    public $GivenName;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MiddleName
     * @var string
     */
    public $MiddleName;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FamilyName
     * @var string
     */
    public $FamilyName;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Suffix
     * @var string
     */
    public $Suffix;
    /**
     * @Definition Returned only if caller passes necessary security checks to prevent e-mail address harvesting
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName EmailAddr
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $EmailAddr;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName Addr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $Addr;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMaxOccurs unbounded
     * @xmlName PhoneNumber
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $PhoneNumber;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LocaleCountry
     * @var string
     */
    public $LocaleCountry;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LocaleLanguage
     * @var string
     */
    public $LocaleLanguage;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LocalePostalCode
     * @var string
     */
    public $LocalePostalCode;
    /**
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LocaleTimeZone
     * @var string
     */
    public $LocaleTimeZone;
    /**
     * @Definition Represents a list of UserAttribute name/value pairs if the user query provided names of extended attributes to include
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName NameValueAttr
     * @var com\intuit\schema\finance\v3\IPPNameValue
     */
    public $NameValueAttr;
} // end class IPPUser
