<?php
namespace QuickBooksOnline\API\Facades;

class Employee{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Employee is Empty");
        $EmployeeObject = FacadeHelper::reflectArrayToObject("Employee", $data, $throwException );
        return $EmployeeObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Employee")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Employee.");
        }
        $newEmployeeObj = Employee::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newEmployeeObj);
        return $clonedOfObj;
    }

}
