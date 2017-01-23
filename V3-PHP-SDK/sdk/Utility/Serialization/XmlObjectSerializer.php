<?php

require_once(PATH_SDK_ROOT . 'Utility/IEntitySerializer.php');

/**
 * Xml Serialize(r) to serialize and de serialize.
 */
class XmlObjectSerializer extends IEntitySerializer {

	/**
	 * IDS Logger
	 * @var ILogger
	 */
	public $IDSLogger;
        
        /**
         * Keeps last used object name
         * @var String 
         */
        private $resourceURL =  null;


	/**
	 * Marshall a POPO object to XML, presumably for inclusion on an IPP v3 API call
	 *
	 * @param POPOObject $phpObj inbound POPO object
	 * @return string XML output derived from POPO object 
	 */
	private static function getXmlFromObj($phpObj)
	{
		if (!$phpObj)
		{
			echo "getXmlFromObj NULL arg\n";
			var_dump(debug_backtrace());
			return FALSE;
		}
			
		$php2xml = new com\mikebevz\xsd2php\Php2Xml(PHP_CLASS_PREFIX);
		$php2xml->overrideAsSingleNamespace='http://schema.intuit.com/finance/v3';
		
		try {
			return $php2xml->getXml($phpObj);
		}
		catch (Exception $e) {
			echo "\n"."Object Dump:\n";
			var_dump($phpObj);
			echo "\n"."Exception Call Stack (".$e->getMessage()."):\n";
                        echo "\n"."In  (".$e->getFile().") on " . $e->getLine();
			array_walk(debug_backtrace(),create_function('$a,$b','print "\t{$a[\'function\']}()\n\t".basename($a[\'file\']).":{$a[\'line\']}\n";'));
			return FALSE;
		}
	}
	
	/**
	 * Marshall a POPO object to be XML
	 *
	 * @param IPPIntuitEntity $entity The POPO object
	 * @param string $urlResource the type of the POPO object
	 * @return string the XML of the POPO object 
	 */
	public static function getPostXmlFromArbitraryEntity($entity, &$urlResource)
	{
		if (NULL==$entity)
			return FALSE;
			
		$xmlElementName = XmlObjectSerializer::cleanPhpClassNameToIntuitEntityName(get_class($entity));
		$urlResource = strtolower($xmlElementName);
		$httpsPostBody = XmlObjectSerializer::getXmlFromObj($entity);
		return $httpsPostBody;
	}
	
	/**
	 * Unmarshall XML into a POPO object, presumably the XML came from an IPP v3 API call
	 *
	 * @param string XML that conforms to IPP v3 XSDs
	 * @return POPOObject $phpObj resulting POPO object 
	 */
	private static function PhpObjFromXml($className, $xmlStr)
	{
		$phpObj = new $className;
		$bind = new com\mikebevz\xsd2php\Bind(PHP_CLASS_PREFIX);  
		$bind->overrideAsSingleNamespace='http://schema.intuit.com/finance/v3';
		$bind->bindXml($xmlStr, $phpObj);
		return $phpObj;
	}
	

	/**
	 * Parse an XML string into an array of IPPIntuitEntity objects
	 *
	 * @param string $responseXml XML string to parse
	 * @param bool $bLimitToOne Signals to only parse the first element 
	 * @return array of IPPIntuitEntity objects 
	 */
	private static function ParseArbitraryResultObjects($responseXml, $bLimitToOne) 
	{
		if (!$responseXml)
			return NULL;
			
		$resultObject = NULL;
		$resultObjects = NULL;
		
		$responseXmlObj = simplexml_load_string($responseXml);
		foreach($responseXmlObj as $oneXmlObj)
		{
			$oneXmlElementName = (string)$oneXmlObj->getName();
			
			if ('Fault'==$oneXmlElementName)
				return NULL;
				
			$phpClassName = XmlObjectSerializer::decorateIntuitEntityToPhpClassName($oneXmlElementName);
			$onePhpObj = XmlObjectSerializer::PhpObjFromXml($phpClassName, $oneXmlObj->asXML());
			$resultObject = $onePhpObj;
			$resultObjects[] = $onePhpObj;
			
			// Caller may be anticipating ONLY one object in result
			if ($bLimitToOne)
				break;
		}
		
		if ($bLimitToOne)
			return $resultObject;
		else
			return $resultObjects;
		
	}

