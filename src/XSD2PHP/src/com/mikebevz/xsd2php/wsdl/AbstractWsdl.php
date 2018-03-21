<?php
namespace com\mikebevz\xsd2php\wsdl;

use com\mikebevz\xsd2php;

require_once dirname(__FILE__) . '/../Common.php';

abstract class AbstractWsdl
{
    
    
    
    /**
     * WSDL Name
     * @var string
     */
    protected $wsdlName;
    
    /**
     * WSDL Target namespace
     * @var string
     */
    protected $wsdlTargetNamespace;
    
    /**
     * Service
     * @var object
     */
    protected $service = null;
    
    /**
     * Service Reflection
     * @var \ReflectionClass
     */
    protected $refl;
    
    /**
     * DOM Instance
     * @var \DomDocument
     */
    protected $dom;
    
    /**
     * Copy of Current WSDL as XML string
     * @var string
     */
    protected $wsdlXmlSource;
    
    /**
     *
     * @var boolean
     */
    public $debug = false;
    
    /**
     * Commons class
     * @var com\mikebevz\xsd2php\Common
     */
    protected $common;
    
    /**
     * Soap binding style: rpc|document
     * @var string
     */
    protected $soapBindingStyle = SOAP_DOCUMENT;
    
    /**
     * Soap binding transport: which transport of SOAP this binding corresponds to
     * @var string
     */
    protected $soapBindingTransport = "http://schemas.xmlsoap.org/soap/http";
    
     /**
     * Prefix of target namespace
     * @var string
     */
    protected $targetNsPrefix = "tns";
    
    /**
     * Prefix for XML Schema namespace
     * @var string
     */
    protected $xmlSchemaPreffix = "xsd";
    /**
     * Suffix for generated service tag name
     * @var string
     */
    protected $serviceNameSuffix = "_Service";
    
    /**
     * Suffix for generated port tag name
     * @var string
     */
    protected $portNameSuffix = "_Port";
    /**
     * Suffix for generated binding tag name
     * @var unknown_type
     */
    protected $bindingNameSuffix = "_Binding";
    
    /**
     * Response items suffix
     * @var string
     */
    protected $responseSuffix = "Response";
    
    /**
     * Request
     * @var unknown_type
     */
    protected $requestSuffix = "Request";
    
    /**
     * Namespaces already imported to XML Schema
     * @var array
     */
    protected $importedNamespaces = array();
    
    protected $docNamespaces = array();
    
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
    
    public $lastNsKey = 0;
    
    private $location;
    
    
    /**
     * Definitions node
     * @var DOMNode
     */
    protected $wsDefinitions;
    protected $wsDocumentation;
    protected $wsTypes;
    protected $wsMessage;
    protected $wsPortType;
    protected $wsBinding;
    protected $wsService;
    protected $wsXmlSchema;
    protected $methodsMeta;
    
    protected $xmlSchemaImports = array();
    
    /**
     *
     *
     * @param object|class $service Class name or object of the service to build WSDL for
     *
     * @return void
     */
    public function __construct($service)
    {
        if ($service != null) {
            $this->service = $service;
        } elseif ($this->service == null) {
            throw new \RuntimeException("No class defined");
        }
        
        if (!is_object($this->service) && !is_string($this->service)) {
            throw new \RuntimeException("Given service is neither class name nor object");
        }
        
        if (is_string($this->service)) {
            if (!class_exists($this->service)) {
                throw new \RuntimeException("Class ".$service." is not found. Did you forget to include it?");
            }
            $this->service = new $this->service();
        }
        
        $this->common = new xsd2php\Common();
                
        $this->refl = new \ReflectionClass($this->service);
        $this->wsdlName = $this->refl->getShortName();
        $this->wsdlTargetNamespace = $this->namespaceToUrn($this->refl->getNamespaceName());
    }
    
    
    /**
     * Prepare DOM
     *
     * @return void
     */
    private function prepareDom()
    {
        $this->dom = new \DOMDocument('1.0', 'UTF-8');
        if ($this->debug) {
            $this->dom->formatOutput = true;
        }
        $this->wsDefinitions = $this->dom->createElementNS($this->namespaces['wsdl'], 'wsdl:definitions');
        $this->dom->appendChild($this->wsDefinitions);
        $this->wsDefinitions->setAttribute('name', $this->wsdlName);
        $this->wsDefinitions->setAttribute('targetNamespace', $this->wsdlTargetNamespace);
        $this->dom->createAttributeNS($this->wsdlTargetNamespace, $this->targetNsPrefix.':definitions'); // This NS
        $this->common->dom = $this->dom;
    }
    
    
    
