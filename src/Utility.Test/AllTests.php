<?php
/**
 * This file makes it easy for PHPUnit to discover all tests in this folder,
 * which eliminates the need to maintain /build/build.xml and /build/build.properties
 * every time a test case is added.
 */

// The order of the following four steps is significant
require_once('../sdk/config.php');
define('PATH_TAIL', 'Utility.Test');
define('TESTSUITE_NAME', 'Utility_Tests');
define('PATH_DEST', PATH_SDK_ROOT . 'sdk/' . PATH_TAIL . '/');
require_once(PATH_SDK_ROOT . ".." . DIRECTORY_SEPARATOR . 'build/DetectTests.php');

class AllTests extends DetectTests
{
}
