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
require_once('IPPIntuitEntity.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType IntuitEntity
 * @xmlName IPPCompanyCurrency
 * @var IPPCompanyCurrency
 * @xmlDefinition Company currency are the currencies used by the company. Each Company Currency describes the properties of that currency.
 */
class IPPCompanyCurrency
	extends IPPIntuitEntity	{

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
				if (property_exists('IPPCompanyCurrency',$initPropName))
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
								Description: Universal 3-letter currency code like USD, CAD, EUR, etc. Required for the create/delete operation.
								Max Length: 3
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Code
	 * @var string
	 */
	public $Code;
	/**
	 * @Definition 
								Product: QBO
								Description: Currency name (Output only)
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: QBO
								Description: Indicates whether this currency is active in the company or not. Inactive Currency may be hidden from most display purposes and may not be used on financial transactions.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition Internal use only: extension place holder for Company Currency 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CompanyCurrencyEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $CompanyCurrencyEx;


} // end class IPPCompanyCurrency