	/**
	 * Decorate an IPP v3 Entity name (like 'Class') to be a POPO class name (like 'IPPClass')
	 *
	 * @param string Intuit Entity name
	 * @return POPO class name
	 */
	private static function decorateIntuitEntityToPhpClassName($intuitEntityName)
	{
		return PHP_CLASS_PREFIX . $intuitEntityName;
	}
	
	/**
	 * Clean a POPO class name (like 'IPPClass') to be an IPP v3 Entity name (like 'Class')
	 *
	 * @param string $phpClassName POPO class name
	 * @return string Intuit Entity name 
	 */
	public static function cleanPhpClassNameToIntuitEntityName($phpClassName)
	{
		if (0==strpos($phpClassName, PHP_CLASS_PREFIX))
			return substr($phpClassName, strlen(PHP_CLASS_PREFIX));
			
		return NULL;
	}


	
	/**
	 * Initializes a new instance of the XmlObjectSerializer class.
	 * @param ILogger idsLogger The ids logger.
	 */
	public function __construct($idsLogger = NULL)
	{
		if ($idsLogger)
			$this->IDSLogger = $idsLogger;
		else
		    $this->IDSLogger = NULL; // new TraceLogger(); 
	}
	
	/**
	 * Serializes the specified entity and updates last used entity name @see resourceURL
	 * @param object entity The entity.
	 * @return string Returns the serialize entity in string format.
	 */
	public function Serialize($entity)
	{
          $this->resetResourceURL();
          return XmlObjectSerializer::getPostXmlFromArbitraryEntity($entity, $this->resourceURL);
	}
        
        /**
         * Reset value for resourceURL to null
         * 
         */
        public function resetResourceURL()
        {
          $this->resourceURL = null;   
        }        
        
        /**
         * Returns last used resource URL (which entity name)
         * @return string
         */
        public function getResourceURL()
        {
          return $this->resourceURL;   
        }


        /**
	 * DeSerializes the specified action entity type.
	 * @param message The type to be  serialize to
	 * @param bLimitToOne Limit to parsing just one response element
	 * @return object Returns the de serialized object.
	 */
	public function Deserialize($message, $bLimitToOne = FALSE)
	{
		if (!$message)
			return NULL;
			
		$resultObject = NULL;
		$resultObjects = NULL;
		
		$responseXmlObj = simplexml_load_string($message);
		foreach($responseXmlObj as $oneXmlObj)
		{
			
			$oneXmlElementName = (string)$oneXmlObj->getName();
			
			if ('Fault'==$oneXmlElementName)
				return NULL;
				
			$phpClassName = XmlObjectSerializer::decorateIntuitEntityToPhpClassName($oneXmlElementName);
			$onePhpObj = XmlObjectSerializer::PhpObjFromXml($phpClassName, $oneXmlObj->asXML());
			$resultObject = $onePhpObj;
			$resultObjects[] = $onePhpObj;
			
			// Caller may be anticipating ONLY one object in result
			if ($bLimitToOne)
				break;
		}
		
		if ($bLimitToOne)
			return $resultObject;
		else
			return $resultObjects;
	
		/*
		            object deserializedObject = null;
		
		            // Initialize serialize for object
		            XmlSerializer serializer = new XmlSerializer(typeof(T));
		            try
		            {
		                using (TextReader reader = new StringReader(message))
		                {
		                    // de serialization of message.
		                    deserializedObject = serializer.Deserialize(reader);
		                }
		            }
		            catch (SystemException ex)
		            {
		                SerializationException serializationException = new SerializationException(ex.Message, ex);
		                this.IDSLogger.Log(TraceLevel.Error, serializationException.ToString());
		
		                IdsExceptionManager.HandleException(serializationException);
		            }
		
		            return deserializedObject;
		*/
	}

} 

