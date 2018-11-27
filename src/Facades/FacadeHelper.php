<?php

namespace QuickBooksOnline\API\Facades;

use QuickBooksOnline\API\Data\IPPReferenceType;
use QuickBooksOnline\API\Data\IPPid;
use QuickBooksOnline\API\Data\IPPBillableStatusEnum;
use QuickBooksOnline\API\Data\IPPTaxApplicableOnEnum;
use QuickBooksOnline\API\Data\IPPPostingTypeEnum;
use QuickBooksOnline\API\Data\IPPLinkedTxn;
use QuickBooksOnline\API\Data\IPPLine;
use QuickBooksOnline\API\Data\IPPMarkupInfo;
use QuickBooksOnline\API\Data\IPPLineDetailTypeEnum;
use QuickBooksOnline\API\Facades\Common\LineDetailFacade;
use QuickBooksOnline\API\Exception\SdkException;


use QuickBooksOnline\API\Core\CoreConstants;

/**
 * Helper class for deserialize common Complicate Object Type to Object
 * @author Hao
 */
class FacadeHelper{
   /**
    * A helper reflection class to assign object to Target Object
    */
   public static function reflectArrayToObject($classNameOrKeyName, $data, $throwException = TRUE) {
     if(!isset($classNameOrKeyName)){ throw new \Exception("The Class Name or Key Name cannot be NULL when generating Objects.");}
     if(!isset($data) || empty($data)){ throw new \Exception("The passed data cannot be NULL.");}
     if(is_object($data)){
       if(!FacadeHelper::checkIfTheObjectIsAnInstanceOfTheClass($classNameOrKeyName,$data)){
         throw new \Exception("The assigned object is not an instance of required object:{" . $classNameOrKeyName . "}.");
       }else{
         return $data;
       }
     }
     //Get reflection class of FacadeHelper
     $trimedData = FacadeHelper::trimSpacesForArrayKeys($data);
     //Any key in the Ignored List will not be processed
     $IgnoredList = FacadeClassMapper::IgnoredComplexTypeNameEntity();
     //Intuit does not name every Key with its corresponding class as IPP . $key; for some classes, the IPP . $key was not a class name. Those
     //type will located at the Mapper as an array
     $ObjectMap = FacadeClassMapper::classMethodToList();

     //If the key is in complexList
     if(FacadeHelper::isKeyInComplexList($classNameOrKeyName)){
         $methodFound = FacadeHelper::isKeyInComplexList($classNameOrKeyName);
         $createdObj = FacadeHelper::getComplexListObject($methodFound, $classNameOrKeyName, $trimedData);
         return $createdObj;
     } else if(FacadeHelper::isKeyEnumType($classNameOrKeyName)){
         $enumTypeClassName = FacadeHelper::isKeyEnumType($classNameOrKeyName);
         $createdObj = FacadeHelper::getEnumType($enumTypeClassName, $trimedData);
         return $createdObj;
     }
     else{
         //The key can be constructed with an IPPObject
         $clazz = FacadeHelper::decorateKeyWithNameSpaceAndPrefix($classNameOrKeyName);
         if(class_exists($clazz)){
            $currentObj = new $clazz();
            foreach($trimedData as $key => $val){
                if(is_array($val)){
                    if (FacadeHelper::isAssociateArray($val)){
                       //Key value pair. The value can be another array
                       //For example, SalesItemLineDetail as $key and
                       //          {
                       //  "ItemRef": {
                       //      "value": "14",
                       //      "name": "Sod"
                       //  },
                       //  "Qty": 0,
                       //  "TaxCodeRef": {
                       //      "value": "TAX"
                       //  }
                       // }as $val
                       $obj = FacadeHelper::reflectArrayToObject($key, $val, $throwException);
                       FacadeHelper::assignValue($currentObj, $key, $obj);
                    } else if(FacadeHelper::isArrayOfObj($val)){
                         // Array of LineItem object, for example
                         foreach($val as $valobj){
                            if(!FacadeHelper::checkIfTheObjectIsAnInstanceOfTheClass($key,$valobj)){
                              throw new \Exception("The assigned object is not an instance of required object:{" . $key . "}.");
                            }
                         }
                         FacadeHelper::assignValue($currentObj, $key, $val);
                    } else{
                        //The array is a recursive array. It can be an Line or LinkedTxn
                        //Example:
                        // Line": [{ ....}, {...}]
                        //For each element in the array, it is a line
                        //or It can be an mix of lines and Objects
                        //Line": [{ ....}, $obj1, {...}]
                        $list = array();
                        foreach ($val as $index => $element) {
                            if(is_object($element)){
                              if(!FacadeHelper::checkIfTheObjectIsAnInstanceOfTheClass($key,$element)){
                                throw new \Exception("The assigned object is not an instance of required object:{" . $key . "}.");
                              }
                              array_push($list, $element);
                            }else if(is_array($element)){
                              $obj = FacadeHelper::reflectArrayToObject($key, $element, $throwException);
                              array_push($list, $obj);
                            }else{
                              throw new \Exception("Format Error. Expect an element of an array or an object.");
                            }
                          }
                        FacadeHelper::assignValue($currentObj, $key, $list);
                     }
                }else{
                    //Even the value is a key, the key can be an Enum type or a wrapper
                    if(FacadeHelper::isKeyInComplexList($key)){
                        $methodFound = FacadeHelper::isKeyInComplexList($key);
                        $createdObj = FacadeHelper::getComplexListObject($methodFound, $key, $val);
                        FacadeHelper::assignValue($currentObj, $key, $createdObj);
                    }
                    //If it is enum type
                    else if(FacadeHelper::isKeyEnumType($key)){
                        $enumTypeClassName = FacadeHelper::isKeyEnumType($key);
                        $createdObj = FacadeHelper::getEnumType($enumTypeClassName, $val);
                        FacadeHelper::assignValue($currentObj, $key, $createdObj);
                    }
                    else
                    {
                      //If it is an object
                      if(is_object($val)){
                        if(!FacadeHelper::checkIfTheObjectIsAnInstanceOfTheClass($key,$val)){
                          throw new \Exception("The assigned object is not an instance of required object:{" . $key . "}.");
                        }
                      }
                      FacadeHelper::assignValue($currentObj, $key, $val);
                    }
                }
            }
            return $currentObj;
         }else{
            //The key can't be construct with An App Object
            if($throwException)
            {
              throw new \Exception("The name value:{" . $classNameOrKeyName . "} can't be used to construct an Intuit Entity Object. Please check the name and try again.");
            }else{
              return NULL;
            }
         }
     }
   }

