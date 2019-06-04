<?php

namespace QuickBooksOnline\API\Core\HttpClients;

/**
 * Parameters for calling Rest calls.
 */
class RequestParameters
{
    /**
     * The resource URI.
     * @var string
     */
    public $ResourceUri;

    /**
     * The http verb.
     * @var string
     */
    public $HttpVerbType;

    /**
     * The type of the content.
     * @var string
     */
    public $ContentType;

    /**
     * the name of the API.
     * @var string
     */
    public $ApiName;

    /**
     * Initializes a new instance of the RequestParameters class.
     *
     * @param string $resourceUri The resource URI.
     * @param string $verb The http verb.
     * @param string $contentType The type of the content.
     * @param string $apiName the name of the API.
     */
    public function __construct($resourceUri, $verb, $contentType, $apiName=null)
    {
        $this->ResourceUri = $resourceUri;
        $this->HttpVerbType = $verb;
        $this->ContentType = $contentType;
        $this->ApiName = $apiName;
    }
}
