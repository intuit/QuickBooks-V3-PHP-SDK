<?php
namespace QuickBooksOnline\API\Diagnostics;

use QuickBooksOnline\API\Diagnostics\LoggerBase;

/**
 * Contains properties used to set the Logging mechanism.
 */
class Logger
{

    /**
     * The Request logging mechanism.
     * @var LoggerBase $RequestLog
     */
    public $RequestLog;

    /**
     * The Custom logger implementation class (currently just uses same logger as RequestLog)
     * @var LoggerBase $CustomLogger
     */
    public $CustomLogger;

    /**
     * Initializes the Logger object
     */
    public function __construct()
    {
        $this->RequestLog = new LoggerBase();
        $this->CustomLogger = new LoggerBase();
    }
}