   /**
    * A helper to check if a key is a complex type of an Object
    * @param  $key, $complexList = NULL
    * @return true
    *             If the key is found in the complex type
    *         false
    *             If the key is not found in the complex type
    */
   private static function isKeyInComplexList($key, $complexList = NULL){
     if(isset($complexList)) {$ObjectMap = $complexList;}
     else {$ObjectMap = FacadeClassMapper::classMethodToList();}

     foreach($ObjectMap as $objectMethodName => $entityType)
     {
         if(in_array($key, $entityType)){
            return $objectMethodName;
         }
     }
     return false;
   }

   /**
    * Set the Target Object with the Val converted in Object
    */
   private static function setKeyInComplexList($objectMethodName, $targetObject, $key, $val){
     $reflectionClassOfTargetObject = new \ReflectionClass($targetObject);
     $setObject = FacadeHelper::getComplexListObject($objectMethodName, $key, $val);
     $property = $reflectionClassOfTargetObject->getProperty($key);
     if($property instanceof \ReflectionProperty){
         $property->setValue($targetObject,$setObject);
         return true;
     }else{
       throw new \Exception("No Reflection Property Found.");
     }

   }

   /**
    * Set the Target Object with the Val converted in Object
    */
   private static function getComplexListObject($objectMethodName, $key, $val){
     //call helper method with method name as $objectmethodName
     $correspondingClassMethodOfFacadeHelper = FacadeHelper::getClassMethod(FacadeConstants::FACADE_HELPER_CLASS_NAME, $objectMethodName);
     if(!isset($correspondingClassMethodOfFacadeHelper)) throw new \Exception("The given Method " . $objectMethodName . " can't find at FacadeHelper.php class");
     $setObject = $correspondingClassMethodOfFacadeHelper->invoke(null, $val, $key);
     return $setObject;
   }

   public static function isKeyEnumType($key){
      $enumSupportArray = FacadeClassMapper::EnumTypeMatch();
      foreach($enumSupportArray as $k => $v){
          if(strcmp($key, $k) == 0){
             return FacadeHelper::decorateKeyWithNameSpaceAndPrefix($v);
          }
      }
      return false;
   }

