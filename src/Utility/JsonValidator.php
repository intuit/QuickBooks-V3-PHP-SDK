<?php
namespace QuickBooksOnline\API\Utility;

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
    public static function validate($string, $throwException = true)
    {
        if (!isset($string) || trim($string) === '') {
            if ($throwException == true) {
                throw new \InvalidArgumentException("Empty or null JSON String");
            } else {
                return false;
            }
        }

        @json_decode($string);
        if (json_last_error() != JSON_ERROR_NONE) {
            if ($throwException == true) {
                throw new \InvalidArgumentException("Invalid JSON String");
            }

            return false;
        }

        return true;
    }
}
