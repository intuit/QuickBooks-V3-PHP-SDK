<?php
namespace QuickBooksOnline\API\Facades;

class JournalEntry{

    public static function create(array $data, $throwException = TRUE){
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating JournalEntry is Empty");
        $JournalEntryObject = FacadeHelper::reflectArrayToObject("JournalEntry", $data, $throwException );
        return $JournalEntryObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("JournalEntry")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of JournalEntry.");
        }
        $newJournalEntryObj = JournalEntry::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newJournalEntryObj);
        return $clonedOfObj;
    }

}
