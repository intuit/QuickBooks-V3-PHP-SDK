<?php
namespace com\mikebevz\xsd2php;

use QuickBooksOnline\API\Core\CoreConstants;

use com\mikebevz\xsd2php\wsdl;

set_include_path(get_include_path().PATH_SEPARATOR.
                realpath("../lib/ZF/1.10.7").PATH_SEPARATOR.
                realpath("../src"));

require_once 'Zend/Soap/Wsdl.php';
require_once 'com/mikebevz/xsd2php/Common.php';
require_once 'com/mikebevz/xsd2php/wsdl/WsdlFactory.php';

class Wsdl extends Common
{

    /**
     * Service class to be exposed
     * @var object
     */
    private $class;
    /**
     * Instance of Zend_Soap_Wsdl
     *
     * @todo consider replace this class - it's not that useful
     * @var com\mikebevz\xsd2php\wsdl\AbstractWsdl
     */
    private $wsdl;

    /**
     * Reflection of the $class
     * @var \ReflectionClass
     */
    private $refl;

    /**
     * Soap binding style: rpc|document
     * @var string
     */
    private $soapBindingStyle = "document";

    /**
     * Soap binding transport: which transport of SOAP this binding corresponds to
     * @var string
     */
    private $soapBindingTransport = "http://schemas.xmlsoap.org/soap/http";

    /**
     * Port type
     * @var DomNode
     */
    private $portType;

    /**
     * Binding
     * @var DomNode
     */
    private $binding;

    /**
     * Service location
     *
     * @var string
     */
    private $location;

    /**
     * Prefix of target namespace
     * @var string
     */
    private $targetNsPrefix = "tns";

    /**
     * Prefix for XML Schema namespace
     * @var string
     */
    private $xmlSchemaPreffix = "xsd";
    /**
     * Suffix for generated service tag name
     * @var string
     */
    private $serviceNameSuffix = "_Service";

    /**
     * Suffix for generated port tag name
     * @var string
     */
    private $portNameSuffix = "_Port";
    /**
     * Suffix for generated binding tag name
     * @var unknown_type
     */
    private $bindingNameSuffix = "_Binding";

    /**
     * Response items suffix
     * @var string
     */
    private $responseSuffix = "Response";

    /**
     * Request
     * @var unknown_type
     */
    private $requestSuffix = "Request";

    /**
     * Path to schema to be imported/included in XSD
     * @var string
     */
    private $schemasPath = null;

    /**
     * Path to publicly accessable folder to store imported/included schemas
     *
     * @var string
     */
    private $publicPath = null;

    private $publicUrl = null; // Relative to / without domain name

    /**
     * Namespaces already imported to XML Schema
     * @var array
     */
    private $importedNamespaces = array();



    /**
     * Creates new wsdl for the $class given
     * @param string|object $class
     *
     * @return void
     */
    public function __construct($class = null)
    {
        if ($class != null) {
            $this->class = $class;
        }
    }

    /**
     * Ger WSDL file contents
     *
     * @param string|object $class
     *
     * @return string
     *
     * @throws RuntimeException If class not defined
     * @throws RuntimeException If given class is neither class nor string
     * @throws RuntimeException If given class is not found, ie was not included before
     */
    public function getWsdl($class = null)
    {
        /*
        if ($class != null) {
            $this->class = $class;
        } elseif ($this->class == null) {
            throw new \RuntimeException("No class defined");
        }

        if (!is_object($this->class) && !is_string($this->class)) {
            throw new \RuntimeException("Given class is neither class nor string");
        }

        if (is_string($this->class)) {
            if (!class_exists($this->class)) {
                throw new \RuntimeException("Class ".$class." is not found. Did you forget to include it?");
            }
            $this->class = new $this->class();
        }

        */

        //$this->refl = new \ReflectionClass($this->class);

        //$this->wsdl = new \Zend_Soap_Wsdl($this->refl->getShortName(),
        //                                 $this->namespaceToUrn($this->refl->getNamespaceName()));



        $factory = new wsdl\WsdlFactory($class, wsdl\WsdlFactory::WSDL_1_1);
        $this->wsdl = $factory->getImplementation();
        $this->wsdl->debug = true;
        /*
        $this->addTypes();
        $this->addMessages();
        $this->addPortType();
        $this->addBindings();

        $this->addServices();

        $dom = $this->wsdl->toDomDocument();
        if ($this->debug) {
            $dom->formatOutput = true;
        }*/

        return $this->wsdl->toXml();//$dom->saveXml();
    }

