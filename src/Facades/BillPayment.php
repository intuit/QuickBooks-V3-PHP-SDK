<?php
namespace QuickBooksOnline\API\Facades;

class BillPayment{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating BillPayment is Empty");
        $BillPaymentObject = FacadeHelper::reflectArrayToObject("BillPayment", $data, $throwException );
        return $BillPaymentObject;
    }

    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("BillPayment")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of BillPayment.");
        }
        $newBillPaymentObj = BillPayment::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newBillPaymentObj);
        return $clonedOfObj;
    }

}
