<?php

require_once(PATH_SDK_ROOT . 'Core/RestCalls/Compression/DataCompressionFormat.php');

/**
 * Interface for compression methods.
 */
abstract class ICompressor
{
	const DataCompressionFormat = DataCompressionFormat::None;
	
	/**
	 * Compresses the input byte array into stream.
	 * @param curl_headers Curl headers, pre-compression
	 * @param requestBody POST body, pre-compression
	 */
	abstract public function Compress(&$curl_headers, &$requestBody);

	/**
	 * Prepares a request header that requests compressed output
	 * @param curl_headers Curl headers, pre-compression
	 */
	abstract public function PrepareDecompress(&$curl_headers);
		
	/**
	 * Decompresses the output response stream.
	 * @param $responseBody Response body.
	 * @param $response_headers Response headers
	 * @return Decompressed response body.
	 */
	abstract public function Decompress($responseBody, $response_headers);
} 

?>
