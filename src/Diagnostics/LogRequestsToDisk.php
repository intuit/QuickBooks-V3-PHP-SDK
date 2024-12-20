<?php

namespace QuickBooksOnline\API\Diagnostics;

use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Exception\IdsException;

/**
 * Logs API Requests/Responses To Disk
 */
class LogRequestsToDisk
{

    /**
     * Indicating whether Service Requests Logging should be enabled
     * @var bool
     */
    public $EnableServiceRequestsLogging;

    /**
     * The Service Request Logging Location.
     * @var string
     */
    public $ServiceRequestLoggingLocation;

	/**
	 * The Service Request Logging Callback. (bch36)
	 * @var callable
	 */
	public $ServiceRequestLoggingCallback;
	
    /**
     * Initializes a new instance of the LogRequestsToDisk class.
     * @param bool enableServiceRequestLogging Value indicating whether to log request response messages
     * @param string serviceRequestLoggingLocation Request Response logging locationl
     */
    public function __construct($enableServiceRequestLogging=false, $serviceRequestLoggingLocation=null)
    {
        $this->EnableServiceRequestsLogging = $enableServiceRequestLogging;
        $this->ServiceRequestLoggingLocation = $serviceRequestLoggingLocation;
    }

    /**
     * Enabled or disable the log
     * @param Boolean $status
     */
    public function setLogStatus($status){
        $this->EnableServiceRequestsLogging = $status;
    }

    /**
     * Set Log directory
     * @param String $logDirectory
     */
    public function setLogDirectory($logDirectory){
        $this->ServiceRequestLoggingLocation = $logDirectory;
    }

	/** (bch36)
	 * Set a callback function for request and response logs
	 * @param callable $callback     The callback function for receiving request and response logs
	 */
	public function setLogCallback($callback)
	{
		$this->ServiceRequestLoggingCallback = $callback;
	}
	
    /**
     * Gets the log destination folder
     * @return string log destination folder
     */
    public function GetLogDestination()
    {
        if ($this->EnableServiceRequestsLogging) {
            if (false === file_exists($this->ServiceRequestLoggingLocation)) {
                $this->ServiceRequestLoggingLocation = sys_get_temp_dir();
            }
        }
        return $this->ServiceRequestLoggingLocation;
    }

    /**
     * Logs the Platform Request to Disk.
     * @param string xml The xml to log.
     * @param string url of the request/response
     * @param array headers HTTP headers of the request/response
     * @param bool isRequest Specifies whether the xml is request or response.
     */
    public function LogPlatformRequests($xml, $url, $headers, $isRequest)
    {
        if ($this->EnableServiceRequestsLogging) {
            if (false === file_exists($this->ServiceRequestLoggingLocation)) {
                $this->ServiceRequestLoggingLocation = sys_get_temp_dir();
            }

            // Use filecount to have some sort of sequence number for debugging purposes - 5 digits
                  $sequenceNumber = iterator_count(new \DirectoryIterator($this->ServiceRequestLoggingLocation));
            $sequenceNumber = str_pad((int)$sequenceNumber, 5, "0", STR_PAD_LEFT);

            $iter = 0;
            $filePath = null;
            do {
                $filePath = null;
                if ($isRequest) {
                    $filePath = CoreConstants::REQUESTFILENAME_FORMAT;
                    $filePath = str_replace("{0}", $this->ServiceRequestLoggingLocation, $filePath);
                } else {
                    $filePath = CoreConstants::RESPONSEFILENAME_FORMAT;
                    $filePath = str_replace("{0}", $this->ServiceRequestLoggingLocation, $filePath);
                }
                $filePath = str_replace("{1}", CoreConstants::SLASH_CHAR.$sequenceNumber.'-', $filePath);
                $filePath = str_replace("{2}", time()."-".(int)$iter, $filePath);
                $iter++;
            } while (file_exists($filePath));

            try {
                $collapsedHeaders = array();
                foreach ($headers as $key=>$val) {
                    $collapsedHeaders[] = "{$key}: {$val}";
                }

                $message =
					($isRequest?"REQUEST":"RESPONSE")." URI FOR SEQUENCE ID {$sequenceNumber}\n==================================\n{$url}\n\n" .
					($isRequest?"REQUEST":"RESPONSE")." HEADERS\n================\n".implode("\n", $collapsedHeaders)."\n\n" .
					($isRequest?"REQUEST":"RESPONSE")." BODY\n=============\n".$xml."\n\n";

                file_put_contents($filePath, $message);

				if (is_callable($this->ServiceRequestLoggingCallback))
					call_user_func($this->ServiceRequestLoggingCallback, $isRequest, $message, $url, $xml, $headers);
				
            } catch (\Exception $e) {
                throw new IdsException("Exception during LogPlatformRequests.");
            }
        }
    }
}
