<?php
namespace QuickBooksOnline\API\Facades;

class Account{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Account is Empty");
        $AccountObject = FacadeHelper::reflectArrayToObject("Account", $data, $throwException );
        return $AccountObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Account")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Account.");
        }
        $newAccountObj = Account::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newAccountObj);
        return $clonedOfObj;
    }

}