    /**
     * Prepare service class reflection
     *
     * @return void
     */
    private function prepareReflection()
    {
        $methods = $this->getClassMethods();
        foreach ($methods as $method) {
            $this->methodsMeta[$method->name] = $this->getMethodIO($method->name);
        }
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
        return $this->common->parseDocComments($methodDocs);
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
     * Return WSDL as XML string
     *
     * @return string
     */
    public function toXml()
    {
        if (is_string($this->wsdlXmlSource) && $this->wsdlXmlSource != '') {
            return $this->wsdlXmlSource;
        } else {
            $this->prepareDom();
            $this->prepareReflection();
            $this->prepare();
            $this->wsdlXmlSource = $this->dom->saveXML();
            return $this->wsdlXmlSource;
        }
    }
    
    /**
     * Convert PHP namespace to URN
     *
     * @param string $namespace
     *
     * @return string
     */
    protected function namespaceToUrn($namespace)
    {
        $namespace = "urn:".preg_replace('/\\\/', ':', $namespace);
        return $namespace;
    }
    
    /**
     * Get QName style for given type
     * @param string $type Type name
     *
     * @return string
     * @throws RuntimeException If class of type cannot be found
     */
    protected function getTypeName($type)
    {
        
        //@todo Check must be performed against PHP data types not XMLSchema
        if (!in_array($type, $this->common->phpTypes)) {
            if (!class_exists($type)) {
                throw new \RuntimeException("Cannot find class ".$type);
            }
            
            $typeNamespace = $this->getClassNamespace($type);
            $typeName      = $this->getShortName($type);
            $nsCode        = $this->getNsCode($typeNamespace, true); //
            //print_r($typeNamespace);
            $this->addImportToSchema($typeNamespace, $nsCode);
            return $nsCode.":".$typeName;
        } else {
            return $this->xmlSchemaPreffix.":".$type;
        }
    }
    
    public function getNsCode($longNs, $rt = false)
    {
        // if namespace exists - just use its name
        // otherwise add it as nsatrribute to root and use its name
        if (!is_array($this->docNamespaces)) {
            $this->docNamespaces = array();
        }
        if (array_key_exists($longNs, $this->docNamespaces)) {
            return $this->docNamespaces[$longNs];
        } else {
            $this->docNamespaces[$longNs] = 'ns'.$this->lastNsKey;
            //$this->logger->debug($this->namespaces[$longNs]);
            if ($rt === false) {
                $nsAttr = $this->dom->createAttributeNS($longNs, $this->docNamespaces[$longNs].":definitions");
            }
            $this->lastNsKey++;
            return  $this->docNamespaces[$longNs];
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
        if (array_key_exists($namespace, $this->docNamespaces)) {
            if (in_array($namespace, $this->importedNamespaces)) {
                return;
            }
            
            
            //$dom = $this->wsdl->toDomDocument();
            //print_r($namespace);
            
            $this->dom->createAttributeNs($namespace, $code.":definitions");
            
            $importEl = $this->dom->createElement($this->xmlSchemaPreffix.":import");
            $nsAttr   = $this->dom->createAttribute("namespace");
            $txtNode  = $this->dom->createTextNode($namespace);
            $nsAttr->appendChild($txtNode);
            
            $nsAttr2   = $this->dom->createAttribute("schemaLocation");
            $schemaLocation = $this->getSchemaLocation($namespace);
            $publicSchema = $this->copyToPublic($schemaLocation, true);
            $publicSchema = $this->copyToPublic($schemaLocation, true);
            $schemaUrl = $this->importsToAbsUrl($publicSchema, $this->getSchemasPath());
             
            $txtNode2  = $this->dom->createTextNode($schemaUrl);
            $nsAttr2->appendChild($txtNode2);
            
            $importEl->appendChild($nsAttr);
            $importEl->appendChild($nsAttr2);
            //$this->wsdl->getSchema();
            //$xpath = new \DOMXPath($this->dom);
            //$query = "//*[local-name()='types']/child::*/*";
            //$firstElement = $xpath->query($query);
            
            //if (!is_object($firstElement->item(0))) {
            //    $query = "//*[local-name()='types']/child::*";
            //    $schema = $xpath->query($query);
            //    $schema->item(0)->appendChild($importEl);
            //} else {
            //    $this->wsdl->getSchema()->insertBefore($importEl, $firstElement->item(0));
            //}
            //$this->xmlSchemaImports
            //$this->wsXmlSchema->appendChild();
            array_push($this->xmlSchemaImports, $importEl);
            array_push($this->importedNamespaces, $namespace);
        }
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
        if ($this->getSchemasPath() == null) {
            throw new \RuntimeException("Schemas path is not specified - cannot start search for imports");
        }
        
        if (!file_exists($this->getSchemasPath())) {
            throw new \RuntimeException("Schemas path doesn't exist - cannot start search for imports");
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
     * Return class XML namespace taken from @xmlNamespace doc
     *
     * @param string $class Class name
     *
     * @return string XML namespace
     * @throws RuntimeException If namespace cannot be found in class DocBlock
     */
    protected function getClassNamespace($class)
    {
        $refl = new \ReflectionClass($class);
        
        $docs = $this->common->parseDocComments($refl->getDocComment());
        if (!array_key_exists("xmlNamespace", $docs)) {
            throw new \RuntimeException('Cannot find namespace in class description in '.$class);
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
    protected function getShortName($longName)
    {
        $arr = array_reverse(explode('\\', $longName));
        $shortName = $arr[0];
        return $shortName;
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
     * @return the $soapBindingStyle
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
}
