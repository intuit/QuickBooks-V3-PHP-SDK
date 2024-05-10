<?php
namespace QuickBooksOnline\API\Facades;

class Term{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating Term is Empty");
        $TermObject = FacadeHelper::reflectArrayToObject("Term", $data, $throwException );
        return $TermObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("Term")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of Term.");
        }
        $newTermObj = Term::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newTermObj);
        return $clonedOfObj;
    }

}
