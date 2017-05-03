<?php

namespace QuickBooksOnline\API\Exception\SdkExceptions;

use QuickBooksOnline\API\Exception\SdkException;

/**
 * Represents an Exception raised when an invalid realm id is encountered.
 */
class InvalidRealmException extends SdkException
{
    /**
     * Initializes a new instance of the InvalidRealmException class.
     *
     * @param string $message string-based exception description
     * @param string $code exception code
     */
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * Generates a string-based representation of the exception
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
