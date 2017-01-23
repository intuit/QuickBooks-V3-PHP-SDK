<?php

require_once(PATH_SDK_ROOT . 'Utility/IEntitySerializer.php');
require_once(PATH_SDK_ROOT . 'Utility/DomainEntityBuilder.php');
require_once(PATH_SDK_ROOT . 'Utility/MetadataExtractor.php');
require_once(PATH_SDK_ROOT . 'Utility/Serialization/AbstractEntity.php');
require_once(PATH_SDK_ROOT . 'Utility/Serialization/SimpleEntity.php');
require_once(PATH_SDK_ROOT . 'Utility/Serialization/ObjectEntity.php');
require_once(PATH_SDK_ROOT . 'Utility/Serialization/UnknownEntity.php');
require_once(PATH_SDK_ROOT . 'Diagnostics/TraceLogger.php');
require_once(PATH_SDK_ROOT . 'Exception/IdsExceptionManager.php');

use Intuit\Ipp\Utility\DomainEntityBuilder;

/**
 * Json Serializer to serialize and de serialize.
 */
class JsonObjectSerializer extends IEntitySerializer {
    
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
	public function __construct($idsLogger=NULL) {
		if ($idsLogger)
			$this->IDSLogger = $idsLogger;
		else
			$this->IDSLogger = new TraceLogger();
	}

        /**
         * Handle possible errors and react
         * @param mixed $result
         * @return mixed
         */
        private function checkResult($result)
        {
            $this->lastError = json_last_error();
            if(JSON_ERROR_NONE !== $this->lastError) {
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
            if(function_exists('json_last_error_msg')) {
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
		return PHP_CLASS_PREFIX . $intuitEntityName;
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
            if($object instanceof stdClass) {
                $result = array();
                $vars = get_object_vars($object);
                if(empty($vars)) { return null; }
                foreach ($vars as $key=>$value) {
                    $className = self::decorateIntuitEntityToPhpClassName($key);
                    if(!class_exists($className)) { continue; }
                    $entity = DomainEntityBuilder::create($className, $value);

                    if($limitToOne) { return $entity; }
                    $result[] = $entity;
                }
                if(empty($result)) {
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
        public function getResourceURL() {
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
           //TODO pre-processing for objects (ones which lack support in PHP 5.2)
           return $this->checkResult( json_encode($entity) );
	}
	
	/**
	 * DeSerializes the specified action entity type.
	 * @param string message The message.
	 * @return Returns the de serialized object.
	 */
	public function Deserialize($message, $limitToOne = FALSE)
	{
            return $this->convertObject( $this->checkResult( json_decode($message) ),
                                         $limitToOne);
	} 
}

