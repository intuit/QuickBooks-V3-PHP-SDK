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
