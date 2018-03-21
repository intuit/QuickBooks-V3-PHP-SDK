<?php
namespace QuickBooksOnline\API\Facades;

class Department{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Department is Empty");
        $DepartmentObject = FacadeHelper::reflectArrayToObject("Department", $data, $throwException );
        return $DepartmentObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Department")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Department.");
        }
        $newDepartmentObj = Department::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newDepartmentObj);
        return $clonedOfObj;
    }

}
