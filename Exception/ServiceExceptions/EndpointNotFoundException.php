/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
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
