<?php

namespace QuickBooksOnline\API\Core\Http\Serialization;

use QuickBooksOnline\API\Core\CoreConstants;

/**
 * Entity serialize contract.
 */
class IEntitySerializer
{

    /**
     * Serializes the specified entity.
     * @param object entity
     * @return object Returns the serialize entity in string format.
     */
    public function Serialize($entity)
    {
    }

    /**
     * DeSerializes the message to Type T.
     * @param T The type to be  serailse to (unused; auto-detected)
     * @param string The message
     * @return string Returns the deserialized message.
     */
    public function Deserialize($message, $limit = false)
    {
    }

  /**
  * Returns resource url (basically message type)
  */
  public function getResourceURL()
  {
  }

    /**
     * Clean a POPO class name (like 'IPPClass') to be an IPP v3 Entity name (like 'Class')
     * Add clean ClassName to it.
     * @param string $phpClassName POPO class name
     * @return string Intuit Entity name
     */
    public static function cleanPhpClassNameToIntuitEntityName($phpClassName)
    {
        //Add namespace to it
        $phpClassName = trim($phpClassName);
        $listArray = explode('\\', $phpClassName);
        $trimedPhpClassName = end($listArray);
        if (0==strpos($trimedPhpClassName, CoreConstants::PHP_CLASS_PREFIX)) {
            return substr($trimedPhpClassName, strlen(CoreConstants::PHP_CLASS_PREFIX));
        }

        throw new \Exception("Cannot convert php Class name:{" . $phpClassName . "} to Intuit Entity name");
    }
}
