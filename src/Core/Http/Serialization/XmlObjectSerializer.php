<?php

namespace QuickBooksOnline\API\Core\Http\Serialization;

use QuickbooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\Php2Xml;
use QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php\Bind;

/**
 * Xml Serialize(r) to serialize and de serialize.
 */
class XmlObjectSerializer extends IEntitySerializer
{

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
        if (!$phpObj) {
            echo "getXmlFromObj NULL arg\n";
            var_dump(debug_backtrace());
            return false;
        }

        $php2xml = new Php2Xml(CoreConstants::PHP_CLASS_PREFIX);
        $php2xml->overrideAsSingleNamespace='http://schema.intuit.com/finance/v3';

        try {
            return $php2xml->getXml($phpObj);
        } catch (Exception $e) {
            echo "\n"."Object Dump:\n";
            var_dump($phpObj);
            echo "\n"."Exception Call Stack (".$e->getMessage()."):\n";
            echo "\n"."In  (".$e->getFile().") on " . $e->getLine();
            array_walk(debug_backtrace(), create_function('$a,$b', 'print "\t{$a[\'function\']}()\n\t".basename($a[\'file\']).":{$a[\'line\']}\n";'));
            return false;
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
        if (null==$entity) {
            return false;
        }

        $xmlElementName = XmlObjectSerializer::cleanPhpClassNameToIntuitEntityName(get_class($entity));
        $xmlElementName = trim($xmlElementName);
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
        $className = trim($className);
        if (class_exists($className, CoreConstants::USE_AUTOLOADER)) {
            $phpObj = new $className;
        } elseif (class_exists(CoreConstants::NAMEPSACE_DATA_PREFIX . $className, CoreConstants::USE_AUTOLOADER)) {
            $className = CoreConstants::NAMEPSACE_DATA_PREFIX . $className;
            $phpObj = new $className;
        } else {
            throw new \Exception("Can't find corresponding CLASS for className" . $className . "during unmarshall XML into POPO Object");
        }
        $bind = new Bind(CoreConstants::PHP_CLASS_PREFIX);
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
        if (!$responseXml) {
            return null;
        }

        $resultObject = null;
        $resultObjects = null;

        $responseXmlObj = simplexml_load_string($responseXml);
        foreach ($responseXmlObj as $oneXmlObj) {
            $oneXmlElementName = (string)$oneXmlObj->getName();

            //The handling falut here is a little too simple. add more support for future
            //@hao
            if ('Fault'==$oneXmlElementName) {
                return null;
            }
            $phpClassName = XmlObjectSerializer::decorateIntuitEntityToPhpClassName($oneXmlElementName);
            $onePhpObj = XmlObjectSerializer::PhpObjFromXml($phpClassName, $oneXmlObj->asXML());
            $resultObject = $onePhpObj;
            $resultObjects[] = $onePhpObj;

            // Caller may be anticipating ONLY one object in result
            if ($bLimitToOne) {
                break;
            }
        }

        if ($bLimitToOne) {
            return $resultObject;
        } else {
            return $resultObjects;
        }
    }

    /**
     * Decorate an IPP v3 Entity name (like 'Class') to be a POPO class name (like 'IPPClass')
     *
     * @param string Intuit Entity name
     * @return POPO class name
     */
    private static function decorateIntuitEntityToPhpClassName($intuitEntityName)
    {
        $intuitEntityName = trim($intuitEntityName);
        return CoreConstants::PHP_CLASS_PREFIX . $intuitEntityName;
    }

    /**
     * Clean a POPO class name (like 'IPPClass') to be an IPP v3 Entity name (like 'Class')
     *
     * @param string $phpClassName POPO class name
     * @return string Intuit Entity name
     */
    public static function cleanPhpClassNameToIntuitEntityName($phpClassName)
    {
        $phpClassName = trim($phpClassName);
        //if the className has delimiters, get the last part
        $separetes = explode('\\', $phpClassName);
        $phpClassName = end($separetes);
        if (0==strpos($phpClassName, CoreConstants::PHP_CLASS_PREFIX)) {
            return substr($phpClassName, strlen(CoreConstants::PHP_CLASS_PREFIX));
        }

        return null;
    }



    /**
     * Initializes a new instance of the XmlObjectSerializer class.
     * @param ILogger idsLogger The ids logger.
     */
    public function __construct($idsLogger = null)
    {
        if ($idsLogger) {
            $this->IDSLogger = $idsLogger;
        } else {
            $this->IDSLogger = null;
        } // new TraceLogger();
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
    public function Deserialize($message, $bLimitToOne = false)
    {
        if (!$message) {
            return null;
        }

        $resultObject = null;
        $resultObjects = null;

        $responseXmlObj = simplexml_load_string($message);

        //handle count(*) case, for example Select count(*) from Invoice, and also handle the CDC case
        if(isset($responseXmlObj->attributes()['totalCount']) && !isset($responseXmlObj->attributes()['startPosition']) && !isset($responseXmlObj->attributes()['maxResults'])){
            return (int) $responseXmlObj->attributes()['totalCount'];
        }

        foreach ($responseXmlObj as $oneXmlObj) {
            $oneXmlElementName = (string)$oneXmlObj->getName();

            if ('Fault'==$oneXmlElementName) {
                return null;
            }

            $phpClassName = XmlObjectSerializer::decorateIntuitEntityToPhpClassName($oneXmlElementName);
            $onePhpObj = XmlObjectSerializer::PhpObjFromXml($phpClassName, $oneXmlObj->asXML());
            $resultObject = $onePhpObj;
            $resultObjects[] = $onePhpObj;

            // Caller may be anticipating ONLY one object in result
            if ($bLimitToOne) {
                break;
            }
        }

        if ($bLimitToOne) {
            return $resultObject;
        } else {
            return $resultObjects;
        }
    }
}
