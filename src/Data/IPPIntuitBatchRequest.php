<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPIntuitBatchRequest
 * @var IPPIntuitBatchRequest
 * @xmlDefinition QueryResponse entity describing the response of query
 */
class IPPIntuitBatchRequest
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
				if (property_exists('IPPIntuitBatchRequest',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPIntuitBatchRequest',$initPropName))
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
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 1
	 * @xmlMaxOccurs unbounded
	 * @xmlName BatchItemRequest
	 * @var com\intuit\schema\finance\v3\IPPBatchItemRequest
	 */
	public $BatchItemRequest;


} // end class IPPIntuitBatchRequest
