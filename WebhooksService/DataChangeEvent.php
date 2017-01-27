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
 * POJO Class DataChangeEvent
 */
class DataChangeEvent
{
    /**
     * An array of Entity Objects
     * @var
     */
    private $entities;


    /**
     *
     * Set entites for DataChangeEvent
     *
     * @param $entities
     *          An array of Entity Objects
     *
     * @return $this
     */
    public function setEntities($entities){
        $this->entities = $entities;
        return $this;
    }

    /**
     * Get entities as an array
     *
     * @return array(Entity)
     *      Return an array of Entity
     */
    public function getEntities(){
        return $this->entities;
    }
}