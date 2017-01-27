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
 * @xmlName IPPTransactionDeliveryInfo
 * @var IPPTransactionDeliveryInfo
 * @xmlDefinition 
				Product: QBO
				Description: Transaction delivery info like DeliveryType, DeliveryTime, DeliveryErrorType (if any)
			
 */
class IPPTransactionDeliveryInfo
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
				if (property_exists('IPPTransactionDeliveryInfo',$initPropName))
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
						Description: Type of the delivery. Ex: Email, Tradeshift
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DeliveryType
	 * @var com\intuit\schema\finance\v3\IPPDeliveryTypeEnum
	 */
	public $DeliveryType;
	/**
	 * @Definition 
						Product: QBO
						Description: Time of Delivery
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DeliveryTime
	 * @var string
	 */
	public $DeliveryTime;
	/**
	 * @Definition 
						Product: QBO
						Description: If delivery failed, this would indicate the type of the failure.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DeliveryErrorType
	 * @var com\intuit\schema\finance\v3\IPPDeliveryErrorTypeEnum
	 */
	public $DeliveryErrorType;


} // end class IPPTransactionDeliveryInfo