    /**
     * Add bindings to WSDL
     *
     * @return DomNode Binding node
     */
    private function addBindings()
    {
        $this->binding = $this->wsdl->addBinding($this->refl->getShortName().$this->bindingNameSuffix,
                                                 $this->targetNsPrefix.":".$this->getBindingTypeName());
        $this->wsdl->addSoapBinding($this->binding,
                                    $this->getSoapBindingStyle(),
                                    $this->getSoapBindingTransport());

        $this->addBindingOperations();
        return $this->binding;
    }

    /**
     * Get binding type name
     *
     * @return string
     */
    private function getBindingTypeName()
    {
        return $this->refl->getShortName().$this->portNameSuffix;
    }

    /**
     * Add port type
     *
     * @return DOMNode portType node
     */
    private function addPortType()
    {
        $this->portType = $this->wsdl->addPortType($this->getPortName());
        $this->addPortOperations();

        return $this->portType;
    }

    /**
     * Add XML Schema types
     *
     * @return void
     */
    public function addTypes()
    {
        $methods = $this->getClassMethods();
        foreach ($methods as $method) {
            $data = $this->getMethodIO($method->name);
            $element = array('name' => $method->name,
                             'sequence' => array() );

            if (array_key_exists("params", $data)) {
                foreach ($data['params'] as $param) {
                    if ($this->isLocalType($this->getTypeName($param['type']))) {
                        array_push($element['sequence'], array('name' => $param['name'], 'type' => $this->getTypeName($param['type'])));
                    } else {
                        array_push($element['sequence'], array('ref' => $this->getTypeName($param['type'])));
                    }
                }
                $this->wsdl->addElement($element);
            }

            if (array_key_exists("return", $data)) {
                $return = "";
                if ($this->isLocalType($this->getTypeName($data['return']['type']))) {
                    $return = array('name' => $method->name.$this->responseSuffix,
                                 'sequence' => array(array('name' => 'Response', 'type' => $this->getTypeName($data['return']['type']))));
                } else {
                    $return = array('name' => $method->name.$this->responseSuffix,
                                 'sequence' => array(array('ref' => $this->getTypeName($data['return']['type']))));
                }

                $this->wsdl->addElement($return);
            }
        }
    }

    /**
     * Add operations to binding
     *
     * @return void
     */
    public function addBindingOperations()
    {
        $methods = $this->getClassMethods();

        //@todo Check if binding is instantiated

        foreach ($methods as $method) {
            $data = $this->getMethodIO($method->name);
            $bindingInput = false;
            $bindingOutput = false;
            if (array_key_exists("params", $data)) {
                $bindingInput  = array('use' => 'literal');
            }

            if (array_key_exists("return", $data)) {
                $bindingOutput = array('use' => 'literal');
            }

            $operation     = $this->wsdl->addBindingOperation($this->binding, $method->name, $bindingInput, $bindingOutput);
            $soapOperation = $this->wsdl->addSoapOperation($operation, $this->namespaceToUrn($this->refl->getNamespaceName())."/".$method->name);
        }
    }


    /**
     * Add Port operations
     *
     * @return void
     */
    private function addPortOperations()
    {
        $methods = $this->getClassMethods();

        foreach ($methods as $method) {
            $data = $this->getMethodIO($method->name);

            $input         = false;
            $output        = false;
            $bindingInput  = false;
            $bindingOutput = false;

            if (array_key_exists("params", $data)) {
                $input = $this->targetNsPrefix.":".$method->name.$this->requestSuffix;
            }

            if (array_key_exists("return", $data)) {
                $output = $this->targetNsPrefix.":".$method->name.$this->responseSuffix;
            }

            $this->wsdl->addPortOperation($this->portType,
                                          $method->name,
                                          $input,
                                          $output);
        }
    }

