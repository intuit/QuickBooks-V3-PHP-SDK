<?php
namespace QuickBooksOnline\API\Facades;

class VendorCredit{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating VendorCredit is Empty");
        $VendorCreditObject = FacadeHelper::reflectArrayToObject("VendorCredit", $data, $throwException );
        return $VendorCreditObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("VendorCredit")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of VendorCredit.");
       }
       $newVendorCreditObj = VendorCredit::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newVendorCreditObj);
       return $clonedOfObj;
    }

}
