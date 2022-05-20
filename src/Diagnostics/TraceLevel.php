<?php
namespace QuickBooksOnline\API\Diagnostics;

/**
 * This file defines the trace levels.
 */
class TraceLevel
{
    /**
     * Specifies what level of messages to output.
     * @var int Off
     */
    const OFF = 0;

    /**
     * Output error-handling messages.
     * @var int Error
     */
    const ERROR = 1;

    /**
     * Output warnings and error-handling messages.
     * @var int Warning
     */
    const WARNING = 2;

    /**
     * Output informational messages, warnings, and error-handling messages.
     * @var int Info
     */
    const INFO = 3;

    /**
     * Output all debugging and tracing messages.
     * @var int Verbose
     */
    const VERBOSE = 4;
}
