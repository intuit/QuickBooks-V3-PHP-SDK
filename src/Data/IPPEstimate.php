<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType SalesTransaction
 * @xmlName IPPEstimate
 * @var IPPEstimate
 * @xmlDefinition Transaction entity is the base class of all
				transactions
 */
class IPPEstimate
	extends IPPSalesTransaction	{

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
				if (property_exists('IPPEstimate',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPEstimate',$initPropName))
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
	 * @Definition Date by which estimate must be accepted before
								invalidation.
								QBO only field.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ExpirationDate
	 * @var string
	 */
	public $ExpirationDate;
	/**
	 * @Definition Name of customer who accepted the estimate.
								QBO
								only field.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcceptedBy
	 * @var string
	 */
	public $AcceptedBy;
	/**
	 * @Definition Date estimate was accepted.
								QBO only field.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcceptedDate
	 * @var string
	 */
	public $AcceptedDate;
	/**
	 * @Definition Extension entity for Estimate
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName EstimateEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $EstimateEx;


} // end class IPPEstimate
