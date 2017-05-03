<?php
set_include_path(get_include_path().PATH_SEPARATOR.
realpath("../../src"));

use com\mikebevz\xsd2php;

require_once "com/mikebevz/xsd2php/Xsd2Php.php";
require_once realpath(dirname(__FILE__)."/../Bootstrap.php");

class MavenXsdTest extends LegkoXMLTestCase
{

    /**
     * XSD to PHP convertor class
     * @var Xsd2Php
     */
    private $tclass;

    private $xsd;

    private $expectedDir;
    private $generatedDir;

    protected function setUp()
    {
        $this->xsd = realpath(dirname(__FILE__)."/../../resources/maven/maven-v4_0_0.xsd");
        $this->expectedDir = realpath(dirname(__FILE__)."/../data/expected/Xsd2Php/MavenTests");
        $this->generatedDir = realpath(dirname(__FILE__)."/../data/generated/Xsd2Php/MavenTests");
        $this->tclass = new xsd2php\Xsd2Php("", $this->xsd);
    }
    protected function tearDown()
    {
        $this->tclass = null;
    }

    public function testNamespaceToPHP()
    {
        $ns[0] = "http://maven.apache.org/POM/4.0.0";
        $ns[1] = "urn:dk:nordsign:schema:ContactCompany";
        $ns[2] = "urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2";
        $ns[3] = "http://www.loc.gov/METS/";

        $nse[0] = 'org\apache\maven\POM\_4_0_0';
        $nse[1] = 'dk\nordsign\schema\ContactCompany';
        $nse[2] = 'oasis\names\specification\ubl\schema\xsd\CommonAggregateComponents_2';
        $nse[3] = 'gov\loc\www\METS';

        $i = 0;
        foreach ($ns as $key => $value) {
            $this->assertEquals($nse[$i], $this->tclass->namespaceToPhp($value));
            $i++;
        }
    }

    public function testXSDMustBeConvertedToXML()
    {
        $this->markTestSkipped(
            'Need to update expected data to account for Intuit code changes'
        );
        $xml = $this->tclass->getXML();
        $actual = $xml->saveXml();
        //file_put_contents($this->expectedDir.'/ParsedSchema.xml', $xml->saveXml());
        $expected = file_get_contents($this->expectedDir.'/ParsedSchema.xml');
        $this->assertEquals($expected, $actual);
    }

    public function testSavePHPBindings()
    {
        $this->markTestSkipped(
            'Need to update expected data to account for Intuit code changes'
        );
        if (file_exists($this->generatedDir."/bindings")) {
            rmdir_recursive($this->generatedDir."/bindings");
        }

        //$this->tclass->saveClasses($this->expectedDir."/bindings", true);

        $this->tclass->saveClasses($this->generatedDir."/bindings", true);

        $this->assertDirContentsEquals($this->expectedDir."/bindings", $this->generatedDir."/bindings");

        if (file_exists($this->generatedDir."/bindings")) {
            rmdir_recursive($this->generatedDir."/bindings");
        }
    }
}
