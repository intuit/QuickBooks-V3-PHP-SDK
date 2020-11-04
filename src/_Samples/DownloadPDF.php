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
  'auth_mode'       => 'oauth2',
  'ClientID'        => "ABF3UDW1eSZ6qWJwvb5CxnvDj8QBWL3PcAbgIwLZzgC1a3FJNI",
  'ClientSecret'    => "oC0XQ6dh5B3tgcygVr6CxVKuUIoofJYkK4aLtPLJ",
  'accessTokenKey'  => "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..K8T_xiMRXdyYeCr5Ozb4Dg.P8tXSMvh97iunPYXSIPW-jZqJ8DiCAI6OA66M_dsuP9Sel56jDP27NSzLyJzZyFMuOCwfstFMKQXvRd15IFhlP3U5wtGri5v9i3ddshqXXhbFYNzjh_rpPly331Y26p1IgPSQIKktzWBiZtvbri0NHjKNPjIDCfjcYRogbtDGrIzVvKpuJTWNWnT0v0T7UklrQEIJtYoIP0tX-8Ee_VR5BtZAO_LwkDxyI_4xF3ELmbt2fGMUHmZDzDTL4jAF-dntKJC3bdiI0CCa6amxUIk8QLmfcz_O5ZuZ648MY9DZ_PYcyoIMUKbOuR6QQn8nYs9ulmPpw_1uB1bNlRQJ40N-neAxZijrhCFRQXEiTXUXAZYD-tZg0-ZIEhWyio_Uiia9xEoePmEGlhBMSRss4jfWO_HlkMWMV76d_eca5EQOUVUJfLYPN9ViJQL9roUT1LA6vGg0AVqnDjfHWwVKMuZQD0Ig9h1x-W-ux8mn-SdFU4-vN_skWnKdFziIH4TjnLkowT6z__xoTLTFo6zzLqR63MiuXkUZ8IMh8XrcsxTBpCn2cOwie-tZg_zJ17tkJNvTN9yrRscWIpWOGWm_PL99Y7zQueoh3WFb-HdGsa5idpVh7vzFNuUxi9_pwRY4Q3hH-Ax8KcMc32vhCAejCxPydm7Nb_nq5WCkcd5iHlvidH8is8Dn-gQXS4aGA3pT-FLJUds8YzPZFrxpJPqhlpXAnTHHG4CoGbfDCc3W7HujAg.uJ5qC1bJJ8o5lOnVK-zEsA",
  'refreshTokenKey' => 'BB11611988511dHWGjnvyqEwXkAu6VfuBDvQ6QHde7Dpr0bFGj',
  'QBORealmID'      => "4620816365006687740",
  'baseUrl'         => "development"
));

$invoice = $dataService->FindById("Invoice", "198");

$pdfContent = $dataService->DownloadPDF($invoice, null, true);
echo $pdfContent;
/*
Example output:

*/
