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

require_once(PATH_SDK_ROOT . 'Core/CoreConstants.php');

/**
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
     
		$returnVal = NULL;
		if ($result && $result[0])
		{
			foreach($result[0]->attributes() as $attrName => $attrVal)
			{
                            switch($attrName) {
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
