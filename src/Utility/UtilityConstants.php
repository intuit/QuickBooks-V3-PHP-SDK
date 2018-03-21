<?php
namespace QuickBooksOnline\API\Utility;

/**
 * Constants whose values do not change.
 */
class UtilityConstants
{
    /**
     * batch response has single entity
     */
    const Entity = 1;

    /**
     * batch response has more than one enitity.
     */
    const Query = 2;

    /**
     * batch response has exception.
     */
    const Exception = 3;
    /**
     * XPath for errcode tag.
     * @var string ERRCODEXPATH
     */
    const ERRCODEXPATH = "//errcode";

    /**
     * XPath for errtext tag.
     * @var string ERRTEXTXPATH
     */
    const ERRTEXTXPATH = "//errtext";

    /**
     * XPath for errdetail tag.
     * @var string ERRDETAILXPATH
     */
    const ERRDETAILXPATH = "//errdetail";

    /**
     * QDBAPI root element.
     * @var string QDBAPI
     */
    const QDBAPI = "qdbapi";

    /**
     * Encoding attribute.
     * @var string ENCODINGATTR
     */
    const ENCODINGATTR = "encoding";

    /**
     * Encoding attribute value.
     * @var string ENCODINGATTRVALUE
     */
    const ENCODINGATTRVALUE = "utf-8";

    /**
     * UDATA tag.
     * @var string UDATA
     */
    const UDATA = "udata";

     /**
     * WehbooksService Path
     */
    const WEBHOOKSDIR = "WebhooksService";
}
