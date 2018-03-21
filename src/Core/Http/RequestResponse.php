<?php

namespace QuickBooksOnline\API\Core\Http;

/**
 * Contains properties common to Request and Response.
 */
class RequestResponse
{
    /**
     * Serialization mechanism like Json, Xml.
     * @var SerializationFormat
     */
    public $SerializationFormat;

    /**
     * Compression Format like GZip, Deflate or None.
     * @var CompressionFormat
     */
    public $CompressionFormat;

    /**
     * Initializes a new instance of the RequestResponse class.
     *
     * @param SerializationFormat $SerializationFormat Serialization mechanism like Json, Xml.
     * @param CompressionFormat $CompressionFormat Compression Format like GZip, Deflate or None.
     */
    public function __construct($SerializationFormat=null, $CompressionFormat=null)
    {
        $this->SerializationFormat = $SerializationFormat;
        $this->CompressionFormat = $CompressionFormat;
    }
}
