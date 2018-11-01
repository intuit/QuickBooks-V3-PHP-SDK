<?php
namespace QuickBooksOnline\API\Diagnostics;

/**
 * Contains properties used to set the Logging mechanism.
 */
class Logger
{

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
        $this->RequestLog = new LoggerBase();
        $this->CustomLogger = new LoggerBase();
    }
}
