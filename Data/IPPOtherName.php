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
require_once('IPPNameBase.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType NameBase
 * @xmlName IPPOtherName
 * @var IPPOtherName
 * @xmlDefinition  Describes the Other Name (aka Payee). QBD only
 */
class IPPOtherName
	extends IPPNameBase	{

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
				if (property_exists('IPPOtherName',$initPropName))
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
	 * @Definition Name or number of the account associated with this other name (payee).
								Length Restriction:
								QBO: 15
								QBD: 1024
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AcctNum
	 * @var string
	 */
	public $AcctNum;
	/**
	 * @Definition  Represents primary PhysicalAddress list
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs 1
	 * @xmlName PrimaryAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $PrimaryAddr;
	/**
	 * @Definition  Represents other PhysicalAddress list
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName OtherAddr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $OtherAddr;
	/**
	 * @Definition Internal use only: extension place holder for OtherName.
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OtherNameEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $OtherNameEx;


} // end class IPPOtherName
