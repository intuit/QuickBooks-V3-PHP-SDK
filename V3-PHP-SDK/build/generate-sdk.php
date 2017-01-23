<?php

/**
 * Build script to create Plain Old PHP Objects from IPP v3 XSDs
 * 
 * This file relies on the externally developed XSD2PHP library,
 * with Intuit-specific modifications, to create POPO objects for
 * the IPP v3 PHP SDK, based on XSD inputs.  Invoke this file
 * via 'php generate-sdk.php'
 *
 * @author Intuit Partner Platform Team
 * @version 1.0
 */

// Rely on XSD2PHP library developed externally
define('XSD_GEN_PATH',      '../sdk/XSD2PHP/src/com/mikebevz/xsd2php/');
require_once(XSD_GEN_PATH . 'Xsd2Php.php');

// Folders and other predefined values
define('XSD_INPUT_PATH',    '../schemas/');
define('POPO_CLASS_PREFIX', 'IPP');
define('NAMESPACE_DEFAULT', 'http://schema.intuit.com/finance/v3');

$popoPath = $argv[1]; // path to target
$xsdFile  = $argv[2]; // schema file (XSD) which will be used as source
if(!is_readable(XSD_INPUT_PATH . $xsdFile)) {
    die("File " . XSD_INPUT_PATH . $xsdFile . " is not readable.");
}

// Generate Plain Old PHP Objects/Classes (POPO) based on XSD input
$xsd2php = new com\mikebevz\xsd2php\Xsd2Php(POPO_CLASS_PREFIX, XSD_INPUT_PATH . $xsdFile);
$xsd2php->overrideAsSingleNamespace=NAMESPACE_DEFAULT;
$xsd2php->saveClasses($popoPath, true);
