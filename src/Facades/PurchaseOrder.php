<?php
namespace QuickBooksOnline\API\Facades;

class PurchaseOrder{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating PurchaseOrder is Empty");
        $PurchaseOrderObject = FacadeHelper::reflectArrayToObject("PurchaseOrder", $data, $throwException );
        return $PurchaseOrderObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("PurchaseOrder")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of PurchaseOrder.");
        }
        $newPurchaseOrderObj = PurchaseOrder::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newPurchaseOrderObj);
        return $clonedOfObj;
    }

}
