<?php
namespace com\mikebevz\xsd2php\wsdl;

require_once 'AbstractWsdl.php';
require_once 'IWsdl.php';

class Wsdl_1_1 extends AbstractWsdl implements IWsdl
{
    
    /**
     * WSDL 1.1 XML namespaces
     *
     * @var array
     */
    protected $namespaces = array(
        'wsdl' => 'http://schemas.xmlsoap.org/wsdl/',
        'soap' => 'http://schemas.xmlsoap.org/wsdl/soap/',
        'http' => 'http://schemas.xmlsoap.org/wsdl/http/',
        'mime' => 'http://schemas.xmlsoap.org/wsdl/mime/',
        'soapenc' => 'http://schemas.xmlsoap.org/soap/encoding/',
        'soapenv' => 'http://schemas.xmlsoap.org/soap/envelope/',
        'xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
        'xsd' => 'http://www.w3.org/2001/XMLSchema',
    );
    
    /**
     * Prepare WSDL DOM model
     *
     * @return void
     */
    public function prepare()
    {
        $this->dom->createAttributeNS($this->namespaces['soap'], 'soap:definitions');
        $this->dom->createAttributeNS($this->namespaces[$this->xmlSchemaPreffix], $this->xmlSchemaPreffix.':definitions');
        
        //@todo this only required when we have arrays
        $this->dom->createAttributeNS($this->namespaces['soapenc'], 'soapenc:definitions');
        
        $this->wsTypes = $this->dom->createElement('wsdl:types');
        $this->wsDefinitions->appendChild($this->wsTypes);
        
        $wsXmlSchema = $this->dom->createElement($this->xmlSchemaPreffix.':schema');
        $wsXmlSchema->setAttribute('targetNamespace', $this->wsdlTargetNamespace);
        
        $this->wsXmlSchema = $this->wsTypes->appendChild($wsXmlSchema);
        
        

        $portType =  $this->dom->createElement('wsdl:portType');
        $portType->setAttribute('name', $this->wsdlName.$this->portNameSuffix);
        $this->wsPortType = $this->wsDefinitions->appendChild($portType);
        
        $binding = $this->dom->createElement('wsdl:binding');
        $binding->setAttribute('name', $this->wsdlName.$this->bindingNameSuffix);
        $binding->setAttribute('type', $this->targetNsPrefix.":".$this->wsdlName.$this->portNameSuffix);
        $this->wsBinding = $this->wsDefinitions->appendChild($binding);
        
        $soapBinding = $this->dom->createElement('soap:binding');
        if ($this->soapBindingStyle === SOAP_DOCUMENT) {
            $soapBinding->setAttribute('style', "document");
        } elseif ($this->soapBindingStyle === SOAP_RPC) {
            $soapBinding->setAttribute('style', "rpc");
        }
        $soapBinding->setAttribute('transport', $this->soapBindingTransport);
        $this->wsBinding->appendChild($soapBinding);
        
        
        $wsService = $this->dom->createElement('wsdl:service');
        $wsService->setAttribute('name', $this->wsdlName.$this->serviceNameSuffix);
        $this->wsService = $this->wsDefinitions->appendChild($wsService);
        
        $port = $this->dom->createElement('wsdl:port');
        $port->setAttribute('name', $this->wsdlName.$this->portNameSuffix);
        $port->setAttribute('binding', $this->targetNsPrefix.":".$this->wsdlName.$this->bindingNameSuffix);
        
        $soapAddress =  $this->dom->createElement('soap:address');
        $soapAddress->setAttribute('location', $this->getLocation());
        $port->appendChild($soapAddress);
        
        $this->wsService->appendChild($port);
        
        
        
        $this->extractTypes();
    }
    
