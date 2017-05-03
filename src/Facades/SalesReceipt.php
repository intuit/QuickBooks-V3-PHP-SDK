<?php
namespace QuickBooksOnline\API\Facades;

class SalesReceipt{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating SalesReceipt is Empty");
        $SalesReceiptObject = FacadeHelper::reflectArrayToObject("SalesReceipt", $data, $throwException );
        return $SalesReceiptObject;
    }

    public static function update($objToUpdate, array $data){
        $newSalesReceiptObj = Bill::create($data);
        FacadeHelper::mergeObj($objToUpdate, $newSalesReceiptObj);
        return $objToUpdate;
    }

}
