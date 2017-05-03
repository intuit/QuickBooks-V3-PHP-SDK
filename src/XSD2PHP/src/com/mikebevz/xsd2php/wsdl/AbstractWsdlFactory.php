<?php

namespace com\mikebevz\xsd2php\wsdl;

abstract class AbstractWsdlFactory
{
    abstract public function getWsdl_1_1();
    abstract public function getWsdl_2_0();
}
