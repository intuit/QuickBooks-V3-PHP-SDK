<?php

/**
 * Entity serialize contract.
 * TODO this abstract class looks abandoned because, another class
 * is used in Utility/IEntitySerializer. 
 * It will be deleted in next versions
 * 
 * @deprecated
 */
abstract class IEntitySerializer {

	/**
	 * Serializes the specified entity.
	 * @param entity entity The entity.
	 * @return Returns the serialize entity in string format.
	 */
	abstract function Serialize($entity);

	/**
	 * DeSerializes the specified string into an entity.
	 * @param string message The message.
	 * @return Returns the deserialized message.
	 */
	abstract function Deserialize($message);
}
