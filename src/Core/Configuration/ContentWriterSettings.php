<?php
/**
 * Description of ContentWriterSettings
 *
 * @author amatiushkin
 */
class ContentWriterSettings {
    //TODO: move to separate class
    const FILE_STRATEGY    = "file";
    const HANDLER_STRATEGY = "handler";
    const EXPORT_STRATEGY  = "export";

    public $strategy = null;
    public $prefix = "ipp";
    public $exportDir = null;
    public $returnOject = false;


    public static function checkStrategy($value) {
        $cleaned = strtolower(trim($value));
        if(in_array($cleaned, self::getAllStrategies())) {
            return $cleaned;
        }
        throw new SdkException("Incorrect strategy for ContentWriter."
                . "It should be one of " . implode(", ", self::getAllStrategies())
                .", but got $value");
        
    }
    
    /**
     * Verifies current settigns
     * @throws SdkException
     */
    public function verifyConfiguration()
    {
      if(($this->strategy === self::EXPORT_STRATEGY) && !empty($this->strategy) ) {
          if(is_null($this->exportDir)) {
              throw new SdkException("Invalid value for exportDirectory property. It can not be null with 'export' strategy. ");
          }
          //clear file cache
          clearstatcache();
          if(!file_exists($this->exportDir)) {
              throw new SdkException("Directory ({$this->exportDir}) doesn't exist.");
          }
          
          if(!is_dir($this->exportDir)) {
              throw new SdkException("Path ({$this->exportDir}) isn't a valid directory");
          }
          
          if(!is_writable($this->exportDir)) {
              throw new SdkException("Directory ({$this->exportDir}) isn't writable");
          }
      }  
    }

    public static function getAllStrategies()
    {
        return array(self::FILE_STRATEGY,self::HANDLER_STRATEGY, self::EXPORT_STRATEGY);
    }

}
