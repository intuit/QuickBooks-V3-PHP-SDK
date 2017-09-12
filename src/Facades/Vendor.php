<?php
namespace QuickBooksOnline\API\Facades;

class Vendor{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Vendor is Empty");
        $VendorObject = FacadeHelper::reflectArrayToObject("Vendor", $data, $throwException );
        return $VendorObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Vendor")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Vendor.");
       }
       $newVendorObj = Vendor::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newVendorObj);
       return $clonedOfObj;
    }

}
