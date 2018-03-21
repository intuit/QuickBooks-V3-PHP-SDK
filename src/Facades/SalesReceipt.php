<?php
namespace QuickBooksOnline\API\Facades;

class SalesReceipt{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating SalesReceipt is Empty");
        $SalesReceiptObject = FacadeHelper::reflectArrayToObject("SalesReceipt", $data, $throwException );
        return $SalesReceiptObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("SalesReceipt")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of SalesReceipt.");
       }
       $newSalesReceiptObj = SalesReceipt::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newSalesReceiptObj);
       return $clonedOfObj;
    }

}
