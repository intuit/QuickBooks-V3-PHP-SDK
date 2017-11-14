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
