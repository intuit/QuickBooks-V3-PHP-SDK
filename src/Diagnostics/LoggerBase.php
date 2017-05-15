<?php
namespace QuickBooksOnline\API\Diagnostics;

use QuickBooksOnline\API\Core\CoreConstants;

/**
 * This file contains an interface for Logging.
 */
class LoggerBase
{
    /**
     * The logging location.
     * @var LoggerBase $ServiceRequestLoggingLocation
     */
    public $ServiceRequestLoggingLocation;
    
    /**
     * The logging enabled flag.
     * @var LoggerBase $EnableRequestResponseLogging
     */
    public $EnableRequestResponseLogging;
    
    /**
     * Initializes the LoggerBase object
     */
    public function __construct()
    {
        $this->ServiceRequestLoggingLocation = CoreConstants::DEFAULT_LOGGINGLOCATION;
        $this->EnableRequestResponseLogging = TRUE;
    }
    
    /**
     * Logs messages depending on the ids trace level.
     *
     * @param TraceLevel $idsTraceLevel IDS Trace Level.
     * @param string $messageToWrite The message to write.
     *
     */
    public function Log($idsTraceLevel, $messageToWrite)
    {
        if ($this->EnableRequestResponseLogging === TRUE)
            file_put_contents($this->ServiceRequestLoggingLocation . 'executionlog.txt', $messageToWrite."\n", FILE_APPEND);
    }
}
