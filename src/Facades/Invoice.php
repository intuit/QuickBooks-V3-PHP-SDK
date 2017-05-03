<?php
namespace QuickBooksOnline\API\Facades;

class Invoice{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Invoice is Empty");
        $invoiceObject = FacadeHelper::reflectArrayToObject("Invoice", $data, $throwException );
        return $invoiceObject;
    }

    public static function update($objToUpdate, array $data){
        $newInvoiceObj = Invoice::create($data);
        FacadeHelper::mergeObj($objToUpdate, $newInvoiceObj);
        return $objToUpdate;
    }

}
