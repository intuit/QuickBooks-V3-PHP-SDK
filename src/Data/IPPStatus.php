<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPStatus
 * @var IPPStatus
 * @xmlDefinition 
		        Product: QBW
		        Description: generic meta data response for any add mod
		      
 */
class IPPStatus
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
				if (property_exists('IPPStatus',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPStatus',$initPropName))
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
            				Description: Request Id to create/update object
            				Filterable: QBW
         				 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RequestId
	 * @var string
	 */
	public $RequestId;
	/**
	 * @Definition 
            				Product: QBW
            				Description: Batch Id to create/update object
            				Filterable: QBW
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BatchId
	 * @var string
	 */
	public $BatchId;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ObjectType
	 * @var string
	 */
	public $ObjectType;
	/**
	 * @Definition 
            				Product: QBW
            				Description: Code for Current State of object
            				Filterable: QBW
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StateCode
	 * @var string
	 */
	public $StateCode;
	/**
	 * @Definition 
	            			Product: QBW
	            				Description: Description for Current State of object
	          			
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StateDesc
	 * @var string
	 */
	public $StateDesc;
	/**
	 * @Definition 
            				Product: QBW
            				Description: Status Message Code 
          				
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MessageCode
	 * @var string
	 */
	public $MessageCode;
	/**
	 * @Definition 
            			Product: QBW
            			Description: Status Message if error occurred else null
          			
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MessageDesc
	 * @var string
	 */
	public $MessageDesc;


} // end class IPPStatus
