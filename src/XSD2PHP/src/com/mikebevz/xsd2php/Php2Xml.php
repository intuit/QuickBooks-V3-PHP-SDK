<?php
//namespace com\mikebevz\xsd2php;
namespace QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php;

use QuickBooksOnline\API\Core\CoreConstants;

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

//require_once dirname(__FILE__) . '/Common.php';
//require_once dirname(__FILE__) . '/NullLogger.php';

/**
 * PHP to XML converter
 *
 * @author Mike Bevz <myb@mikebevz.com>
 * @version 0.0.4
 */
class Php2Xml extends Common
{
    /**
     * Php class to convert to XML
     * @var Object
     */
    private $phpClass = null;


    /**
     *
     * @var DOMElement
     */
    private $root;


    protected $rootTagName;

    private $logger;

    /**
     * __construct
     *
     * @param string  $classPrefix Prefix for generated class names
     * @param string  $phpClass
     *
     * @return void
     */
    public function __construct($classPrefix, $phpClass = null)
    {
        parent::__construct($classPrefix);

        if ($phpClass != null) {
            $this->phpClass = $phpClass;
        }

        // @todo implement logger injection
        // this does not work due to PHP bug @see http://bugs.php.net/bug.php?id=46813
        if (class_exists('\Zend_Registry', false) && \Zend_Registry::isRegistered('logger')) {
            $this->logger = \Zend_Registry::get('logger');
        } else {
            $this->logger = new NullLogger();
        }

        $this->buildXml();
    }

    public function getXml($phpClass = null)
    {
        if ($this->phpClass == null && $phpClass == null) {
            throw new \RuntimeException("Php class is not set");
        }

        if ($phpClass != null) {
            $this->phpClass = $phpClass;
        }

        $propDocs = $this->parseClass($this->phpClass, $this->dom, true);

        foreach ($propDocs as $name => $data) {
            if (is_array($data['value'])) {
                $elName = array_reverse(explode("\\", $name));
                $code = $this->getNsCode($data['xmlNamespace']);
                foreach ($data['value'] as $arrEl) {
                    //@todo fix this workaroung. it's only works for one level array
                    $dom = $this->dom->createElement($code.":".$elName[0]);
                    $this->parseObjectValue($arrEl, $dom);
                    $this->root->appendChild($dom);
                }
            } else {
                $this->addProperty($data, $this->root);
            }
        }
        $xml = $this->dom->saveXML();
        //$xml = utf8_encode($xml);

        return $xml;
    }

    /**
     * get_class_vars_fix_order
     *
     * Mitigates a problem with get_class_vars, wherein get_class_vars does not honor the
     * order of class members derived via 'extend' of a parent class (potentially even an
     * extend that has multiple layers of inheritance)
     *
     * @param string $className
     *
     * @return array
     */
    private function get_class_vars_fix_order($className)
    {
        $propNames = array();
        $parentClassName = get_parent_class($className);

        $classMembersOnlyInherited = array();
        if ($parentClassName) {
            $classMembersOnlyInherited = $this->get_class_vars_fix_order(get_parent_class($className));
        }

        $classMembersIncludingInherited = array_keys(get_class_vars($className));
        $classMembersNotInherited = array_diff($classMembersIncludingInherited, $classMembersOnlyInherited);
        $orderedClassMembers = array_merge($classMembersOnlyInherited, $classMembersNotInherited);

        return $orderedClassMembers;
    }

    private function parseClass($object, $dom, $rt = false)
    {
        $refl = new \ReflectionClass($object);
        $docs = $this->parseDocComments($refl->getDocComment());

        if (($this->overrideAsSingleNamespace) && ($docs['xmlNamespace'] == '')) {
            $docs['xmlNamespace']=$this->overrideAsSingleNamespace;
        }

        if ($docs['xmlNamespace'] != '') {

            // Xml name needs to strip class prefix during parse
            if ($this->classPrefix && (0==strpos($docs['xmlName'], $this->classPrefix))) {
                $docs['xmlName'] = substr($docs['xmlName'], strlen($this->classPrefix));
            }

            $code = '';
            if (is_object($this->root)) { // root initialized
                $code = $this->getNsCode($docs['xmlNamespace']);
                $root = $this->dom->createElement($code.":".$docs['xmlName']);
            } else { // creating root element
                $code = $this->getNsCode($docs['xmlNamespace'], true);
                $root = $this->dom->createElementNS($docs['xmlNamespace'], $code.":".$docs['xmlName']);
            }

            $dom->appendChild($root);
        } else {
            //print_r("No Namespace found \n");
            $root = $this->dom->createElement($docs['xmlName']);
            $dom->appendChild($root);
        }

        if ($rt === true) {
            $this->rootTagName = $docs['xmlName'];
            $this->rootNsName = $docs['xmlNamespace'];
            $this->root = $root;
        }

        // Beware: getProperties does not honor member order for members derived via inheritance
        $properties = $refl->getProperties();

        $propDocs = array();
        foreach ($properties as $prop) {
            $pDocs = $this->parseDocComments($prop->getDocComment());
            $propDocs[$prop->getName()] = $pDocs;
            $propDocs[$prop->getName()]['value'] = $prop->getValue($object);
        }

        // Re-order $propDocs output, into correctly-ordered $correctMemberOrder
        $correctMemberOrder = $this->get_class_vars_fix_order(get_class($object));
        $correctMemberOrder = array_flip($correctMemberOrder);
        foreach ($propDocs as $key => $val) {
            $correctMemberOrder[$key]=$val;
        }

        return $correctMemberOrder;
    }

