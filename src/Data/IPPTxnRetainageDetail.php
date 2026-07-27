<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTxnRetainageDetail
 * @var IPPTxnRetainageDetail
 * @xmlDefinition 
				Product: QBO
				Description: Details of retainage on the
				transaction as a whole.
			
 */
class IPPTxnRetainageDetail
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
				if (property_exists('IPPTxnRetainageDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTxnRetainageDetail',$initPropName))
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
						Product: QBO
						Description: Total retainage amount
						on the transaction.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RetainageAmount
	 * @var float
	 */
	public $RetainageAmount;
	/**
	 * @Definition 
						Product: QBO
						Description: Outstanding retainage
						balance on the transaction.
						Decreases as retainage is released.
						InputType: ReadOnly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RetainageOpenBalance
	 * @var float
	 */
	public $RetainageOpenBalance;


} // end class IPPTxnRetainageDetail
