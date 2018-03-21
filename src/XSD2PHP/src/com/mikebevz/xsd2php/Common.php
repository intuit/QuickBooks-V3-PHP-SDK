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


/**
 * Common data
 *
 * @author Mike Bevz <myb@mikebevz.com>
 * @version 0.0.1
 */
class Common
{

    /**
     * Prefix for generated class names
     *
     * @var classPrefix
     */
    protected $classPrefix;


    public $basicTypes = array('decimal', 'base64Binary', 'normalizedString',
                                'dateTime', 'date', 'boolean',
                                'positiveInteger', 'anySimpleType',
                                'anyURI', 'byte', 'double', 'duration',
                                //'ENTITIES', 'ENTITY', - not sure about those
                                'float', 'gDay', 'gMonth', 'gMonthDay', 'gYear', 'gYearMonth',
                                'hexBinary',
                                //'ID', 'IDREFS', 'IDREF', - not sure
                                'int', 'integer', 'language', 'long',
                                'negativeInteger', 'nonPositiveInteger', 'nonNegativeInteger',
                                //'Name', 'NSName', 'NMTOKEN', 'NMTOKENS', 'NOTATION',
                                'QName', 'short', 'string', 'time', 'token',
                                'unsignedByte', 'unsignedInt', 'unsignedLong', 'unsignedShort'
                                );

    public $phpTypes = array(
        'int', 'integer', 'float', 'string', 'boolean', 'bool', 'object'
    );

    public $reservedWords = array(
        'and', 'or', 'xor', '__FILE__', 'exception',
        '__LINE__', 'array', 'as', 'break', 'case',
        'class', 'const', 'continue', 'declare', 'default',
        'die', 'do', 'echo', 'else', 'elseif',
        'empty', 'enddeclare', 'endfor', 'endforeach', 'endif',
        'endswitch', 'endwhile', 'eval', 'exit', 'extends',
        'for', 'foreach', 'function', 'global', 'if',
        'include', 'include_once', 'isset', 'list', 'new',
        'print', 'require', 'require_once', 'return', 'static',
        'switch', 'unset', 'use', 'var', 'while',
        '__FUNCTION__', '__CLASS__', '__METHOD__', 'final', 'php_user_filter',
        'interface', 'implements', 'instanceof', 'public', 'private',
        'protected', 'abstract', 'clone', 'try', 'catch',
        'throw', 'this', 'final', '__NAMESPACE__', 'namespace', 'goto',
        '__DIR__'
    );

    public $namespaces = null;

    public $lastNsKey = 0;

    public $debug = false;

    /**
     * Dom document
     * @var DOMDocument
     */
    public $dom;

    /**
     * If all classes should be treated as members of a single namespace, set that string here
     * @var overrideAsSingleNamespace
     */
    public $overrideAsSingleNamespace = false;

    /**
     * __construct
     *
     * @param string  $classPrefix Prefix for generated class names
     *
     * @return void
     */
    public function __construct($classPrefix)
    {
        $this->classPrefix = $classPrefix;
    }

    public function getDocNamespaces($dom)
    {
        $xpath = new \DOMXPath($dom);


        $query = "namespace::*";
        $nss = array();
        $namespaces = $xpath->query($query);

        foreach ($namespaces as $node) {
            $key = "";
            if (preg_match("/:/", $node->nodeName)) {
                list($pref, $key) = explode(":", $node->nodeName);
                if ($key === "xml") {
                    continue;
                }
                $nss[$key] = $node->nodeValue;
            }
        }

        return $nss;
    }

    /**
     *
     * @param string  $qname            QName string (fx, ns1:Name)
     * @param boolean $resolveNamespace [optional] Resolve namespace code to full form
     *
     * @return array($namespace, $nodeName)
     */
    public function parseQName($qname, $resolveNamespace = false)
    {
        if (!preg_match('/:/', $qname)) {
            return array('', $qname);
            //throw new \RuntimeException("Given argument is not of QName type: ".$qname);
        }

        list($ns, $name) = explode(":", $qname);

        if ($resolveNamespace === true) {
            $ns = $this->resolveNamespace($ns);
        }


        return array($ns, $name);
    }

    public function isQName($name)
    {
        if (preg_match('/:/', $name)) {
            return true;
        }

        return false;
    }

    public function urnToPhpName($urn)
    {
        $urn = preg_replace('/urn:|http:\/\//', '', $urn);
        $urn = preg_replace('/-/', '_', $urn);
        return preg_replace('/:|\//', '\\', $urn);
    }

