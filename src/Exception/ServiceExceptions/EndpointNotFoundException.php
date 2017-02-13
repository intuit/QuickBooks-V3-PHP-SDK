<?php 
require_once(PATH_SDK_ROOT . 'Exception/ServiceException.php');

/**
 * Represents an exception raised when an endpoint address was not found on IDS.
 */
class EndpointNotFoundException extends ServiceException
{
	/**
	 * Initializes a new instance of the EndpointNotFoundException class.
	 *
	 * @param string $message string-based exception description
	 * @param string $code exception code
	 */
    public function __construct($message, $code = 0) {
        parent::__construct($message, $code);
    }

	/**
	 * Generates a string-based representation of the exception
	 */
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

?>
