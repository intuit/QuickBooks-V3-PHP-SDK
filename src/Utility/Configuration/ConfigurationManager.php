<?php
namespace QuickBooksOnline\API\Utility\Configuration;

use QuickBooksOnline\API\Core\CoreConstants;

/**
 *
 * THe file is only used when reading from App.config file. Which is supposed to used only for
 * testing. THe application level should use the bootstrap file sdk.config for everything.
 * This file will be removed soon,
 * @hao March.12th.2017
 *
 *
 *
 * This file is unique to the PHP SDK, it is designed to
 * handle configuration requests that are handled in a more
 * native manner in the .NET version of the SDK
 */
class ConfigurationManager
{
    private static function getSettignsFromFile()
    {
        $fileName = getcwd() . CoreConstants::SLASH_CHAR . "App.config";
        return simplexml_load_file($fileName);
    }

    private static function getSettings($xmlObj, $xpath, $name = null)
    {
        $result = $xmlObj->xpath($xpath);

        $returnVal = null;
        if ($result && $result[0]) {
            foreach ($result[0]->attributes() as $attrName => $attrVal) {
                switch ($attrName) {
                                case 'value': $returnVal = (string)$attrVal;
                                              break 2; // break switch and foreach

                                case $name:   $returnVal = (string)$attrVal;
                                              break 2; // break switch and foreach

                            }
            }
        }

        return $returnVal;
    }

        /**
     * App specific settings
     * @param string targetSetting
     */
    public static function AppSettings($targetSetting)
    {
        $xmlObj = self::getSettignsFromFile();
        return self::getSettings($xmlObj, '//appSettings/add[@key="'.$targetSetting.'"]');
    }

        /**
         * Get base url depends from the service
         */
        public static function BaseURLSettings($service)
        {
            $xmlObj = self::getSettignsFromFile();
            return self::getSettings($xmlObj, '//baseUrl', $service);
        }
}
