<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPWebSiteAddress
 * @var IPPWebSiteAddress
 * @xmlDefinition 
				Product: ALL
				Description: Website address type. This entity is always manipulated in context of another parent entity like Person, Organization etc.[br /]Unsupported type.
			
 */
class IPPWebSiteAddress
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
				if (property_exists('IPPWebSiteAddress',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPWebSiteAddress',$initPropName))
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
						Description: Unique identifier for an Intuit entity.
					
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
						Description: Uniform Resource Identifier for the web site.[br /]Max. length: 1000 characters.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName URI
	 * @var string
	 */
	public $URI;
	/**
	 * @Definition 
						Product: ALL
						Description: True if this is the default web site.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Default
	 * @var boolean
	 */
	public $Default;
	/**
	 * @Definition 
						Product: ALL
						Description: Descriptive tag associated with the web site.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Tag
	 * @var string
	 */
	public $Tag;


} // end class IPPWebSiteAddress