    /**
     * Return true if given type is local, false in case the type is not from xsd or tns namespaces
     *
     * @param string $type QName type name
     *
     * @return boolean
     */
    public function isLocalType($type)
    {
        if (preg_match('/:/', $type)) {
            list($ns, $typeName) = explode(":", $type);
            if ($ns == $this->targetNsPrefix || $ns == $this->xmlSchemaPreffix) {
                return true; // Local type
            } else {
                return false;
            }
        } else {
            // @todo - No namespace - local type
            return true;
        }
    }

    /**
     * Add SOAP messages
     *
     * @param array $messages Messages to add
     *
     * @return void
     * @throws RuntimeException If method does not have any inputs/outputs
     * @throws RuntimeException If
     */
    public function addMessages()
    {
        $methods = $this->getClassMethods();
        $messages = array();
        foreach ($methods as $method) {
            $data = $this->getMethodIO($method->name);

            $input = false;
            $output = false;
            // Add inputs if any
            if (array_key_exists("params", $data)) {
                array_push($messages, array('name' => $method->name.$this->requestSuffix, 'refType' => 'element',
                 'content' => array($method->name.$this->requestSuffix => $this->targetNsPrefix.":".$method->name)));
            }

            // Add outputs if any
            if (array_key_exists("return", $data)) {
                array_push($messages, array('name' => $method->name.$this->responseSuffix, 'refType' => 'element',
                 'content' => array($method->name.$this->responseSuffix => $this->targetNsPrefix.":".$method->name.$this->responseSuffix)));
            }
        }

        if (empty($messages)) {
            throw new \RuntimeException($method->name." does not have any input or output");
        }



        if (!is_array($messages)) {
            throw new \RuntimeException("Argument is not array");
        }

        foreach ($messages as $msg) {
            if ($msg['refType'] == 'type') {
                $this->wsdl->addMessage($msg['name'], $msg['content']);
            } elseif ($msg['refType'] == 'element') {
                $dom = $this->wsdl->toDomDocument();
                $msgEl = $dom->createElement('message');
                $msgNameAt = $dom->createAttribute('name');
                $msgNameTxtNode = $dom->createTextNode($msg['name']);
                $msgNameAt->appendChild($msgNameTxtNode);
                $msgEl->appendChild($msgNameAt);

                $partEl = $dom->createElement("part");
                $partNameAt = $dom->createAttribute("name");
                $partElAt = $dom->createAttribute('element');
                foreach ($msg['content'] as $name => $element) {
                    $partNameTxtNode = $dom->createTextNode($name);
                    $partNameAt->appendChild($partNameTxtNode);

                    $partElTxtNode = $dom->createTextNode($element);
                    $partElAt->appendChild($partElTxtNode);
                }
                $partEl->appendChild($partNameAt);
                $partEl->appendChild($partElAt);

                $msgEl->appendChild($partEl);

                $xpath = new \DOMXPath($dom);
                $query = "//*[local-name()='definitions']";
                $childs = $xpath->query($query);
                $childs->item(0)->appendChild($msgEl);
            } else {
                throw new \RuntimeException("refType only can be type or element");
            }
        }
    }

    /**
     * Get service class public methods
     *
     * @return array<ReflectionMethod>
     */
    private function getClassMethods()
    {
        return $this->refl->getMethods(\ReflectionMethod::IS_PUBLIC);
    }

    /**
     * Return method input/output
     *
     * @param string $method Method name
     *
     * @return array
     */
    private function getMethodIO($method)
    {
        $methodDocs = $this->refl->getMethod($method)->getDocComment();
        return $this->parseDocComments($methodDocs);
    }



    /**
     * Get port name
     *
     * @return string
     */
    private function getPortName()
    {
        return $this->refl->getShortName().$this->portNameSuffix;
    }