    /**
     * Resolve short namespace to long, or return the same code if not found
     *
     * @param unknown_type $shortNs
     *
     * @return string Long namespace
     */
    public function resolveNamespace($shortNs)
    {
        if (!($this->dom instanceof \DOMDocument)) {
            throw new RuntimeException("DOM is not initialized");
        }

        if (!is_array($this->namespaces)) {
            $this->namespaces = $this->getDocNamespaces($this->dom);
        }

        if (array_key_exists($shortNs, $this->namespaces)) {
            return $this->namespaces[$shortNs];
        } else {
            return $shortNs;
        }
    }

    /**
     * Parse Doc comments
     *
     * @param string $comments
     *
     * @return array
     */
    public function parseDocComments($comments)
    {
        $comments = explode("\n", $comments);
        $commentsOut = array();
        $params = array();
        foreach ($comments as $com) {
            if (preg_match('/@/', $com)) {
                $com = preg_replace('/\* /', '', $com);
                $com = preg_replace('/@([a-zA-Z]*)( *)(.*)/', '$1|$3', $com);
                $com = explode('|', $com);
                //$arr = array();
                if (trim($com[0]) == 'param') {
                    $com[1] = $this->parseParamDocs(trim($com[1]));
                    array_push($params, $com[1]);
                    $com[1] = $params;
                    $com[0] = "params";
                }

                if (trim($com[0]) == 'return') {
                    $com[1] = $this->parseReturnDocs(trim($com[1]));
                }

                $commentsOut[trim($com[0])] = trim($com[1]);
                //array_push($commentsOut, array($com[0] => $com[1]));
            }
        }

        return $commentsOut;
    }

    public function parseParamDocs($string)
    {
        $resp = array();
        $data = explode(" ", $string, 3);
        //print_r($data);
        if (count($data) == 2) {
            $resp['type'] = $data[0];
            $resp['name'] = preg_replace('/\$/', '', $data[1]);
        } elseif (count($data) == 3) {
            $resp['type'] = $data[0];
            $resp['name'] = preg_replace('/\$/', '', $data[1]);
            $resp['docs'] = $data[2];
        } else {
            $resp = $string;
        }

        return $resp;
    }

    public function parseReturnDocs($string)
    {
        $resp = array();
        $data = explode(" ", $string, 2);
        if (count($data) == 1) {
            $resp['type'] = $data[0];
        } elseif (count($data) == 2) {
            $resp['type'] = $data[0];
            $resp['docs'] = $data[1];
        } else {
            $resp = $string;
        }

        return $resp;
    }

    public function getNsCode($longNs, $rt = false)
    {
        // if namespace exists - just use its name
        // otherwise add it as nsatrribute to root and use its name
        if (!is_array($this->namespaces)) {
            $this->namespaces = array();
        }
        if (array_key_exists($longNs, $this->namespaces)) {
            return $this->namespaces[$longNs];
        } else {
            $this->namespaces[$longNs] = 'ns'.$this->lastNsKey;
            //$this->logger->debug($this->namespaces[$longNs]);
            if ($rt === false) {
                $nsAttr = $this->dom->createAttributeNS($longNs, $this->namespaces[$longNs].":".$this->rootTagName);
            }
            $this->lastNsKey++;
            return  $this->namespaces[$longNs];
        }
    }

    /**
     * Convert XMLSchema data type to PHP data type
     *
     * @param mixed $type XML Schema data type
     *
     * @return string
     */
    public function normalizeType($type)
    {
        switch ($type) {
            case 'decimal':
            case 'double':
            case 'float':
                return 'float';
                break;

            case 'base64Binary':
            case 'normalizedString':
            case 'dateTime':
            case 'date':
            case 'anySimpleType':
            case 'anyURI':
            case 'duration':
            case 'gDay':
            case 'gMonth':
            case 'gMonthDay':
            case 'gYear':
            case 'gYearMonth':
            case 'language':
            case 'QName':
            case 'string':
            case 'time':
            case 'token':
                return 'string';
                break;

            case 'boolean':
                return 'boolean';
                break;

            case 'positiveInteger':
            case 'byte':
            case 'hexBinary':
            case 'int':
            case 'integer':
            case 'long':
            case 'negativeInteger':
            case 'nonPositiveInteger':
            case 'nonNegativeInteger':
            case 'short':
            case 'unsignedByte':
            case 'unsignedInt':
            case 'unsignedLong':
            case 'unsignedShort':
                return 'integer';
                break;
            default:
                return $type;
                break;
        }
    }

    public function phpTypeToSoap($phpType)
    {
        switch ($phpType) {
            case 'bool':
            case 'boolean':
                return 'boolean';
                break;
            case 'integer':
            case 'int':
                return 'integer';
                break;
            case 'float':
            case 'double':
                return 'float';
                break;

            case 'string':
                return 'string';
                break;
            //case 'array[integer]':
            //case 'array[integer]':
            default:
                return false;
            //case 'object':
        }
    }
}
