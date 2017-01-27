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
 * POJO class for EventNotification
 */
class EventNotification
{
    /**
     * The company ID
     *
     * @var
     */
    private $realmId;

    /**
     * An list of DataChangeEvent
     *
     * @var
     */
    private $dataChangeEvent;

    /**
     * Set the company for this EventNotification;
     *
     * @param $realmID
     * @return $this
     */
    public function setRealmId($realmID){
        $this->realmId = $realmID;
        return $this;
    }

    /**
     * Return the realmID
     *
     * @return mixed
     */
    public function getRealmId(){
        return $this->realmId;
    }

    /**
     * Set the data Change Event
     *
     * @param $dataChangeEvent
     * @return $this
     */
    public function setDataChangeEvent($dataChangeEvent){
        $this->dataChangeEvent = $dataChangeEvent;
        return $this;
    }


    /**
     * Return the Data Change Event
     *
     * @return mixed
     */
    public function getDataChangeEvent(){
        return $this->dataChangeEvent;
    }

}