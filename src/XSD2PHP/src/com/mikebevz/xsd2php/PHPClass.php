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

//require_once dirname(__FILE__) . '/Common.php';

/**
 * PHP Class representation
 *
 * @author Mike Bevz <myb@mikebevz.com>
 * @version 0.0.1
 *
 */
class PHPClass extends Common
{
    /**
     * Class name
     *
     * @var class name
     */
    public $name;

    /**
     * Array of class level documentation
     *
     * @var array
     */
    public $classDocBlock;

    /**
     * Class type
     *
     * @var string
     */
    public $type;

    /**
     * Class namespace
     * @var string
     */
    public $namespace;

    /**
     * Class type namespace
     * @var string
     */
    public $typeNamespace;

    /**
     * Class properties
     *
     * @var array
     */
    public $classProperties;

    /**
     * Class to extend
     * @var string
     */
    public $extends;

    /**
     * Namespace of parent class
     * @var string
     */
    public $extendsNamespace;

    /**
     * Array of class properties  array(array('name'=>'propertyName', 'docs' => array('property'=>'value')))
     * @var array
     */
    public $properties;

    /**
     * Show debug info
     * @var boolean
     */
    public $debug = false;


    public $constants;

    /**
     * __construct
     *
     * @param string  $classPrefix Prefix for generated class names
     *
     * @return void
     */
    public function __construct($classPrefix='')
    {
        parent::__construct($classPrefix);
    }

    /**
     * Returns array of PHP classes
     *
     * @return array
     */
    public function getPhpCode()
    {
        $code = "\n";
        if ($this->extendsNamespace != '') {
            if (false === $this->overrideAsSingleNamespace) {
                $code .= "use ".$this->extendsNamespace.";\n";
            }
        }

        if (!empty($this->classDocBlock)) {
            $code .= $this->getDocBlock($this->classDocBlock);
        }

        if ($this->name == $this->classPrefix.$this->extends) {
            $this->name = $this->name . "Wrapper";
        }

        $code .= 'class '.$this->name."\n";
        if ($this->extends != '') {
            if ($this->extendsNamespace != '') {
                $nsLastName = array_reverse(explode('\\', $this->extendsNamespace));
                $code .= "\t".'extends '.$this->classPrefix.$nsLastName[0];
                //$code = "require_once('".$this->classPrefix.implode('/', $nsLastName).".php');\n" . $code;
            } else {
                $code .= "\t".'extends '.$this->classPrefix.$this->extends."\n";
            }
        }
        $code .= "\t".'{'."\n";


        $propNames = array();
        foreach ($this->classProperties as $oneProp) {
            $propNames[] = $oneProp['name'];
        }
        $code .= ''."\n";

        $code .= "\t\t".'/**                                                                       '."\n";
        $code .= "\t\t".'* Initializes this object, optionally with pre-defined property values    '."\n";
        $code .= "\t\t".'*                                                                         '."\n";
        $code .= "\t\t".'* Initializes this object and it\'s property members, using the dictionary'."\n";
        $code .= "\t\t".'* of key/value pairs passed as an optional argument.                      '."\n";
        $code .= "\t\t".'*                                                                         '."\n";
        $code .= "\t\t".'* @param dictionary $keyValInitializers key/value pairs to be populated into object\'s properties '."\n";
        $code .= "\t\t".'* @param boolean $verbose specifies whether object should echo warnings   '."\n";
        $code .= "\t\t".'*/                                                                        '."\n";
        $code .= "\t\t".'public function __construct($keyValInitializers=array(), $verbose=FALSE)'."\n";
        $code .= "\t\t".'{'."\n";
        $code .= "\t\t\t".'foreach($keyValInitializers as $initPropName => $initPropVal)'."\n";
        $code .= "\t\t\t".'{'."\n";
        $code .= "\t\t\t\t".'if (property_exists(\''. $this->name . '\',$initPropName) || property_exists(\'QuickBooksOnline\\API\\Data\\'. $this->name . '\',$initPropName))'."\n";
        $code .= "\t\t\t\t".'{'."\n";
        $code .= "\t\t\t\t\t".'$this->{$initPropName} = $initPropVal;'."\n";
        $code .= "\t\t\t\t".'}'."\n";
        $code .= "\t\t\t\t".'else'."\n";
        $code .= "\t\t\t\t".'{'."\n";
        $code .= "\t\t\t\t\t".'if ($verbose)'."\n";
        $code .= "\t\t\t\t\t\t".'echo "Property does not exist ($initPropName) in class (".get_class($this).")'."\";\n";
        $code .= "\t\t\t\t".'}'."\n";
        $code .= "\t\t\t".'}'."\n";
        $code .= "\t\t".'}'."\n";

        $code .= ''."\n";
        if (in_array($this->type, $this->basicTypes)) {
            $code .= "\t\t".$this->getDocBlock(array('xmlType'=>'value', 'var' => $this->normalizeType($this->type)), "\t\t");
            $code .= "\t\tpublic ".'$value;';
        }

        if (!empty($this->classProperties)) {
            $code .= $this->getClassProperties($this->classProperties);
        }

        if (!empty($this->constants)) {
            $code .= $this->getClassConstants($this->constants);
        }


        $code .= ''."\n";
        $code .= ''."\n";
        $code .= '} // end class '.$this->name."\n";
        return $code;
    }

    /**
     * Return class properties from array with indent specified
     *
     * @param array $props  Properties array
     * @param array $indent Indentation in tabs
     *
     * @return string
     */
    public function getClassProperties($props, $indent = "\t")
    {
        $code = $indent."\n";

        foreach ($props as $prop) {
            if (!empty($prop['docs'])) {
                $code .= $indent.$this->getDocBlock($prop['docs'], $indent);
            }
            $code .= $indent.'public $'.$prop['name'].";\n";
        }
        return $code;
    }


    public function getClassConstants($const, $indent = "\t")
    {
        $code = array();

        foreach ($const as $value) {
            //$code[] = $indent.'const ' . $this->constNameFromValue($value) . " = \"$value\";"  ;
        }
        return implode("\n", $code);
    }

    public function constNameFromValue($value)
    {
        return strtoupper(str_ireplace(array(" ","-"), "_", $value));
    }

    /**
     * Return docBlock
     *
     * @param array  $docs   Array of docs
     * @param string $indent Indentation
     *
     * return string
     */
    public function getDocBlock($docs, $indent = "")
    {
        $code  = '/**'."\n";
        foreach ($docs as $key => $value) {
            $code .= $indent.' * @'.$key.' '.$value."\n";
        }
        $code .= $indent.' */'."\n";
        return $code;
    }
}
