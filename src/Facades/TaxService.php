<?php
namespace QuickBooksOnline\API\Facades;

class TaxService{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating TaxService is Empty.");
        $TaxServiceObject = FacadeHelper::reflectArrayToObject("TaxService", $data, $throwException );
        return $TaxServiceObject;
    }
}
