<?php

namespace QuickBooksOnline\API\Core\Http;

/**
 * Contains properties about the Request and Response configuration settings.
 */
class Message
{
    /**
     * Request configuration settings
     * @var Request
     */
    public $Request;

    /**
     * Response configuration settings
     * @var Response
     */
    public $Response;

    /**
     * Initializes a new instance of the Message class.
     *
     * @param Request $Request Request configuration settings
     * @param Response $Response Response configuration settings
     */
    public function __construct($Request=null, $Response=null)
    {
        $this->Request = $Request;
        $this->Response = $Response;
    }
}
