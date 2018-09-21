<?php

require('./config.php');

use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\Xsd2Php;

function replace_string_in_file($filename, $string_to_replace, $replace_with){
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
}

$xml = new Xsd2Php('IPP', './XSD/Finance.xsd', true);
$xml->overrideAsSingleNamespace = 'http://schema.intuit.com/finance/v3';
$xml->saveClasses('./Data', true);
foreach (scandir('./Data') as $file) {
    if ('.' === $file) continue;
    if ('..' === $file) continue;
    
    replace_string_in_file('./Data/' . $file, '@var \IPP', '@var IPP');
    replace_string_in_file('./Data/' . $file, '@var IntuitObject', '@var IPPIntuitEntity');
    replace_string_in_file('./Data/' . $file, '@var id', '@var string');
    replace_string_in_file('./Data/' . $file, '@var EntityStatusEnum[]', '@var IPPEntityStatusEnum[]');
}
echo "\n";

