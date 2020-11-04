<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPTxnApprovalInfo
 * @var IPPTxnApprovalInfo
 * @xmlDefinition Details of approval status for the specific transaction.
 */
class IPPTxnApprovalInfo
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
				if (property_exists('IPPTxnApprovalInfo',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPTxnApprovalInfo',$initPropName))
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
                        Description: Overall Approval Status, collective of all user approvals.
						InputType: QBO: ReadOnly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ApprovalStatus
	 * @var string
	 */
	public $ApprovalStatus;
	/**
	 * @Definition 
						Product: QBO
						Description:ApprovalStatusDetail represents the detailed approval statuses of a transaction. For a given ApprovalStatus, ApprovalStatusDetail can have one of the many values described below.
						Following are the approval status and their possible detailed approval statuses:
						Approval Status - APPROVED
						Approval Status Detail - APPROVED,AUTO_APPROVED,FORCE_APPROVED,WORKFLOW_AUTO_APPROVED

						Approval Status - REJECTED
						Approval Status Detail - REJECTED,WORKFLOW_AUTO_REJECTED

						Approval Status - REQUIRES_APPROVAL
						Approval Status Detail - REQUIRES_APPROVAL,CANNOT_DETERMINE

						Approval Status - PENDING_APPROVAL
						Approval Status Detail - PENDING_APPROVAL

						Approval Status - IN_PROGRESS
						Approval Status Detail - IN_PROGRESS
						InputType: QBO: ReadOnly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ApprovalStatusDetail
	 * @var string
	 */
	public $ApprovalStatusDetail;
	/**
	 * @Definition 
                        Product: QBO
                        Description: User-id of the user last updating the approval status.
						InputType: QBO: ReadOnly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LastChangedByUser
	 * @var string
	 */
	public $LastChangedByUser;
	/**
	 * @Definition 
                        Product: QBO
                        Description: Date when the approval status was last updated.
						InputType: QBO: ReadOnly
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LastChangedDate
	 * @var string
	 */
	public $LastChangedDate;


} // end class IPPTxnApprovalInfo
