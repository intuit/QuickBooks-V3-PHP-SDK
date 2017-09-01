<?php
namespace QuickBooksOnline\API\Facades;

class Deposit{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Deposit is Empty");
        $DepositObject = FacadeHelper::reflectArrayToObject("Deposit", $data, $throwException );
        return $DepositObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Deposit")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Deposit.");
        }
        $newDepositObj = Deposit::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newDepositObj);
        return $clonedOfObj;
    }

}