    private function getNamespaceName($class)
    {
        $this->refl->getNamespaceName();
    }

    private function namespaceToUrn($namespace)
    {
        $namespace = "urn:".preg_replace('/\\\/', ':', $namespace);
        return $namespace;
    }

    /**
     * Add SOAP Service
     *
     * @return void
     */
    private function addServices()
    {
        $this->wsdl->addService($this->getServiceName(), $this->getPortName(), $this->getBindingName(), $this->getLocation());
    }

    /**
     * Get QName style for given type
     * @param string $type Type name
     *
     * @return string
     * @throws RuntimeException If class of type cannot be found
     */
    private function getTypeName($type)
    {

        //@todo Check must be performed against PHP data types not XMLSchema
        if (!in_array($type, $this->basicTypes)) {
            if (!class_exists($type, CoreConstants::USE_AUTOLOADER)) {
                throw new \RuntimeException("Cannot find class ".$type);
            }

            $typeNamespace = $this->getClassNamespace($type);
            $typeName      = $this->getShortName($type);
            $nsCode        = $this->getNsCode($typeNamespace, true);
            $this->addImportToSchema($typeNamespace, $nsCode);
            return $nsCode.":".$typeName;
        } else {
            return $this->xmlSchemaPreffix.":".$type;
        }
    }

    /**
     * Add xsd:import tag to XML schema before any childs added
     *
     * @param string $namespace Namespace URI
     * @param string $code      Shortcut for namespace, fx, ns0. Returned by getNsCode()
     *
     * @return void
     */
    private function addImportToSchema($namespace, $code)
    {
        if (array_key_exists($namespace, $this->namespaces)) {
            if (in_array($namespace, $this->importedNamespaces)) {
                return;
            }

            $dom = $this->wsdl->toDomDocument();
            $dom->createAttributeNs($namespace, $code.":definitions");
            $importEl = $dom->createElement($this->xmlSchemaPreffix.":import");
            $nsAttr   = $dom->createAttribute("namespace");
            $txtNode  = $dom->createTextNode($namespace);
            $nsAttr->appendChild($txtNode);

            $nsAttr2   = $dom->createAttribute("schemaLocation");
            $schemaLocation = $this->getSchemaLocation($namespace);
            $publicSchema = $this->copyToPublic($schemaLocation, true);
            $publicSchema = $this->copyToPublic($schemaLocation, true);
            $schemaUrl = $this->importsToAbsUrl($publicSchema, $this->getSchemasPath());

            $txtNode2  = $dom->createTextNode($schemaUrl);
            $nsAttr2->appendChild($txtNode2);

            $importEl->appendChild($nsAttr);
            $importEl->appendChild($nsAttr2);
            $this->wsdl->getSchema();
            $xpath = new \DOMXPath($dom);
            $query = "//*[local-name()='types']/child::*/*";
            $firstElement = $xpath->query($query);

            if (!is_object($firstElement->item(0))) {
                $query = "//*[local-name()='types']/child::*";
                $schema = $xpath->query($query);
                $schema->item(0)->appendChild($importEl);
            } else {
                $this->wsdl->getSchema()->insertBefore($importEl, $firstElement->item(0));
            }

            array_push($this->importedNamespaces, $namespace);
        }
    }

