<?php

require('./config.php');

use com\mikebevz\xsd2php\Xsd2Php;
$xml = new Xsd2Php('IPP', './XSD/IntuitBaseTypes.xsd', true);
$xml->overrideAsSingleNamespace = 'http://schema.intuit.com/finance/v3';
$xml->saveClasses('./Data', true);
echo "\n";
