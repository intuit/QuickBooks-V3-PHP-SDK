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
 * @xmlName IPPCompanyAccountingPrefs
 * @var IPPCompanyAccountingPrefs
 * @xmlDefinition Defines Company Accounting Prefs details 
 */
class IPPCompanyAccountingPrefs
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
				if (property_exists('IPPCompanyAccountingPrefs',$initPropName))
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
	 * @Definition QBW: Only QBW supported
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName UseAccountNumbers
	 * @var boolean
	 */
	public $UseAccountNumbers;
	/**
	 * @Definition Product:QBO Default ARAccount
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultARAccount
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultARAccount;
	/**
	 * @Definition Product:QBO Default APAccount
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DefaultAPAccount
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $DefaultAPAccount;
	/**
	 * @Definition 
						Product:QBW
						Requires account 
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName RequiresAccounts
	 * @var boolean
	 */
	public $RequiresAccounts;
	/**
	 * @Definition 
						Product:QBO
						QBO: QBO only. Enable Department Tracking
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TrackDepartments
	 * @var boolean
	 */
	public $TrackDepartments;
	/**
	 * @Definition 
						Product: QBO
						Department terminology
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName DepartmentTerminology
	 * @var string
	 */
	public $DepartmentTerminology;
	/**
	 * @Definition 
						Product:All
						Enable Class Tracking per transaction
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassTrackingPerTxn
	 * @var boolean
	 */
	public $ClassTrackingPerTxn;
	/**
	 * @Definition 
						Product:QBO
						Enable Class Tracking per transaction line
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ClassTrackingPerTxnLine
	 * @var boolean
	 */
	public $ClassTrackingPerTxnLine;
	/**
	 * @Definition QBW: ONLY. Enable auto journal entry number
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName AutoJournalEntryNumber
	 * @var boolean
	 */
	public $AutoJournalEntryNumber;
	/**
	 * @Definition 
						Product:All
						Defines first Month of physical year
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName FirstMonthOfFiscalYear
	 * @var com\intuit\schema\finance\v3\IPPMonthEnum
	 */
	public $FirstMonthOfFiscalYear;
	/**
	 * @Definition 
						Product:All
						Defines Tax Year Month
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxYearMonth
	 * @var com\intuit\schema\finance\v3\IPPMonthEnum
	 */
	public $TaxYearMonth;
	/**
	 * @Definition TaxForm Number
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName TaxForm
	 * @var string
	 */
	public $TaxForm;
	/**
	 * @Definition 
						Product:All
						Book closing date, if you want to specify if not leave it as null
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName BookCloseDate
	 * @var string
	 */
	public $BookCloseDate;
	/**
	 * @Definition 
						Product: QBW
						Description: 
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlMaxOccurs unbounded
	 * @xmlName OtherContactInfo
	 * @var com\intuit\schema\finance\v3\IPPContactInfo
	 */
	public $OtherContactInfo;
	/**
	 * @Definition  
						Product:QBO
						Customer Terminology 
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName CustomerTerminology
	 * @var string
	 */
	public $CustomerTerminology;


} // end class IPPCompanyAccountingPrefs
