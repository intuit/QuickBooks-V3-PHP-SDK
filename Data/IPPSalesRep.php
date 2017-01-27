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
 * @xmlName IPPSalesRep
 * @var IPPSalesRep
 * @xmlDefinition 
								Product: QBW
								Description:  [br/] One of the 3 references is Required for the create operation.
							
 */
class IPPSalesRep
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
				if (property_exists('IPPSalesRep',$initPropName))
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
								Description: The SalesRep type. Also, one of the three entity references (either the Name or the ID of the Employee, OtherName, or Vendor) is required for the Create request.[br /]
								Required: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName NameOf
	 * @var com\intuit\schema\finance\v3\IPPSalesRepTypeEnum
	 */
	public $NameOf;
	/**
	 * @Definition 
								Product: QBW
								Description: True if active. Inactive sales reps may be hidden from display and may not be used on financial transactions.
								Filterable: QBW
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Active
	 * @var boolean
	 */
	public $Active;
	/**
	 * @Definition 
									Product: QBW
									Description: Reference to the Employee, if that is the SalesRep type. One of the three entity references (either the Name or the ID of the Employee, OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EmployeeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $EmployeeRef;
	/**
	 * @Definition 
									Product: QBW
									Description: Reference to the Vendor, if that is the SalesRep type. One of the three entity references (either the Name or the ID of the Employee, OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName VendorRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $VendorRef;
	/**
	 * @Definition 
									Product: QBW
									Description: Reference to the OtherName, if that is the SalesRep type. One of the three entity references (either the Name or the ID of the Employee, OtherName, or Vendor) is required for the Create request.
									Required: QBW
								
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName OtherNameRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $OtherNameRef;
	/**
	 * @Definition 
								Product: QBW
								Description: User recognizable initials of the Sales Rep.[br/]Required for the Create request.[br/] Max Length: 5 characters.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Initials
	 * @var string
	 */
	public $Initials;
	/**
	 * @Definition 
								Product: QBW
								Description: Internal use only: extension place holder for SalesRep
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName SalesRepEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $SalesRepEx;


} // end class IPPSalesRep