   public static function getEnumType($clazz, $val){
      if(!isset($val)) throw new \Exception("Passed param for Enum can't be null.");
      if(class_exists($clazz)){
          if(is_object($val)){
              if($val instanceof $clazz){
                return $val;
              }else{
                throw new \Exception("The assigned obj to the enum class Type:{" . $clazz . "} is not matched.");
              }
          }
          $enumObj = new $clazz();
          //If $val is string
          if(is_array($val) && !empty($val)){
             $firstElementValue = reset($val);
          }else if(is_string($val) || is_numeric($val)){
             $firstElementValue = $val;
          }else{
             throw new \Exception("Internal Error. The Type of val:" . get_class($val) . " is not handled.");
          }
          $enumObj->value = $firstElementValue;
          return $enumObj;
      }else{
        throw new \Exception("The Enum Type is not found");
      }
   }

   /**
   * Find the Method by given parameter on FacadeHelper.php Class
   * @param The class name
   * @return \ReflectionMethod|null The method if found. If not found, return null.
   */
   public static function getClassMethod($className, $methodName){
          try
          {
              $helperRefelctionMethod = new \ReflectionMethod($className, $methodName);
              return $helperRefelctionMethod;
          } catch(\Exception $e){
               return null;
          }
   }


   //----------------------------------------- Complex Type Methods -------------------------------------------
   /**
    * Construct an IPPReferenceType based on passed Array or String.
    * If it is passed as an array, handle it.
    * If it is passed as a String. Construct an array and put the String on the value
    * If it is passed as an obj, compare it with IPPReferenceType and return the object
    * @param $data
    *       It can either be an array or a String, or obj
    */
   public static function getIPPReferenceTypeBasedOnArray($data){
      $trimedDataArray = FacadeHelper::trimSpacesForArrayKeys($data);
      if(is_object($trimedDataArray)){
           if($trimedDataArray instanceof IPPReferenceType){
               return $trimedDataArray;
           }else{
               throw new \Exception("The assigned obj to IPPReferenceType is not matched with IPPReferenceType.");
           }
      }
      //THe ReferenceDataType should only contain at most Two elements
      if(is_array($trimedDataArray)){
        if(sizeof($trimedDataArray) >= 3){
          throw new \Exception("Trying to construct IPPReferenceType based on Array. The array should contain at most two fields. name and value");
        }

        $IPPReferenceType = new IPPReferenceType();
        if(isset($trimedDataArray['value']) || isset($trimedDataArray['Value']) ) {
            $val = isset($trimedDataArray['value']) ? $trimedDataArray['value'] : $trimedDataArray['Value'];
            $IPPReferenceType->value = $val;
        }else{
            throw new \Exception("Passed array has no key for 'Value' when contructing an ReferenceType");
        }

        if(isset($trimedDataArray['name']) || isset($trimedDataArray['Name']) ){
           $nam = isset($trimedDataArray['name']) ? $trimedDataArray['name'] : $trimedDataArray['Name'];
           $IPPReferenceType->name = $nam;
         }
        return $IPPReferenceType;
      }else if(is_numeric($trimedDataArray) || is_string($trimedDataArray)){
        $IPPReferenceType = new IPPReferenceType();
        $IPPReferenceType->value = $trimedDataArray;
        return $IPPReferenceType;
      }else{
        throw new \Exception("Can't convert Passed Parameter to IPPReferenceType.");
      }
  }

  /**
   * If passed params is array, the first element of Array is used in IPPid.
   * If passed params is not an array, the the value is used for Ippid.
   * If passed params is an obj, the the value is simply returned.
   * @param $data
   *       It can either be an array or a numeric representation
   */
  public static function getIPPId($data){
    //Convert an IPPId based on the Data
    if(!isset($data)) throw new \Exception("Passed param for IPPid can't be null");
    if(is_object($data)){
         if($data instanceof IPPid){
             return $data;
         }else{
             throw new \Exception("The assigned obj to IPPid is not matched with IPPid.");
         }
    }
    if(is_array($data)){
       $firstElementValue = reset($data);
    }else if(is_numeric($data)){
       $firstElementValue = $data;
    }else{
      throw new \Exception("Passed param for Ippid has either be an array or numeric value.");
    }

    $_id = new IPPid();
    $_id->value = $firstElementValue;
    return $_id;
  }

