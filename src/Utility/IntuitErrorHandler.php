<?php
namespace QuickBooksOnline\API\Utility;

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
    public function HandleErrors($response)
    {
        // To handle plain text response
        if (!IsValidXml($response)) {
            return;
        }

        $responseXml = simplexml_load_string($response);
        IntuitErrorHandler::HandleErrorsXml($responseXml);
    }

    /**
     * Check the response for any errors it might indicate. Will throw an exception if API response indicates an error.
     * Will throw an exception if it has a problem determining success or error.
     * @param SimpleXMLElement responseXml
     */
    public function HandleErrorsXml($responseXml)
    {
        $errCodeNode = $responseXml->{UtilityConstants::ERRCODEXPATH};

        if ($errCodeNode == null) {
            return;
        }

        $errorCode;
        if ((int)$errCodeNode) {
            throw new IdsException('HandleErrors error code (UtilityConstants::ERRCODEXPATH): '.(int)$errCodeNode);
        }

        if ($errorCode == 0) {
            // 0 indicates success
            return;
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
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
