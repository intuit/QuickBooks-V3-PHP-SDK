<?php

namespace QuickBooksOnline\API\Core\HttpClients;

use QuickBooksOnline\API\Core\CoreHelper;
use QuickBooksOnline\API\Core\Http\Serialization\IEntitySerializer;
use QuickBooksOnline\API\Core\ServiceContext;

/**
 * Rest Handler class.
 */
class RestHandler
{
    /**
     * The contex
     * @var ServiceContext
     */
    protected $serviceContext;

    /**
     * Response serializer.
     * @var IEntitySerializer
     */
    protected $ResponseSerializer;

    /**
     * Gets or sets Request compressor.
     * @var ICompressor
     */
    protected $RequestCompressor;

    /**
     * Gets or sets Response compressor.
     * @var ICompressor
     */
    protected $ResponseCompressor;

    /**
     * Gets or sets Request serializer.
     * @var IEntitySerializer
     */
    protected $RequestSerializer;

    /**
     * Get the Logging component for the REST service
     * @var RequestLogging
     */
    protected $RequestLogging;

    /**
     *
     * Initializes a new instance of the RestHandler class.
     *
     * @param ServiceContext $context The Service Context
     */
    protected function __construct($context)
    {
        $this->serviceContext = $context;
        $this->RequestCompressor = CoreHelper::GetCompressor($this->serviceContext, true);
        $this->ResponseCompressor = CoreHelper::GetCompressor($this->serviceContext, false);
        $this->RequestSerializer = CoreHelper::GetSerializer($this->serviceContext, true);
        $this->ResponseSerializer = CoreHelper::GetSerializer($this->serviceContext, false);
        $this->RequestLogging = CoreHelper::GetRequestLogging($this->serviceContext);
    }
}
