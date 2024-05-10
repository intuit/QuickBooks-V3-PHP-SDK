<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPQueryResponse
 * @var IPPQueryResponse
 * @xmlDefinition QueryResponse entity describing the response of query
 */
class IPPQueryResponse
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
				if (property_exists('IPPQueryResponse',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPQueryResponse',$initPropName))
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
	 * @Definition Indication that a request was processed, but with possible exceptional circumstances (i.e. ignored unsupported fields) that the client may want to be aware of
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Warnings
	 * @var com\intuit\schema\finance\v3\IPPWarnings
	 */
	public $Warnings;
	/**
	 * @Definition Any IntuitEntity derived object like Customer, Invoice can be part of response
	 * @xmlType element
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName IntuitObject
	 * @var IntuitObject[]
	 */
	public $IntuitObject;
	/**
	 * @Definition  Fault or Object should be returned
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName Fault
	 * @var com\intuit\schema\finance\v3\IPPFault
	 */
	public $Fault;
	/**
	 * @Definition Specifies the starting row number in this result
	 * @xmlType attribute
	 * @xmlName startPosition
	 * @var integer
	 */
	public $startPosition;
	/**
	 * @Definition Specifies the number of records in this result 
	 * @xmlType attribute
	 * @xmlName maxResults
	 * @var integer
	 */
	public $maxResults;
	/**
	 * @Definition Specifies the total count of records that satisfy the filter condition 
	 * @xmlType attribute
	 * @xmlName totalCount
	 * @var integer
	 */
	public $totalCount;


} // end class IPPQueryResponse
