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
//require_once 'Bind.php';
//require_once 'Php2Xml.php';

/**
 * Class aware SOAP Server implementation
 *
 * @todo Multiple parameters to service methods are not supported
 * @todo Limited support of XML Schema constructions, working example as follows
 * <xsd:complexType name="updateContactCompanyType">
 *               <xsd:sequence>
 *                   <xsd:element ref="ns1:ContactCompany" />
 *               </xsd:sequence>
 *           </xsd:complexType>
 *  <xsd:element name="updateContactCompany" type="tns:updateContactCompanyType" />
 *
 * @todo Refactor type extracting algorithm
 *
 * @author Mike Bevz <myb@mikebevz.com>
 *
 */
class SoapServer extends \SoapServer
{

    /**
     *
     * @var Common
     */
    private $common;

    /**
     *
     * @var array
     */
    private $xsdTypes = array();

    public function __construct($wsdl, $options)
    {
        $this->common = new Common();

        $types = $this->getXSDTypes($wsdl);

        $options['typemap'] = array();

        foreach ($types as $type) {
            array_push($options['typemap'], array('type_name' => $type['name'], 'type_ns' => $type['namespace'],
                        'from_xml' => 'com\\mikebevz\\xsd2php\\SoapServer::unmarshalRoot', 'to_xml' => 'com\\mikebevz\\xsd2php\\SoapServer::marshalRoot'
                        ));
        }
        parent::SoapServer($wsdl, $options);
    }

    public static function unmarshalRoot($string)
    {
        $dom = new \DomDocument();
        $dom->loadXml($string);
        $xpath = new \DomXPath($dom);
        $query = "child::*";
        $childs = $xpath->query($query);
        $binding = array();
        foreach ($childs as $child) {
            $legko = new Bind();
            $lDom = new \DomDocument();
            $lDom->appendChild($lDom->importNode($child, true));
            $binding = $legko->unmarshal($lDom->saveXml());
        }

        return $binding;
    }

    public static function marshalRoot($object)
    {
        //@todo Check return result on Java/.Net sides
        $marshal = new Php2Xml();
        $xml = $marshal->getXml($object);

        return $xml;
    }

    private function getXSDTypes($wsdl)
    {
        $dom = new \DOMDocument();
        $dom->load($wsdl);
        $xpath = new \DOMXPath($dom);
        $query = "//*[local-name()='definitions']/*[local-name()='types']/*";
        $schema = $xpath->query($query);
        $this->common->dom = $dom;

        $xsd = '';
        $xsdDom = '';
        // Extract XML Schema from WSDL
        foreach ($schema as $s) {
            $mdom = new \DOMDocument();
            $mdom->appendChild($mdom->importNode($s, true));
            //$this->common->dom = $mdom;
            list($ns, $name) = $this->common->parseQName($s->nodeName, true);
            if ($ns == 'http://www.w3.org/2001/XMLSchema' && $name == 'schema') {
                $xsdDom = $mdom;
            }
        }
        if (!($xsdDom instanceof \DOMDocument)) {
            throw new RuntimeException("Cannot find XML Schema in given WSDL ".$wsdl);
        }


        $xpath = new \DOMXPath($xsdDom);
        $query = "//*[local-name()='schema']/@targetNamespace";
        $targetNamespace = $xpath->query($query);
        $tNs = $targetNamespace->item(0)->nodeValue;

        $query = "child::node()";
        $nodes = $xpath->query($query);
        //$xsdTypes = array();

        foreach ($nodes as $node) {
            if ($node->nodeType == XML_ELEMENT_NODE) {
                $this->parseNode($node, $tNs);
                //if ($res != '') {
                //    $this->xsdTypes[] = $res;
                //}
            }
        }

        //print_r($this->common->namespaces);

        return $this->xsdTypes;
    }

    private function parseNode($node, $tNs)
    {
        $nodeNs = $nodeName = '';

        if ($this->common->isQName($node->nodeName)) {
            list($nodeNs, $nodeName) = $this->common->parseQName($node->nodeName, true);
        } else {
            $nodeNs = $tNs;
            $nodeName = $node->nodeName;
        }

        //print_r("Name: ".$nodeName." ".$nodeNs."\n");
        if ($nodeName == '') {
            return;
        }
        if ($nodeNs != 'http://www.w3.org/2001/XMLSchema') {
            return;
        }
        $xsdTypes = array();
        switch ($nodeName) {
            case 'element':
                //parse element node
                $this->parseElementNode($node, $tNs);
                break;
            case 'complexType':
                // parse complex type
                $this->parseComplexTypeNode($node, $tNs);
                break;
            case 'simpleType':
                break;
            case 'attribute':
                break;
            case 'group':
                break;
            case 'all':
            case 'sequence':
                   //print_r('Sequence or All'."\n");
                foreach ($node->childNodes as $child) {
                    $this->parseNode($child, $tNs);
                }
                break;
            default:
                break;
        }
    }

    private function parseElementNode($node, $tNs)
    {
        if ($node->getAttribute('name') != '') {
            $res = $this->parseElementNameNode($node, $tNs);
            //return $res;
        } elseif ($node->getAttribute('ref') != '') {
            return $this->parseElementRefNode($node, $tNs);
        } else {
            // wrong element?
        }
    }

    private function parseElementNameNode($node, $tNs)
    {
        if ($node->getAttribute('type') != '') {
            $type = $node->getAttribute('type');
            list($typeNs, $typeName) = $this->common->parseQName($type, true);
            //print_r($typeName."\n");
            if ($typeNs != 'http://www.w3.org/2001/XMLSchema') {
                //print_r(array('name' => $node->getAttribute('name'), 'type' => 'element', 'namespace' => $tNs));
                array_push($this->xsdTypes, array('name' => $node->getAttribute('name'), 'type' => 'element', 'namespace' => $tNs));
                array_push($this->xsdTypes, array('name' => $typeName, 'type' => 'element', 'namespace' => $typeNs));
            }
        } else {
            // Parse child notes is there is not type specified
            //
            foreach ($node->childNodes as $child) {
                // get complex type ref
                $this->parseNode($child, $tNs);
            }
        }
    }

    private function parseElementRefNode($node, $tNs)
    {
        if ($node->getAttribute('ref') != '') {
            $element = $node->getAttribute('ref');
            list($elNs, $elName) = $this->common->parseQName($element, true);
            if ($elNs != 'http://www.w3.org/2001/XMLSchema') {
                array_push($this->xsdTypes, array('name' => $elName, 'type' => 'element', 'namespace' => $elNs));
            }
        }
    }

    private function parseComplexTypeNode($node, $tNs)
    {
        if ($node->getAttribute('name') != '') {
            //print_r('Name Type'."\n");
            $res = $this->parseComplexTypeName($node, $tNs);
        } else {
            //print_r('No Name Type'."\n");
            $this->parseComplexTypeNoName($node, $tNs);
        }
    }

    private function parseComplexTypeName($node, $tNs)
    {
        //$resp = array();
        foreach ($node->childNodes as $child) {
            $resp[] = $this->parseNode($child, $tNs);
        }
        //return $resp;
    }

    private function parseComplexTypeNoName($node, $tNs)
    {
        //$resp = array();
        foreach ($node->childNodes as $child) {
            $this->parseNode($child, $tNs);
        }
        //return $resp;
    }
}
