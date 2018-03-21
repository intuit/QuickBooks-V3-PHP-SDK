<?php
namespace QuickBooksOnline\API\Facades;

class TimeActivity{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating TimeActivity is Empty");
        $TimeActivityObject = FacadeHelper::reflectArrayToObject("TimeActivity", $data, $throwException );
        return $TimeActivityObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("TimeActivity")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of TimeActivity.");
       }
       $newTimeActivityObj = TimeActivity::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newTimeActivityObj);
       return $clonedOfObj;
    }

}
