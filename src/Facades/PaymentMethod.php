<?php
namespace QuickBooksOnline\API\Facades;

class PaymentMethod{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Payment Method is Empty");
        $PaymentMethodObject = FacadeHelper::reflectArrayToObject("PaymentMethod", $data, $throwException );
        return $PaymentMethodObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("PaymentMethod")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of PaymentMethod.");
        }
        $newPaymentMethodObj = PaymentMethod::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newPaymentMethodObj);
        return $clonedOfObj;
    }

}
