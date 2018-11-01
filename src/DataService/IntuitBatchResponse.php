<?php
/*******************************************************************************
 * Copyright (c) 2017 Intuit
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *******************************************************************************/
namespace QuickBooksOnline\API\DataService;

/**
 * This class processes the batch request.
 */
class IntuitBatchResponse
{

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
     * Indicate if the Batch Request for the bId is successful.
     * @var Boolean
     */
    private $isBatchItemResponseSuccess = false;

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

    /**
     * Set the Entities to an entity list
     * @param Array $newEntities
     *
     * @return $this
     */
    public function setEntities($newEntities){
        $this->entities = $newEntities;
        return $this;
    }

    /**
     * Check if the Batch Item Response is a success response or failed response, as the Batch request is always sending 200 as its status code.
     * @return Boolean
     */
    public function isSuccess(){
        return $this->isBatchItemResponseSuccess;
    }

    /**
     * Mark this batch request is a successful call
     */
    public function successFlagOn(){
        $this->isBatchItemResponseSuccess = true;
    }

    /**
     * Return the result of the Request if there is no error. If the Batch request is Query, the result will be an array of items. If the Batch request is create, update, or ddelete, it will be the entity.
     * @return Array|Entity
     */
    public function getResult(){
        if(isset($this->entity)){
            return $this->entity;
        }else if(isset($this->entities)){
            return $this->entities;
        } else{
           return null;
        }
    }

    /**
     * Return the Error if the request is not made successfullu.
     * @return IdsException
     */
    public function getError(){
        return $this->exception;
    }
}
