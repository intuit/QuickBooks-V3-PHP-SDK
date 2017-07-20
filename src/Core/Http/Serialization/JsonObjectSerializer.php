<?php
namespace QuickBooksOnline\API\Core\Http\Serialization;

use QuickBooksOnline\API\Utility\DomainEntityBuilder;
use QuickBooksOnline\API\Utility\MetadataExtractor;
use QuickBooksOnline\API\Diagnostics\TraceLogger;
use QuickBooksOnline\API\Exception\IdsExceptionManager;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Facades\FacadeHelper;

/**
 * Json Serializer to serialize and de serialize.
 * It seems an uncompleted class. Finish this class later @Hao March.21th.2017
 */
class JsonObjectSerializer extends IEntitySerializer
{
    private $lastError = null;

  /**
  * Contains name of class which will be serialized or deserialized
  * @var string
  */
  private $entityName = null;

    /**
     * The ids logger.
     * @var ILogger IDSLogger
     */
     private $IDSLogger;

    /**
     * Initializes a new instance of the JsonObjectSerializer class.
     * @param IDSLogger idsLogger The ids logger.
     */
    public function __construct($idsLogger=null)
    {
        if ($idsLogger) {
            $this->IDSLogger = $idsLogger;
        } else {
            $this->IDSLogger = new TraceLogger();
        }
    }

  /**
   * Handle possible errors and react
   * @param mixed $result
   * @return mixed
  */
  private function checkResult($result)
  {
      $this->lastError = json_last_error();
      if (JSON_ERROR_NONE !== $this->lastError) {
          IdsExceptionManager::HandleException($this->getMessageFromErrorCode($this->lastError));
      }
            //TODO add logger here
        return $result;
  }

        /**
         * Support json_last_error_msg in PHP 5.2
         * @param type $error
         * @return type
         */
        private function getMessageFromErrorCode($error)
        {
            if (function_exists('json_last_error_msg')) {
                return json_last_error_msg();
            }
            $errors = array(
               JSON_ERROR_NONE             => null,
               JSON_ERROR_DEPTH            => 'Maximum stack depth exceeded',
               JSON_ERROR_STATE_MISMATCH   => 'Underflow or the modes mismatch',
               JSON_ERROR_CTRL_CHAR        => 'Unexpected control character found',
               JSON_ERROR_SYNTAX           => 'Syntax error, malformed JSON',
               JSON_ERROR_UTF8             => 'Malformed UTF-8 characters, possibly incorrectly encoded'
           );
            return array_key_exists($error, $errors) ? $errors[$error] : "Unknown error ({$error})";
        }

        /**
         * Sets entity name
         * @param string $name
         */
        private function setEntityName($name)
        {
            $this->entityName = $name;
        }

        /**
         * Retrivies resoure URL (part of URL path) which extracted from domain model entity name
         * @param string $entity
         */
        private function collectResourceURL($entity)
        {
            $this->setEntityName(strtolower(self::cleanPhpClassNameToIntuitEntityName(get_class($entity))));
        }

        /**
         * Creates domain model-like name. In other words it follows naming convetion for SDK
         * TODO make generic and remove duplicates
         * @param type $intuitEntityName
         * @return type
         */
    private static function decorateIntuitEntityToPhpClassName($intuitEntityName)
    {
        return CoreConstatnts::PHP_CLASS_PREFIX . $intuitEntityName;
    }

        /**
         * Converts stdClass objects into object with specified type
         * It tries to learn type from JSON responce
         *
         * @param stdClass $object
         * @param boolean $limitToOne
         * @return mixed (stdClass or domain model entity)
         */
        private function convertObject($object, $limitToOne)
        {
            if ($object instanceof stdClass) {
                $result = array();
                $vars = get_object_vars($object);
                if (empty($vars)) {
                    return null;
                }
                foreach ($vars as $key=>$value) {
                    $className = self::decorateIntuitEntityToPhpClassName($key);
                    if (!class_exists($className)) {
                        continue;
                    }
                    $entity = DomainEntityBuilder::create($className, $value);

                    if ($limitToOne) {
                        return $entity;
                    }
                    $result[] = $entity;
                }
                if (empty($result)) {
                    // Reutrn original parsed object and don't try to convert types
                    return $limitToOne ? $object : array($object);
                } else {
                    return $result;
                }
            }

            return $object;
        }

        /**
         * Returns path of URL which represent requested resource
         * @override
         * @return String
         */
        public function getResourceURL()
        {
            return $this->entityName;
        }


        /**
     * Serializes the specified entity.
     * @param object entity The entity
     * @return string Returns the serialize entity in string format.
     */
    public function Serialize($entity)
    {
        $this->collectResourceURL($entity);
        $arrayObj = $this->customerConvertObjectToArray($entity);
        $array = $this->removeNullProperties($arrayObj);
        return $this->checkResult(json_encode($array, true));
    }

    private function customerConvertObjectToArray($obj){
      if(is_object($obj)) $obj = (array) $obj;
      if(is_array($obj)) {
        $new = array();
        foreach($obj as $key => $val) {
          $new[$key] = $this->customerConvertObjectToArray($val);
        }
      }
      else $new = $obj;
      return $new;
    }

    /**
     * The input will always be an asscoiate array
     * So we will judge based on this two situration
     */
    private function removeNullProperties($val){
        $filterArray = array_filter($val);
        $returned = array();
        foreach($filterArray as $k => $v){
          if(is_array($v)){
            if(FacadeHelper::isRecurrsiveArray($v)){
              $list = array();
              foreach($v as $kk => $vv){
                  $list[] = array_filter($vv);
              }
              $returned[$k] = $list;
            }
          }else{
            $returned[$k] = $v;
          }
        }
        return $returned;
    }

    /**
     * DeSerializes the specified action entity type.
     * @param string message The message.
     * @return Returns the de serialized object.
     */
    public function Deserialize($message, $limitToOne = false)
    {
        return $this->convertObject($this->checkResult(json_decode($message)),
                                         $limitToOne);
    }
}
