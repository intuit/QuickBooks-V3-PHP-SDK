<?php
namespace QuickBooksOnline\API\Facades;

class Transfer{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Transfer is Empty");
        $TransferObject = FacadeHelper::reflectArrayToObject("Transfer", $data, $throwException );
        return $TransferObject;
    }

    public static function update($objToUpdate, array $data){
       $classOfObj = get_class($objToUpdate);
       if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Transfer")) != 0){
         throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Transfer.");
       }
       $newTransferObj = Transfer::create($data);
       $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
       FacadeHelper::mergeObj($clonedOfObj, $newTransferObj);
       return $clonedOfObj;
    }

}
