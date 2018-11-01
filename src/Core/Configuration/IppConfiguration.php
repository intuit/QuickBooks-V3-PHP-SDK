<?php
namespace QuickBooksOnline\API\Core\Configuration;

/**
 * This file contains Ipp Configuration
 */
class IppConfiguration
{
    /**
     * Gets or sets the Logger mechanism.
     * @var Logger
     */
    public $Logger;

    /**
     * Gets or sets the Security mechanism like OAuth, Cookie.
     * @var RequestValidator or OAuth2AccessToken
     */
    public $Security;

    /**
     * Gets or sets the Message settings like Compression, Serialiation.
     * @var Message
     */
    public $Message;

    /**
     * Gets or sets the Retry Policy used to retry service calls when Retry-able Exceptions are generated.
     * @var IntuitRetryPolicy
     */
    public $RetryPolicy;

    /**
     * Gets or sets the Base Urls like Pre-Production url's.
     * @var BaseUrl
     */
    public $BaseUrl;

    /**
     * Provide configuration for ContentWriter
     * @var ContentWriterSettings
     */
    public $ContentWriter;

    /**
     * Gets or sets global or entity or operation level execution rights
     * @var OperationControlList
     */
    public $OpControlList;

    /**
     * Contains value for minor version
     * @var Integer
     */
    public $minorVersion;

    /**
     * Contains value for SSL check
     * @var Boolean
     */
    public $SSLCheckStatus;

    /**
    * Contains the RealmID associated with the Compnay
    * @var string
    */
    public $RealmID;

    /**
    * Specify if it is OAuth 1 or OAuth 2
    * @var string
    *       The value can be either CoreConstants:OAUTH1Mode or CoreConstants:OAUTH2Mode
    */
    public $OAuthMode;
}
