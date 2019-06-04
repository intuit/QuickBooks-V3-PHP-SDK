<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPLinkedTxn
 * @var IPPLinkedTxn
 * @xmlDefinition That minimal subset of transaction information
				which is included on another transaction, so that a client viewing
				the second transaction entity need not make an additional request to
				the service in order to render it in human readable form. (e.g a
				payment needs to refer to an invoice by number)
 */
class IPPLinkedTxn
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
				if (property_exists('IPPLinkedTxn',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPLinkedTxn',$initPropName))
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
						Description: Transaction the current
						entity is related to (linked to), for example, Sales Order.[br
						/]UNSUPPORTED FIELD.
						Product: QBO
						Description: A list of Estimate
						Ids that are to be associated with the invoice.[br /]Note: Only
						Pending and Accepted Estimates can be specified. Closed and
						Rejected estimates will be ignored.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnId
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $TxnId;
	/**
	 * @Definition 
						Product: ALL
						Description: Transaction number.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnType
	 * @var string
	 */
	public $TxnType;
	/**
	 * @Definition 
						Product: ALL
						Description: A link to a specific
						line of the LinkedTxn. If supplied the LinkedTxn field must also
						be populated.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TxnLineId
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $TxnLineId;


} // end class IPPLinkedTxn
