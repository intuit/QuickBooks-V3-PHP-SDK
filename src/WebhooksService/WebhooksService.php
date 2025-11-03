<?php

namespace QuickBooksOnline\API\WebhooksService;

use QuickBooksOnline\API\Utility\JsonValidator;
use QuickBooksOnline\API\Utility\ReflectionUtil;

class WebhooksService
{
    const WEBHOOKSWRAPPERNAME = "WebhooksEvent";
    const WEBHOOKSCLOUDEVENTSWRAPPERNAME = "WebhooksCloudEvent";

    /**
     * Convert the payLoad of webhook to object
     *
     * @param $payLoad
     *      The payload to be converted
     * @return object
     *      The deserialization format for the payload
     *
     */
    public static function getWebhooksEvent($payLoad)
    {
        JsonValidator::validate($payLoad);
        $string_arry = json_decode($payLoad, true);
        $obj = ReflectionUtil::constructObjectFromWebhooksArray($string_arry, WebhooksService::WEBHOOKSWRAPPERNAME);
        return $obj;
    }

    /**
     * Convert the CloudEvents payLoad of webhook to array of objects
     *
     * @param $payLoad
     *      The CloudEvents payload to be converted
     * @return array
     *      Array of WebhooksCloudEvent objects
     *
     */
    public static function getWebhooksCloudEvents($payLoad)
    {
        JsonValidator::validate($payLoad);
        $string_arry = json_decode($payLoad, true);
        
        $result = array();
        foreach ($string_arry as $eventData) {
            $obj = ReflectionUtil::constructObjectFromWebhooksArray($eventData, WebhooksService::WEBHOOKSCLOUDEVENTSWRAPPERNAME);
            if ($obj !== null) {
                $result[] = $obj;
            }
        }
        return $result;
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
    public static function verifyPayload($token, $payload, $intuitHeaderSignature)
    {
        $verifier = new TokenVerifier($token);
        return $verifier->verifyPayLoad($payload, $intuitHeaderSignature);
    }
}
