<?php
namespace com\mikebevz\xsd2php\wsdl;

require_once 'Wsdl_1_1.php';
require_once 'Wsdl_2_0.php';

class WsdlFactory
{
    const WSDL_1_1 = "WSDL 1.1";
    const WSDL_2_0 = "WSDl 2.0";
    
    public $debug;
    
    
    
    private $service;
    private $implementation;
    private $wsdlVersion;
    private $soapBindingStyle;
    
    public function __construct($service = null, $wsdlVersion = WsdlFactory::WSDL_1_1, $style = SOAP_DOCUMENT)
    {
        $this->service = $service;
        $this->wsdlVersion = $wsdlVersion;
        $this->soapBindingStyle= $style;
    }
    
    public function getImplementation()
    {
        if ($this->service == null) {
            throw new \RuntimeException("Service class is not set. Use setService() method");
        }
        
        switch ($this->wsdlVersion) {
            case WsdlFactory::WSDL_1_1:
                $this->implementation = new Wsdl_1_1($this->service);
                break;
            case WsdlFactory::WSDL_2_0:
                $this->implementation = new Wsdl_2_0($this->service);
                break;
            default:
                throw new \RuntimeException($this->wsdlVersion. "is not supported");
                break;
        }
        
        $this->implementation->debug = $this->debug;
        $this->implementation->setSoapBindingStyle($this->soapBindingStyle);
        
        return $this->implementation;
    }
    /**
     * @return the $service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param $service the $service to set
     */
    public function setService($service)
    {
        $this->service = $service;
    }
    /**
     * @return the $wsdlVersion
     */
    public function getWsdlVersion()
    {
        return $this->wsdlVersion;
    }

    /**
     * @param $wsdlVersion the $wsdlVersion to set
     */
    public function setWsdlVersion($wsdlVersion)
    {
        $this->wsdlVersion = $wsdlVersion;
    }
}
