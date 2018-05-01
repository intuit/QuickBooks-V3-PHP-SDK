<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCompanyInfo
 * @var IPPCompanyInfo
 * @xmlDefinition Describes Company information
 */
class IPPCompanyInfo extends IPPIntuitEntity
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
            if (property_exists('IPPCompanyInfo', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPCompanyInfo', $initPropName)) {
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
                                Description: Name of the company.[br /]Max. length: 1024 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyName
     * @var string
     */
    public $CompanyName;
    /**
     * @Definition LegalName if different from the CompanyName

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LegalName
     * @var string
     */
    public $LegalName;
    /**
     * @Definition Company Address as described in preference

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $CompanyAddr;
    /**
     * @Definition Address of the company as given to th customer,
                                sometimes the address given to the customer mail address is
                                different from Company address
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomerCommunicationAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $CustomerCommunicationAddr;
    /**
     * @Definition Legal Address given to the government for any
                                government communication
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName LegalAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $LegalAddr;
    /**
     * @Definition CompanyEmail Address
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyEmailAddr
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $CompanyEmailAddr;
    /**
     * @Definition Email Address published to customer for
                                communication if different from CompanyEmailAddress

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CustomerCommunicationEmailAddr
     * @var com\intuit\schema\finance\v3\IPPEmailAddress
     */
    public $CustomerCommunicationEmailAddr;
    /**
     * @Definition Company URL
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyURL
     * @var com\intuit\schema\finance\v3\IPPWebSiteAddress
     */
    public $CompanyURL;
    /**
     * @Definition Primary Phone number
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PrimaryPhone
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $PrimaryPhone;
    /**
     * @Definition
                                Product: QBW
                                Description: List of ContactInfo
                                entities of any contact info type. The ContactInfo Type values
                                are defined in the ContactTypeEnum.

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
                                Product: QBW
                                Description: QuickBooks company
                                file name.[br /]Data Services max. length: 512 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyFileName
     * @var string
     */
    public $CompanyFileName;
    /**
     * @Definition
                                Product: QBW
                                Description: QB software flavor
                                being used on the file on the PC.[br /]Data Services max.
                                length: 512 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FlavorStratum
     * @var string
     */
    public $FlavorStratum;
    /**
     * @Definition
                                Product: QBW
                                Description: if the QB desktop file is a sample file.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SampleFile
     * @var boolean
     */
    public $SampleFile;
    /**
     * @Definition
                                Product: QBW
                                Description: IAM or QBN admin users
                                id sequence number to group many external realms for this user
                                under his id number.[br /]Data Services max. length: 512
                                characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyUserId
     * @var string
     */
    public $CompanyUserId;
    /**
     * @Definition
                                Product: QBW
                                Description: IAM or QBN admin users
                                email.[br /]Data Services max. length: 100 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyUserAdminEmail
     * @var string
     */
    public $CompanyUserAdminEmail;
    /**
     * @Definition
                                Product: ALL
                                Description: DateTime when the company file was created.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName CompanyStartDate
     * @var string
     */
    public $CompanyStartDate;
    /**
     * @Definition
                                Product: ALL
                                Description: Employer identifier (EID).

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmployerId
     * @var string
     */
    public $EmployerId;
    /**
     * @Definition
                                Product: ALL
                                Description: Starting month of the company's fiscal year.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName FiscalYearStartMonth
     * @var com\intuit\schema\finance\v3\IPPMonthEnum
     */
    public $FiscalYearStartMonth;
    /**
     * @Definition
                                Product: ALL
                                Description: Starting month of the company's fiscal year.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxYearStartMonth
     * @var com\intuit\schema\finance\v3\IPPMonthEnum
     */
    public $TaxYearStartMonth;
    /**
     * @Definition
                                Product: ALL
                                Description: QuickBooks company file latest version. The format reports the
                                major release in the first number, the minor release in the
                                second number (always a zero), the release update (slipstream or
                                "R") in the third number, and the build number in the final
                                number.[br /]Max. length: 512 characters.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName QBVersion
     * @var string
     */
    public $QBVersion;
    /**
     * @Definition
                                Product: ALL
                                Description: Country name to which the company belongs for fiancial
                                calculations.

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
                                Description: Default shipping address.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ShipAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $ShipAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: Other company addresses.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OtherAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $OtherAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: Default mobile phone number of the company.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Mobile
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $Mobile;
    /**
     * @Definition
                                Product: ALL
                                Description: Default fax number.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Fax
     * @var com\intuit\schema\finance\v3\IPPTelephoneNumber
     */
    public $Fax;
    /**
     * @Definition
                                Product: ALL
                                Description: Default email address.

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
                                Description: Default company web site address.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName WebAddr
     * @var com\intuit\schema\finance\v3\IPPWebSiteAddress
     */
    public $WebAddr;
    /**
     * @Definition
                                Product: ALL
                                Description: Specifies last imported time.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LastImportedTime
     * @var string
     */
    public $LastImportedTime;
    /**
     * @Definition
                                Product: QBW
                                Description: Specifies last sync time.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName LastSyncTime
     * @var string
     */
    public $LastSyncTime;
    /**
     * @Definition Comma separated list of languages

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SupportedLanguages
     * @var string
     */
    public $SupportedLanguages;
    /**
     * @Definition Default time zone for the company

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DefaultTimeZone
     * @var string
     */
    public $DefaultTimeZone;
    /**
     * @Definition Specifies if the company support multibyte or
                                not
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName MultiByteCharsSupported
     * @var boolean
     */
    public $MultiByteCharsSupported;
    /**
     * @Definition Any other preference not covered in base is
                                covered as name value pair, for detailed explanation look at the
                                document
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName NameValue
     * @var com\intuit\schema\finance\v3\IPPNameValue
     */
    public $NameValue;
    /**
     * @Definition
                                Product: ALL
                                Description: Internal use only: extension place holder for Company.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName CompanyInfoEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $CompanyInfoEx;
} // end class IPPCompanyInfo
