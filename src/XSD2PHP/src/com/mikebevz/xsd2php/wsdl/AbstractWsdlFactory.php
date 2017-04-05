<?php

namespace com\mikebevz\xsd2php\wsdl;

abstract class AbstractWsdlFactory {
    abstract function getWsdl_1_1();
    abstract function getWsdl_2_0();
}