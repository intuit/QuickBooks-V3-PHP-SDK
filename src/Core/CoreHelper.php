<?php

namespace QuickBooksOnline\API\Core;

use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Core\Http\Serialization\JsonObjectSerializer;
use QuickBooksOnline\API\Core\Http\Serialization\IEntitySerializer;
use QuickBooksOnline\API\Core\Http\Serialization\SerializationFormat;
use QuickBooksOnline\API\Core\Http\Compression\CompressionFormat;
use QuickBooksOnline\API\Core\Http\Compression\GZipCompressor;
use QuickBooksOnline\API\Core\Http\Compression\DeflateCompressor;
use QuickBooksOnline\API\Core\Http\Compression\CompressorBase;
use QuickBooksOnline\API\Diagnostics\TraceLevel;
use QuickBooksOnline\API\Exception\IdsException;
use QuickBooksOnline\API\Diagnostics\LogRequestsToDisk;

/**
 * Helper class.
 */
 class CoreHelper
 {
     /**
     * Gets the serializer mechanism using the service context and the depending on the request and response.
     * @param ServiceContext serviceContext The service context object.
     * @param bool isRequest Specifies whether to return serializer mechanism for request or response.
     * @return IEntitySerializer The Serializer mechanism.
     */
    public static function GetSerializer($serviceContext, $isRequest)
    {
        $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer");

        $serializer = null;
        if ($isRequest) {
            switch ($serviceContext->IppConfiguration->Message->Request->SerializationFormat) {
                case SerializationFormat::Xml:
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Request): Xml");
                    $serializer = new XmlObjectSerializer();
                    break;
                case SerializationFormat::Json:
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Request): JSON");
                    $serializer = new JsonObjectSerializer();
                    break;
                case SerializationFormat::Custom:
                    // TODO: check whtether this is possible
                    // $this->serializer = $serviceContext->IppConfiguration->Message->Request->CustomSerializer;
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Request): Custom");
                    break;
            }
        } else {
            switch ($serviceContext->IppConfiguration->Message->Response->SerializationFormat) {
                case SerializationFormat::Xml:
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Response): XML");
                    $serializer = new XmlObjectSerializer();
                    break;
                case SerializationFormat::Json:
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Response): JSON");
                    $serializer = new JsonObjectSerializer();
                    break;
                case SerializationFormat::Custom:
                    // TODO: check whtether this is possible
                    // $this->serializer = $serviceContext->IppConfiguration->Message->Response->CustomSerializer;
                              $serviceContext->IppConfiguration->Logger->RequestLog->Log(TraceLevel::Info, "GetSerializer(Response): Custom");
                    break;
            }
        }

        return $serializer;
    }

    /**
     * This function is deprecated use simplexml_load_string() instead.
     * @param string response The response string
     * @throws BadFunctionCallException
     * @return SimpleXMLElement The SimpleXMLElement object.
     * @deprecated since version v2.1
     */
    public static function ParseResponseIntoXml()
    {
        throw new \BadFunctionCallException(__METHOD__ . " has been removed.");
    }

    /**
     * TO DO: Rewrite Late - Hao
     * Checks whether the reponse is null or empty and throws communication exception.
     * @param string response The response from the query service.
     */
    public static function CheckNullResponseAndThrowException($response)
    {
        if (!$response) {
            $messageToWrite = 'Response Null or Empty';
            $backTrace =  debug_backtrace();
            $callerFileName = $backTrace[0]['file'];
            $callerFileLineNumber = $backTrace[0]['line'];
            $callerFunctionName = $backTrace[0]['function'];
            $logMessage = implode(" - ", array(date('Y-m-d H:i:s'),
                                               $callerFileName,
                                               $callerFileLineNumber,
                                               $callerFunctionName,
                                               $messageToWrite));
            throw new IdsException($logMessage);
        }
    }

    /**
     * Gets the compression mechanism using the service context and the depending on the request and response.
     * @param ServiceContext serviceContext The service context object.
     * @param bool isRequest Specifies whether to return compression mechanism for reqeust or response.
     * @return CompressorBase The Compression mechanism.
     */
    public static function GetCompressor($serviceContext, $isRequest)
    {
        $compressor = null;
        if ($isRequest) {
            switch ($serviceContext->IppConfiguration->Message->Request->CompressionFormat) {
                case CompressionFormat::GZip:
                    $compressor = new GZipCompressor();
                    break;
                case CompressionFormat::Deflate:
                    $compressor = new DeflateCompressor();
                    break;
            }
        } else {
            switch ($serviceContext->IppConfiguration->Message->Response->CompressionFormat) {
                case CompressionFormat::GZip:
                    $compressor = new GZipCompressor();
                    break;
                case CompressionFormat::Deflate:
                    $compressor = new DeflateCompressor();
                    break;
            }
        }

        return $compressor;
    }

    /**
     * Gets the Request Response Logging mechanism.
     * @param ServiceContext serviceContext The serivce context object.
     * @return LogRequestsToDisk Returns value which specifies the request response logging mechanism.
     */
    public static function GetRequestLogging($serviceContext)
    {
        $requestLogger = null;
        try {
            if (isset($serviceContext->IppConfiguration) &&
                isset($serviceContext->IppConfiguration->Logger) &&
                isset($serviceContext->IppConfiguration->Logger->RequestLog) &&
                isset($serviceContext->IppConfiguration->Logger->RequestLog->EnableRequestResponseLogging) &&
                isset($serviceContext->IppConfiguration->Logger->RequestLog->ServiceRequestLoggingLocation)) {
                $requestLogger = new LogRequestsToDisk(
                    $serviceContext->IppConfiguration->Logger->RequestLog->EnableRequestResponseLogging,
                    $serviceContext->IppConfiguration->Logger->RequestLog->ServiceRequestLoggingLocation);
            } else {
                $requestLogger = new LogRequestsToDisk(false, null);
            }
        } catch (\Exception $e) {
            $requestLogger = new LogRequestsToDisk(false, null);
        }

        return $requestLogger;
    }
 }
