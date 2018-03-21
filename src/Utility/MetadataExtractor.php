<?php
namespace QuickBooksOnline\API\Utility;

use ReflectionProperty;
use RuntimeException;
use UnexpectedValueException;
use InvalidArgumentException;
use QuickBooksOnline\API\Core\CoreConstants;
use QuickBooksOnline\API\Core\Http\Serialization\ObjectEntity;
use QuickBooksOnline\API\Core\Http\Serialization\SimpleEntity;
use QuickBooksOnline\API\Core\Http\Serialization\UnknownEntity;
use QuickBooksOnline\API\Core\Http\Serialization\AbstractEntity;

/**
 * Extracts metadata for properties and decides which type is associated with this property
 *
 * @author amatiushkin
 */
class MetadataExtractor
{
    const REGULAR_GET_VAR = "/@var\s+(.*)/";

    public function processComments(array $properties)
    {
        $result = array();
        foreach ($properties as $key=>$value) {
            // skip none-properties
            if (!$value instanceof ReflectionProperty) {
                continue;
            }
            // extract content of @var ...
            // use it for object mapping
            $varCommentValue = $this->extractVarValueFromComment($value->getDocComment());
            if (is_null($varCommentValue)) {
                continue;
            }
            $entity = $this->verifyVariableType($varCommentValue);
            $this->completeProperty($entity, $value);
            $result[$key] = $entity;
        }
        return $result;
    }


    /**
     * Returns value of @var from text. It also returns last part (class name) of path-like value
     *
     * TODO Move this function into separate object outside of this class.
     * Domain Entity builder doesn't care about how values are parsed.
     * It's better to apply dependecy-injection pattern here.
     *
     * The only reason this function is here is for initial implementation.
     *
     * @param type $text
     */
    private function extractVarValueFromComment($text)
    {
        $matches = array();
        $result = preg_match_all(self::REGULAR_GET_VAR, $text, $matches);
         //handle errors
         if (false === $result) {
             // get one of PREG_INTERNAL_ERROR, PREG_BACKTRACK_LIMIT_ERROR etc
            $constants = get_defined_constants(true);
             $text = array_search(preg_last_error(), $constants['pcre']);
             throw new RuntimeException("Regular expression failed on $text with error code: "
                    . (false === $text ? preg_last_error() : $text)); //push text or error code
         }
         //handle multiple entries in a hard way
         if ($result > 1) {
             throw new UnexpectedValueException("Following comment: $text \ncontains more than one @var definition, which is unexpected");
         }

         // no result, stop here if no group match
         if (empty($result) || empty($matches[1]) || empty($matches[1][0])) {
             return null;
         }

         // return first result (0-index) of the first group match
         return $matches[1][0];
    }

    /**
     *  Verifies type and creates entity object
     * @param type $value
     * @return AbstractEntity
     */
    private function verifyVariableType($value)
    {
        // if value can be mapped to simple type
       if (in_array(strtolower($value), array("string","float","double","boolean", "integer"))) {
           return new SimpleEntity(strtolower($value));
       }

       // generate names
       // try it
       foreach ($this->generateObjectNames($value) as $name) {
           $name = $this->addNameSpaceToPotentialClassName($name);
           if (class_exists($name)) {
               return new ObjectEntity($name);
           }
       }

        return new UnknownEntity($value);
    }

    private function addNameSpaceToPotentialClassName($name)
    {
        $name = trim($name);
        $lists = explode('\\', $name);
        $ippEntityName = end($lists);
        $ippEntityName = CoreConstants::NAMEPSACE_DATA_PREFIX . $ippEntityName;
        return $ippEntityName;
    }

    /**
     * Returns order list of possible valid names of object type
     * @param type $value
     * @return type
     */
    private function generateObjectNames($value)
    {
        $reversiveStack = array();
        $reversiveStack[] = $value; // add original value. It will be called last
        $reversiveStack[] = $this->removeArrayBrackets($value); //
        $reversiveStack[] = $this->getIntuitName($this->removeArrayBrackets($value));
        $reversiveStack[] = $this->getIntuitName($this->removeArrayBrackets($this->getClassNameFromPackagePath($value)));
        $reversiveStack[] = $this->removeArrayBrackets($this->getClassNameFromPackagePath($value));
        $reversiveStack[] = $this->getClassNameFromPackagePath($value);
        return array_reverse($reversiveStack);
    }

    /**
     * Removes brackets from comments. In other words
     * it cleans up collection-like definitions (e.g. MyCollectionOfType[])
     * @param string $string
     * @return string
     */
    private function removeArrayBrackets($string)
    {
        return str_replace(array('[',']'), array('',''), $string);
    }

    /**
     * Returns last part from package-like names (e.g. my\package\MyClass).
     * Expected result is MyClass
     *
     * @param string $string
     * @return string
     */
    private function getClassNameFromPackagePath($string)
    {
        $array = explode('\\', $string);
        if (is_array($array) && count($array)) {
            return array_pop($array);
        }
        return '';
    }

    /**
     * Returns class name with prefix
     * TODO Move it out from this object and make this class generic
     * @param type $string
     * @return type
     */
    private function getIntuitName($string)
    {
        $string = trim($string);
        return $string;
    }

    /**
     * Finilizes created metadata description with few more info
     * @param AbstractEntity $a
     * @param ReflectionProperty $p
     * @throws InvalidArgumentException
     */
    private function completeProperty($a, ReflectionProperty $p)
    {
        if (!$a instanceof AbstractEntity) {
            throw new InvalidArgumentException("Expected instance of AbstractEntity here");
        }
        $a->setName($p->getName());
        $a->setClass($p->getDeclaringClass());
    }
}
