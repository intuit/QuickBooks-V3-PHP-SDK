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
