<?php
namespace QuickBooksOnline\API\Core;

/**
 * Constants whose values do not change.
 */
class CoreConstants
{
    //Set the default minor version
    const DEFAULT_SDK_MINOR_VERSION = "59";
    const DEFAULT_LOGGINGLOCATION = "/tmp/IdsLogs";

    const PHP_CLASS_PREFIX = 'IPP';
    /*
     * All content writer strategy we support. Append this lists with new strategies
     */
    const CONTENTWRITER_STRATEGIES = array('file','handler','export');

    /*
     * Specific file strategy that we used for Content Writter
     */
    const FILE_STRATEGY    = "file";

    /*
     * Specific file strategy that we used for Content Writter
     */
    const HANDLER_STRATEGY = "handler";

    /*
     * Specific file strategy that we used for Content Writter
     */
    const EXPORT_STRATEGY  = "export";

    /**
     * The http client name for curl
     */
    const CLIENT_CURL = 'curl';

    /**
     * The standard name for guzzle.
     */
    const CLIENT_GUZZLE = 'guzzle';

    /**
     * The full name for guzzle
     */
    const CLIENT_GUZZLE_FULL = 'guzzlehttp';

    /**
     * No compression.
     * @var int None
     */
    const DataCompressionFormat_None = 0;

    /**
     * GZip compression.
     * @var int GZip
     */
    const DataCompressionFormat_GZip = 1;

    /**
     * Deflate compression.
     * @var int Deflate
     */
    const DataCompressionFormat_Deflate = 2;

    /**
     * Current QuickBooks Namespace for PHP SDK
     * @var int Deflate
     */
    const NAMEPSACE_DATA_PREFIX = 'QuickBooksOnline\\API\\Data\\';

    /**
     * OAuth 1 Mode constant.
     * @var int Deflate
     */
    const OAUTH1 = "oauth1";

    /**
     * OAuth 2 Mode constant.
     * @var int Deflate
     */
    const OAUTH2 = "oauth2";

    /**
    * HTTP GET METHOD
    * @var
    */
    const HTTP_GET = "GET";

    /**
    * HTTP POST METHOD
    * @var
    */
    const HTTP_POST = "POST";


    /**
     * QuickBooks Online Data through IDS.
     * @var string QBO
     */
    const IntuitServicesTypeQBO = "QBO";


    /**
     * Intuit Platform services.
     * @var string IPP
     */
    const IntuitServicesTypeIPP = "IPP";

    /**
     * None service type.
     * @var string None
     */
    const IntuitServicesTypeNone = "None";

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
     * The Content Type String.
     * @var string CONTENT_TYPE
     */
    const CONTENT_TYPE = "Content-Type";

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
     * Content type: application/xml;charset=UTF-8.
     * @var string CONTENTTYPE_APPLICATIONXML_WITH_CHARSET
     */
    const CONTENTTYPE_APPLICATIONXML_WITH_CHARSET = "application/xml;charset=UTF-8";

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
     * The Base Url for QBO.
     * @var string QBO_BASEURL
     */
    const QBO_BASEURL = "https://quickbooks.api.intuit.com/";
    const PRODUCTION_QBO = "Production";


    const IPP_BASEURL = "https://appcenter.intuit.com/api/";

    const DEVELOPMENT_SANDBOX = "Development";
    const SANDBOX_DEVELOPMENT = "https://sandbox-quickbooks.api.intuit.com";

    /**
     * Id Parameter Name.
     * @var string Id
     */
    const Id = "Id";

    const PAYMENTCLASSNAME = ["payment", "salesreceipt"];
    const VOID_QUERYPARAMETER_GENERAL = '?operation=void';
    const VOID_QUERYPARAMETER_PAYMENT = '?operation=update&include=void';

    /**
     * Intuit tid
     * @var string
     */
    const INTUIT_TID = "intuit_tid";

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
    const USERAGENT = "V3PHPSDK6.0.1";

    public static function getType($string, $return=1)
    {
        $parts = explode("/", $string);
        return array_key_exists($return, $parts) ? $parts[$return] : null;
    }

