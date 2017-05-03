<?php
namespace QuickBooksOnline\API\Facades;

class Bill{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Bill is Empty");
        $invoiceObject = FacadeHelper::reflectArrayToObject("Bill", $data, $throwException );
        return $invoiceObject;
    }

    public static function update($objToUpdate, array $data){
        $newBillObj = Bill::create($data);
        FacadeHelper::mergeObj($objToUpdate, $newBillObj);
        return $objToUpdate;
    }

}
