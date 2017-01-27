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

/**
 * Constants whose values do not change.
 */
class UtilityConstants
{
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
