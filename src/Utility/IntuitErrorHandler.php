<?php
namespace QuickBooksOnline\API\Utility;

use QuickBooksOnline\API\Exception\IdsException;

/**
 * Intuit Error Handler class.
 * Add future function here for handling exceptions @Hao
 */
class IntuitErrorHandler
{
    /**
     * Check the response for any errors it might indicate. Will throw an exception if API response indicates an error.
     * Will throw an exception if it has a problem determining success or error.
     * @param string response The API response to examine
     */
    public static function HandleErrors($response)
    {
        // To handle plain text response
        if (!self::IsValidXml($response)) {
            return;
        }

        $responseXml = simplexml_load_string($response);
        self::HandleErrorsXml($responseXml);
    }

    /**
     * Check the response for any errors it might indicate. Will throw an exception if API response indicates an error.
     * Will throw an exception if it has a problem determining success or error.
     * @param SimpleXMLElement responseXml
     */
    public static function HandleErrorsXml($responseXml)
    {
        $errCodeNode = $responseXml->{UtilityConstants::ERRCODEXPATH};

        if ($errCodeNode == null) {
            return;
        }

        if ((int)$errCodeNode) {
            throw new IdsException('HandleErrors error code (UtilityConstants::ERRCODEXPATH): '.(int)$errCodeNode);
        }

        $errTextNode = $responseXml->{UtilityConstants::ERRTEXTXPATH};
        if ($errTextNode == null) {
            throw new IdsException('HandleErrors error code (UtilityConstants::ERRTEXTXPATH): '.(int)$errCodeNode);
        }

        $errorText = (string)$errTextNode;
        $errDetailNode = $responseXml->{UtilityConstants::ERRDETAILXPATH};
        $errorDetail = $errDetailNode != null ? (string)$errDetailNode : null;

        if (!$errorDetail) {
            throw new IdsException('HandleErrors error code (UtilityConstants::ERRDETAILXPATH): '.(string)$errorDetail);
        }

        throw new IdsException('HandleErrors error code: '.$errorText);
    }


    /**
     * Validates the input string is a well formatted xml string
     * @param string inputString Input xml string
     * @return bool True if 'inputString' is a valid xml
     */
    public static function IsValidXml($inputString)
    {
        if (0!==strpos($inputString, '<')) {
            return false;
        }

        try {
            $doc = simplexml_load_string($inputString);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
