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
 * Class to have query message
 */
class QueryMessage {

	/**
	 * variable SQL
	 * @var string $sql
	 */
	public $sql;

	
	/**
	 * variable Projection
	 * @var array projection
	 */
	public $projection;
	
	/**
	 * variable entity
	 * @var string $entity
	 */
	public $entity;
	
	/**
	 * variable whereClause
	 * @var array whereClause
	 */
	public $whereClause;
	
	/**
	 * variable startposition
	 * @var int startposition
	 */
	public $startposition;
	
	/**
	 * variable 
	 * @var int maxresults
	 */
	public $maxresults;
	
	/**
	 * variable orderByClause
	 * @var string orderByClause
	 */
	public $orderByClause;

	/**
	 * Initialize a QueryMessage object
	 */ 
	public function __construct()
	{
		$projection = array();
		$whereClause = array();
	}

	/**
	 * Get SQL query specified by object's members
	 * @return string query
	 */
	public function getString() {
	
		if (empty($this->sql) || empty($this->entity))
		{
			return NULL;
		}

		$query = "";		
		$query .= $this->sql;		

		if (0==count($this->projection)) {
			$query .= " "."*";		
		}
		else
		{
			if (count($this->projection))
			{
				$query .= " " . implode(", ", $this->projection);		
			}
		}
		
		$query .= " FROM " . $this->entity;
		
		if (!empty($this->whereClause))
		{
			if (count($this->whereClause))
			{
				$query .= " WHERE " . implode(" AND ", $this->whereClause);		
			}
		}

		if (!empty($this->orderByClause))
			$query .= " ORDERBY " . $this->orderByClause;

		if (!empty($this->startposition))
			$query .= " STARTPOSITION " . $this->startposition;

		if (!empty($this->maxresults))
			$query .= " MAXRESULTS " . $this->maxresults;

		return $query;
	}
}

?>