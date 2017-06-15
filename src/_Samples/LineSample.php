<?php
//Replace the line with:
//require "vendor/autoload.php"
//if you are using the Samples from outside of _Samples folder from Composer
include('../config.php');

use QuickBooksOnline\API\Facades\Line;


$lineArray = array();
// create three Lines
$i = 0;
for($i = 1; $i<= 3; $i ++){
   $LineObj = Line::create([
       "Id" => $i,
       "LineNum" => $i,
       "Description" => "Pest Control Services",
       "Amount" => 35.0,
       "DetailType" => "SalesItemLineDetail",
       "SalesItemLineDetail" => [
           "ItemRef" => [
               "value" => "1",
               "name" => "Pest Control"
           ],
           "UnitPrice" => 35,
           "Qty" => 1,
           "TaxCodeRef" => [
               "value" => "NON"
           ]
       ]
   ]);
   $lineArray[] = $LineObj;
}

var_dump($lineArray);
