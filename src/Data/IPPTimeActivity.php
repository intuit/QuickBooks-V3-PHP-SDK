<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTimeActivity
 * @var IPPTimeActivity
 * @xmlDefinition The name of the person who performed the work.
								[b]QuickBooks Notes[/b][br /]
								Valid Vendor or Employee Name or Id
								is required for the create operation.[br /]
								Required for the
								create operation.
							
 */
class IPPTimeActivity
	extends IPPIntuitEntity	{

		/**                                                                       
		* Initializes this object, optionally with pre-defined property values    
		*                                                                         
		* Initializes this object and it's property members, using the dictionary
		* of key/value pairs passed as an optional argument.                      
		*                                                                         
		* @param dictionary $keyValInitializers key/value pairs to be populated into object's properties 
		* @param boolean $verbose specifies whether object should echo warnings   
		*/                                                                        
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPTimeActivity',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTimeActivity',$initPropName))
				{
					$this->{$initPropName} = $initPropVal;
				}
				else
				{
					if ($verbose)
						echo "Property does not exist ($initPropName) in class (".get_class($this).")";
				}
			}
		}

	
	/**
	 * @Definition The timezone from where the time activity is
								entered, unused in QBO and QBW
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TimeZone
	 * @var string
	 */
	public $TimeZone;
	/**
	 * @Definition The date of the time activity.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnDate
	 * @var string
	 */
	public $TxnDate;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NameOf
	 * @var com\intuit\schema\finance\v3\IPPTimeActivityTypeEnum
	 */
	public $NameOf;
	/**
	 * @Definition Specifies the employee whose time is being
									recorded.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EmployeeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $EmployeeRef;
	/**
	 * @Definition Specifies the vendor whose time is being
									recorded.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorRef;
	/**
	 * @Definition Specifies the Payee whose time is being
									recorded.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OtherNameRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $OtherNameRef;
	/**
	 * @Definition Represents Customer (or Job)Reference
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;
	/**
	 * @Definition  Represents Department Reference.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepartmentRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DepartmentRef;
	/**
	 * @Definition 
								[br /]
								Required for the create operation.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ItemRef;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition The payroll item determines how much the
								employee should be paid for doing the work specified by the Item
								Service Id.
								In order for the Time Activity data to be transferred
								to the employee payroll data, the Employee must have the
								property UseTimeEntry set.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PayrollItemRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $PayrollItemRef;
	/**
	 * @Definition Billable status of the time recorded
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillableStatus
	 * @var com\intuit\schema\finance\v3\IPPBillableStatusEnum
	 */
	public $BillableStatus;
	/**
	 * @Definition True if the time recorded is both billable and
								taxable.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Taxable
	 * @var boolean
	 */
	public $Taxable;
	/**
	 * @Definition Hourly bill rate of the employee or vendor for
								this time activity.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported
								field.[/i]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HourlyRate
	 * @var float
	 */
	public $HourlyRate;
	/**
	 * @Definition Hours worked.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Hours
	 * @var integer
	 */
	public $Hours;
	/**
	 * @Definition Minutes worked; valid values are 0 - 59.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Minutes
	 * @var integer
	 */
	public $Minutes;
	/**
	 * @Definition Hours of break taken between start time and end
								time.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported field.[/i]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BreakHours
	 * @var integer
	 */
	public $BreakHours;
	/**
	 * @Definition Minutes of break taken between start time and
								end time. Valid values are 0 - 59.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported field.[/i]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BreakMinutes
	 * @var integer
	 */
	public $BreakMinutes;
	/**
	 * @Definition Time work started.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported field.[/i]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StartTime
	 * @var string
	 */
	public $StartTime;
	/**
	 * @Definition Time work ended.
								[b]QuickBooks Notes[/b][br /]
								[i]Unsupported field.[/i]
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndTime
	 * @var string
	 */
	public $EndTime;
	/**
	 * @Definition Description of work completed during time
								activity.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Description
	 * @var string
	 */
	public $Description;
	/**
	 * @Definition Internal use only: extension place holder for
								TimeActivity.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TimeActivityEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $TimeActivityEx;
	/**
	 * @Definition True if the start, end hours are already with company/employee time zone offset.

							Couple of TimeActivity API integrations are already submitting start, end hours with right company/employee time zone offsets. Such integrations will pass this attribute as true to avoid company time zone offsets by TimeActivity API.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName HoursInEmployeeTimeZone
	 * @var boolean
	 */
	public $HoursInEmployeeTimeZone;


} // end class IPPTimeActivity
