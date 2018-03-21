<?php
namespace QuickBooksOnline\API\Facades;

class Item{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Item is Empty");
        $ItemObject = FacadeHelper::reflectArrayToObject("Item", $data, $throwException );
        return $ItemObject;
    }

    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Item")) != 0){
          throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Item.");
        }
        $newItemObj = Item::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newItemObj);
        return $clonedOfObj;
    }

}
