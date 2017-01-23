<?php

/**
 * Constants whose values do not change.
 */
class CoreConstants
{
	/**
	 * Slash character.
	 * @var string SLASH_CHAR
	 */
	const SLASH_CHAR = "/";

	/**
	 * The Intuit Services Version.
	 * @var string VERSION
	 */
	const VERSION = "v3";

	/**
	 * The Resource.
	 * @var string RESOURCE
	 */
	const RESOURCE = "resource";

	/**
	 * Content type: text/xml.
	 * @var string CONTENTTYPE_TEXTXML
	 */
	const CONTENTTYPE_TEXTXML = "text/xml";

	/**
	 * Content type: text/plain.
	 * @var string CONTENTTYPE_TEXTPLAIN
	 */
	const CONTENTTYPE_TEXTPLAIN = "text/plain";

	/**
	 * Content type: application/text.
	 * @var string CONTENTTYPE_APPLICATIONTEXT
	 */
	const CONTENTTYPE_APPLICATIONTEXT = "application/text";

	/**
	 * Content type: application/xml.
	 * @var string CONTENTTYPE_APPLICATIONXML
	 */
	const CONTENTTYPE_APPLICATIONXML = "application/xml";

	/**
	 * Content type: application/xml.
	 * @var string CONTENTTYPE_APPLICATIONJSON
	 */
	const CONTENTTYPE_APPLICATIONJSON = "application/json";

	/**
	 * Content type: application/x-www-form-urlencoded.
	 * @var string CONTENTTYPE_URLFORMENCODED
	 */
	const CONTENTTYPE_URLFORMENCODED = "application/x-www-form-urlencoded";

        	/**
	 * Content type: application/x-www-form-urlencoded.
	 * @var string CONTENTTYPE_URLFORMENCODED
	 */
	const CONTENTTYPE_OCTETSTREAM = "application/octet-stream";

        /**
	 * Content type: application/pdf.
	 * @var string CONTENTTYPE_APPLICATIONPDF
         */
        const CONTENTTYPE_APPLICATIONPDF = "application/pdf";

	/**
	 * The Base Url for QBD.
	 * @var string QBD_BASEURL
	 */
	const QBD_BASEURL = "https://quickbooks.api.intuit.com/";

	/**
	 * The Base Url for QBO.
	 * @var string QBO_BASEURL
	 */
	const QBO_BASEURL = "https://quickbooks.api.intuit.com/";

	/**
	 * Id Parameter Name.
	 * @var string Id
	 */
	const Id = "Id";

	/**
	 * Sync Token Parameter Name.
	 * @var string SYNC_TOKEN
	 */
	const SYNC_TOKEN = "SyncToken";

	/**
	 * Domain Parameter Name.
	 * @var string DOMAIN
	 */
	const DOMAIN = "domain";

	/**
	 * MetaData Parameter Name.
	 * @var string METADATA
	 */
	const METADATA = "MetaData";

	/**
	 * Sparse Parameter Name.
	 * @var string SPARSE
	 */
	const SPARSE = "sparse";

	/**
	 * Status Parameter Name.
	 * @var string STATUS
	 */
	const STATUS = "status";

	/**
	 * Id Domain Query Parameter.
	 * @var string ID_DOMAIN_QUERY
	 */
	const ID_DOMAIN_QUERY = "?idDomain=";

	/**
	 * Authorization String For Header.
	 * @var string AUTHORIZATIONSTRING_FORHEADER
	 */
	const AUTHORIZATIONSTRING_FORHEADER = "Authorization";

	/**
	 * Request File Name Format.
	 * @var string REQUESTFILENAME_FORMAT
	 */
	const REQUESTFILENAME_FORMAT = "{0}{1}Request-{2}.txt";

	/**
	 * Response File Name Format.
	 * @var string RESPONSEFILENAME_FORMAT
	 */
	const RESPONSEFILENAME_FORMAT = "{0}{1}Response-{2}.txt";

	/**
	 * Error Response File Name Format.
	 * @var string ERRORRESPONSEFILENAME_FORMAT
	 */
	const ERRORRESPONSEFILENAME_FORMAT = "{0}{1}Error-Response-{2}.txt";

	/**
	 * The Compression format of the request data.
	 * @var string CONTENTENCODING
	 */
	const CONTENTENCODING = "Content-Encoding";

	/**
	 * The Compression format of the response data.
	 * @var string ACCEPTENCODING
	 */
	const ACCEPTENCODING = "Accept-Encoding";

	/**
	 * The Request source header value.
	 * @var string REQUESTSOURCEHEADER
	 */
	const USERAGENT = "V3PHPSDK2.6.0";

        public static function getType($string, $return=1)
        {
            $parts = explode("/", $string);
            return array_key_exists($return, $parts) ? $parts[$return] : null;
        }

}