    /**
        * Returns current rules for what operation is supported and what is not for QuickBooks Online API entity
        * @return array
     */
    public static function getQuickBooksOnlineAPIEntityRules()
    {
        return
                         array(
                                    '*'               => array(
                                                                "DownloadPDF" => false,
                                                                "jsonOnly" => false,
                                                                "SendEmail"=> false),
                                    "IPPTaxService"   => array( '*' => false,
                                                                'Add' => true,
                                                                'jsonOnly' => true),
                                    "IPPSalesReceipt"  => array( "DownloadPDF" => true, "SendEmail" => true ),
                                    "IPPInvoice"       => array( "DownloadPDF" => true, "SendEmail" => true  ),
                                    "IPPEstimate"      => array( "DownloadPDF" => true, "SendEmail" => true  ),
                                    "IPPCreditMemo"    => array( "DownloadPDF" => true, "SendEmail" => true  ),
                                    "IPPRefundReceipt" => array( "DownloadPDF" => true, "SendEmail" => true  ),
                                    "IPPPurchaseOrder" => array( "DownloadPDF" => true, "SendEmail" => true  ),
                                    "IPPPayment"       => array( "DownloadPDF" => true, "SendEmail" => true  ),
                            );
    }

    /**
     * A helper method to get Access Token Key. People may have a typo on the key name
     * @param Array $settings     The array contains all the key values
     * @return String | null      The access token developer provided
     */
    public static function getAccessTokenFromArray(array $settings){
        if(array_key_exists('accessTokenKey', $settings)){
            return $settings['accessTokenKey'];
        }else if(array_key_exists('accessToken', $settings)){
            return $settings['accessToken'];
        } else if(array_key_exists('AccessToken', $settings)){
            return $settings['AccessToken'];
        } else{
            return null;
        }
    }

    /**
     * A helper method to get Refresh Token Key. People may have a typo on the key name
     * @param Array $settings     The array contains all the key values
     * @return String | null      The refresh token developer provided
     */
    public static function getRefreshTokenFromArray(array $settings){
        if(array_key_exists('refreshTokenKey', $settings)){
            return $settings['refreshTokenKey'];
        }else if(array_key_exists('refreshToken', $settings)){
            return $settings['refreshToken'];
        } else if(array_key_exists('RefreshToken', $settings)){
            return $settings['RefreshToken'];
        } else{
            return null;
        }
    }

    /**
     * A helper method to get redirect URL. People may have a typo on the key name
     * @param Array $settings     The array contains all the key values
     * @return String | null      The redirect url developer provide
     */
    public static function getRedirectURL(array $settings){
        if(array_key_exists('redirectURL', $settings)){
            return $settings['redirectURL'];
        }else if(array_key_exists('RedirectUrl', $settings)){
            return $settings['RedirectUrl'];
        } else if(array_key_exists('redirecturl', $settings)){
            return $settings['redirecturl'];
        } else if(array_key_exists('redirectUrl', $settings)){
            return $settings['redirectUrl'];
        } else if(array_key_exists('RedirectURL', $settings)){
            return $settings['RedirectURL'];
        } else if(array_key_exists('redirectURI', $settings)){
            return $settings['redirectURI'];
        }else if(array_key_exists('RedirectUri', $settings)){
            return $settings['RedirectUri'];
        } else if(array_key_exists('redirecturi', $settings)){
            return $settings['redirecturl'];
        } else if(array_key_exists('redirectUri', $settings)){
            return $settings['redirectUrl'];
        } else if(array_key_exists('RedirectURI', $settings)){
            return $settings['RedirectURI'];
        }
        else{
            return null;
        }
    }

    //--------------------------------------------------------------------------------------------------
    //OAuth 2
    const OAUTH2_TOKEN_ENDPOINT_URL = "https://oauth.platform.intuit.com/oauth2/v1/tokens/bearer";
    const OAUTH2_AUTHORIZATION_REQUEST_URL = "https://appcenter.intuit.com/connect/oauth2";
    const REVOCATION_ENDPONT = "https://developer.api.intuit.com/v2/oauth2/tokens/revoke";
    const OAUTH2_REFRESH_GRANTYPE = "refresh_token";
    const OAUTH2_AUTHORIZATION_TYPE = "Basic ";
    const EXPIRES_IN = "expires_in";
    const X_REFRESH_TOKEN_EXPIRES_IN = "x_refresh_token_expires_in";
    const ACCESS_TOKEN = "access_token";

    public static function getCertPath(){
        return dirname(__FILE__) . "/OAuth/OAuth2/certs/cacert.pem"; //Pem certification Key Path
    }

    //AutoLoader Settings
    const USE_AUTOLOADER = true;
}
