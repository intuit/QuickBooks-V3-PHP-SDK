<?php
namespace QuickBooksOnline\API\Facades;

class TaxAgency
{
    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating TaxAgency is Empty");
        $TaxAgencyObject = FacadeHelper::reflectArrayToObject("TaxAgency", $data, $throwException );
        return $TaxAgencyObject;
    }
}
