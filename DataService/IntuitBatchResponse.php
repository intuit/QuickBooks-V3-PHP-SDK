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
 * This class processes the batch request.
 */
class IntuitBatchResponse {

	/**
	 * unique batch item Id
	 * @var string batchItemId
	 */
	public $batchItemId;

	/**
	 * enum representing ResponseType after batch execution.
	 * @var ResponseType responseType
	 */
	public $responseType;

	/**
	 * entity in case response type is entity.
	 * @var IEntity entity
	 */
	public $entity;

	/**
	 * list of entities in case ResponseType is query.
	 * @var array entities
	 */
	public $entities;

	/**
	 * IdsException in case of ResponseType is exception. 
	 * @var IdsException exception
	 */
	public $exception;

	/**
	 * the type of the response return after batch execution
	 * @var string Id
	 */
	public $Id;

	/**
	 * Initializes a new instance of the IntuitBatchResponse class.
	 */
	public function __construct()
	{
        $this->entities = array();
	}
	
	/**
	 * Gets list of entites in case ResponseType is Report.
	 * @return array entities
	 */
	public function ReadOnlyCollection()
	{
	    return $this->entities;
	}

	/**
	 * Adds the entities to entities list
	 * @param entity The entity.
	 */
	public function AddEntities($entity)
	{
         $this->entities[] = $entity;
	}
}
