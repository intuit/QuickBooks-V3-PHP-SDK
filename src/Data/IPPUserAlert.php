<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPUserAlert
 * @var IPPUserAlert
 * @xmlDefinition
                Product: ALL
                Description: A specific user alert to
                be notified to Quickbooks user, maps to a ToDo record in QuickBooks.

 */
class IPPUserAlert extends IPPIntuitEntity
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
            if (property_exists('IPPUserAlert', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPUserAlert', $initPropName)) {
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
                                Description: The actual content of
                                the user alert

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Notes
     * @var string
     */
    public $Notes;
    /**
     * @Definition
                                Product: QBW
                                Description: In use by the business

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Active
     * @var boolean
     */
    public $Active;
    /**
     * @Definition
                                Product: QBW
                                Description: True if the user alert
                                has been completed

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Done
     * @var boolean
     */
    public $Done;
    /**
     * @Definition
                                Product: QBO
                                Description: The type of the user
                                alert

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Type
     * @var string
     */
    public $Type;
    /**
     * @Definition
                                Product: ALL
                                Description: The date to remind the
                                user of this user alert

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReminderDate
     * @var string
     */
    public $ReminderDate;
    /**
     * @Definition
                                Product: QBO
                                Description: The date the user
                                alert will expire

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ExpireDate
     * @var string
     */
    public $ExpireDate;
    /**
     * @Definition
                                Product: QBO
                                Description: The date the user
                                alert is due

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName DueDate
     * @var string
     */
    public $DueDate;
    /**
     * @Definition
                                Product: QBO
                                Description: The URL that can be
                                included in the user alert

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName URL
     * @var string
     */
    public $URL;
    /**
     * @Definition
                                Product: QBO
                                Description: The filter associated
                                with the user alert

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Filter
     * @var string
     */
    public $Filter;
    /**
     * @Definition Any other properties not covered in base is
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
     * @Definition Internal use only: extension place holder for
                                user alert
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UserAlertEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $UserAlertEx;
} // end class IPPUserAlert
