<?php
namespace QuickBooksOnline\API\WebhooksService;

/**
 * POJO Class WebhooksEvent
 */
class WebhooksEvent
{
    /**
     * The eventNotification is a list
     *
     * @var
     */
    private $eventNotifications;

    /**
     * Set the list based on passed eventNotificationList
     *
     * @param $eventNotifications
     * @return $this
     */
    public function setEventNotifications($eventNotifications)
    {
        $this->eventNotifications = $eventNotifications;
        return $this;
    }

    /**
     * Return a list of EventNotification
     *
     * @return array() - eventNofications
     *
     */
    public function getEventNotifications()
    {
        return $this->eventNotifications;
    }
}
