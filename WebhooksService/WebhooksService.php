/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php



require_once (PATH_SDK_ROOT . 'Utility/JsonValidator.php');
require_once (PATH_SDK_ROOT . 'Utility/ReflectionUtil.php');

require_once ("TokenVerifier.php");

class WebhooksService
{

    const WEBHOOKSWRAPPERNAME = "WebhooksEvent";

    /**
     * Convert the payLoad of webhook to object
     *
     * @param $payLoad
     *      The payload to be converted
     * @return object
     *      The deserialization format for the payload
     *
     */
    public static function getWebhooksEvent($payLoad){
        JsonValidator::validate($payLoad);
        $string_arry = json_decode($payLoad, true);
        $obj = ReflectionUtil::constructObjectFromWebhooksArray($string_arry, WebhooksService::WEBHOOKSWRAPPERNAME);
        return $obj;
    }

    /**
     * use Token to verifier the payload is sent from Intuit
     *
     * @param $token
     *      The webhook Token get from Intuit
     * @param $payload
     *      The payload for the webhook events
     * @param $intuitHeaderSignature
     *      The header signature
     * @return bool
     *      True if it is valid; otherwise return false;
     */
    public static function verifyPayload($token, $payload, $intuitHeaderSignature){
        $verifier = new TokenVerifier($token);
        return $verifier->verifyPayLoad($payload, $intuitHeaderSignature);
    }
}