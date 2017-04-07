<?php

namespace QuickBooksOnline\API\Core\Http\Compression;

/**
 * Format used to compress data.
 */
class CompressionFormat
{
    /**
     * Default value used to indicate that compression is not specified in the config.
     * @var string Default
     */
    //const Default='Default';

    /**
     * No compression.
     * @var string None
     */
    const None='None';

    /**
     * GZip compression.
     * @var string GZip
     */
    const GZip='GZip';

    /**
     * Deflate compression.
     * @var string Deflate
     */
    const Deflate='Deflate';
}
