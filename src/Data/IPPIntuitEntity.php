<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPIntuitEntity
 * @var IPPIntuitEntity
 * @xmlDefinition 
				Product: ALL
				Description: Base type of any top level Intuit Entity of small business type.
			
 */
class IPPIntuitEntity
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
				if (property_exists('IPPIntuitEntity',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPIntuitEntity',$initPropName))
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
						Product: ALL
						Description: Unique Identifier for an Intuit entity (object). [br /]Required for the update operation.
						Required: ALL
						Filterable: ALL
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Id
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $Id;
	/**
	 * @Definition 
						Product: ALL
						Description: Version number of the entity.  The SyncToken is used to lock the entity for use by one application at a time. As soon as an application modifies an entity, its SyncToken is incremented; another application's request to modify the entity with the same SyncToken will fail. Only the latest version of the entity is maintained by Data Services.  An attempt to modify an entity specifying an older SyncToken will fail. [br /]Required for the update operation.
						Required: ALL
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SyncToken
	 * @var string
	 */
	public $SyncToken;
	/**
	 * @Definition 
						Product: ALL
						Description: Descriptive information about the entity.  The MetaData values are set by Data Services and are read only for all applications.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MetaData
	 * @var com\intuit\schema\finance\v3\IPPModificationMetaData
	 */
	public $MetaData;
	/**
	 * @Definition 
						Product: QBW
						Description: Custom field (or data extension).
						Filterable: QBW
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName CustomField
	 * @var com\intuit\schema\finance\v3\IPPCustomField
	 */
	public $CustomField;
	/**
	 * @Definition  Specifies entity name of the attachment from where the attachment was requested
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName AttachableRef
	 * @var com\intuit\schema\finance\v3\IPPAttachableRef
	 */
	public $AttachableRef;
	/**
	 * @Definition 
					Product: ALL
					Description: Domain in which the entity belongs.
				
	 * @xmlType attribute
	 * @xmlName domain
	 * @var string
	 */
	public $domain;
	/**
	 * @Definition 
					Product: ALL
					Description: System status of the entity. Output only field.[br /]
					Filterable: ALL
				
	 * @xmlType attribute
	 * @xmlName status
	 * @var EntityStatusEnum[]
	 */
	public $status;
	/**
	 * @Definition 
					Product: ALL
					Description: True if the entity representation has a partial set of elements. Output only field.
				
	 * @xmlType attribute
	 * @xmlName sparse
	 * @var boolean
	 */
	public $sparse;


} // end class IPPIntuitEntity