    /**
     * Convert relative paths in XMLSchema's imports and includes to URLs using $location
     *
     * @param string $schemaPath Absolute path to XML Schema file
     *
     * @return string URL of the schema
     */
    public function importsToAbsUrl($schemaPath, $relPath = '')
    {
        $dom = new \DOMDocument();
        $dom->load($schemaPath);

        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='schema']/*[local-name()='import']";
        $imports = $xpath->query($query);
        $urlParts = parse_url($this->getLocation());
        $rootUrl = $this->composeUrl($urlParts);
        $url = $rootUrl.$this->getPublicUrl()."/".basename($schemaPath);
        if (!is_object($imports->item(0))) {
            return $url;
        }

        $urlParts = parse_url($this->getLocation());
        $rootUrl = $this->composeUrl($urlParts);

        foreach ($imports as $import) {
            $scPath = realpath($relPath.DIRECTORY_SEPARATOR.$import->getAttribute('schemaLocation'));
            $copiedSchema = $this->copyToPublic($scPath, true);

            $schemaUrl = $rootUrl.$this->getPublicUrl()."/".basename($copiedSchema);
            $import->setAttribute('schemaLocation', $schemaUrl);

            $this->importsToAbsUrl($copiedSchema, dirname($scPath));
        }
        $dom->save($schemaPath);
        return $url;
    }

    /**
     * Compose URL of kind schema://host:port
     *
     * @param array $parts
     *
     *  @return string URL
     */
    public function composeUrl($parts)
    {
        $url = "";
        if (array_key_exists('scheme', $parts)) {
            $url .= $parts['scheme']."://";
        }

        if (array_key_exists('host', $parts)) {
            $url .= $parts['host'];
        }

        if (array_key_exists('port', $parts)) {
            $url .= ":".$parts['port'];
        }

        if (array_key_exists('path', $parts)) {
        }

        return $url;
    }


    /**
     * Copy given file to publicSchemaPath
     *
     * @param string  $path      Path to file
     * @param boolean $overwrite Overwrite file if it exists? default false
     *
     * @return string Path to new file
     * @throws RuntimeException If file cannot be copied
     */
    public function copyToPublic($path, $overwrite = false)
    {
        $publicPath = realpath($this->getPublicPath());
        $targetFilePath   = $publicPath.DIRECTORY_SEPARATOR.basename($path);

        if (($overwrite === true && file_exists($targetFilePath)) || !file_exists($targetFilePath)) {
            if (!copy($path, $targetFilePath)) {
                throw new \RuntimeException("Cannot copy ".basename($path)." to ".$publicPath);
            }
        }

        return $targetFilePath;
    }

    /**
     * Get path to schema in schemasPath with targetNamespace = $ns
     *
     * @param string $ns Namespace to match
     *
     * @return string absolut path to schema file
     * @throws RuntimeException If SchemaPath is not specified
     * @throws RuntimeException If Public folder is not specified
     * @throws RuntimeException If SchemaPath is not readable
     * @throws RuntimeException If PublicPath is not writable
     * @throws RuntimeException If namespace cannot be found in SchemaPath
     */
    public function getSchemaLocation($ns)
    {
        if ($this->getSchemasPath() == null || !file_exists($this->getSchemasPath())) {
            throw new \RuntimeException("Schemas path is not specified or is not exist - cannot start search for imports");
        }

        if ($this->getPublicPath() == null || !file_exists($this->getPublicPath())) {
            throw new \RuntimeException("Public folder for imported schemas is not specified or is not exist - cannot save imports");
        }

        if (!is_readable($this->getSchemasPath())) {
            throw new \RuntimeException($this->getSchemasPath()." is not readable");
        }

        if (!is_writeable($this->getPublicPath())) {
            throw new \RuntimeException($this->getPublicPath()." is not writable");
        }
        // Scan directory for xsd files

        $dir   = new \RecursiveDirectoryIterator(realpath($this->getSchemasPath()));
        $iter  = new \RecursiveIteratorIterator($dir);
        $regex = new \RegexIterator($iter, '/\.xsd$/', \RecursiveRegexIterator::MATCH);
        $files = array();
        foreach ($regex as $key => $value) {
            array_push($files, $key);
        }
        $schema = "";
        foreach ($files as $file) {
            if ($this->isTargetNamespaceEqualsTo($file, $ns)) {
                $schema = $file;
            }
        }

        if ($schema == "") {
            throw new \RuntimeException("Cannot find schema for namespace ".$ns." in ".realpath($this->getSchemasPath()));
        }

        return $schema;
    }

    /**
     * Check if $schema XML Schema file belongs to $ns
     *
     * @param string $schema Path to XML Schema file
     * @param string $ns     Target namespace to match
     *
     * @return boolean
     */
    public function isTargetNamespaceEqualsTo($schema, $ns)
    {
        $dom = new \DOMDocument();
        $dom->load($schema);

        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='schema']/@targetNamespace";
        $tNs = $xpath->query($query);

