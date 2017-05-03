<?php
//namespace com\mikebevz\xsd2php;

//require_once 'Xsd2Php.php';
namespace QuickBooksOnline\API\XSD2PHP\src\com\mikebevz\xsd2php;

class LegkoXML
{
    public $version = "0.0.4";

    /**
     *
     * @var Xsd2Php
     */
    private $xsd2php;

    private $xml2php;

    private $php2wsdl;

    public function __construct()
    {
    }

    public function compileSchema($schema, $destination)
    {
        $this->xsd2php = new Xsd2Php($schema);
        $this->xsd2php->saveClasses($destination, true);
    }

    public function generateWsdl($class)
    {
    }

    /**
     * @return the $version
     */
    public function getVersion()
    {
        return $this->version;
    }
}
