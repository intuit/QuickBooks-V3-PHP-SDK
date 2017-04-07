<?php
namespace QuickBooksOnline\API\Exception;

/**
 * Represents an Exception raised from IDS components.
 */
class IdsError extends \Exception
{
    /**
     * Initializes a new instance of the IdsError class.
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
