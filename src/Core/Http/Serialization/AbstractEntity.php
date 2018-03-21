<?php
namespace QuickBooksOnline\API\Core\Http\Serialization;

/**
 * Descirbes meta data for domain model entity
 */
abstract class AbstractEntity
{
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
    public function __construct($value = null)
    {
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
