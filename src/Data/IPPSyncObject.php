<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPSyncObject
 * @var IPPSyncObject
 * @xmlDefinition 
            	Product: QBW
            	Description: SyncObject that has an error
            
 */
class IPPSyncObject
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
				if (property_exists('IPPSyncObject',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPSyncObject',$initPropName))
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
	 * @Definition Any IntuitEntity derived object like Customer, Invoice can be part of response
	 * @xmlType element
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName IntuitObject
	 * @var IntuitObject
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


} // end class IPPSyncObject
