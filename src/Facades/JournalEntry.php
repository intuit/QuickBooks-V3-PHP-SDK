<?php
namespace QuickBooksOnline\API\Facades;

class JournalEntry{

    public static function create(array $data, $throwException = TRUE){
        $data = JournalEntry::changeArrayName($data);
        if(!isset($data) || empty($data)) throw new \Exception("Passed array for creating JournalEntry is Empty");
        //QBO should not call the Entity as DataEnityt
        $JournalEntryObject = FacadeHelper::reflectArrayToObject("JournalEntry", $data, $throwException );
        return $JournalEntryObject;
    }

    /**
     * This is an immutable function
     */
    public static function update($objToUpdate, array $data){
        $data = JournalEntry::changeArrayName($data);
        $classOfObj = get_class($objToUpdate);
        if(strcmp($classOfObj, FacadeHelper::simpleAppendClassNameSpace("JournalEntry")) != 0){
            throw new \Exception("Target object class:{" .  $classOfObj . "} is not an instance of JournalEntry.");
        }
        $newJournalEntryObj = JournalEntry::create($data);
        $clonedOfObj = FacadeHelper::cloneObj($objToUpdate);
        FacadeHelper::mergeObj($clonedOfObj, $newJournalEntryObj);
        return $clonedOfObj;
    }


    private static function changeArrayName(&$array){
      if(is_array($array)){
         foreach($array as $key => &$value){
            if(is_array($value)){
               JournalEntry::changeArrayName($value);
            }

            if(strcmp($key, "Entity") == 0){
                 $array["JournalEntryEntity"] = $array["Entity"];
                 unset($array["Entity"]);
            }

            if(strcmp($key, "Type") == 0){
                 $array["JournalEntryType"] = $array["Type"];
                 unset($array["Type"]);
            }

         }
      }

      return $array;
    }

}
