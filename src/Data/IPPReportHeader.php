<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPReportHeader
 * @var IPPReportHeader
 * @xmlDefinition Specifies the Header of a Report, Time report was generated, parameters corresponding to the request
 */
class IPPReportHeader
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
				if (property_exists('IPPReportHeader',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPReportHeader',$initPropName))
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
	 * @Definition Specifies the time at which report was generated
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Time
	 * @var string
	 */
	public $Time;
	/**
	 * @Definition Specifies the report name
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReportName
	 * @var string
	 */
	public $ReportName;
	/**
	 * @Definition Specifies the report name
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DateMacro
	 * @var string
	 */
	public $DateMacro;
	/**
	 * @Definition Specifies the report is cash basis or accrual basis
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReportBasis
	 * @var com\intuit\schema\finance\v3\IPPReportBasisEnum
	 */
	public $ReportBasis;
	/**
	 * @Definition Start Period for which the report was generated
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StartPeriod
	 * @var string
	 */
	public $StartPeriod;
	/**
	 * @Definition End Period for which the report was generated
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndPeriod
	 * @var string
	 */
	public $EndPeriod;
	/**
	 * @Definition Summarize columns by enumeration
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SummarizeColumnsBy
	 * @var string
	 */
	public $SummarizeColumnsBy;
	/**
	 * @Definition Specifies the currency code associated with the report, note that this is one place where this is just the currency code, not a reference to a currency object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Currency
	 * @var string
	 */
	public $Currency;
	/**
	 * @Definition Specifies the customer id (comma separeted) for which the report is run this is just the id, not a reference to a customer object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Customer
	 * @var string
	 */
	public $Customer;
	/**
	 * @Definition Specifies the vendor id (comma separeted) for which the report is run this is just the id, not a reference to a vendor object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Vendor
	 * @var string
	 */
	public $Vendor;
	/**
	 * @Definition Specifies the employee id (comma separeted) for which the report is run this is just the id, not a reference to a employee object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Employee
	 * @var string
	 */
	public $Employee;
	/**
	 * @Definition Specifies the product/service id (comma separeted) for which the report is run this is just the id, not a reference to a product/service object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Item
	 * @var string
	 */
	public $Item;
	/**
	 * @Definition Specifies the class id (comma separeted) for which the report is run this is just the  id, not a reference to a class object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Class
	 * @var string
	 */
	public $Class;
	/**
	 * @Definition Specifies the Department id (comma separeted) for which the report is run this is just the  id, not a reference to a Department object
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Department
	 * @var string
	 */
	public $Department;
	/**
	 * @Definition Describes the options used for the report
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Option
	 * @var com\intuit\schema\finance\v3\IPPNameValue
	 */
	public $Option;


} // end class IPPReportHeader
