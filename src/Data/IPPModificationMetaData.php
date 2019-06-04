<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPModificationMetaData
 * @var IPPModificationMetaData
 * @xmlDefinition 
				Product: ALL
				Description: Metadata for the instance of the entity. All properties are read only.
			
 */
class IPPModificationMetaData
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
				if (property_exists('IPPModificationMetaData',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPModificationMetaData',$initPropName))
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
						Description: Reference to the user who created the data. Read only property.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName CreatedByRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CreatedByRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Time the entity was created in the source domain (QBD or QBO). Read only property.
						Filterable: ALL
						Sortable: ALL
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CreateTime
	 * @var string
	 */
	public $CreateTime;
	/**
	 * @Definition 
						Product: QBW
						Description: Reference to the user who last modified the entity. Read only property.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName LastModifiedByRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $LastModifiedByRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Time the entity was last updated in the source domain (QBD or QBO). Read only property.
						Filterable: ALL
						Sortable: ALL
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LastUpdatedTime
	 * @var string
	 */
	public $LastUpdatedTime;
	/**
	 * @Definition 
						Product: QBW
						Description: Time the entity was last updated in QB. Read only property.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LastChangedInQB
	 * @var string
	 */
	public $LastChangedInQB;
	/**
	 * @Definition 
						Product: QBW
						Description: If true, the data on the cloud has been synchronized with QuickBooks for Windows. If false, the data has been created or updated on the cloud but has not been synchronized with QuickBooks for Windows. Read-only field.
						Filterable: QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Synchronized
	 * @var boolean
	 */
	public $Synchronized;


} // end class IPPModificationMetaData
