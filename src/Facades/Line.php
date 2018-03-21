<?php
namespace QuickBooksOnline\API\Facades;

class Line{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Line is Empty");
        $LineObject = FacadeHelper::reflectArrayToObject("Line", $data, $throwException );
        return $LineObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Line")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Line.");
        }
        $newLineObj = Line::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newLineObj);
        return $clonedOfObj;
    }

}
