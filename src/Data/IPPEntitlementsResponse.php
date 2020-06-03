<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPEntitlementsResponse
 * @var IPPEntitlementsResponse
 */
class IPPEntitlementsResponse
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
				if (property_exists('IPPEntitlementsResponse',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEntitlementsResponse',$initPropName))
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
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlName QboCompany
	 * @var boolean
	 */
	public $QboCompany;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName PlanName
	 * @var string
	 */
	public $PlanName;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName MaxUsers
	 * @var integer
	 */
	public $MaxUsers;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CurrentUsers
	 * @var integer
	 */
	public $CurrentUsers;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName DaysRemainingTrial
	 * @var integer
	 */
	public $DaysRemainingTrial;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Entitlement
	 */
	public $Entitlement;
	/**
	 * @xmlType element
	 * @xmlNamespace 
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Thresholds
	 */
	public $Thresholds;


} // end class IPPEntitlementsResponse
