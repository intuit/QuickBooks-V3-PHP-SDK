<?php
namespace QuickBooksOnline\API\Diagnostics;

/**
 * This file contains Trace Logger.
 */
class TraceLogger extends LoggerBase
{

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
        if ((int)$this->traceSwitchLevel < (int)$idsTraceLevel) {
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
