<?php 

/**
 * Entity serialize contract.
 */
class IEntitySerializer {

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
	 public function Deserialize($message,$limit = FALSE)
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
	 *
	 * @param string $phpClassName POPO class name
	 * @return string Intuit Entity name 
	 */
	public static function cleanPhpClassNameToIntuitEntityName($phpClassName)
	{
		if (0==strpos($phpClassName, PHP_CLASS_PREFIX))
			return substr($phpClassName, strlen(PHP_CLASS_PREFIX));
			
		return NULL;
	}         
}
