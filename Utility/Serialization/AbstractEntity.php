/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php
namespace Intuit\Ipp\Utility\Serialization;

/**
 * Descirbes meta data for domain model entity 
 */
abstract class AbstractEntity {
    /**
     * Type (or class) of the entity
     * @var string 
     */
    private $type = null;
    
    /**
     * Property name which it has in class
     * @var string
     */
    private $name = null;
    
    /**
     * Class of original defenition of the property
     * @var string
     */
    private $class = null;
    
    /**
     * Specify type of the property if it's known
     * @param string $value
     */
    public function __construct($value = null) {
        $this->setType($value);
    }

    /**
     * Sets type (or class) of the property. It will try to create an instance of this type.
     * @param string $value
     */
    public function setType($value)
    {
        $this->type = $value;
    }
    
    /**
     * Returns current type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Sets name of the property. This property should be available 
     * and accessable in specified type (class).
     * @param string $value
     */
    public function setName($value)
    {
        $this->name = $value;
    }
    
    /**
     * Returns current name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set original class, where property have been defined
     * @param string $value
     */
    public function setClass($value)
    {
        $this->class = $value;
    }
    
    /**
     * Returns class name where property were defined
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }    
}
