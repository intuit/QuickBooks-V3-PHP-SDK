<?php
namespace QuickBooksOnline\API\WebhooksService;

class WebhooksCloudEvents
{
    public $SpecVersion;
    public $Id;
    public $Source;
    public $Type;
    public $DataContentType;
    public $Time;
    public $IntuitEntityId;
    public $IntuitAccountId;
    public $Data;

    public function __construct($data = null)
    {
        if ($data != null) {
            $this->SpecVersion = isset($data["SpecVersion"]) ? $data["SpecVersion"] : null;
            $this->Id = isset($data["Id"]) ? $data["Id"] : null;
            $this->Source = isset($data["Source"]) ? $data["Source"] : null;
            $this->Type = isset($data["Type"]) ? $data["Type"] : null;
            $this->DataContentType = isset($data["DataContentType"]) ? $data["DataContentType"] : null;
            $this->Time = isset($data["Time"]) ? $data["Time"] : null;
            $this->IntuitEntityId = isset($data["IntuitEntityId"]) ? $data["IntuitEntityId"] : null;
            $this->IntuitAccountId = isset($data["IntuitAccountId"]) ? $data["IntuitAccountId"] : null;
            $this->Data = isset($data["Data"]) ? $data["Data"] : null;


        }
    }



}