<?php

/**
* Base Urls for QBO, QBD and IPP
*/
class BaseUrl
{
	/**
	 * Gets or sets the url for QuickBooks Desktop Rest Service.
	 * @var string 
	 */
    public $Qbd;

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
	 * @param string $Qbd url for QuickBooks Desktop Rest Service
	 * @param string $Qbo url for QuickBooks Online Rest Service
	 * @param string $Ipp url for Platform Rest Service
	 */
    public function __construct($Qbd=NULL, $Qbo=NULL, $Ipp=NULL)
    {
    	$this->Qbd=$Qbd;
    	$this->Qbo=$Qbo;
    	$this->Ipp=$Ipp;
    }
}