    private function buildXml()
    {
        $this->dom = new \DOMDocument('1.0', 'UTF-8');
        $this->dom->formatOutput = true;
        $this->dom->preserveWhiteSpace = false;
        $this->dom->recover = false;
        $this->dom->encoding = 'UTF-8';
    }



    private function addProperty($docs, $dom)
    {
        if (isset($docs['value'])) {
            $el = "";

            if (array_key_exists('xmlNamespace', $docs)) {
                $code = $this->getNsCode($docs['xmlNamespace']);
                $el = $this->dom->createElement($code.":".$docs['xmlName']);
            } else {
                $el = $this->dom->createElement($docs['xmlName']);
            }

            // SDK-78
            // converts numbers into string representation from any numeric
            if (is_numeric($docs['value'])) {
                $docs['value'] = (string) $docs['value'];
            }
            //

            if (is_object($docs['value'])) {
                //print_r("Value is object \n");
                $el = $this->parseObjectValue($docs['value'], $el);
            } elseif (is_string($docs['value'])) {
                if ($docs['xmlType'] == 'attribute') {
                    $atr = $this->dom->createAttribute($docs['xmlName']);
                    $text = $this->dom->createTextNode($docs['value']);
                    $atr->appendChild($text);

                    $el = $atr;
                } elseif (array_key_exists('xmlNamespace', $docs)) {
                    $code = $this->getNsCode($docs['xmlNamespace']);
                    $el = $this->dom->createElement($code.":".$docs['xmlName'], htmlspecialchars($docs['value'], ENT_QUOTES, 'UTF-8'));
                } else {
                    $el = $this->dom->createElement($docs['xmlName'], $docs['value']);
                }
            } else {
                //print_r("Value is not string");
            }

            $dom->appendChild($el);
        }
    }

    /**
     *
     * Parse value of the object
     *
     * @param Object $obj
     * @param DOMElement $element
     *
     * @return DOMElement
     */
    private function parseObjectValue($obj, $element)
    {
        $this->logger->debug("Start with:".$element->getNodePath());

        $refl = new \ReflectionClass($obj);

        $classDocs  = $this->parseDocComments($refl->getDocComment());
        $classProps = $refl->getProperties();
        $namespace = $classDocs['xmlNamespace'];
        foreach ($classProps as $prop) {
            $propDocs = $this->parseDocComments($prop->getDocComment());
            //print_r($prop->getDocComment());

            if (is_object($prop->getValue($obj))) {
                $code = '';
                $propDocs['xmlName'] = (isset($propDocs['xmlName'])) ? trim($propDocs['xmlName']) : '';
                //print($propDocs['xmlName']."\n");
                if (array_key_exists('xmlNamespace', $propDocs)) {
                    $code = $this->getNsCode($propDocs['xmlNamespace']);
                    $el = $this->dom->createElement($code.":".$propDocs['xmlName']);
                    $el = $this->parseObjectValue($prop->getValue($obj), $el);
                } else {
                    $el = $this->dom->createElement($propDocs['xmlName']);
                    $el = $this->parseObjectValue($prop->getValue($obj), $el);
                }
                //print_r("Value is object in Parse\n");

                $element->appendChild($el);
            } else {
                //Next function fixes SDK-78
                $this->castToStringZero($prop, $obj);
                // end

                if ($prop->getValue($obj) != '') {
                    if ($propDocs['xmlType'] == 'element') {
                        $el = '';
                        $code = $this->getNsCode($propDocs['xmlNamespace']);
                        $value = $prop->getValue($obj);

                        if (is_array($value)) {

                            // Strip the class prefix, if one exists
                            if ($this->classPrefix && (0===strpos($propDocs['xmlName'], $this->classPrefix))) {
                                $propDocs['xmlName'] = substr($propDocs['xmlName'], strlen($this->classPrefix));
                            }

                            $this->logger->debug("Creating element:".$code.":".$propDocs['xmlName']);
                            $this->logger->debug(print_r($value, true));
                            foreach ($value as $node) {
                                $this->logger->debug(print_r($node, true));
                                $el = $this->dom->createElement($code.":".$propDocs['xmlName']);
                                $arrNode = $this->parseObjectValue($node, $el);
                                $element->appendChild($arrNode);
                            }
                        } else {
                            //SDK-39
                            $el = $this->dom->createElement($code.":".$propDocs['xmlName'], htmlspecialchars($value));
                            $element->appendChild($el);
                        }
                        //print_r("Added element ".$propDocs['xmlName']." with NS = ".$propDocs['xmlNamespace']." \n");
                    } elseif ($propDocs['xmlType'] == 'attribute') {
                        $atr = $this->dom->createAttribute($propDocs['xmlName']);
                        $text = $this->dom->createTextNode($prop->getValue($obj));
                        $atr->appendChild($text);
                        $element->appendChild($atr);
                    } elseif ($propDocs['xmlType'] == 'value') {
                        $this->logger->debug(print_r($prop->getValue($obj), true));

                        $txtNode = $this->dom->createTextNode($prop->getValue($obj));
                        $element->appendChild($txtNode);
                    }
                }
            }
        }

        return $element;
    }

    /**
     * Returns true if value is empty and has a numeric type.
     * Basically this is for zero (0).
     * @param type $value
     * @return type
     */
    private function isEmptyInt($value)
    {
        return empty($value) && is_numeric($value);
    }

    /**
     * Cast numeric empty value to string
     * @see SDK-78
     * @param ReflectionProperty $prop
     * @param Object $obj
     */
    private function castToStringZero($prop, $obj)
    {
        if ($this->isEmptyInt($prop->getValue($obj))) {
            //reset value in very specific case to keep it intact
            $prop->setValue($obj, (string) $prop->getValue($obj));
        }
    }
}
