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
 * This file allows custom configuration of paths for XSD2PHP dependencies and
 * POPO classes.  Rarely necessary, but possible.
 *
 * @author Intuit Partner Platform Team
 * @version 1.0
 */

// Determine parent path for SDK
$sdkDir = __DIR__ . DIRECTORY_SEPARATOR;

if (!defined('PATH_SDK_ROOT'))
	define('PATH_SDK_ROOT', $sdkDir);

// Specify POPO class path; typically a direct child of the SDK path
if (!defined('POPO_CLASS_PATH'))
	define('POPO_CLASS_PATH', $sdkDir . 'Data' . DIRECTORY_SEPARATOR);

// Include XSD2PHP dependencies for marshalling and unmarshalling
use com\mikebevz\xsd2php;
require_once(PATH_SDK_ROOT . 'XSD2PHP/src/com/mikebevz/xsd2php/Php2Xml.php');
require_once(PATH_SDK_ROOT . 'XSD2PHP/src/com/mikebevz/xsd2php/Bind.php');

// Includes all POPO classes; these are the source, dest, or both of the marshalling
set_include_path(get_include_path() . PATH_SEPARATOR . POPO_CLASS_PATH);
foreach (glob(POPO_CLASS_PATH.'/*.php') as $filename)
    require_once($filename);


// Specify the prefix pre-pended to POPO class names.  If you modify this value, you
// also need to rebuild the POPO classes, with the same prefix
if (!defined('PHP_CLASS_PREFIX'))
	define('PHP_CLASS_PREFIX','IPP');
