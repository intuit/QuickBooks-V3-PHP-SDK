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
 * This file contains Logger.
 */
require_once(PATH_SDK_ROOT . 'Core/Configuration/RequestLog.php'); 
require_once(PATH_SDK_ROOT . 'Diagnostics/Logger.php'); 
 
/**
 * Contains properties used to set the Logging mechanism.
 * Special note: needed to avoid class name collision with
 * other class called 'Logger', so called this one 'LoggerMech'
 */
class LoggerMech {
	
	/**
	 * The Request logging mechanism.
	 * @var RequestLog $RequestLog
	 */
	public $RequestLog;

	/**
	 * The Custom logger implementation class (currently just uses same logger as RequestLog)
	 * @var CustomLogger $CustomLogger
	 */
	public $CustomLogger;
	
	/**
	 * Initializes the Logger object
	 */
	public function __construct()
	{
		$this->RequestLog = new Logger();
		$this->CustomLogger = new Logger();
	}
}