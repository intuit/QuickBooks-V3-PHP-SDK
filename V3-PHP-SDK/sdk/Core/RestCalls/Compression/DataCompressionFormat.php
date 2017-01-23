<?php

/**
 * Format used to compress data.
 */
class DataCompressionFormat
{
	/**
	 * No compression.
	 * @var int None
	 */
	const None = 0;
	
	/**
	 * GZip compression.
	 * @var int GZip
	 */
	const GZip = 1;
	
	/**
	 * Deflate compression.
	 * @var int Deflate
	 */
	const Deflate = 2;

}

?>