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

class JsonValidator
{
    /**
     *
     * Validate if a given string is a non-emtpy JSON format so we can convert it to an object array
     *
     * @param $string
     * @param bool $throwException
     *            flag : true throw an exception if the string is invalid JSON, false omit the exception
     * @return bool
     *          True if the string is a valid JSON; false otherwise
     */
    public static function validate($string, $throwException = true){
        if(!isset($string) || trim($string) === ''){
            if($throwException == true){
                throw new \InvalidArgumentException("Empty or null JSON String");
            }else{
                return false;
            }
        }

        @json_decode($string);
        if(json_last_error() != JSON_ERROR_NONE){
            if($throwException == true){
                throw new \InvalidArgumentException("Invalid JSON String");
            }

            return false;
        }

        return true;
    }
}