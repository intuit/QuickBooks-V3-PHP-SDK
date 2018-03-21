<?php
//namespace com\mikebevz\xsd2php;
namespace QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php;

class NullLogger
{
    public function __call($code, $message)
    {
    }
}
