<?php
namespace QuickBooksOnline\API\Diagnostics;

use QuickBooksOnline\API\Core\CoreConstants;

/**
 * This file contains an interface for Logging.
 */
class LoggerBase
{
    /**
     * Indicating whether enable logging
     * @var bool Defaults to False
    */
    public $EnableLogging = false;
   
    /**
     * Logging location
     * @var bool Defaults to CoreConstants::DEFAULT_LOGGINGLOCATION
     */
    public $LoggingLocation = CoreConstants::DEFAULT_LOGGINGLOCATION;
    
    /**
     * Log Level
     * @var int Defaults to Off.  See TraceLevel
     */
    public $LoggingTraceLevel = TraceLevel::Off;
    
    /**
     * Logs messages depending on the ids trace level.
     *
     * @param int $idsTraceLevel IDS Trace Level.
     * @param string $messageToWrite The message to write.
     *
     */
    public function Log($idsTraceLevel, $messageToWrite)
    {
        $fileToWrite = $this->LoggingLocation . '/executionlog.txt';
        if(
          $this->LoggingTraceLevel >= $idsTraceLevel &&
          $this->EnableLogging &&
          file_exists($fileToWrite) &&
          is_writable($fileToWrite)
        )
        {
           file_put_contents($fileToWrite, $messageToWrite."\n", FILE_APPEND);
        }
    }
}
