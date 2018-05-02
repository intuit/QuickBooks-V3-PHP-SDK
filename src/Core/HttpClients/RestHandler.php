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
     * The Service context
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
