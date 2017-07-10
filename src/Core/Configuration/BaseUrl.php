<?php
namespace QuickBooksOnline\API\Core\Configuration;

use QuickBooksOnline\API\Core\CoreConstants;


/**
* Base Urls for QBO, QBD and IPP
* -----------------
* Remove QBD part from this and the sdk.config File
* Feb.7th.2017 @Hao
* -----------------
*/
class BaseUrl
{
    /**
     * Gets or sets the url for QuickBooks Online Rest Service.
     * @var string
     */
    public $Qbo;

    /**
     * Gets or sets the url for Platform Rest Service.
     * @var string
     */
    public $Ipp;

    /**
     * Initializes a new instance of the BaseUrl class.
     *
     * @param string $Qbo url for QuickBooks Online Rest Service
     * @param string $Ipp url for Platform Rest Service
     */
    public function __construct($Qbo=null, $Ipp=null)
    {
        $this->Qbo=$Qbo;
        if(isset($Ipp))
        {
          $this->Ipp = $Ipp;
        }else {
          $this->Ipp =  CoreConstants::IPP_BASEURL;
        }
    }
}
