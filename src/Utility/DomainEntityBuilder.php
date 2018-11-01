<?php
namespace QuickBooksOnline\API\Utility;

/*Build in class for PHP */
use ReflectionClass;
use ReflectionProperty;
use InvalidArgumentException;
use UnexpectedValueException;
use RuntimeException;

//THis is a incomplete Class. Complete this Class late for Converting Response to JSON Deserialization
//-Hao Feb.7th.2017
/**
 * Converts stdClass object into domain object
 *
 * @author amatiushkin
 */

class DomainEntityBuilder
{
    /**
     * Contains original class name or type of converted object
     * @var string
     */
    private $originalClassName = null;

    /**
     * List of values which new entity must have
     * @var array
     */
    private $definedValues = null;

    /**
     * Reflection of class
     * @var ReflectionClass
     */
    private $reflection = null;

    /**
     * Array of ReflectionProperties instances for the specified class
     * @var type
     */
    private $properties = null;

    /**
     * Array of AbstractEntity instances, which contains complete meta data
     * @var type
     */
    private $model = null;


    /**
     * Requires type or class of target instance
     * @param strign $name
     */
    public function __construct($name)
    {
        $this->originalClassName = $name;
    }

    /**
     * Create reflection based on class name
     * @throws InvalidArgumentException
     */
    private function makeReflection()
    {
        if (!class_exists($this->getOriginalClassName())) {
            throw new InvalidArgumentException('Class name ' . $this->getOriginalClassName() . ' not exists');
        }

        $this->reflection = new ReflectionClass($this->getOriginalClassName());
    }

    /**
     * Returns reflection object for target class
     * @return ReflectionClass
     */
    private function getReflection()
    {
        return $this->reflection;
    }

    /**
     * Collects properties of specified class
     */
    private function populateProperties()
    {
        $this->properties = $this->getReflection()->getProperties();
        $this->populatePropertyComments();
    }

    /**
     * Collect comments for defined properties. It will be used to extract meta data
     * @return mixed
     * @throws UnexpectedValueException
     */
    private function populatePropertyComments()
    {
        if (is_null($this->properties)) {
            throw new UnexpectedValueException('Properties are expected here');
        }

        if (!is_array($this->properties)) {
            throw new UnexpectedValueException('Properties should be provided as array');
        }
        // if nothing to do here
        if (is_array($this->properties) && empty($this->properties)) {
            return null;
        }

        $extractor = new MetadataExtractor();
        $this->model = $extractor->processComments($this->properties);
    }

    /**
     * Returns target class name or type of new instance
     * @return type
     */
    public function getOriginalClassName()
    {
        return $this->originalClassName;
    }

    /**
     * Adds properties and their values, which will be copied into new instance
     * @param array $values
     */
    public function usePropertyValues($values)
    {
        $this->definedValues = $values;
    }

    /**
     * Creates new instance with values
     * @return mixed returns domain model instance
     */
    public function createInstance()
    {
        $this->makeReflection();
        $this->populateProperties();
        return $this->forgeInstance($this->getRootInstance());
    }

    /**
     * Creates new instance of target class with specified values
     * It also adjusts any nested type based on suplied metadata (@var annotation)
     * @return mixed returns domain model instance
     */
    private function forgeInstance($instance)
    {
        $reflection = new ReflectionClass($instance);
        foreach ($reflection->getProperties() as $key => $property) {
            if (!$property instanceof ReflectionProperty) {
                continue;
            }
            $entity = $this->getEntityFromModel($key, $property->getName());
            $value = $property->getValue($instance);

            if (is_array($value)) {
                $this->processPropertyValues($instance, $property, $entity, $value);
            } else {
                $this->processPropertyValue($instance, $property, $entity, $value);
            }
        }
        return $instance;
    }


    private function getRootInstance()
    {
        return new $this->originalClassName($this->definedValues);
    }

    /**
     * Converts object values into domain model entities.
     * This function is array-compatible version of @see processPropertyValue
     * @param mixed $instance - contains empty of almost ready domain model entity
     * @param ReflectionProperty $property
     * @param AbstractEntity $model
     * @param array stdClass $values
     */
    private function processPropertyValues($instance, $property, $model, $values)
    {
        $changed = false;

        foreach ($values as &$value) {
            if (!$this->isMorhing($model, $value)) {
                continue;
            }
            $newType = $model->getType();
            //$value = new $newType( (array) $value );
            $value = static::create($newType, (array) $value);
            $changed = true;
        }
        if ($changed) {
            $property->setValue($instance, $values);
        }
    }

    /**
     * Creates instance of specified type and returns it as result.
     *
     * @param string $type
     * @param array $values
     * @return mixed
     */
    public static function create($type, $values)
    {
        $i = new static($type);
        $i->usePropertyValues($values);
        return $i->createInstance();
    }

    /**
     * Returns true if value can be converted into domain model instance
     * @param AbstractEntity $entity
     * @param stdClass $value
     * @return boolean
     */
    private function isMorhing($entity, $value)
    {
        if (!$entity instanceof Serialization\ObjectEntity) {
            return false;
        }
       //String, numeric are fine
       if (!is_object($value)) {
           return false;
       }
       // if object has same type already (it's wierd, but ok)
       if (get_class($value) === $entity->getType()) {
           return false;
       }
       // we expect stdClass here only
       if (!$value instanceof \stdClass) {
           return false;
       }
        return true;
    }

    /**
     * Converts value into domain model object
     * @param mixed $instance - contains empty of almost ready domain model entity
     * @param ReflectionProperty $property
     * @param AbstractEntity $model
     * @param stdClass $value
     */
    private function processPropertyValue($instance, $property, $model, $value)
    {
        if ($this->isMorhing($model, $value)) {
            $newType = $model->getType();
            $new = static::create($newType, (array) $value);
            $property->setValue($instance, $new);
        }
    }


    /**
     * Returns metadata description of property from model
     *
     * @param type $index
     * @param type $propertyName
     * @return AbstractEntity
     * @throws RuntimeException
     */
    private function getEntityFromModel($index, $propertyName)
    {
        $entity = $this->model[$index];
        if ($entity->getName() === $propertyName) {
            return $entity;
        }
        // TODO Do we need to implement search by name in model?
        throw new RuntimeException("Unexpected $propertyName by the given index.");
    }
}
