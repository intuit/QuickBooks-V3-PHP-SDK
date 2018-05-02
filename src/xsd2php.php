<?php

require('./config.php');

use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\Xsd2Php;
$xml = new Xsd2Php('IPP', './XSD/Finance.xsd', true);
$xml->overrideAsSingleNamespace = 'http://schema.intuit.com/finance/v3';
$xml->saveClasses('./Data', true);
echo "\n";
