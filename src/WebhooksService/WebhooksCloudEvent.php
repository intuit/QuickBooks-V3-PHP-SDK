<?php
namespace QuickBooksOnline\API\WebhooksService;

/**
 * POJO Class for CloudEvents-based webhook event item
 */
class WebhooksCloudEvent
{
    /**
     * The CloudEvents specification version
     *
     * @var string
     */
    private $specversion;

    /**
     * Unique identifier for the event
     *
     * @var string
     */
    private $id;

    /**
     * The source of the event
     *
     * @var string
     */
    private $source;

    /**
     * The type of event
     *
     * @var string
     */
    private $type;

    /**
     * The content type of the data
     *
     * @var string
     */
    private $datacontenttype;

    /**
     * The timestamp of the event
     *
     * @var string
     */
    private $time;

    /**
     * Intuit entity ID
     *
     * @var string
     */
    private $intuitentityid;

    /**
     * Intuit account ID
     *
     * @var string
     */
    private $intuitaccountid;

    /**
     * The event data payload
     *
     * @var array
     */
    private $data;

    /**
     * Get the CloudEvents specification version
     *
     * @return string
     */
    public function getSpecversion()
    {
        return $this->specversion;
    }

    /**
     * Set the CloudEvents specification version
     *
     * @param string $specversion
     * @return $this
     */
    public function setSpecversion($specversion)
    {
        $this->specversion = $specversion;
        return $this;
    }

    /**
     * Get the event ID
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the event ID
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the event source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set the event source
     *
     * @param string $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Get the event type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the event type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the data content type
     *
     * @return string
     */
    public function getDatacontenttype()
    {
        return $this->datacontenttype;
    }

    /**
     * Set the data content type
     *
     * @param string $datacontenttype
     * @return $this
     */
    public function setDatacontenttype($datacontenttype)
    {
        $this->datacontenttype = $datacontenttype;
        return $this;
    }

    /**
     * Get the event timestamp
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the event timestamp
     *
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * Get the Intuit entity ID
     *
     * @return string
     */
    public function getIntuitentityid()
    {
        return $this->intuitentityid;
    }

    /**
     * Set the Intuit entity ID
     *
     * @param string $intuitentityid
     * @return $this
     */
    public function setIntuitentityid($intuitentityid)
    {
        $this->intuitentityid = $intuitentityid;
        return $this;
    }

    /**
     * Get the Intuit account ID
     *
     * @return string
     */
    public function getIntuitaccountid()
    {
        return $this->intuitaccountid;
    }

    /**
     * Set the Intuit account ID
     *
     * @param string $intuitaccountid
     * @return $this
     */
    public function setIntuitaccountid($intuitaccountid)
    {
        $this->intuitaccountid = $intuitaccountid;
        return $this;
    }

    /**
     * Get the event data payload
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the event data payload
     *
     * @param array $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
}
