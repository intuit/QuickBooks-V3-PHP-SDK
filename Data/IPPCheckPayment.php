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
 * @xmlName IPPCheckPayment
 * @var IPPCheckPayment
 * @xmlDefinition 
				Product: ALL
				Description: Check payment details for both payments to vendors and payments from customers.
			
 */
class IPPCheckPayment
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
				if (property_exists('IPPCheckPayment',$initPropName))
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
						Description: The check number printed on the check.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CheckNum
	 * @var string
	 */
	public $CheckNum;
	/**
	 * @Definition 
						Product: ALL
						Description: Status of the check. Values provided by service/business logic.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Status
	 * @var string
	 */
	public $Status;
	/**
	 * @Definition 
						Product: ALL
						Description: Name of persons or entities holding the account, as printed on the check.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NameOnAcct
	 * @var string
	 */
	public $NameOnAcct;
	/**
	 * @Definition 
						Product: ALL
						Description: Checking account number, as printed on the check.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcctNum
	 * @var string
	 */
	public $AcctNum;
	/**
	 * @Definition 
						Product: ALL
						Description: The name of the bank on which the check was drawn.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BankName
	 * @var string
	 */
	public $BankName;
	/**
	 * @Definition 
						Product: ALL
						Description: Internal use only: extension place holder for CheckPayment
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlName CheckPaymentEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CheckPaymentEx;


} // end class IPPCheckPayment
