<?php
namespace QuickBooksOnline\API\Facades;

class CreditMemo{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating CreditMemo is Empty");
        $CreditMemoObject = FacadeHelper::reflectArrayToObject("CreditMemo", $data, $throwException );
        return $CreditMemoObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("CreditMemo")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of CreditMemo.");
        }
        $newCreditMemoObj = CreditMemo::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newCreditMemoObj);
        return $clonedOfObj;
    }

}
