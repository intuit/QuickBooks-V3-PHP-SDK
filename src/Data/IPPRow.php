<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPRow
 * @var IPPRow
 * @xmlDefinition One Row can contain any number of columns
 */
class IPPRow
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
				if (property_exists('IPPRow',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPRow',$initPropName))
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
	 * @xmlMinOccurs 0
	 * @xmlName id
	 * @var string
	 */
	public $id;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName parentId
	 * @var string
	 */
	public $parentId;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Header
	 * @var com\intuit\schema\finance\v3\IPPHeader
	 */
	public $Header;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Rows
	 * @var com\intuit\schema\finance\v3\IPPRows
	 */
	public $Rows;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Summary
	 * @var com\intuit\schema\finance\v3\IPPSummary
	 */
	public $Summary;
	/**
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMaxOccurs unbounded
	 * @xmlName ColData
	 * @var com\intuit\schema\finance\v3\IPPColData
	 */
	public $ColData;
	/**
	 * @Definition Row type section, summary, data row etc.. 
	 * @xmlType attribute
	 * @xmlName type
	 * @var RowTypeEnum[]
	 */
	public $type;
	/**
	 * @Definition Report Group Income, Expense, COGS etc..
	 * @xmlType attribute
	 * @xmlName group
	 * @var string
	 */
	public $group;


} // end class IPPRow
