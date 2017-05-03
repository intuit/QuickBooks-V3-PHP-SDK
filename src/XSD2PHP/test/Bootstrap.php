<?php

set_include_path(get_include_path().PATH_SEPARATOR.
                realpath("../src"));
                
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "LegkoXMLTestCase.php";

function __autoload($className)
{
    $directories = array(
      '',
      'data/expected/ubl2.0/',
      'data/expected/simple1/',
      'data/expected/ContactCompany/',
      'data/expected/ContactPerson1/',
      'data/expected/ContactPersonWsdl/',
      'data/'
    );

    //Add your file naming formats here
    $fileNameFormats = array(
      '%s.php'
    );
    

        
    // this is to take care of the PEAR style of naming classes
    $path = str_ireplace('_', '/', $className);
    if (@include_once $path.'.php') {
        return;
    }
    
    $className = str_replace('\\', '/', $className);

    foreach ($directories as $directory) {
        foreach ($fileNameFormats as $fileNameFormat) {
            $path = $directory.sprintf($fileNameFormat, $className);

            if (file_exists($path)) {
                include_once $path;
                return;
            }
        }
    }
}


spl_autoload_register('__autoload');

function rmdir_recursive($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir") {
                    rmdir_recursive($dir."/".$object);
                } else {
                    unlink($dir."/".$object);
                }
            }
        }
        reset($objects);
        rmdir($dir);
    }
}
