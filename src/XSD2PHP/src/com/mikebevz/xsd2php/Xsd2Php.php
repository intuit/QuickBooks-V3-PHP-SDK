<?php
//namespace com\mikebevz\xsd2php;
namespace QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php;

/**
 * Copyright 2010 Mike Bevz <myb@mikebevz.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

//require_once dirname(__FILE__) . '/PHPClass.php';
//require_once dirname(__FILE__).'/Common.php';

/**
 * Generate PHP classes based on XSD schema
 *
 * @author Mike Bevz <myb@mikebevz.com>
 * @version 0.0.1
 *
 */
class Xsd2Php extends Common
{
    /**
     * XSD schema to convert from
     * @var String
     */
    private $xsdFile;

    /**
     *
     * @var DOMXPath
     */
    private $xpath;

    /**
     * Namespaces in the current xsd schema
     * @var array
     */
    private $nspace;

    /**
     * XML file suitable for PHP code generation
     * @var string
     */
    private $xmlForPhp;

    /**
     * Show debug info
     * @var boolean
     */
    public $debug = false;

    /**
     * Namespaces = array (className => namespace ), used in dirs/files generation
     * @var array
     */
    //private $namespaces;

    /**
     * Short namespaces
     *
     * @var array
     */
    private $shortNamespaces;

    /**
     * XML Source
     *
     * @var string
     */
    private $xmlSource;

    /**
     * Target namespace
     *
     * @var string
     */
    private $targetNamespace;

    /**
     * XSD root namespace alias (fx, xsd = http://www.w3.org/2001/XMLSchema)
     *
     * @var string
     */
    private $xsdNs;

    /**
     * Already processed imports
     *
     * @var array
     */
    private $loadedImportFiles = array();

    /**
     * Processed namespaces
     *
     * @var array
     */
    private $importHeadNS = array();


    /**
     * XML Schema converted to XML
     *
     * @return string $xmlSource
     */
    public function getXmlSource()
    {
        return $this->xmlSource;
    }

    /**
     * Set XML representation of the XML Schema
     *
     * @param string $xmlSource XML Source
     *
     * @return void
     */
    public function setXmlSource($xmlSource)
    {
        $this->xmlSource = $xmlSource;
    }

    /**
     *
     * __construct
     *
     * @param string  $classPrefix Prefix for generated class names
     * @param string  $xsdFile Xsd file to convert
     * @param boolean $debug   Show debug messages[optional, default = false]
     *
     * @return void
     */
    public function __construct($classPrefix, $xsdFile, $debug = false)
    {
        parent::__construct($classPrefix);

        if ($debug != false) {
            $this->debug = $debug;
        }

        $this->xsdFile = $xsdFile;

        $this->dom = new \DOMDocument();
        $this->dom->load($this->xsdFile,
        LIBXML_DTDLOAD |
        LIBXML_DTDATTR |
        LIBXML_NOENT |
        LIBXML_XINCLUDE);

        $this->xpath = new \DOMXPath($this->dom);
        $this->targetNamespace = $this->getTargetNS($this->xpath);
        $this->shortNamespaces = $this->getNamespaces($this->xpath);

        $this->dom = $xsd = $this->loadIncludes($this->dom, dirname($this->xsdFile), $this->targetNamespace);
        $this->dom = $this->loadImports($this->dom, $this->xsdFile);

        if ($this->debug) {
            print_r($this->shortNamespaces);
        }
    }

    /**
     * Return target namespace for given DOMXPath object
     *
     * @param DOMXPath $xpath DOMXPath Object
     *
     * @return string
     */
    private function getTargetNS($xpath)
    {
        $query   = "//*[local-name()='schema' and namespace-uri()='http://www.w3.org/2001/XMLSchema']/@targetNamespace";
        $targetNs =  $xpath->query($query);

        if ($targetNs) {
            foreach ($targetNs as $entry) {
                return $entry->nodeValue;
            }
        }
    }

