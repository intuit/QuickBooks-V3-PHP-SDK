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