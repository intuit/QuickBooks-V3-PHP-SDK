<?php
//Replace the line with require "vendor/autoload.php" if you are using the Samples from outside of _Samples folder
include('../config.php');

use QuickBooksOnline\API\Core\ServiceContext;
use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\PlatformService\PlatformService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;


$dataService = DataService::Configure(array(
  'auth_mode' => 'oauth2',
  'ClientID' => "L0I9uqpOVAXN0MKrK15dCHLWqqfvWzvFS5S0VnKezX0cDbsLlI",
  'ClientSecret' => "qJEjqG3wyzOFvl9WhwSnskJYHWoFlvID7k1iF1as"
));


$OAuth2LoginHelper = $dataService->getOAuth2LoginHelper();

$accessToken = "eyJlbmMiOiJBMTI4Q0JDLUhTMjU2IiwiYWxnIjoiZGlyIn0..RbnW7qym6u9_UG8stuA39Q.8x06muf0IlvmvPvaT0bVQTBEK-M7GsuzzmLWbNdb88DtjOBPU3SXPukSqvwmZgrnoNYAuOfDIv4MV7EBCAgaXHYP_QZeSOF8PZogoc2ODlAypzo77-_CJhVAVfaSs8jaFix5huatX6VPBIXvCVWUwvY_Y9SObcGjFkv4s_7kUyL5_V3tmTHV0255cKfx71v13mTmgPbZp9Z3MLpmZix5RvR4FjNuE33fm5MbVOQdQNQwPCqxYPnyq02qVTAiK2d3jq7l5HsEJa5izCttsa9NeCVlAp9f_7CGPy_RFLlqbiVq74vX-ML1EXpbHOENu3EJiFShVbqzpVn-vudfpGc4_R_x-Uw_qze5_u9JiLi5fQi0Tfy8ylw0THVkTKHVsYs_1_RWnrKZxPML0dCPS2dzJxUWg_K_KrzMGNnnYW8ucWMpoqC1VeeLVl5XbXFdsQpMy9iU77P7-8MC8K7fkxC30m1WXlgkokblFRkMcR6LVmggP5Zlnc0Uh56IvAxTo1GX2NmHx-c5PwXWE3vITYRgM0O1yEcn3CiC_6qkVsYWvl88_eX1FJAd5sjvKrkRSsovh3799NkdJOg_H6nfJlOmEyyURSz508dq_g06k0ewMUP6MREvrwQ3q51DEHM3GInthhj2kSPuV3VIwALmJGw_6aN25A3Cd4VaauCIBNL6Whv1cBsu8OYTeg2st7fr00ekck50tTjSocY7UIs0wNDgiWLYmPF27nPKZnhY6wGk3FIf5ZmaYm22E0OAFt6LxzC4-hzjpAj4g5jdOPTtLf90efQmygpfdih1wXhP3dD_xP4.LkEAdr9jgH6ccu_8E83mwA";


$myarray = $OAuth2LoginHelper->getUserInfo($accessToken);
echo "the given name is:" . $myarray['givenName'] . "\n";
echo "the family name is:" . $myarray['familyName'] . "\n";
echo "the Email is:" . $myarray['email'] . "\n";

?>
