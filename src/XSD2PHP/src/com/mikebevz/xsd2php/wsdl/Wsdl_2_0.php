<?php
namespace com\mikebevz\xsd2php\wsdl;

require_once 'AbstractWsdl.php';
require_once 'IWsdl.php';

class Wsdl_2_0 extends AbstractWsdl implements IWsdl
{
    protected $namespaces = array(
        'wsdl' => 'http://www.w3.org/ns/wsdl',
        'wsdli' => 'http://www.w3.org/ns/wsdl-instance',
        'wsdlx' => 'http://www.w3.org/ns/wsdl-extensions',
        'rpc' => 'http://www.w3.org/ns/wsdl/rpc',
        'soap' => 'http://www.w3.org/ns/wsdl/soap',
        'http' => 'http://www.w3.org/ns/wsdl/http',
        'xsd' => 'http://www.w3.org/2001/XMLSchema',
        'xsi' => 'http://www.w3.org/2001/XMLSchema-instance'
        
    );
    
    public function prepare()
    {
    }
}
