<?php
namespace QuickBooksOnline\API\Facades;

class Purchase{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Purchase is Empty");
        $PurchaseObject = FacadeHelper::reflectArrayToObject("Purchase", $data, $throwException );
        return $PurchaseObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Purchase")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Purchase.");
        }
        $newPurchaseObj = Purchase::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newPurchaseObj);
        return $clonedOfObj;
    }

}
