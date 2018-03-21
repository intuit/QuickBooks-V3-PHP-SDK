<?php
namespace QuickBooksOnline\API\Utility;

/**
 * Array Utility class for testing and converting arrays
 *
 */
class ArrayUtil
{
    /**
     * Test if an array is an associate array
     *
     * @param array $arr
     * @return true if $arr is an associative array
     */
    public static function isAssociateArray(array $arr)
    {
        if (!empty($arr)) {
            foreach ($arr as $k => $v) {
                if (is_int($k)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}
