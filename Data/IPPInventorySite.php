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
 * @xmlName IPPInventorySite
 * @var IPPInventorySite
 * @xmlDefinition 
				Product: QBW
				Description: The InventorySite resource represents a location where inventory is stored.
				Endpoint: inventorysite
				Business Rules: [li]The site name must be unique.[/li]
			
 */
class IPPInventorySite
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
				if (property_exists('IPPInventorySite',$initPropName))
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
								Filterable: QBW
								Description: User recognizable name for the site
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Name
	 * @var string
	 */
	public $Name;
	/**
	 * @Definition 
								Product: QBW
								Filterable: QBW
								Description: Whether the site is considered "active", still in use by the business
							
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
								Description: Whether this is the default site for inventory items that do not indicate a site
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultSite
	 * @var boolean
	 */
	public $DefaultSite;
	/**
	 * @Definition 
								Product: QBW
								Description: Description
							
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
								Description: Name of the person responsible for the site
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Contact
	 * @var string
	 */
	public $Contact;
	/**
	 * @Definition 
								Product: QBW 
								Description: Tagged postal addresses
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName Addr
	 * @var com\intuit\schema\finance\v3\IPPPhysicalAddress
	 */
	public $Addr;
	/**
	 * @Definition 
								Product: QBW 
								Description: Tagged phone number, possibly include pagers.
							
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName ContactInfo
	 * @var com\intuit\schema\finance\v3\IPPContactInfo
	 */
	public $ContactInfo;
	/**
	 * @Definition Internal use only: extension place holder for InventorySite  
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName InventorySiteEx
	 * @var com\intuit\schema\finance\v3\IPPIntuitAnyType
	 */
	public $InventorySiteEx;


} // end class IPPInventorySite
