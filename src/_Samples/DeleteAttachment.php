<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Purchase;
use QuickBooksOnline\API\Data\IPPAttachable;
use QuickBooksOnline\API\QueryFilter\QueryMessage;
use QuickBooksOnline\API\ReportService\ReportService;
use QuickBooksOnline\API\ReportService\ReportName;


// Prep Data Services
$dataService = DataService::Configure(array(
    'auth_mode' => 'oauth2',
    'ClientID' => "Q0fXL014zAv3wzmlhwXMEHTrKepfAshCRjztEu58ZokzCD5T7D",
    'ClientSecret' => "stfnZfuSZUDay6cJSWtvQ9HkWiKFbcI9YuBTET5P",
    'accessTokenKey' =>
    'eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0.._xI0QUBFRTZIKwo80i88Hw.UClChozybav7T2Uqb9acWL3uQLxtrGHzNILhQEH9FGQ9hkhxyFyV1RklFXOPjtbwUE2NccSFveAc7fBlMauSFniGG-5-H8IsnFhA2Vl3klcHfE1k_7loeaMC105pbzP-g5WDQ1-SNvQK8dDCdFKNOOYvHDHY1slz6OGkAvQj6qUwux_CJGp2UmJu9kyfygY2tcpLjfnGfY_MEE3et31m3wN8PBD-3Fmjn2OxG8aeBKmYjz4uvZSwYLifO3bbmoOyHo1tao2KcUDO-EKmPv9SlVjpZa8h6_Q9yLn-PzCs7LcwfW3YpkbClfTdqtCrAdPYHcc6ef66aC3XYmrkK7xn9dWak2RDS5hsa4j767mWbG_ZiOgH7iFDya2goUCMiO3WireEcbGTnNlrJpDYlq5am_LG14yonwINEn2tMqp3usjPiEGxTNFqktpG3Yc56WV3mWu1C5uUZ0Tha-pFZyu9Tiye-sCq97gtFHDeanUhFMlfYU-akzqETclbKs3KpSCGjpEFK_Lr3JjvXSNOJ9h2AGX51tj6xkaW7mLUtTaqdnEX1qZR7PKPVuzCJfnxvXE78TzrxtcugHTJN6MGHIwDZ4hR6tZFkh6fu7W3Mu5rmvCXCJOa05abrPf719iyEGQo416dTP3LKxzTQk0qoHxys6C6XsfUuriHD6C_xmuWHGQp10EM8lwWFfsCaLgGFq57.SgN8A1ivxRWghJMd2-BVYg',
    'refreshTokenKey' => "L011529104721Bb4GIrEKlXQ03Zw8pyGAHSsVxUt3prTKiNoVO",
    'QBORealmID' => "193514611894164",
    'baseUrl' => "Development"
));

$dataService->setLogLocation("/Users/hlu2/Desktop/newFolderForLog");
$serviceContext = $dataService->getServiceContext();
$dataService->throwExceptionOnError(true);

$queryString = "select Id from attachable where AttachableRef.EntityRef.Type = 'invoice' and AttachableRef.EntityRef.value = '178'";
$entities = $dataService->Query($queryString);
echo "We have found: " . sizeof($entities) . "\n";

foreach($entities as $oneEntity){
    $result = $dataService->Delete($oneEntity);
    echo "The Id we deleted are: " . $result->Id . "\n";
}
