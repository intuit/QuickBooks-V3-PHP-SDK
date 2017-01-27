/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType 
 * @xmlName IPPAccountBasedExpenseLineDetail
 * @var IPPAccountBasedExpenseLineDetail
 * @xmlDefinition 
				Product: ALL
				Description: Account based expense detail for a transaction line.
			
 */
class IPPAccountBasedExpenseLineDetail
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
				if (property_exists('IPPAccountBasedExpenseLineDetail',$initPropName))
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
						Description: Reference to the Customer associated with the expense.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $CustomerRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the Class associated with the expense.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $ClassRef;
	/**
	 * @Definition 
						Product: ALL
						Description: Reference to the Expense account associated with the service/non-sellable-item billing.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AccountRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $AccountRef;
	/**
	 * @Definition 
						Product: ALL
						Description: The billable status of the expense.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BillableStatus
	 * @var com\intuit\schema\finance\v3\IPPBillableStatusEnum
	 */
	public $BillableStatus;
	/**
	 * @Definition 
						Product: ALL
						Description: Markup information for the expense.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MarkupInfo
	 * @var com\intuit\schema\finance\v3\IPPMarkupInfo
	 */
	public $MarkupInfo;
	/**
	 * @Definition 
						Product: ALL
						Description: Sales tax associated with the expense.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxAmount
	 * @var float
	 */
	public $TaxAmount;
	/**
	 * @Definition 
						Product: ALL
						Description: Sales tax code associated with the sales tax for the expense.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxCodeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $TaxCodeRef;
	/**
	 * @Definition 
						Product: QBO
						Description: Indicates the total amount of line item including tax.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxInclusiveAmt
	 * @var float
	 */
	public $TaxInclusiveAmt;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only: extension place holder for ExpenseDetail
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ExpenseDetailLineDetailEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $ExpenseDetailLineDetailEx;


} // end class IPPAccountBasedExpenseLineDetail
