<?php
namespace QuickBooksOnline\API\Utility;

/**
 * Class ReflectionUtil to convert an array to an WehbooksEvent Object
 */
class ReflectionUtil
{

    /**
     * Get all WebhooksService Class under WebhooksService directory
     *
     * Pre-assumption: the WebhooksService dir is at the top layer of the SDK class.
     *
     * @return array
     */
    public static function loadWebServicesClassAndReturnNames($dir = null)
    {
        if ($dir == null) {
            $dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . UtilityConstants::WEBHOOKSDIR;
        }

        $webhooksClassNames = array();

        foreach (glob("{$dir}/*.php") as $fileName) {
            require_once($fileName);
            //get class name
            $className = substr($fileName, strrpos($fileName, '/') + 1);
            //remove extension
            $classNameWithoutExtension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $className);
            array_push($webhooksClassNames, $classNameWithoutExtension);
        }
        return $webhooksClassNames;
    }

    /**
     * When given a WehbooksService name, check if the given class name is defined on the WehbooksService directory
     *
     * @param $className
     *      The object name that belongs to WebhooksService
     * @param null $classCollection
     *      Default to be null. User can choose to pass their own collection
     * @return null|string
     *      If the class name can be found in Webhooks Service, return the name; otherwise, return null.
     *
     */
    public static function isValidWebhooksClass($className, $classCollection = null)
    {
        if (!isset($classCollection)) {
            $classCollection = ReflectionUtil::loadWebServicesClassAndReturnNames();
        }

        if (!isset($className) || trim($className) === '') {
            return null;
        }

        $singlerClassName = ClassNamingUtil::singularize($className);
        $capitalFirstSinglerClassName = ucfirst($singlerClassName);

        foreach ($classCollection as $k => $v) {
            if (strcmp($capitalFirstSinglerClassName, $v) == 0) {
                return $capitalFirstSinglerClassName;
            }
        }

        return null;
    }

    /**
     *
     * Given the class name, find the setter method for the key.
     *
     * @param $object
     *      The class that contains the setter method
     * @param $key
     *      The name of the setter
     * @param $value
     *      The value to be assigned to the setter
     */
    public static function assignValue($object, $key, $value)
    {
        $setter = 'set' . ucfirst($key);
        if (method_exists($object, $setter)) {
            $object->$setter($value);
        } else {
            $object->__set($value);
        }
    }

    /**
     * Pre-assumption: the input array must be a map at the beginning, no matter it is at beginning or at a recursive call. Otherwise, the reflection class won't know
     * what the object name is for the list.
     *
     * @param $array
     *      The object in array format
     * @param $arrayContainerClassName
     *      The class that contains the array
     * @param null $classCollection
     *      A user defined class collection. Default is null and default use all WebhooksService classes
     * @return null
     */
    public static function constructObjectFromWebhooksArray($array, $arrayContainerClassName)
    {
        $clazz = ReflectionUtil::isValidWebhooksClass($arrayContainerClassName);
        if (!isset($clazz)) {
            return null;
        }
        $clazz = 'QuickBooksOnline\\API\\WebhooksService\\' . $clazz;
        $wrapObject = new $clazz();

        if (isset($array) && !empty($array)) {
            foreach ($array  as $key => $value) {
                if (is_array($value)) {
                    //Case 1: key is string, value is array and it is not associate Array
                    //create an array holder, loop through each element in the value, convert the array and put it
                    //in the list
                    if (!ArrayUtil::isAssociateArray($value)) {
                        $list = array();
                        foreach ($value as $index => $element) {
                            $obj = ReflectionUtil::constructObjectFromWebhooksArray($element, $key);
                            array_push($list, $obj);
                        }
                        ReflectionUtil::assignValue($wrapObject, $key, $list);
                    }
                    //Case 2: key is string, value is array and also it is associate array
                    //we then just pass the array to next recursive call
                    else {
                        $obj = ReflectionUtil::constructObjectFromWebhooksArray($value, $key);

                        ReflectionUtil::assignValue($wrapObject, $key, $obj);
                    }
                }
                //Case 3: key is string and value is String. Call the setter method for the key.
                else {
                    ReflectionUtil::assignValue($wrapObject, $key, $value);
                }
            }
        }

        return $wrapObject;
    }
}
