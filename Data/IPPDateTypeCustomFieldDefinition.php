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
require_once('IPPCustomFieldDefinition.php');

/**
 * @xmlNamespace http://schema.intuit.com/finance/v3
 * @xmlType CustomFieldDefinition
 * @xmlName IPPDateTypeCustomFieldDefinition
 * @var IPPDateTypeCustomFieldDefinition
 * @xmlDefinition 
				Product: ALL
				Description: Provides for strong-typing of the DateType CustomField.
			
 */
class IPPDateTypeCustomFieldDefinition
	extends IPPCustomFieldDefinition	{

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
				if (property_exists('IPPDateTypeCustomFieldDefinition',$initPropName))
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
								Description: Default date value for the DateType CustomField.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultDate
	 * @var string
	 */
	public $DefaultDate;
	/**
	 * @Definition 
								Product: ALL
								Description: Minimum date value allowed when the DateType CustomField is created/updated.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MinDate
	 * @var string
	 */
	public $MinDate;
	/**
	 * @Definition 
								Product: ALL
								Description: Maximum date value allowed when the DateType CustomField is created/updated.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName MaxDate
	 * @var string
	 */
	public $MaxDate;


} // end class IPPDateTypeCustomFieldDefinition
