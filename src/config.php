<?php

/**
 * This is a file that required for using the files located in _Sample folders.
 * It is a SQL autoloader that performs the exact same function as composer "require "vendor/autoload.php";"
 * If you are using the _sample file. Remove the required include('../config.php'); line and add "require "vendor/autoload.php"" instead.

 *
 * @author Hao
 */
// PSR-4 Autoloader,QuickBooksOnline\Data;
spl_autoload_register(function ($class) {
	  $prefix = 'QuickBooksOnline\\API\\';
		$base_dir = __DIR__ . DIRECTORY_SEPARATOR;
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
		$relative_class = substr($class, $len);
		$filewithoutExtension = $base_dir . str_replace('\\', '/', $relative_class);
		$file =  $filewithoutExtension. '.php';

		//Below str_replace is for local testing. Remove it before putting on Composer.
	  if (file_exists($file) ) {
	        require ($file);
	   }
	});
