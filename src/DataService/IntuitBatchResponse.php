<?php
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
