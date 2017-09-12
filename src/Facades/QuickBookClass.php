<?php
namespace QuickBooksOnline\API\Facades;

class QuickBookClass{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Class is Empty");
        $ClassObject = FacadeHelper::reflectArrayToObject("Class", $data, $throwException );
        return $ClassObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Class")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Class.");
        }
        $newClassObj = QuickBookClass::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newClassObj);
        return $clonedOfObj;
    }

}
