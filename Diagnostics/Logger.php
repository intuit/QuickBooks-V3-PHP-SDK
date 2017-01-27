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

require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLevel.php');


/**
 * This file contains an interface for Logging.
 */
class Logger {

	/**
	 * Logs messages depending on the ids trace level.
	 *
	 * @param TraceLevel $idsTraceLevel IDS Trace Level.
	 * @param string $messageToWrite The message to write.
	 *
	 */
	public function Log($idsTraceLevel, $messageToWrite)
	{
		file_put_contents(PATH_SDK_ROOT . 'executionlog.txt', $messageToWrite."\n", FILE_APPEND);
	}
}

?>