    /**
     * Return array of namespaces of the document
     *
     * @param DOMXPath $xpath
     *
     * @return array
     */
    public function getNamespaces($xpath)
    {
        $query   = "//namespace::*";
        $entries =  $xpath->query($query);
        $nspaces = array();

        foreach ($entries as $entry) {
            if ($entry->nodeValue == "http://www.w3.org/2001/XMLSchema") {
                $this->xsdNs = preg_replace('/xmlns:(.*)/', "$1", $entry->nodeName);
            }
            if (//$entry->nodeName != $this->xsdNs
            //&&
            $entry->nodeName != 'xmlns:xml') {
                if (preg_match('/:/', $entry->nodeName)) {
                    $nodeName = explode(':', $entry->nodeName);
                    $nspaces[$nodeName[1]] = $entry->nodeValue;
                } else {
                    $nspaces[$entry->nodeName] = $entry->nodeValue;
                }
            }
        }
        return $nspaces;
    }


    /**
     * Save generated classes to directory
     *
     * @param string  $dir             Directory to save classes to
     * @param boolean $createDirectory [optional] Create directory, false by default
     *
     * @return void
     */
    public function saveClasses($dir, $createDirectory = false)
    {
        $this->setXmlSource($this->getXML()->saveXML());
        $this->savePhpFiles($dir, $createDirectory);
    }

    /**
     * Load imports
     *
     * @param DOMDocument $dom     DOM model of the schema
     * @param string      $xsdFile Full path to first XSD Schema
     *
     * @return void
     */
    public function loadImports($dom, $xsdFile = '')
    {
        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='import' and namespace-uri()='http://www.w3.org/2001/XMLSchema']";
        $entries = $xpath->query($query);
        if ($entries->length == 0) {
            return $dom;
        }
        foreach ($entries as $entry) {
            // load XSD file
            $namespace = $entry->getAttribute('namespace');
            $parent = $entry->parentNode;
            $xsd = new \DOMDocument();
            $xsdFileName = realpath(dirname($xsdFile).DIRECTORY_SEPARATOR.$entry->getAttribute("schemaLocation"));
            if ($this->debug) {
                print('Importing '.$xsdFileName."\n");
            }

            if (!file_exists($xsdFileName)) {
                if ($this->debug) {
                    print $xsdFileName. " is not found \n";
                }
                continue;
            }
            if (in_array($xsdFileName, $this->loadedImportFiles)) {
                if ($this->debug) {
                    print("Schema ".$xsdFileName." has been already imported");
                }
                $parent->removeChild($entry);
                continue;
            }
            $filepath = dirname($xsdFileName);
            $result = $xsd->load($xsdFileName,
            LIBXML_DTDLOAD|LIBXML_DTDATTR|LIBXML_NOENT|LIBXML_XINCLUDE);
            if ($result) {
                $mxpath = new \DOMXPath($xsd);
                $this->shortNamespaces = array_merge($this->shortNamespaces, $this->getNamespaces($mxpath));

                $xsd = $this->loadIncludes($xsd, $filepath, $namespace);

                $this->loadedImportFiles[] = $xsdFileName;
                $this->loadedImportFiles = array_unique($this->loadedImportFiles);
            }
            foreach ($xsd->documentElement->childNodes as $node) {
                if ($node->nodeName == $this->xsdNs.":import") {
                    // Do not change Namespace for import and include tags
                    //if ($this->debug) print("Insert Import ".$node->nodeName." NS=". $node->getAttribute('namespace'). "\n");

                    $loc = realpath($filepath.DIRECTORY_SEPARATOR.$node->getAttribute('schemaLocation'));
                    $node->setAttribute('schemaLocation', $loc);
                    if ($this->debug) {
                        print('Change imported schema location to '.$loc." \n");
                    }
                    $newNode = $dom->importNode($node, true);
                    $parent->insertBefore($newNode, $entry);

                    continue;
                } else {
                    //if ($this->debug) print($node->nodeName." \n". $namespace. "\n");
                    $newNodeNs = $xsd->createAttribute("namespace");
                    $textEl = $xsd->createTextNode($namespace);
                    $newNodeNs->appendChild($textEl);
                    $node->appendChild($newNodeNs);

                    $newNode = $dom->importNode($node, true);
                    $parent->insertBefore($newNode, $entry);
                }
            }
            // add to $dom
            $parent->removeChild($entry);
        }

        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='import' and namespace-uri()='http://www.w3.org/2001/XMLSchema']";
        $imports = $xpath->query($query);
        if ($imports->length != 0) {
            $dom = $this->loadImports($dom);
        }

        if ($this->debug) {
            print_r("\n------------------------------------\n");
        }
        return $dom;
    }

    /**
     * Load includes in XML Schema
     *
     * @param DOMDocument $dom       Instance of DOMDocument
     * @param string      $filepath
     * @param string	  $namespace
     *
     * @return void
     */
    public function loadIncludes($dom, $filepath = '', $namespace = '')
    {
        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='include' and namespace-uri()='http://www.w3.org/2001/XMLSchema']";
        $includes = $xpath->query($query);

        foreach ($includes as $entry) {
            $parent = $entry->parentNode;
            $xsd = new \DOMDocument();
            $xsdFileName = realpath($filepath.DIRECTORY_SEPARATOR.$entry->getAttribute("schemaLocation"));
            if ($this->debug) {
                print('Including '.$xsdFileName."\n");
            }

            if (!file_exists($xsdFileName)) {
                if ($this->debug) {
                    print $xsdFileName. " is not found \n";
                }
                continue;
            }

            $result = $xsd->load($xsdFileName,
            LIBXML_DTDLOAD|LIBXML_DTDATTR|LIBXML_NOENT|LIBXML_XINCLUDE);
            if ($result) {
                $mxpath = new \DOMXPath($xsd);
                $this->shortNamespaces = array_merge($this->shortNamespaces, $this->getNamespaces($mxpath));
            }
            foreach ($xsd->documentElement->childNodes as $node) {
                if ($node->nodeName == $this->xsdNs.":include") {
                    $loc = realpath($filepath.DIRECTORY_SEPARATOR.$node->getAttribute('schemaLocation'));
                    $node->setAttribute('schemaLocation', $loc);
                    if ($this->debug) {
                        print('Change included schema location to '.$loc." \n");
                    }
                    $newNode = $dom->importNode($node, true);
                    $parent->insertBefore($newNode, $entry);
                } else {
                    if ($namespace != '') {
                        $newNodeNs = $xsd->createAttribute("namespace");
                        $textEl = $xsd->createTextNode($namespace);
                        $newNodeNs->appendChild($textEl);
                        $node->appendChild($newNodeNs);
                    }

                    $newNode = $dom->importNode($node, true);
                    $parent->insertBefore($newNode, $entry);
                }
            }
            $parent->removeChild($entry);
        }