  /**
   * Override the content from Object B to Object A
   * Don't use array_merge here. As the NUll Value will be overriden as well
   * Remove the !empty check. For integer or string that is 0, it needs to be passed and set.
   */
  public static function mergeObj($objA, $objB){
      if(get_class($objA) != get_class($objB)) throw new \Exception("Can't assign object value to a different type.");
      $property_fields = get_object_vars($objA);
      foreach ($property_fields as $propertyName => $val){
          $BsValue = $objB->$propertyName;
          if(isset($BsValue)){
               $objA->$propertyName = $BsValue;
          }
      }
      return $objA;
  }

  public static function cloneObj($obj){
      $clazz = get_class($obj);
      if(class_exists($clazz)){
          $clonedObj = new $clazz();
          $clonedObj = FacadeHelper::mergeObj($clonedObj, $obj);
          return $clonedObj;
      }else{
         throw new \Exception("The passed object:{" . $clazz . "} does not exist.");
      }
  }




  //----------------------------------- Common Helper Methods ----------

   public static function trimSpacesForArrayKeys($data){
       if(!isset($data) || empty($data)) return $data;
       if(is_array($data))
       {
           if(FacadeHelper::isArrayOfObj($data)){
                return $data;
           }else{
             $trimedKeys = array_map('trim', array_keys($data));
             $trimedResult = array_combine($trimedKeys, $data);
             return $trimedResult;
           }
       }else{
           if(is_object($data)){
               return $data;
           }else{
             return trim($data);
           }
       }
   }


   public static function isRecurrsiveArray(array $array){
      foreach($array as $key => $val){
          if(!is_array($val)){
                return false;
          }
      }
      return true;
   }

   /**
    * Test if an array is an associate array
    *
    * @param array $arr
    * @return true if $arr is an associative array
    */
   public static function isAssociateArray(array $arr)
   {
       if(!empty($arr)){
           foreach ($arr as $k => $v) {
               if (is_int($k)) {
                   return false;
               }
           }
           return true;
       }
       return false;
   }

   private static function decorateKeyWithNameSpaceAndPrefix($key){
      $list = FacadeClassMapper::OtherAntiPatternNameEntity();
      foreach($list as $k => $v){
          if(strcmp($k, $key) == 0){
              $key = $v;
              break;
          }
      }
      return FacadeHelper::simpleAppendClassNameSpace($key);
   }

   public static function simpleAppendClassNameSpace($key){
      return CoreConstants::NAMEPSACE_DATA_PREFIX . CoreConstants::PHP_CLASS_PREFIX . $key;
   }

   /**
    *
    * Given the class name, find the field for the key.
    *
    * @param $object
    *      The class object that we are going to call
    * @param $key
    *      The name of the field
    * @param $value
    *      The value to be assigned for the field
    */
   private static function assignValue($targetObject, $key, $value){
     //Reflection Class
     $reflectionClassOfTargetObject = new \ReflectionClass($targetObject);
     if(strcasecmp($key, "JournalEntryEntity") == 0){
         $key = "Entity";
     }else if(strcasecmp($key, "JournalEntryType") == 0){
         $key = "Type";
     }
     $property = $reflectionClassOfTargetObject->getProperty($key);
     if($property instanceof \ReflectionProperty){
        $value = FacadeHelper::convertValueTypeToAppropriateString($value);
        $property->setValue($targetObject,$value);
     }else{
       throw new \Exception("No Reflection Property Found.");
     }
   }

   private static function convertValueTypeToAppropriateString($value){
      if(is_bool($value)){
        $converted_val = ($value) ? 'true' : 'false';
        return $converted_val;
      } else if(is_numeric($value) || is_string($value)){
        return $value;
      } else if($value instanceof \DateTime){
          $result = $value->format('Y-m-d');
          if($result){
            return $result;
          }else{
            throw new SdkException("Cannot Convert the DateTime Object in the Line to String format using format function. Use String value instead.");
          }
      } else {
         return $value;
      }
   }

   private static function checkIfTheObjectIsAnInstanceOfTheClass($className, $object){
      if($object instanceof $className){
          return true;
      } else if($object instanceof \DateTime){
          return true;
      }
      else{
          $className = FacadeHelper::decorateKeyWithNameSpaceAndPrefix($className);
          if($object instanceof $className){
              return true;
          }
      }
      return false;
   }

   private static function isArrayOfObj($data){
       if(is_array($data)){
           foreach($data as $dataMemeber){
               if(!is_object($dataMemeber)){
                   return false;
               }
           }
           return true;
       }

       return false;
   }

}
