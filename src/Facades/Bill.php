<?php
namespace QuickBooksOnline\API\Facades;

class Bill{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Bill is Empty");
        $BillObject = FacadeHelper::reflectArrayToObject("Bill", $data, $throwException );
        return $BillObject;
    }

    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Bill")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Bill.");
        }
        $newBillObj = Bill::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newBillObj);
        return $clonedOfObj;
    }

}
