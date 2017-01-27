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

require_once(PATH_SDK_ROOT . 'Diagnostics/Logger.php');
require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLevel.php');

/**
 * This file contains Trace Logger.
 */
class TraceLogger extends Logger {

	/**
	 * Provides a multilevel switch to control tracing.
	 * @var int $traceSwitch
	 */
    private $traceSwitchLevel;

	/**
	 * Initializes a new instance of the TraceLogger class.
	 */
	public function __construct()
	{
		// Searches for the switch name "IPPTraceSwitch" in the config file of the client.
		// If not found then default trace switch is OFF.
		$this->traceSwitchLevel = TraceLevel::Off;
	}

	/**
	 * Logs messages depending on the ids trace level.
	 *
	 * @param TraceLevel $idsTraceLevel IDS Trace Level
	 * @param string messageToWrite The message to write.
	 */
	public function Log($idsTraceLevel, $messageToWrite)
	{
        if ((int)$this->traceSwitchLevel < (int)$idsTraceLevel)
        {
            return;
        }
        
        $backTrace =  debug_backtrace();
        $callerFileName = $backTrace[0]['file'];
        $callerFileLineNumber = $backTrace[0]['line'];
        $callerFunctionName = $backTrace[0]['function'];
        $logMessage = implode(" - ", array(date('Y-m-d H:i:s'),
                                           $callerFileName,
                                           $callerFileLineNumber,
                                           $callerFunctionName,
                                           $messageToWrite));
                                           
        parent::Log($idsTraceLevel, $logMessage);
	}	 
}
?>
