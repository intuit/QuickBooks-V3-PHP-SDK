<?php
namespace QuickBooksOnline\API\Facades;

class TaxRate{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating TaxRate is Empty.");
        $TaxRateObject = FacadeHelper::reflectArrayToObject("TaxRateDetails", $data, $throwException );
        TaxRate::changeTaxApplicationOnValueToString($TaxRateObject);
        return $TaxRateObject;
    }

    private static function changeTaxApplicationOnValueToString($TaxServiceObject){
      $val = $TaxServiceObject->TaxApplicableOn;
      if(is_object($val)){
         if(isset($val->value)){
            $newValue = $val->value;
            $TaxServiceObject->TaxApplicableOn =  $newValue;
         }
      }
    }

}
