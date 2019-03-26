<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPTerm
 * @var IPPTerm
 * @xmlDefinition 
				Product: ALL
				Description: The Term entity represents
				the terms under which a sale is made, typically expressed in the
				form of days due after the goods are received. Optionally, a
				discount of the total amount may be applied if payment is made
				within a stipulated time. For example, net 30 indicates that payment
				is due within 30 days. A term of 2%/15 net 60 indicates that payment
				is due within 60 days, with a discount of 2% if payment is made
				within 15 days. Term also supports: an absolute due date, a number
				of days from a start date, a percent discount, or an absolute
				discount.
			
 */
class IPPTerm
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
				if (property_exists('IPPTerm',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTerm',$initPropName))
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
								Product: ALL
								Description: User recognizable name
								for the term, for example, "Net 30".
								ValidRange: QBW: max=31
								ValidRange: QBO: Max=31
								Required: ALL
								Filterable: QBO
								Sortable: ALL
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: ALL
								Description: If true, this entity
								is currently enabled for use by QuickBooks.
								Filterable: ALL
								Default Value: true
							
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
								Description: Type of the Sales
								Term. Valid values: Standard or DateDriven, as defined by
								SalesTermTypeEnum. [br /] If dueDays is not null, the Type is
								Standard else DateDriven.
								InputType: ALL: ReadOnly
							
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
								Description: Discount percentage
								available against an amount if paid within the days specified by
								DiscountDays.
								ValidRange: ALL: Min=0, Max=100
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountPercent
	 * @var float
	 */
	public $DiscountPercent;
	/**
	 * @Definition 
										Product: ALL
										Description: Number of days from
										delivery of goods or services until the payment is due.
										Business Rules: QBO: [li] This value is required if
										DayOfMonthDue is not specified. [/li] [li] If DueDays is
										specified, only DiscountDays and DiscountPercent can be
										additionally specified.[/li]
										Required: QBO
										ValidRange: QBO:
										Min=0 Max=999
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DueDays
	 * @var integer
	 */
	public $DueDays;
	/**
	 * @Definition 
										Product: ALL
										Description: Discount applies if
										paid within this number of days.
										Business Rules: [li] This
										value is used only when DueDays is specified. [/li]
										ValidRange: QBO: Min=0 Max=999
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountDays
	 * @var integer
	 */
	public $DiscountDays;
	/**
	 * @Definition 
										Product: ALL
										Description: Payment must be
										received by this day of the month.
										Business Rules: QBO: [li]
										This value is used only when DueDays is not specified.[/li]
										[li] Required for the Create request when DueDays is not
										specified.[/li]
										ValidRange: QBO: Min=1 Max=31
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DayOfMonthDue
	 * @var integer
	 */
	public $DayOfMonthDue;
	/**
	 * @Definition 
										Product: ALL
										Description: Payment due next
										month if issued that many days before the DayOfMonthDue.
										Business Rules: QBO: [li] Required for the Create request when
										DueDays is not specified.[/li]
										ValidRange: QBO: Min=1 Max=999
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DueNextMonthDays
	 * @var integer
	 */
	public $DueNextMonthDays;
	/**
	 * @Definition 
										Product: ALL
										Description: Discount applies if
										paid before this day of month.
										Business Rules: QBO: Required
										for the Create request when DueDays is not specified.
										ValidRange: QBO: Min=1 Max=31
									
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DiscountDayOfMonth
	 * @var integer
	 */
	public $DiscountDayOfMonth;
	/**
	 * @Definition 
								Product: ALL
								Description:- Internal use only:
								extension place holder for SalesTermEx
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesTermEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $SalesTermEx;


} // end class IPPTerm
