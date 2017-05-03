#!/usr/bin/php -q
<?php
set_include_path(get_include_path().
    PATH_SEPARATOR.realpath("../../lib/ZF/1.10.7"));

require_once '../com/mikebevz/xsd2php/LegkoXML.php';
require_once 'Zend/Console/Getopt.php';
//require_once '../../lib/ZF/1.10.7/Zend/Exception.php';
//require_once '../../lib/ZF/1.10.7/Zend/Console/Getopt/Exception.php';

use com\mikebevz\xsd2php;

class LegkoTool
{
    
    /**
     * Legko XML Facade
     * @var com\mikebevz\xsd2php\LegkoXML
     */
    private $legko;
    
    /**
     *
     * @var Zend_Console_Getopt
     */
    private $opts;
    
    public function __construct()
    {
        $this->legko = new xsd2php\LegkoXML();
        
        $this->opts = new Zend_Console_Getopt(
            array(
                'dest|d=s' => 'Destination directory',
                'schema|s-s' => 'XML schema folder',
                'class|c-s' => 'PHP class',
                'wsdl-location|l-s' => 'WSDL service address',
                'wsdl-schema-url-s' => 'Public schema directory'
                
            )
            );
        //print_r($this->opts->getOptions());
    }
 
    public function showHelp()
    {
        $this->println("Legko XML Tool v. {$this->legko->getVersion()}
Syntax: legko action options

Actions: 
\033[32mcompile-schema\033[0m \033[33m--schema PATH \033[0m \033[33m--dest PATH \033[0m  Compile XML Schema to PHP bindings
\033[32mgenerate-wsdl\033[0m \033[33m--class PATH \033[0m \033[33m--dest PATH \033[0m Generate WSDL from PHP class

Options: 
\033[33m--dest PATH \033[0m Output directory, generated files saved there
\033[33m--schema PATH \033[0m Path to XML Schema file
\033[33m--class PATH \033[0m PHP class
\033[33m--wsdl-location URL \033[0m Web service address
\033[33m--wsdl-schema-url URL \033[0m Public schema directory

Examples:
Generate PHP bindings
    \033[32m$ legko compile-schema --schema MySchema.xsd --dest ../bindings \033[0m   
        ");
    }

    public function compileSchema()
    {
        if (!$this->opts->getOption('dest')) {
            throw new RuntimeException("Specify destination folder (--dest PATH)");
        }
        
        if (!$this->opts->getOption('schema')) {
            throw new RuntimeException("Specify path to XML Schema file (--schema PATH)");
        }
        
        $schema = $this->opts->getOption('schema');
        if (!file_exists($schema)) {
            throw new RuntimeException("Schema file ".$schema." is not found");
        }
        
        $dest = $this->opts->getOption('dest');
        
        
        $this->legko->compileSchema($schema, $dest);
        $this->println("Bindings successfully generated in ".realpath($dest));
    }

    private function println($msg = "")
    {
        print($msg."\n");
    }
}

$action = $argv[1];
array_shift($argv);
array_shift($argv);

$legko = new LegkoTool();
$actions = array('compile-schema', 'generate-wsdl');

if (!in_array($action, $actions)) {
    $legko->showHelp();
}

switch ($action) {
    case 'compile-schema':
        try {
            $legko->compileSchema();
        } catch (RuntimeException $e) {
            echo "Error: \033[31m".$e->getMessage()."\033[0m\n";
        }
        
        break;
    case 'generate-wsdl':
        echo "Generate WSDL";
        break;
    default:
        echo "Help";
        break;
}
