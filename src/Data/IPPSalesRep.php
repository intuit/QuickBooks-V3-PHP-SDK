<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPSalesRep
 * @var IPPSalesRep
 * @xmlDefinition 
								Product: QBW
								Description: [br/] One of the 3
								references is Required for the create operation.
							
 */
class IPPSalesRep
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
				if (property_exists('IPPSalesRep',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSalesRep',$initPropName))
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
								Product: QBW
								Description: The SalesRep type.
								Also, one of the three entity references (either the Name or the
								ID of the Employee, OtherName, or Vendor) is required for the
								Create request.[br /]
								Required: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NameOf
	 * @var com\intuit\schema\finance\v3\IPPSalesRepTypeEnum
	 */
	public $NameOf;
	/**
	 * @Definition 
								Product: QBW
								Description: True if active.
								Inactive sales reps may be hidden from display and may not be
								used on financial transactions.
								Filterable: QBW
							
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
									Description: Reference to the
									Employee, if that is the SalesRep type. One of the three entity
									references (either the Name or the ID of the Employee,
									OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EmployeeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $EmployeeRef;
	/**
	 * @Definition 
									Product: QBW
									Description: Reference to the
									Vendor, if that is the SalesRep type. One of the three entity
									references (either the Name or the ID of the Employee,
									OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorRef;
	/**
	 * @Definition 
									Product: QBW
									Description: Reference to the
									OtherName, if that is the SalesRep type. One of the three
									entity references (either the Name or the ID of the Employee,
									OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OtherNameRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $OtherNameRef;
	/**
	 * @Definition 
								Product: QBW
								Description: User recognizable
								initials of the Sales Rep.[br/]Required for the Create
								request.[br/] Max Length: 5 characters.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Initials
	 * @var string
	 */
	public $Initials;
	/**
	 * @Definition 
								Product: QBW
								Description: Internal use only:
								extension place holder for SalesRep
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesRepEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $SalesRepEx;


} // end class IPPSalesRep
