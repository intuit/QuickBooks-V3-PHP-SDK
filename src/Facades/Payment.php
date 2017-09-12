<?php
namespace QuickBooksOnline\API\Facades;

class Payment{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Payment is Empty");
        $PaymentObject = FacadeHelper::reflectArrayToObject("Payment", $data, $throwException );
        return $PaymentObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Payment")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Payment.");
        }
        $newPaymentObj = Payment::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newPaymentObj);
        return $clonedOfObj;
    }

}
