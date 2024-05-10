<?php

namespace QuickBooksOnline\API\Exception;

/**
 * Represents an IdsException.
 */
class IdsException extends \Exception
{
    /**
     * Debug information like intuit tid etc
     * @var array
     */
    private $debug = [];

    /**
     * Initializes a new instance of the IdsException class.
     *
     * @param string $message string-based exception description
     * @param string $code exception code
     */
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * Set the debug info
     * @param $info
     */
    public function setDebug($info)
    {
        $this->debug = $info;
    }

    /**
     * Returns the specific Intuit debug information for this call
     * @param $info
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Generates a string-based representation of the exception
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