    /**
     * Extract types from WSDL
     *
     * @return void
     */
    private function extractTypes()
    {
        $allEl = array();
        $allImp = array();
        $methods = array();
        
        foreach ($this->methodsMeta as $methodName => $data) {
            $elements = array();
            $input = false;
            $output = false;
            if (count($data['params']) == 1) {
                $type = $this->common->phpTypeToSoap($data['params'][0]['type']);
                $els = array();
                if ($type === false) {
                    $type = $this->getTypeName($data['params'][0]['type']);
                    $els [] = $this->createRefElement($type);
                } else {
                    $els [] = $this->createSimpleElement(ucfirst($data['params'][0]['name']), $data['params'][0]['type']);
                }
                $elements[] = $this->createElementWithComplexType(ucfirst($methodName), $els);
                $this->addMessage(ucfirst($methodName), $this->targetNsPrefix.":".ucfirst($methodName));
                $input = true;
            } elseif ($data['params'] > 1) {
                $els = array();
                foreach ($data['params'] as $input) {
                    $type = $this->common->phpTypeToSoap($input['type']);
                    if ($type === false) {
                        $type = $this->getTypeName($input['type']);
                        $els [] = $this->createRefElement($type);
                    } else {
                        $els [] = $this->createSimpleElement(ucfirst($input['name']), $input['type']);
                    }
                }
                $elements[] = $this->createElementWithComplexType(ucfirst($methodName), $els);
                $this->addMessage(ucfirst($methodName), $this->targetNsPrefix.":".ucfirst($methodName));
                $input = true;
            }
            
            if (array_key_exists('return', $data)) {
                $type = $this->common->phpTypeToSoap($data['return']['type']);
                if ($type === false) {
                    //@todo Create complex type
                } else {
                    $elements [] = $this->createSimpleElement(ucfirst($methodName)."Response", $type);
                }
                //$messages[] = $this->targetNsPrefix.":".ucfirst($methodName)."Response";
                $this->addMessage(ucfirst($methodName)."Response", $this->targetNsPrefix.":".ucfirst($methodName));
                $output = true;
            }
            
            foreach ($this->xmlSchemaImports as $imp) {
                array_push($allImp, $imp);
            }
            
            foreach ($elements as $element) {
                array_push($allEl, $element);
            }
            
            
            $this->addPortOperations(ucfirst($methodName), $input, $output);
            $this->addBindingOperations(ucfirst($methodName), $input, $output);
        }
        
        foreach ($allImp as $import) {
            $this->wsXmlSchema->appendChild($import);
        }
        
        foreach ($allEl as $element) {
            $this->wsXmlSchema->appendChild($element);
        }
        
        // Add port operations
        
        //print_r($messages);
    }
    
    /**
     * Add operations to bindings
     *
     * <code>
     *  <operation name="$operation">
     *		<soap:operation
     *			soapAction="targetNamespace/$operation" />
     *		<input>
     *			$input
     *		</input>
     *		<output>
     *			$output
     *		</output>
     *	</operation>
     * </code>
     *
     * @param string $operation Operation name
     * @param array  $input     Array of inputs [optional]
     * @param array  $output    Array of outputs [optional]
     *
     * @return void
     */
    private function addBindingOperations($operation, $input = false, $output = false)
    {
        $el = $this->dom->createElement('wsdl:operation');
        $el->setAttribute('name', $operation);
        
        $soapOperation = $this->dom->createElement('soap:operation');
        $soapOperation->setAttribute('soapAction', $this->wsdlTargetNamespace."/".$operation);
        $el->appendChild($soapOperation);
        
        if ($input === true) {
            $inp = $this->dom->createElement('wsdl:input');
            $body = $this->dom->createElement('soap:body');
            $body->setAttribute('use', 'literal');
            $inp->appendChild($body);
            $el->appendChild($inp);
        }
        
        if ($output === true) {
            $out = $this->dom->createElement('wsdl:output');
            $body = $this->dom->createElement('soap:body');
            $body->setAttribute('use', 'literal');
            $out->appendChild($body);
            $el->appendChild($out);
        }
        
        $this->wsBinding->appendChild($el);
    }
    
