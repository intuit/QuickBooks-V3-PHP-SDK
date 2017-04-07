<?php

namespace QuickBooksOnline\API\WebhooksService;

/**
 * POJO Class DataChangeEvent
 */
class DataChangeEvent
{
    /**
     * An array of Entity Objects
     * @var
     */
    private $entities;


    /**
     *
     * Set entites for DataChangeEvent
     *
     * @param $entities
     *          An array of Entity Objects
     *
     * @return $this
     */
    public function setEntities($entities)
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * Get entities as an array
     *
     * @return array(Entity)
     *      Return an array of Entity
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
