<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPRecurringScheduleInfo
 * @var IPPRecurringScheduleInfo
 * @xmlDefinition 
				Scheduling Information for the Transaction
			
 */
class IPPRecurringScheduleInfo
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
		public function __construct($keyValInitializers=array(), $verbose=FALSE)
		{
			foreach($keyValInitializers as $initPropName => $initPropVal)
			{
				if (property_exists('IPPRecurringScheduleInfo',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPRecurringScheduleInfo',$initPropName))
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
	 * @Definition 
						Product: QBO
						Description: The Interval Type which can be Yearly, Monthly, Daily or Weekly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName IntervalType
	 * @var string
	 */
	public $IntervalType;
	/**
	 * @Definition 
						Product: QBO
						Description: The Interval based on the Interval Type
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NumInterval
	 * @var integer
	 */
	public $NumInterval;
	/**
	 * @Definition 
						Product: QBO
						Description: The Day of the Month
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DayOfMonth
	 * @var integer
	 */
	public $DayOfMonth;
	/**
	 * @Definition 
						Product: QBO
						Description: The Day of the Week
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DayOfWeek
	 * @var com\intuit\schema\finance\v3\IPPWeekEnum
	 */
	public $DayOfWeek;
	/**
	 * @Definition 
 						Product: QBO
						Description: The Week of the Month
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName WeekOfMonth
	 * @var integer
	 */
	public $WeekOfMonth;
	/**
	 * @Definition 
						Product: QBO
						Description: The Month of the Year
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MonthOfYear
	 * @var com\intuit\schema\finance\v3\IPPMonthEnum
	 */
	public $MonthOfYear;
	/**
	 * @Definition 
						Product: QBO
						Description: The days before StartDate for a Reminded RecurType
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RemindDays
	 * @var integer
	 */
	public $RemindDays;
	/**
	 * @Definition 
						Product: QBO
						Description: The Days before the Scheduled Date
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DaysBefore
	 * @var integer
	 */
	public $DaysBefore;
	/**
	 * @Definition 
						Product: QBO
						Description: The Max number of Recurring Occurrences
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MaxOccurrences
	 * @var integer
	 */
	public $MaxOccurrences;
	/**
	 * @Definition 
						Product: QBO
						Description: The Start Date for the Recurring Schedule
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StartDate
	 * @var string
	 */
	public $StartDate;
	/**
	 * @Definition 
						Product: QBO
						Description: The End Date for the Recurring Schedule
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndDate
	 * @var string
	 */
	public $EndDate;
	/**
	 * @Definition 
						Product: QBO
						Description: The Date when the next Transaction will created. (Read Only)
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NextDate
	 * @var string
	 */
	public $NextDate;
	/**
	 * @Definition 
						Product: QBO
						Description: The Date when the last Transaction was created.(Read Only)
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PreviousDate
	 * @var string
	 */
	public $PreviousDate;


} // end class IPPRecurringScheduleInfo
