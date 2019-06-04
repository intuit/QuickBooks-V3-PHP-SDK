<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPOLBTxnDetail
 * @var IPPOLBTxnDetail
 * @xmlDefinition Describes OLBTransaction instance - one per
				transaction downloaded
 */
class IPPOLBTxnDetail
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
				if (property_exists('IPPOLBTxnDetail',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPOLBTxnDetail',$initPropName))
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
	 * @Definition Post date of the transaction
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName PostDate
	 * @var string
	 */
	public $PostDate;
	/**
	 * @Definition Transaction date
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnDate
	 * @var string
	 */
	public $TxnDate;
	/**
	 * @Definition Amount of the transaction
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Amount
	 * @var float
	 */
	public $Amount;
	/**
	 * @Definition Reference Number of downloaded transaction
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ReferenceNumber
	 * @var string
	 */
	public $ReferenceNumber;
	/**
	 * @Definition Olb Status of a transaction, Use
						OLBTransactionStausEnum Approved/Pending/Deleted
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnStatus
	 * @var string
	 */
	public $TxnStatus;


} // end class IPPOLBTxnDetail