        if (!is_object($tNs->item(0))) {
            return false;
        }
        if ($tNs->item(0)->nodeValue === $ns) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get base name from URI
     *
     * @param string $ns URI
     *
     * @return string Base name
     */
    public function getBaseNsName($ns)
    {
        $ns = array_reverse(explode(":", $ns));
        return $ns[0];
    }

    /**
     * Return class XML namespace taken from @xmlNamespace doc
     *
     * @param string $class Class name
     *
     * @return string XML namespace
     * @throws RuntimeException If namespace cannot be found in class DocBlock
     */
    public function getClassNamespace($class)
    {
        $refl = new \ReflectionClass($class);

        $docs = $this->parseDocComments($refl->getDocComment());
        if (!array_key_exists("xmlNamespace", $docs)) {
            throw new RuntimeException('Cannot find namespace in class description in '.$class);
        }
        return $docs['xmlNamespace'];
    }

    /**
     * Get class name without namespace
     *
     * @param string $longName Class full name
     *
     * @return string Class base name
     */
    private function getShortName($longName)
    {
        $arr = array_reverse(explode('\\', $longName));
        $shortName = $arr[0];
        return $shortName;
    }

    /**
     * @todo Check this method
     *
     * @param string $type Data type
     *
     * @return string
     */
    private function addType($type)
    {
        if (!in_array($type, $this->basicTypes)) {
            $typeName      = $this->getShortName($type);
            $typeNamespace = $this->getClassNamespace($type);
            $nsCode        = $this->getNsCode($typeNamespace, true);
        } else {
            return $type;
        }
    }

    /**
     * Get service element name
     *
     * @return string
     */
    private function getServiceName()
    {
        return $this->refl->getShortName().$this->serviceNameSuffix;
    }



    /**
     * Get binding element name
     *
     * @return void
     */
    private function getBindingName()
    {
        return $this->targetNsPrefix.":".$this->refl->getShortName().$this->bindingNameSuffix;
    }


    /**
     * Get SOAP service location (service->port->address->location)
     *
     * @return string $location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location the $location to set
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
    /**
     * Get SOAP binding style
     *
     * @return string $soapBindingStyle
     */
    public function getSoapBindingStyle()
    {
        return $this->soapBindingStyle;
    }

    /**
     * @param $soapBindingStyle the $soapBindingStyle to set
     */
    public function setSoapBindingStyle($soapBindingStyle)
    {
        $this->soapBindingStyle = $soapBindingStyle;
    }
    /**
     * Get SOAP binding transport
     *
     * @return string the $soapBindingTransport
     */
    public function getSoapBindingTransport()
    {
        return $this->soapBindingTransport;
    }

    /**
     * @param $soapBindingTransport the $soapBindingTransport to set
     */
    public function setSoapBindingTransport(
    $soapBindingTransport)
    {
        $this->soapBindingTransport = $soapBindingTransport;
    }
    /**
     * @return the $schemasPath
     */
    public function getSchemasPath()
    {
        return $this->schemasPath;
    }

    /**
     * @param $schemasPath the $schemasPath to set
     */
    public function setSchemasPath($schemasPath)
    {
        $this->schemasPath = $schemasPath;
    }
    /**
     * @return the $debug
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @param $debug the $debug to set
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }
    /**
     * @return the $publicPath
     */
    public function getPublicPath()
    {
        return $this->publicPath;
    }

    /**
     * @param $publicPath the $publicPath to set
     */
    public function setPublicPath($publicPath)
    {
        $this->publicPath = $publicPath;
    }
    /**
     * @return the $publicUrl
     */
    public function getPublicUrl()
    {
        return $this->publicUrl;
    }

    /**
     * @param $publicUrl the $publicUrl to set
     */
    public function setPublicUrl($publicUrl)
    {
        $this->publicUrl = $publicUrl;
    }
}
