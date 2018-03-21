<?php
namespace QuickBooksOnline\API\Facades;

class Invoice{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Invoice is Empty");
        $invoiceObject = FacadeHelper::reflectArrayToObject("Invoice", $data, $throwException );
        return $invoiceObject;
    }

    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Invoice")) != 0){
          throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Invoice.");
        }
        $newInvoiceObj = Invoice::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newInvoiceObj);
        return $clonedOfObj;
    }

}
