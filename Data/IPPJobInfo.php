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
 * @xmlName IPPJobInfo
 * @var IPPJobInfo
 * @xmlDefinition 
				Product: QBW
				Description: Details for the Job. This is applicable only to QuickBooks Windows desktop.
			
 */
class IPPJobInfo
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
				if (property_exists('IPPJobInfo',$initPropName))
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
						Description: Current status of the job. Valid values are: Awarded, Closed, InProgress, None, NotAwarded, Pending, as defined in the JobStatusEnum.[br /]
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName Status
	 * @var com\intuit\schema\finance\v3\IPPJobStatusEnum
	 */
	public $Status;
	/**
	 * @Definition 
						Product: QBW
						Description: Starting date of the Job.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName StartDate
	 * @var string
	 */
	public $StartDate;
	/**
	 * @Definition 
						Product: QBW
						Description: Projected end date of the job.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName ProjectedEndDate
	 * @var string
	 */
	public $ProjectedEndDate;
	/**
	 * @Definition 
						Product: QBW
						Description: End date of the job.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName EndDate
	 * @var string
	 */
	public $EndDate;
	/**
	 * @Definition 
						Product: QBW
						Description: Job description. Max. length: 99 characters.
					
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
						Description: Reference to the JobType.
					
	 * @xmlType element
	 * @xmlNamespace http://schema.intuit.com/finance/v3
	 * @xmlMinOccurs 0
	 * @xmlName JobTypeRef
	 * @var com\intuit\schema\finance\v3\IPPReferenceType
	 */
	public $JobTypeRef;


} // end class IPPJobInfo
