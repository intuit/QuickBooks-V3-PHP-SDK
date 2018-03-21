<?php
namespace QuickBooksOnline\API\Facades;

class CompanyCurrency{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating CompanyCurrency is Empty");
        $CompanyCurrencyObject = FacadeHelper::reflectArrayToObject("CompanyCurrency", $data, $throwException );
        return $CompanyCurrencyObject;
    }

    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("CompanyCurrency")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of CompanyCurrency.");
        }
        $newCompanyCurrencyObj = CompanyCurrency::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newCompanyCurrencyObj);
        return $clonedOfObj;
    }

}
