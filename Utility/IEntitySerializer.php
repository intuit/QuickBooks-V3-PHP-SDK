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
