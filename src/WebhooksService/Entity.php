<?php
namespace QuickBooksOnline\API\WebhooksService;

/**
 * POJO Class Entity
 */
class Entity
{
    /**
     * The corresponding resource name for the WebhooksEvent.
     * For example, it can be Vender, Invoice, Customer, etc.
     *
     * @var
     */
    private $name;

    /**
     * The internal ID for the entity in QuickBooks Online
     *
     * @var
     */
    private $id;

    /**
     * The operation for this event. It can be create, update, etc.
     *
     * @var
     */
    private $operation;

    /**
     * Last updated Time
     *
     * @var
     */
    private $lastUpdated;

    /**
     * The internal ID for the deleted entity in QuickBooks Online
     *
     * @var
     */
    private $deletedId;

    /**
     * Setter for name
     *
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     *      The name for the entity
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Setter for ID
     *
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * The ID for the entity
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * The operation Setter
     *
     * @param $operation
     * @return $this
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * Return the operation for this entity
     *
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set last update time
     *
     * @param $lastUnpdate
     * @return $this
     */
    public function setLastUpdated($lastUnpdate)
    {
        $this->lastUpdated = $lastUnpdate;
        return $this;
    }

    /**
     * Return the last update time
     *
     * @return mixed
     *
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }
    /**
     * Set deleted id
     *
     * @param $deletedId
     * @return $this
     */
    public function setDeletedId($deletedId)
    {
        $this->deletedId = $deletedId;
        return $this;
    }

    /**
     * Return the deleted id
     *
     * @return mixed
     *
     */
    public function getDeletedId()
    {
        return $this->deletedId;
    }
}
