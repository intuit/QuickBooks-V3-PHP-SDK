<?php
namespace QuickBooksOnline\API\WebhooksService;

/**
 * POJO class for EventNotification
 */
class EventNotification
{
    /**
     * The company ID
     *
     * @var
     */
    private $realmId;

    /**
     * An list of DataChangeEvent
     *
     * @var
     */
    private $dataChangeEvent;

    /**
     * Set the company for this EventNotification;
     *
     * @param $realmID
     * @return $this
     */
    public function setRealmId($realmID)
    {
        $this->realmId = $realmID;
        return $this;
    }

    /**
     * Return the realmID
     *
     * @return mixed
     */
    public function getRealmId()
    {
        return $this->realmId;
    }

    /**
     * Set the data Change Event
     *
     * @param $dataChangeEvent
     * @return $this
     */
    public function setDataChangeEvent($dataChangeEvent)
    {
        $this->dataChangeEvent = $dataChangeEvent;
        return $this;
    }


    /**
     * Return the Data Change Event
     *
     * @return mixed
     */
    public function getDataChangeEvent()
    {
        return $this->dataChangeEvent;
    }
}