    /**
     * Add operations to port
     *
     * <code>
     *  <operation name="$name">
     *		<input message="tns:messageName" />
     *		<output message="tns:messageName" />
     *	</operation>
     * </code>
     *
     * @param string $operation Name of the operation
     * @param array  $input     Array of inputs
     * @param array  $output    Array of outputs
     *
     * @return void
     */
    private function addPortOperations($operation, $input = false, $output = false)
    {
        $el = $this->dom->createElement("wsdl:operation");
        $el->setAttribute('name', $operation);
        if ($input === true) {
            $input = $this->dom->createElement('wsdl:input');
            $input->setAttribute('message', $this->targetNsPrefix.":".$operation);
        }
        if ($output === true) {
            $output = $this->dom->createElement('wsdl:output');
            $output->setAttribute('message', $this->targetNsPrefix.":". $operation."Response");
        }
        $el->appendChild($input);
        $el->appendChild($output);
        
        $this->wsPortType->appendChild($el);
    }
    
    /**
     * Add message
     *
     * <code>
     *   <message name="$name">
     *	   <part name="$name" element="$type" />
     *  </message>
     * </code>
     *
     * @param string $name Message name
     * @param string $type Message type
     *
     * @return void
     */
    private function addMessage($name, $type)
    {
        $el = $this->dom->createElement("wsdl:message");
        $el->setAttribute('name', $name);
        $parts = $this->dom->createElement("wsdl:part");
        $parts->setAttribute('name', $name);
        $parts->setAttribute('element', $type);
        $el->appendChild($parts);
        
        //$this->wsMessage->appendChild($el);
        //$this->dom->insertBefore($el, $this->wsPortType);
        //$this->wsDefinitions->replaceChild($el, $this->wsMessage);
        $xpath = new \DOMXPath($this->dom);
        $query = "//*[local-name()='definitions']/*";
        $types = $xpath->query($query);
        //print_r($types->item(0)->getNodePath());
        //$this->dom->insertBefore($el, $types->item(1));
        $this->wsDefinitions->insertBefore($el, $types->item(1));
    }
    
    /**
     * Create ref element
     *
     * <code>
     * <element ref="$ref" />
     * </code>
     *
     * @param string $ref
     *
     * @return DOMElement
     */
    private function createRefElement($ref)
    {
        $el = $this->dom->createElement($this->xmlSchemaPreffix.':element');
        $el->setAttribute('ref', $ref);
        
        return $el;
    }
    
    /**
     * Create an element with complex type
     *
     * <code>
     * <element name="$name">
     *   <complexType>
     *   	<sequence>
     *   		$elements
     *   	</sequence>
     *   </complexType>
     * </element>
     * </code>
     *
     * @param string $name     Element name
     * @param array  $elements Array of elements to include into sequence
     *
     * @return DOMElement
     */
    private function createElementWithComplexType($name, $elements)
    {
        //print_r('Create complex type '.$name."\n");
        $el = $this->dom->createElement($this->xmlSchemaPreffix.':element');
        $el->setAttribute('name', $name);
        
        $compType = $this->dom->createElement($this->xmlSchemaPreffix.':complexType');
        $seqType = $this->dom->createElement($this->xmlSchemaPreffix.':sequence');
        
        foreach ($elements as $element) {
            $seqType->appendChild($element);
        }
        
        $compType->appendChild($seqType);
        $el->appendChild($compType);
        
        return $el;
    }
    
    /**
     * Create simple element
     *
     * <code>
     * <element name="$name" type="$type" />
     * </code>
     *
     * @param string $name Element name
     * @param string $type Element type
     *
     * @return DOMElement
     */
    private function createSimpleElement($name, $type)
    {
        $el = $this->dom->createElement($this->xmlSchemaPreffix.':element');
        $el->setAttribute('name', $name);
        if (preg_match('/:/', $type)) {
            $el->setAttribute('type', $type);
        } else {
            $el->setAttribute('type', $this->xmlSchemaPreffix.':'.$type);
        }
        
        return $el;
    }
}
