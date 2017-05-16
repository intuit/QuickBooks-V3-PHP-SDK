<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Data\IPPReferenceType;
use QuickBooksOnline\API\Data\IPPAttachableRef;
use QuickBooksOnline\API\Data\IPPAttachable;
use QuickBooksOnline\API\Facades\Bill;



// Prep Data Services
$dataService = DataService::Configure(array(
       'auth_mode' => 'oauth1',
         'consumerKey' => "lve2eZN6ZNBrjN0Wp26JVYJbsOOFbF",
         'consumerSecret' => "fUhPIeu6jrq1UmNGXSMsIsl0JaHuHzSkFf3tsmrW",
         'accessTokenKey' => "qye2etcpyquO3B1t8ydZJI8OTelqJCMiLZlY5LdX7qZunwoo",
         'accessTokenSecret' => "2lEUtSEIvXf64CEkMLaGDK5rCwaxE9UvfW1dYrrH",
         'QBORealmID' => "193514489870599",
         'baseUrl' => "https://qbonline-e2e.api.intuit.com/"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");

// Prepare entities for attachment upload
$imageBase64 = array();
$imageBase64['image/jpeg'] = "" .
    "/9j/4AAQSkZJRgABAQEAlgCWAAD/4ge4SUNDX1BST0ZJTEUAAQEAAAeoYXBwbAIgAABtbnRyUkdCIFhZ" .
    "WiAH2QACABkACwAaAAthY3NwQVBQTAAAAABhcHBsAAAAAAAAAAAAAAAAAAAAAAAA9tYAAQAAAADTLWFw" .
    "cGwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAtkZXNjAAABCAAA" .
    "AG9kc2NtAAABeAAABWxjcHJ0AAAG5AAAADh3dHB0AAAHHAAAABRyWFlaAAAHMAAAABRnWFlaAAAHRAAA" .
    "ABRiWFlaAAAHWAAAABRyVFJDAAAHbAAAAA5jaGFkAAAHfAAAACxiVFJDAAAHbAAAAA5nVFJDAAAHbAAA" .
    "AA5kZXNjAAAAAAAAABRHZW5lcmljIFJHQiBQcm9maWxlAAAAAAAAAAAAAAAUR2VuZXJpYyBSR0IgUHJv" .
    "ZmlsZQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAbWx1YwAA" .
    "AAAAAAAeAAAADHNrU0sAAAAoAAABeGhySFIAAAAoAAABoGNhRVMAAAAkAAAByHB0QlIAAAAmAAAB7HVr" .
    "VUEAAAAqAAACEmZyRlUAAAAoAAACPHpoVFcAAAAWAAACZGl0SVQAAAAoAAACem5iTk8AAAAmAAAComtv" .
    "S1IAAAAWAAACyGNzQ1oAAAAiAAAC3mhlSUwAAAAeAAADAGRlREUAAAAsAAADHmh1SFUAAAAoAAADSnN2" .
    "U0UAAAAmAAAConpoQ04AAAAWAAADcmphSlAAAAAaAAADiHJvUk8AAAAkAAADomVsR1IAAAAiAAADxnB0" .
    "UE8AAAAmAAAD6G5sTkwAAAAoAAAEDmVzRVMAAAAmAAAD6HRoVEgAAAAkAAAENnRyVFIAAAAiAAAEWmZp" .
    "RkkAAAAoAAAEfHBsUEwAAAAsAAAEpHJ1UlUAAAAiAAAE0GFyRUcAAAAmAAAE8mVuVVMAAAAmAAAFGGRh" .
    "REsAAAAuAAAFPgBWAWEAZQBvAGIAZQBjAG4A/QAgAFIARwBCACAAcAByAG8AZgBpAGwARwBlAG4AZQBy" .
    "AGkBDQBrAGkAIABSAEcAQgAgAHAAcgBvAGYAaQBsAFAAZQByAGYAaQBsACAAUgBHAEIAIABnAGUAbgDo" .
    "AHIAaQBjAFAAZQByAGYAaQBsACAAUgBHAEIAIABHAGUAbgDpAHIAaQBjAG8EFwQwBDMEMAQ7BEwEPQQ4" .
    "BDkAIAQ/BEAEPgREBDAEOQQ7ACAAUgBHAEIAUAByAG8AZgBpAGwAIABnAOkAbgDpAHIAaQBxAHUAZQAg" .
    "AFIAVgBCkBp1KAAgAFIARwBCACCCcl9pY8+P8ABQAHIAbwBmAGkAbABvACAAUgBHAEIAIABnAGUAbgBl" .
    "AHIAaQBjAG8ARwBlAG4AZQByAGkAcwBrACAAUgBHAEIALQBwAHIAbwBmAGkAbMd8vBgAIABSAEcAQgAg" .
    "1QS4XNMMx3wATwBiAGUAYwBuAP0AIABSAEcAQgAgAHAAcgBvAGYAaQBsBeQF6AXVBeQF2QXcACAAUgBH" .
    "AEIAIAXbBdwF3AXZAEEAbABsAGcAZQBtAGUAaQBuAGUAcwAgAFIARwBCAC0AUAByAG8AZgBpAGwAwQBs" .
    "AHQAYQBsAOEAbgBvAHMAIABSAEcAQgAgAHAAcgBvAGYAaQBsZm6QGgAgAFIARwBCACBjz4/wZYdO9k4A" .
    "giwAIABSAEcAQgAgMNcw7TDVMKEwpDDrAFAAcgBvAGYAaQBsACAAUgBHAEIAIABnAGUAbgBlAHIAaQBj" .
    "A5MDtQO9A7kDugPMACADwAPBA78DxgOvA7sAIABSAEcAQgBQAGUAcgBmAGkAbAAgAFIARwBCACAAZwBl" .
    "AG4A6QByAGkAYwBvAEEAbABnAGUAbQBlAGUAbgAgAFIARwBCAC0AcAByAG8AZgBpAGUAbA5CDhsOIw5E" .
    "Dh8OJQ5MACAAUgBHAEIAIA4XDjEOSA4nDkQOGwBHAGUAbgBlAGwAIABSAEcAQgAgAFAAcgBvAGYAaQBs" .
    "AGkAWQBsAGUAaQBuAGUAbgAgAFIARwBCAC0AcAByAG8AZgBpAGkAbABpAFUAbgBpAHcAZQByAHMAYQBs" .
    "AG4AeQAgAHAAcgBvAGYAaQBsACAAUgBHAEIEHgQxBEkEOAQ5ACAEPwRABD4ERAQ4BDsETAAgAFIARwBC" .
    "BkUGRAZBACAGKgY5BjEGSgZBACAAUgBHAEIAIAYnBkQGOQYnBkUARwBlAG4AZQByAGkAYwAgAFIARwBC" .
    "ACAAUAByAG8AZgBpAGwAZQBHAGUAbgBlAHIAZQBsACAAUgBHAEIALQBiAGUAcwBrAHIAaQB2AGUAbABz" .
    "AGV0ZXh0AAAAAENvcHlyaWdodCAyMDA3IEFwcGxlIEluYy4sIGFsbCByaWdodHMgcmVzZXJ2ZWQuAFhZ" .
    "WiAAAAAAAADzUgABAAAAARbPWFlaIAAAAAAAAHRNAAA97gAAA9BYWVogAAAAAAAAWnUAAKxzAAAXNFhZ" .
    "WiAAAAAAAAAoGgAAFZ8AALg2Y3VydgAAAAAAAAABAc0AAHNmMzIAAAAAAAEMQgAABd7///MmAAAHkgAA" .
    "/ZH///ui///9owAAA9wAAMBs/+EAgEV4aWYAAE1NACoAAAAIAAUBEgADAAAAAQABAAABGgAFAAAAAQAA" .
    "AEoBGwAFAAAAAQAAAFIBKAADAAAAAQACAACHaQAEAAAAAQAAAFoAAAAAAAA6mQAAAGQAADqZAAAAZAAC" .
    "oAIABAAAAAEAAAAuoAMABAAAAAEAAAAUAAAAAP/bAEMAAgEBAgEBAgIBAgICAgIDBQMDAwMDBgQEAwUH" .
    "BgcHBwYGBgcICwkHCAoIBgYJDQkKCwsMDAwHCQ0ODQwOCwwMC//bAEMBAgICAwIDBQMDBQsIBggLCwsL" .
    "CwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLC//AABEIABQALgMBIgAC" .
    "EQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0B" .
    "AgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVG" .
    "R0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3" .
    "uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAA" .
    "AAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGh" .
    "scEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1" .
    "dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri" .
    "4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APkb41eONYtfi94oSDVdRVF1a74FzJgfvn96j+Km" .
    "j+O/gj/wj3/C159Q0MeK9Et/EekmfU1IvdPuN/kzrtkO0N5b/K2GGOQKzvjnz8YPFX/YVvP/AEc9fePi" .
    "v9qXwn4K+Eut674A8S+Br3xl4e/Zd8MaZ4dF0LPUHtvENte3TtbwwThla8h3RuYipI+UspFfueIryw6p" .
    "8kOa+n5Ja62310Z+V4XDRxU5RlPl8z4O0S/8YeJfB+t+IfD1xrN7oPhpbZtV1GG7ZrXTxczeRb+bJvwD" .
    "LLlEAyWYHA4OK/hTxP4i8ceKdI0Xwrq91eanr13FY6fANS2fappZFjRVdnCgF2UFiQozkkDmv0r+KX7V" .
    "PhO/8JftJaX8I/HPwu0qXxf4c8C+JZIA1hDb63cpldfjtwI2WS7NvFGnkINyyMpXY7Fqq/GDUvhB4d+I" .
    "XxP17TPHvwc1nTfiB8a/h/4o0O10zVbW4lstChubNbxpoto+zxARztLHyAgZnADc8NPN5ydpUbXtbfqo" .
    "b6dOZ9vha8zu/smElpXXW+3eW2vku+5+fXjvw38RPhlZm58eRa7ptp/a97oCXT3m+3nv7Jtt3BDKkhWU" .
    "wtwzISgPG4mux/ZD8Y6tefEO++06nqL7dOkxm6k4/exf7VfRX/BRD9oTTfiz+xBaaD8NPGfgK803wz8X" .
    "vFf2nRLOWzjv30+XU5pNKntIUQSPbeU+8yxkKUK7i+AB8x/sc/8AJQ7/AP7Bz/8Ao2KuqlWnicLOdSKT" .
    "u1b0em/danFVpRw+IjCnK60d/X0O/wDil+zfoWofE7xJNcXOqb31W7JxJHj/AF7/APTOsH/hmPw//wA/" .
    "Gqf9/I//AI3RRXRTk+VamM4rmegv/DMfh/H/AB8ap/38j/8AjdB/Zj8Pn/l41Trn/WR9f+/dFFVzPuRZ" .
    "XEP7Mfh89bjVOP8AppFx/wCQ69I/Zf8A2d9F0z4hXP2S61Qb9Olzl4z0lh/6Z+9FFY4mT9lLU1oJc6P/" .
    "2Q==";

$sendMimeType = "image/jpeg";

// Create a new IPPBill
$billObj = Bill::create([
  "Line" =>[
          [
              "Id" =>"1",
              "Amount" => 200.00,
              "DetailType" => "AccountBasedExpenseLineDetail",
              "AccountBasedExpenseLineDetail"=>
              [
                  "AccountRef"=>
                  [
                      "value"=>"7"
                  ]
              ]
          ]
      ],
      "VendorRef"=>
      [
          "value"=>"56"
      ]
]);
if (!$billObj) {
    echo "Problem creating bill\n";
    exit();
}

// Create a new IPPAttachable
$randId = rand();
$entityRef = new IPPReferenceType(array('value'=>$billObj->Id, 'type'=>'Bill'));
$attachableRef = new IPPAttachableRef(array('EntityRef'=>$entityRef));
$objAttachable = new IPPAttachable();
$objAttachable->FileName = $randId.".jpg";
$objAttachable->AttachableRef = $attachableRef;
$objAttachable->Category = 'Image';
$objAttachable->Tag = 'Tag_' . $randId;

// Upload the attachment to the Bill
$resultObj = $dataService->Upload(base64_decode($imageBase64[$sendMimeType]),
                                  $objAttachable->FileName,
                                  $sendMimeType,
                                  $objAttachable);



//echoBase64("/your/file/here");
function echoBase64($filename)
{
    $contents = file_get_contents($filename);
    $base64_contents = base64_encode($contents);
    $base64_contents_split = str_split($base64_contents, 80);
    echo "\t\$imageBase64 = \"\" . \n";
    foreach ($base64_contents_split as $one_line) {
        echo "\t\t\"{$one_line}\" . \n";
    }
    echo "\t\t\"\";\n";
}


/*
Example output:

*/
