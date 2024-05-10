<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPColumn
 * @var IPPColumn
 * @xmlDefinition Describes a column
 */
class IPPColumn
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
				if (property_exists('IPPColumn',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPColumn',$initPropName))
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
	 * @Definition Describes the column title name
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ColTitle
	 * @var string
	 */
	public $ColTitle;
	/**
	 * @Definition Describes the column type enumeration
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ColType
	 * @var string
	 */
	public $ColType;
	/**
	 * @Definition Column Metadata
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName MetaData
	 * @var com\intuit\schema\finance\v3\IPPNameValue
	 */
	public $MetaData;
	/**
	 * @Definition Subcolumns of the column
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Columns
	 * @var com\intuit\schema\finance\v3\IPPColumns
	 */
	public $Columns;


} // end class IPPColumn
