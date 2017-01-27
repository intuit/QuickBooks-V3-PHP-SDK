/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
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
