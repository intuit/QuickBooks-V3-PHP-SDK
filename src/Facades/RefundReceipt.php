<?php
namespace QuickBooksOnline\API\Facades;

class RefundReceipt{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating RefundReceipt is Empty");
        $RefundReceiptObject = FacadeHelper::reflectArrayToObject("RefundReceipt", $data, $throwException );
        return $RefundReceiptObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("RefundReceipt")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of RefundReceipt.");
       }
       $newRefundReceiptObj = RefundReceipt::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newRefundReceiptObj);
       return $clonedOfObj;
    }

}
