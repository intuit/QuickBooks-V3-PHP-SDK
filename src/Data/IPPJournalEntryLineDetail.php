<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType
 * @xmlName IPPJournalEntryLineDetail
 * @var IPPJournalEntryLineDetail
 * @xmlDefinition
                Product: ALL
                Description: JournalEntry detail for a
                transaction line.

 */
class IPPJournalEntryLineDetail
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
            if (property_exists('IPPJournalEntryLineDetail', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPJournalEntryLineDetail', $initPropName)) {
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
                        Description: Indicates whether the
                        JournalEntry line is a Debit or Credit.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName PostingType
     * @var com\intuit\schema\finance\v3\IPPPostingTypeEnum
     */
    public $PostingType;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference information
                        for the Entity (Customer/Vendor/Employee) associated with the
                        JournalEntry line.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Entity
     * @var com\intuit\schema\finance\v3\IPPEntityTypeRef
     */
    public $Entity;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to the Account
                        associated with the JournalEntry line.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName AccountRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $AccountRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Reference to the Class
                        associated with the JournalEntry line.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ClassRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $ClassRef;
    /**
     * @Definition
                        Product: QBO
                        Description: Represents Department
                        Reference associated with the JournalEntry line.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DepartmentRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $DepartmentRef;
    /**
     * @Definition
                        Product: QBO
                        Description: Sales/Purchase tax code
                        associated with the JournalEntry Line. For Non US/CA Companies

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $TaxCodeRef;
    /**
     * @Definition
                        Product: QBO
                        Description: Indicates whether the
                        tax applicable on the line is sales or purchase

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxApplicableOn
     * @var com\intuit\schema\finance\v3\IPPTaxApplicableOnEnum
     */
    public $TaxApplicableOn;
    /**
     * @Definition
                        Product: QBO
                        Description: Tax applicable for this
                        line transaction line

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName TaxAmount
     * @var float
     */
    public $TaxAmount;
    /**
     * @Definition
                        Product: ALL
                        Description: The billable status of
                        the journal entry line. The line is to be billed to a customer if
                        the account is an expense account and the Entity Reference
                        specifies a Customer or a Job.[br /]

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillableStatus
     * @var com\intuit\schema\finance\v3\IPPBillableStatusEnum
     */
    public $BillableStatus;
    /**
     * @Definition
                        Product: QBO
                        Description: The Journal Code that should be associated for every journal
                        entry line. This is applicable only for FR.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName JournalCodeRef
     * @var com\intuit\schema\finance\v3\IPPReferenceType
     */
    public $JournalCodeRef;
    /**
     * @Definition
                        Product: ALL
                        Description: Internal use only:
                        extension place holder for JournalEntryDetail

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName JournalEntryLineDetailEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $JournalEntryLineDetailEx;
} // end class IPPJournalEntryLineDetail
