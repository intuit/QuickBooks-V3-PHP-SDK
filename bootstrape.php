<?php

/**
 * This file allows custom configuration of paths for XSD2PHP dependencies and
 * POPO classes.  Rarely necessary, but possible.
 *
 * @author Intuit Partner Platform Team
 * @version 1.0
 */

// Determine parent path for SDK, which is the directory "sdk"
$sdkDir = __DIR__ . DIRECTORY_SEPARATOR;


if (!defined('PATH_SDK_ROOT')) {
    define('PATH_SDK_ROOT', $sdkDir);
}

// Specify POPO class path; typically a direct child of the SDK path
if (!defined('POPO_CLASS_PATH')) {
    define('POPO_CLASS_PATH', $sdkDir . 'Data' . DIRECTORY_SEPARATOR);
}

/* PSR-4 Autoloader,QuickBooksOnline\Data;
spl_autoload_register(function ($class) {
      //echo "class name is: " . $class ."\n";
        /*
        $delimitersArray = explode("\\" , $class);
        if(count($delimitersArray) == 1){
                //If it is without NameSpace, probably it is a old request for one of the
                //POPO classes under Data Folder. Add the namespace prefix.
                if(class_exists($class))
                {
                     return;
                }
                else{
                        $class = 'QuickBooksOnline\\API\\Data\\' . $class;
                        if(class_exists($class))
                        {
                             return;
                        }
                }
        }
        *
      $prefix = 'QuickBooksOnline\\API\\';
        $base_dir = __DIR__ . DIRECTORY_SEPARATOR;
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
        $relative_class = substr($class, $len);
        $filewithoutExtension = $base_dir . str_replace('\\', '/', $relative_class);
        $file =  $filewithoutExtension. '.php';
        //Below str_replace is for local testing. Remove it before putting on Composer.
      if (file_exists($file) ) {
                    //echo "Register file is:" . $file . "\n";
            require ($file);
       }
    });
  */

// Include XSD2PHP dependencies for marshalling and unmarshalling
/*
use com\mikebevz\xsd2php;
require_once(PATH_SDK_ROOT . 'XSD2PHP/src/com/mikebevz/xsd2php/Php2Xml.php');
require_once(PATH_SDK_ROOT . 'XSD2PHP/src/com/mikebevz/xsd2php/Bind.php');
*/
// Includes all POPO classes; these are the source, dest, or both of the marshalling
/*
set_include_path(get_include_path() . PATH_SEPARATOR . POPO_CLASS_PATH);
foreach (glob(POPO_CLASS_PATH.'*.php') as $filename){
        //require_once "/Users/hlu2/Desktop/intuit_git/V3-PHP-SDK_openSourcePrepare/sdk/Data/IPPCustomer.php";
        //echo "The file name is: " . $filename . "\n";
      require_once $filename;
    }
*/

// Specify the prefix pre-pended to POPO class names.  If you modify this value, you
// also need to rebuild the POPO classes, with the same prefix
if (!defined('PHP_CLASS_PREFIX')) {
    define('PHP_CLASS_PREFIX', 'IPP');
}
