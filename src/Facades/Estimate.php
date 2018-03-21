<?php
namespace QuickBooksOnline\API\Facades;

class Estimate{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Estimate is Empty");
        $EstimateObject = FacadeHelper::reflectArrayToObject("Estimate", $data, $throwException );
        return $EstimateObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Estimate")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Estimate.");
        }
        $newEstimateObj = Estimate::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newEstimateObj);
        return $clonedOfObj;
    }

}
