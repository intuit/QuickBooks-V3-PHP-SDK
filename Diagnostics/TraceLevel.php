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

/**
 * This file defines the trace levels.
 */
class TraceLevel
{
	/**
	 * Specifies what level of messages to output.
	 * @var int Off
	 */
    const Off = 0;

	/**
	 * Output error-handling messages.
	 * @var int Error
	 */
    const Error = 1;

	/**
	 * Output warnings and error-handling messages.
	 * @var int Warning
	 */
    const Warning = 2;

	/**
	 * Output informational messages, warnings, and error-handling messages.
	 * @var int Info
	 */
    const Info = 3;

	/**
	 * Output all debugging and tracing messages.
	 * @var int Verbose
	 */
    const Verbose = 4;
}

?>