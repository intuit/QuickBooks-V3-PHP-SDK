<?php

namespace QuickBooksOnline\API\Interceptors;

use Psr\Log\LoggerInterface;
use Psr\Log\InvalidArgumentException;
use Psr\Log\LogLevel;


class ConsoleLoggerInterceptor implements LoggerInterface
{
    const DEBUG      = 'DEBUG';
    const INFO       = 'INFO';
    const NOTICE     = 'NOTICE';
    const WARNING    = 'WARNING';
    const ERROR      = 'ERROR';
    const CRITICAL   = 'CRITICAL';
    const EMERGENCY  = 'EMERGENCY';

    private $logFile;

    public function __construct(string $logToFile)
    {
        $this->logFile  = $logToFile;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function log($level, $message, array $context = array())
    {
        if (isset($context) && !empty($context)) {
            $data = json_encode($context, JSON_UNESCAPED_SLASHES);
        } else {
            $data = '';
        }

        $line = $this->constructLine($level, $message, $data);
        echo $line ."\n";
        $this->writeToFile($line);
    }

    private function constructLine($level, $message, $data){
       $line =  $this->getCurrentTime() . "\t" .
                "[$level]"              . "\t" .
                $data                   . "\t" .
                $message                . "\n";
       return $line;
    }

    private function getCurrentTime() : string
    {
        $now = new \DateTime();
        return $now->format('Y-m-d H:i:s');
    }

    private function writeToFile(string $message)
    {
        try {
            $fp = fopen($this->logFile, 'a');
            fwrite($fp, $message);
            fclose($fp);
        } catch (\Exception $e) {
            throw new \RuntimeException("Could not open log file {$this->logFile} for writing log.");
        }
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function emergency($message, array $context = array())
    {
       $this->log(self::EMERGENCY, $message, $context);
    }
    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function alert($message, array $context = array()){
      $this->log(self::ALERT, $message, $context);
    }
    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function critical($message, array $context = array()){
      $this->log(self::CRITICAL, $message, $context);
    }
    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function error($message, array $context = array()){
      $this->log(self::ERROR, $message, $context);
    }
    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function warning($message, array $context = array()){
      $this->log(self::WARNING, $message, $context);
    }
    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function notice($message, array $context = array()){
      $this->log(self::NOTICE, $message, $context);
    }
    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function info($message, array $context = array()){
      $this->log(self::INFO, $message, $context);
    }
    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array  $context
     *
     * @return void
     */
    public function debug($message, array $context = array()){
      $this->log(self::DEBUG, $message, $context);
    }
}
