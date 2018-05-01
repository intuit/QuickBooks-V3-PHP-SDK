<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType NameBase
 * @xmlName IPPEmployee
 * @var IPPEmployee
 * @xmlDefinition  Describes the Party as a Employee Role view
 */
class IPPEmployee extends IPPNameBase
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
            if (property_exists('IPPEmployee', $initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEmployee', $initPropName)) {
                $this->{$initPropName} = $initPropVal;
            } else {
                if ($verbose) {
                    echo "Property does not exist ($initPropName) in class (".get_class($this).")";
                }
            }
        }
    }

    
    /**
     * @Definition Specifies the Employee type. For QuickBooks Desktop the valid values are defined in the EmployeeTypeEnum.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmployeeType
     * @var string
     */
    public $EmployeeType;
    /**
     * @Definition Specifies the number of the employee (or account) in the employer's directory.
                                Length Restriction:
                                QBO: 15
                                QBD: 99

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmployeeNumber
     * @var string
     */
    public $EmployeeNumber;
    /**
     * @Definition Specifies the SSN of the employee.
                                Length Restriction:
                                QBO: 15
                                QBD: 1024

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName SSN
     * @var string
     */
    public $SSN;
    /**
     * @Definition  Represents primary PhysicalAddress list

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs 1
     * @xmlName PrimaryAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $PrimaryAddr;
    /**
     * @Definition  Represents other PhysicalAddress list

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlMaxOccurs unbounded
     * @xmlName OtherAddr
     * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
     */
    public $OtherAddr;
    /**
     * @Definition BillableTime should be true if this employee’s hours are typically billed to customers. QBO only.
                                    QBD Unsupported field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillableTime
     * @var boolean
     */
    public $BillableTime;
    /**
     * @Definition If BillableTime is true, BillRate can be set to specify this employee’s hourly billing rate. QBO only.
                                QBD Unsupported field.

     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BillRate
     * @var float
     */
    public $BillRate;
    /**
     * @Definition Employee birth date
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName BirthDate
     * @var string
     */
    public $BirthDate;
    /**
     * @Definition Gender details
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName Gender
     * @var com\intuit\schema\finance\v3\IPPgender
     */
    public $Gender;
    /**
     * @Definition Employee hired date
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName HiredDate
     * @var string
     */
    public $HiredDate;
    /**
     * @Definition Date at which employee was releaved from the company
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName ReleasedDate
     * @var string
     */
    public $ReleasedDate;
    /**
     * @Definition Specifies whether the Time Entry (time sheets) should be used to create paychecks for the employee.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName UseTimeEntry
     * @var com\intuit\schema\finance\v3\IPPTimeEntryUsedForPaychecksEnum
     */
    public $UseTimeEntry;
    /**
     * @Definition Internal use only: extension place holder for Employee.
     * @xmlType element
     * @xmlNamespace http://schema.intuit.com/finance/v3
     * @xmlMinOccurs 0
     * @xmlName EmployeeEx
     * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
     */
    public $EmployeeEx;
} // end class IPPEmployee
