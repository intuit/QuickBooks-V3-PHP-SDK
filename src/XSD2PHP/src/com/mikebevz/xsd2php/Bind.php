<?php
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

/**
 * Bind XML to PHP binding
 *
 * @author Mike Bevz <myb@mikebevz.com>
 * @version 0.0.5
 */
class Bind extends Common
{

    //protected $dom;
    //protected $namespaces;

    /**
     * __construct
     *
     * @param string  $classPrefix Prefix for generated class names
     *
     * @return void
     */
    public function __construct($classPrefix)
    {
        parent::__construct($classPrefix);
    }

    /**
     * Unmarshal XML string to corresponding PHP binding
     *
     * @param string $xml XML string to unmarshal
     *
     * @return object PHP binding object
     */
    public function unmarshal($xml)
    {
        // Get all namespaces
        $this->dom = new \DOMDocument();
        if ($this->debug) {
            $this->dom->formatOutput = true;
        }
        $this->dom->loadXML($xml);

        $this->namespaces =  $this->getDocNamespaces($this->dom);

        // Find targetNamespace

        $xpath = new \DOMXPath($this->dom);
        $query = ".";
        $root = $xpath->query($query);
        $ns = $code = "";
        foreach ($root as $rt) {
            list($ns, $name) = $this->parseQName($rt->nodeName, true);
        }

        $className = $this->urnToPhpName($ns)."\\".$this->classPrefix.$name;

        if (!class_exists($className, CoreConstants::USE_AUTOLOADER)) {
            throw new \RuntimeException('Class '.$className. ' is not found. Make sure it was included');
        }

        $binding = new $className();

        return $this->bindXml($xml, $binding);

        // Instantiate class
        // Assign corresponding nodes to properties/classes
        // return PHP binding
    }

