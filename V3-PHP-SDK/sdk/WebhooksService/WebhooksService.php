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