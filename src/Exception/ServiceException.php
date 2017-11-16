<?php
namespace QuickBooksOnline\API\Exception;

/**
 * Represents an exception raised by the Intuit Service.
 */
class ServiceException extends IdsException
{
    /**
     * Initializes a new instance of the ServiceException class.
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
        return __CLASS__ . ": Http Status Code [{$this->code}]: {$this->message}\n";
    }
}