    /**
     * Bind XML file to model
     * @param string $xml   XML source
     * @param object $model PHP Model to bind to
     *
     * @return object PHP model
     */
    public function bindXml($xml, $model)
    {

        //print_r($xml."\n ".get_class($model));

        $this->dom = new \DOMDocument();
        $this->dom->loadXML($xml);

        $refl  = new \ReflectionClass(get_class($model));

        // In the following code we ignore any elements
        // of IntuitAnyType since the contents are unknown and cannot be deserialized by
        // the algorithm below.
        // Schema for IntuitAnyType uses element wildcard xs:any,
        // <xs:complexType name="IntuitAnyType">
        //     <xs:annotation>
        //         <xs:documentation>
        //             Product: ALL
        //             Description: Definition of IntuitAnyType to add and extend new elements to the existing entities.
        //         </xs:documentation>
        //     </xs:annotation>
        //     <xs:sequence>
        //         <xs:any namespace="##any" processContents="lax" minOccurs="0" maxOccurs="unbounded"/>
        //     </xs:sequence>
        // </xs:complexType>
        // Adding namesapce now for
        //echo "Class name is:" . $refl->name . "\n";
        if ($refl->name != 'QuickBooksOnline\API\Data\IPPIntuitAnyType') {
            $xpath = new \DOMXPath($this->dom);

            $query = "child::*";
            $childs = $xpath->query($query);

            foreach ($childs as $child) {
                list($ns, $name) = $this->parseQName($child->nodeName, true);
                //$className = $this->urnToPhpName($ns)."\\".$name;
                try {
                    $propertyDocs = $refl->getProperty($name)->getDocComment();
                } catch (\ReflectionException $e) {
                    throw new \RuntimeException($e->getMessage() . ". Class " . get_class($model));
                }
                $docs = $this->parseDocComments($propertyDocs);
                $className = $docs['var'];


                if ($this->hasChild($child)) {
                    if (property_exists($model, $name)) {
                        $doc = new \DOMDocument();
                        $doc->appendChild($doc->importNode($child, true));

                        if ($this->overrideAsSingleNamespace) {
                            $nsLastName = array_reverse(explode('\\', $className));
                            $className = $nsLastName[0];
                        }
                        /**
                         *Vish Singh: Solution to Bug # IPP-4748
                         *Add Check if the class Exists. @Hao
                         */
                         if (class_exists($className, CoreConstants::USE_AUTOLOADER)) {
                             //Do nothing
                         } elseif (class_exists(CoreConstants::NAMEPSACE_DATA_PREFIX . $className)) {
                             $className = CoreConstants::NAMEPSACE_DATA_PREFIX . $className;
                         } else {
                             throw new \Exception("Can't find corresponding CLASS for className" . $className . " in Bind.php");
                         }

                        if ($model->{$name}) { //If this property has been seen before then turn this into an array if it's not already
                            if (!is_array($model->{$name})) { //If this property is not already an array, then turn it into one
                                $model->{$name} = array($model->{$name}, $this->bindXml($doc->saveXml(), new $className()));
                            } else { //If it is already an array then, just append to this array.
                                array_push($model->{$name}, $this->bindXml($doc->saveXml(), new $className()));
                            }
                        } //If this property hasn't been seen before then just treat it normally
                        else {
                            $model->{$name} = $this->bindXml($doc->saveXml(), new $className());
                        }
                        // end of fix
                    } else {
                        throw new \RuntimeException('Class ' . get_class($model) . ' does not have property ' . $name);
                    }
                } else {
                    if (!property_exists($model, $name)) {
                        throw new \RuntimeException("Model " . get_class($model) . " does not have property " . $name);
                    }
                    if (!class_exists($className)) {
                        //print_r($className."\n");
                        $propertyDocs = $refl->getProperty($name)->getDocComment();
                        $docs = $this->parseDocComments($propertyDocs);
                        $type = $docs['xmlType'];
                        //print_r("Type: ". $type."\n");
                        if ($type == 'attribute') {
                            $model->{$name} = $child->nodeValue;
                        } elseif ($type == 'element') {
                            $model->{$name} = $child->nodeValue;
                        } // elseif ($type == 'value') {
                        //    $model->value = $child->nodeValue;
                        //}
                        else {
                            throw new \RuntimeException('Class ' . $className . ' does not exist');
                        }
                    } else {
                        //$name = $child->nodeName;
                        $cModel = new $className();
                        $cModel->value = $child->nodeValue;
                        $model->{$name} = $cModel;
                    }
                }
            }
        }

        return $model;
    }

    private function hasChild($node)
    {
        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $c) {
                if ($c->nodeType === XML_ELEMENT_NODE) {
                    return true;
                }
            }
        }
        return false;
    }

    public function bindXmlRec($node, $dom, $modelName)
    {
        $model = '';

        if (class_exists($modelName)) {
            $model = new $modelName();
        } else {
            throw new \RuntimeException('Class '.$modelName.' does not exist');
        }

        $refl = new \ReflectionClass($model);

        $xpath = new \DOMXPath($dom);
        $query = "child::*";
        $childs = $xpath->query($query, $node);
        foreach ($childs as $child) {
            if ($this->hasChild($child)) {
                if (property_exists($model, $child->nodeName)) {
                    $model->{$child->nodeName} = $this->bindXMlRec($child, $dom, $child->nodeName);
                }
            } else {
                if (!property_exists($model, $child->nodeName)) {
                    throw new \RuntimeException("Model does not have property ".$child->nodeName);
                }
                if (!class_exists($child->nodeName)) {
                    $propertyDocs = $refl->getProperty($child->nodeName)->getDocComment();
                    $docs = $this->parseDocComments($propertyDocs);
                    $type = $docs['xmlType'];
                    if ($type == 'attribute') {
                        $model->{$child->nodeName} = $child->nodeValue;
                    } else {
                        //print_r($propertyType);
                     throw new \RuntimeException('Class '.$child->nodeName.' does not exist');
                    }
                } else {
                    $name = $child->nodeName;
                    $cModel = new $name();
                    $cModel->value = $child->nodeValue;
                    $model->{$child->nodeName} = $cModel;
                }
            }
        }

        return $model;
    }
}