/*         $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='include' and namespace-uri()='http://www.w3.org/2001/XMLSchema']";
        $includes = $xpath->query($query);
        if ($includes->length != 0) {
            $dom = $this->loadIncludes($dom);
        } */

        if ($this->debug) {
            print_r("\n------------------------------------\n");
        }

        return $dom;
    }

    /**
     * Convert XSD to XML suitable for PHP code generation
     *
     * @return string
     */
    public function getXmlForPhp()
    {
        return $this->xmlForPhp;
    }

    /**
     * @param string $xmlForPhp XML
     *
     * @return void
     */
    public function setXmlForPhp($xmlForPhp)
    {
        $this->xmlForPhp = $xmlForPhp;
    }

    /**
     * Convert XSD to XML suitable for further processing
     *
     * @return string XML string
     *
     * @return DOMDocument
     */
    public function getXML()
    {
        try {
            $xsl    = new \XSLTProcessor();
            $xslDom = new \DOMDocument();
            $xslDom->load(dirname(__FILE__) . "/xsd2php2.xsl");
            $xsl->registerPHPFunctions();
            $xsl->importStyleSheet($xslDom);
            $dom = $xsl->transformToDoc($this->dom);
            $dom->formatOutput = true;

            return $dom;
        } catch (\Exception $e) {
            throw new \Exception(
                    "Error interpreting XSD document (".$e->getMessage().")");
        }
    }

    /**
     * Save PHP files to directory structure
     *
     * @param string  $dir             Directory to save files to
     * @param boolean $createDirectory Create $dir directory if it doesn't exist
     *
     * @throws RuntimeException if given directory does not exist
     *
     * @return void
     */
    private function savePhpFiles($dir, $createDirectory = false)
    {
        if (!file_exists($dir) && $createDirectory === false) {
            throw new \RuntimeException($dir." does not exist");
        }

        if (!file_exists($dir) && $createDirectory === true) {
            //@todo Implement Recursive mkdir
            mkdir($dir, 0777, true);
        }

        $classes = $this->getPHP();

        foreach ($classes as $fullkey => $value) {
            $keys = explode("|", $fullkey);
            $key = $keys[0];
            $namespace = $this->namespaceToPath($keys[1]);
            if ($this->overrideAsSingleNamespace) {
                $targetDir = $dir;
            } else {
                $targetDir = $dir.DIRECTORY_SEPARATOR.$namespace;
            }
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
            file_put_contents($targetDir.DIRECTORY_SEPARATOR.$key.'.php', $value);
        }
        if ($this->debug) {
            echo "Generated classes saved to ".$dir;
        }
    }

    /**
     * Return generated PHP source code. That's where we generate bindings code
     *
     * @return string
     */
    private function getPHP()
    {
        $phpfile = $this->getXmlForPhp();
        if ($phpfile == '' && $this->getXmlSource() == '') {
            throw new \RuntimeException('There is no XML generated');
        }

        $dom = new \DOMDocument();
       // print_r($this->getXmlSource());
        if ($this->getXmlSource() != '') {
            $dom->loadXML($this->getXmlSource(), LIBXML_DTDLOAD | LIBXML_DTDATTR |
            LIBXML_NOENT | LIBXML_XINCLUDE);
        } else {
            $dom->load($phpfile, LIBXML_DTDLOAD | LIBXML_DTDATTR |
            LIBXML_NOENT | LIBXML_XINCLUDE);
        }

        $xPath = new \DOMXPath($dom);

        $classes = $xPath->query('//classes/class');

        $sourceCode = array();
        foreach ($classes as $class) {
            $phpClass = new PHPClass($this->classPrefix);
            $phpClass->overrideAsSingleNamespace = $this->overrideAsSingleNamespace;
            $phpClass->name = $this->classPrefix.$class->getAttribute('name');

            if ($class->getAttribute('type') != '') {
                $phpClass->type = $class->getAttribute('type');
            }

            if ($class->getAttribute('simpleType') != '') {
                $phpClass->type = $class->getAttribute('simpleType');
            }
            if ($class->getAttribute('namespace') != '') {
                $phpClass->namespace = $class->getAttribute('namespace');
            }
            if ($class->getElementsByTagName('const')->length > 0) {
                $array =  array();
                foreach ($class->getElementsByTagName('const') as $item) {
                    $array[] = (string)$item->getAttribute('value');
                }
                $phpClass->constants = $array;
            }

            if ($class->getElementsByTagName('extends')->length > 0) {
                if (!in_array($class->getElementsByTagName('extends')->item(0)->getAttribute('name'), $this->basicTypes)) {
                    $phpClass->extends = $class->getElementsByTagName('extends')->item(0)->getAttribute('name');
                    $phpClass->type    = $class->getElementsByTagName('extends')->item(0)->getAttribute('name');
                    $phpClass->extendsNamespace = $this->namespaceToPhp($class->getElementsByTagName('extends')->item(0)->getAttribute('namespace'));
                }
            }

            $docs = $xPath->query('docs/doc', $class);
            $docBlock = array();
            //if ($phpClass->namespace != $this->xsdNs) {
            if ($this->overrideAsSingleNamespace) {
                $docBlock['xmlNamespace'] = $this->overrideAsSingleNamespace;
            } else {
                $docBlock['xmlNamespace'] = $this->expandNS($phpClass->namespace);
            }
            $docBlock['xmlType']      = $phpClass->type;
            $docBlock['xmlName']      = $phpClass->name;

            if ($this->overrideAsSingleNamespace) {
                $docBlock['var'] = $phpClass->name;
            } elseif ($phpClass->namespace != '') {
                $docBlock['var'] = $this->namespaceToPhp($this->expandNS($phpClass->namespace))."\\".$phpClass->name;
            } else {
                $docBlock['var'] = $phpClass->name;
            }

            foreach ($docs as $doc) {
                if ($doc->nodeValue != '') {
                    $docBlock["xml".$doc->getAttribute('name')] = $doc->nodeValue;
                } elseif ($doc->getAttribute('value') != '') {
                    $docBlock["xml".$doc->getAttribute('name')] = $doc->getAttribute('value');
                }
            }

            $phpClass->classDocBlock = $docBlock;

            $props      = $xPath->query('property', $class);
            $properties = array();
            $i = 0;
            $isArray = false;
            foreach ($props as $prop) {
                $properties[$i]['name'] = $prop->getAttribute('name');
                $docs                   = $xPath->query('docs/doc', $prop);
                foreach ($docs as $doc) {
                    $properties[$i]["docs"][$doc->getAttribute('name')] = $doc->nodeValue;
                }
                if ($prop->getAttribute('xmlType') != '') {
                    $properties[$i]["docs"]['xmlType']      = $prop->getAttribute('xmlType');
                }
                if ($prop->getAttribute('namespace') != '') {
                    $properties[$i]["docs"]['xmlNamespace'] = $this->expandNS($prop->getAttribute('namespace'));
                }
                if ($prop->getAttribute('minOccurs') != '') {
                    $properties[$i]["docs"]['xmlMinOccurs'] = $prop->getAttribute('minOccurs');
                }
                if ($prop->getAttribute('maxOccurs') != '') {
                    $properties[$i]["docs"]['xmlMaxOccurs'] = $prop->getAttribute('maxOccurs');
                    // If maxOccurs > 1, mark type as an array
                    if ($prop->getAttribute('maxOccurs') > 1) {
                        $isArray = $prop->getAttribute('maxOccurs');
                    } elseif ($prop->getAttribute('maxOccurs')=='unbounded') {
                        $isArray = true;
                    }
                }
                if ($prop->getAttribute('name') != '') {
                    $properties[$i]["docs"]['xmlName']      = $prop->getAttribute('name');
                }

                //@todo if $prop->getAttribute('maxOccurs') > 1 - var can be an array - in future special accessor cane be implemented
                if ($prop->getAttribute('type') != '' && $prop->getAttribute('typeNamespace') == '') {
                    /**
                     * In general it's stange to give to Type name's namespace. Reconsider this part
                     */
                    if ($prop->getAttribute('namespace') != '' && $prop->getAttribute('namespace') != $this->xsdNs) {
                        $ns = "";
                        if ($prop->getAttribute('namespace') == "#default#") {
                            $ns = $this->namespaceToPhp($this->targetNamespace);
                        } else {
                            $ns = $this->namespaceToPhp($this->expandNS($prop->getAttribute('namespace')));
                        }
                        $properties[$i]["docs"]['var'] = $ns.'\\'.$this->classPrefix.$prop->getAttribute('type');
                    } else {
                        $properties[$i]["docs"]['var'] = $prop->getAttribute('type');
                    }
                    // Is it unbounded array?
                    if ($isArray === true) {
                        $properties[$i]["docs"]['var'] = $properties[$i]["docs"]['var']."[]";
                        $isArray = false;
                    }
                    // Is it array with defined maximum amount of elements?
                    if ($isArray > 1) {
                        $properties[$i]["docs"]['var'] = $properties[$i]["docs"]['var']."[".$isArray."]";
                        $isArray = false;
                    }
                }

                if ($prop->getAttribute('type') != '' && $prop->getAttribute('typeNamespace') != '') {
                    $ns = "";
                    if ($prop->getAttribute('typeNamespace') == "#default#") {
                        $ns = $this->namespaceToPhp($this->targetNamespace);
                    } else {
                        $ns = $this->namespaceToPhp($this->expandNS($prop->getAttribute('typeNamespace')));
                    }

                    if ($prop->getAttribute('typeNamespace') == $this->xsdNs) {
                        $properties[$i]["docs"]['var'] = $this->normalizeType($prop->getAttribute('type'));
                    } else {
                        $properties[$i]["docs"]['var'] = $ns.'\\'.$this->classPrefix.$prop->getAttribute('type');
                    }
                }

                $i++;
            }

            $phpClass->classProperties = $properties;
            $namespaceClause = '';
            if ((!$this->overrideAsSingleNamespace) && ($docBlock['xmlNamespace'] != '')) {
                $namespaceClause           = "namespace ".$this->namespaceToPhp($docBlock['xmlNamespace']).";\n";
            }

            if ($this->overrideAsSingleNamespace) {
                $namespaceClause = "namespace QuickBooksOnline\API\Data;"."\n";
                $phpClass->namespace = $this->overrideAsSingleNamespace;
                $docBlock['xmlNamespace'] = $this->overrideAsSingleNamespace;
            }

            $sourceCode[$docBlock['xmlName']."|".$phpClass->namespace] = "<?php\n".
            $namespaceClause.
            $phpClass->getPhpCode();
        }
        return $sourceCode;
    }

    /**
     * Resolve short namespace
     * @param string $ns Short namespace
     *
     * @return string
     */
    private function expandNS($ns)
    {
        if ($ns == "#default#") {
            $ns = $this->targetNamespace;
        }
        foreach ($this->shortNamespaces as $shortNs => $longNs) {
            if ($ns == $shortNs) {
                $ns = $longNs;
            }
        }
        return $ns;
    }

    /**
     * Convert XML URI to PHP complient namespace
     *
     * @param string $xmlNS XML URI
     *
     * @return string
     */
    public function namespaceToPhp($xmlNS)
    {
        $ns = $xmlNS;
        $ns = $this->expandNS($ns);
        if (preg_match('/urn:/', $ns)) {
            //@todo check if there are any components of namespace which are
            $ns = preg_replace('/-/', '_', $ns);
            $ns = preg_replace('/urn:/', '', $ns);
            $ns = preg_replace('/:/', '\\', $ns);
        }

        /**
         if (preg_match('/http:\/\//', $ns)) {
         $ns = preg_replace('/http:\/\//', '', $ns);
         $ns = preg_replace('/\//','\\', $ns);
         $ns = preg_replace('/\./', '\\',$ns);
         }*/

        $matches = array();
        if (preg_match("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#", $ns, $matches)) {
            $elements = explode("/", $matches[3]);
            $domain = $elements[0];
            array_shift($elements);
            //print_r($domain."\n");
            $ns = implode("\\", array_reverse(explode(".", $domain)));
            //$ns = preg_replace('/\./', '\\', );
            //print $ns."\n";
            foreach ($elements as $key => $value) {
                if ($value != '') {
                    $value = preg_replace('/\./', '_', $value);
                    $ns .= "\\" . $value;
                }
            }
        }


        $ns = explode('\\', $ns);
        $i = 0;
        foreach ($ns as $elem) {
            if (preg_match('/^([0-9]+)(.*)$/', $elem)) {
                $ns[$i] = "_".$elem;
            }

            if (in_array($elem, $this->reservedWords)) {
                $ns[$i] = "_".$elem;
            }
            $i++;
        }

        $ns = implode('\\', $ns);

        return $ns;
    }

    /**
     * Convert XML URI to Path
     * @param string $xmlNS XML URI
     *
     * @return string
     */
    private function namespaceToPath($xmlNS)
    {
        $ns = $xmlNS;
        $ns = $this->expandNS($ns);

        if (preg_match('/urn:/', $ns)) {
            $ns = preg_replace('/-/', '_', $ns);
            $ns = preg_replace('/urn:/', '', $ns);
            $ns = preg_replace('/:/', DIRECTORY_SEPARATOR, $ns);
        }


        $matches = array();
        if (preg_match("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#", $ns, $matches)) {
            $elements = explode("/", $matches[3]);
            $domain = $elements[0];
            array_shift($elements);
            //print_r($domain."\n");
            $ns = implode(DIRECTORY_SEPARATOR, array_reverse(explode(".", $domain)));
            //$ns = preg_replace('/\./', '\\', );
            //print $ns."\n";
            foreach ($elements as $key => $value) {
                if ($value != '') {
                    $value = preg_replace('/[\.|-]/', '_', $value);
                    $ns .= DIRECTORY_SEPARATOR . $value;
                }
            }
        }

        $ns = explode(DIRECTORY_SEPARATOR, $ns);
        $i = 0;
        foreach ($ns as $elem) {
            if (preg_match('/^([0-9]+)(.*)$/', $elem)) {
                $ns[$i] = "_".$elem;
            }
            if (in_array($elem, $this->reservedWords)) {
                $ns[$i] = "_".$elem;
            }
            $i++;
        }
        $ns = implode(DIRECTORY_SEPARATOR, $ns);
        return $ns;
    }
}
