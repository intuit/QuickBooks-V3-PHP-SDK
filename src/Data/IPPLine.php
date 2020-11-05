<?php
namespace QuickBooksOnline\API\Data;

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPLine
 * @var IPPLine
 * @xmlDefinition 
				Product: ALL
				Description: A line item of a
				transaction.
			
 */
class IPPLine
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
				if (property_exists('IPPLine',$initPropName) || property_exists('QuickBooksOnline\API\Data\IPPLine',$initPropName))
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
						Description: ID of the Line Item.
						Product: QBO
						Description: ID of the Line Item.[br /]QBO considers a
						request as an update operation for a line item, if you provide an
						ID that is greater than zero and the ID exists in QBO.[br /]QBO
						considers a request as an create operation for a line item in any
						of the following conditions: No ID provided, ID provided is less
						than or equal to zero, ID provided is greater than zero and does
						not exist in QuickBooks.[br /]Required for updating existing
						lines.[br /]Not supported for BillPayment, Estimate, Invoice, or
						Payment.
						Required: QBO
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Id
	 * @var com\intuit\schema\finance\v3\IPPid
	 */
	public $Id;
	/**
	 * @Definition 
						Product: QBW
						Description: Specifies the position
						of the line in the collection of transaction lines. Supported only
						for QuickBooks Windows desktop.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LineNum
	 * @var integer
	 */
	public $LineNum;
	/**
	 * @Definition 
						Product: QBO
						Description: Free form text
						description of the line item that appears in the printed
						record.[br /]Max. length: 4000 characters.[br /]Not supported for
						BillPayment or Payment.
						Product: QBW
						Description: Free form text
						description of the line item that appears in the printed record.
						Max. length: 4000 characters.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Description
	 * @var string
	 */
	public $Description;
	/**
	 * @Definition 
						Product: QBW
						Description: The amount of the line,
						which depends on the type of the line. It can represent the
						discount amount, charge amount, tax amount, or subtotal amount
						based on the line type detail.
						Product: QBO
						Description: The amount
						of the line depending on the type of the line. It can represent
						the discount amount, charge amount, tax amount, or subtotal amount
						based on the line type detail.[br /]Required for BillPayment,
						Check, Estimate, Invoice, JournalEntry, Payment, SalesReceipt.
						Required: QBO
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Amount
	 * @var float
	 */
	public $Amount;
	/**
	 * @Definition 
						Product: All
						Description: The amount/quantity received of the line,
						which depends on the type of the line. It can represent the
						received amount or received quantity
						based on the line type detail. ReadOnly field for Purchase Order.
						Applies to existing and new entities.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Received
	 * @var float
	 */
	public $Received;
	/**
	 * @Definition 
						Product: ALL
						Description: A link between this line
						and a specific transaction. For example, an invoice line may link
						to an estimate.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName LinkedTxn
	 * @var com\intuit\schema\finance\v3\IPPLinkedTxn
	 */
	public $LinkedTxn;
	/**
	 * @Definition 
						Product: ALL
						Description: The type of line in the
						transaction.[br /]
						Required: ALL
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName DetailType
	 * @var com\intuit\schema\finance\v3\IPPLineDetailTypeEnum
	 */
	public $DetailType;
	/**
	 * @Definition 
							Product: ALL
							Description: PaymentDetail type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName PaymentLineDetail
	 * @var com\intuit\schema\finance\v3\IPPPaymentLineDetail
	 */
	public $PaymentLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: DiscountDetail type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName DiscountLineDetail
	 * @var com\intuit\schema\finance\v3\IPPDiscountLineDetail
	 */
	public $DiscountLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: SalesTaxDetail type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName TaxLineDetail
	 * @var com\intuit\schema\finance\v3\IPPTaxLineDetail
	 */
	public $TaxLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: SalesItem type for the
							transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName SalesItemLineDetail
	 * @var com\intuit\schema\finance\v3\IPPSalesItemLineDetail
	 */
	public $SalesItemLineDetail;
	/**
	 * @Definition 
							Product: QBW
							Description: Custom field (or data
							extension). Supported only for QuickBooks Windows desktop.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName DescriptionLineDetail
	 * @var com\intuit\schema\finance\v3\IPPDescriptionLineDetail
	 */
	public $DescriptionLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: ExpenseItem type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ItemBasedExpenseLineDetail
	 * @var com\intuit\schema\finance\v3\IPPItemBasedExpenseLineDetail
	 */
	public $ItemBasedExpenseLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: AccountExpense type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName AccountBasedExpenseLineDetail
	 * @var com\intuit\schema\finance\v3\IPPAccountBasedExpenseLineDetail
	 */
	public $AccountBasedExpenseLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: ReimburseType for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ReimburseLineDetail
	 * @var com\intuit\schema\finance\v3\IPPReimburseLineDetail
	 */
	public $ReimburseLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: Deposit type for the
							transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName DepositLineDetail
	 * @var com\intuit\schema\finance\v3\IPPDepositLineDetail
	 */
	public $DepositLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: PurchaseOrderItem type
							for the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName PurchaseOrderItemLineDetail
	 * @var com\intuit\schema\finance\v3\IPPPurchaseOrderItemLineDetail
	 */
	public $PurchaseOrderItemLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: SalesOrderItem type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName SalesOrderItemLineDetail
	 * @var com\intuit\schema\finance\v3\IPPSalesOrderItemLineDetail
	 */
	public $SalesOrderItemLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: ItemReceipt type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName ItemReceiptLineDetail
	 * @var com\intuit\schema\finance\v3\IPPItemReceiptLineDetail
	 */
	public $ItemReceiptLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: JournalEntry type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName JournalEntryLineDetail
	 * @var com\intuit\schema\finance\v3\IPPJournalEntryLineDetail
	 */
	public $JournalEntryLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: GroupLine type for the
							transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName GroupLineDetail
	 * @var com\intuit\schema\finance\v3\IPPGroupLineDetail
	 */
	public $GroupLineDetail;
	/**
	 * @Definition 
							Product: ALL
							Description: SubTotalLine type for
							the transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName SubTotalLineDetail
	 * @var com\intuit\schema\finance\v3\IPPSubTotalLineDetail
	 */
	public $SubTotalLineDetail;
	/**
	 * @Definition 
							Product: QBO
							Description: TDS line type for the
							transaction.
						
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName TDSLineDetail
	 * @var com\intuit\schema\finance\v3\IPPTDSLineDetail
	 */
	public $TDSLineDetail;
	/**
	 * @Definition 
						Product: QBW
						Description: Custom field (or data
						extension). Supported only for QuickBooks Windows desktop.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName CustomField
	 * @var com\intuit\schema\finance\v3\IPPCustomField
	 */
	public $CustomField;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only:
						extension place holder for LineBase
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName LineEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $LineEx;


} // end class IPPLine
