<?php


class LegkoXMLTestCase extends PHPUnit_Framework_TestCase
{
    protected function assertDirContentsEquals($expDir, $actDir)
    {
        if (!file_exists($expDir)) {
            throw new RuntimeException("Expected dir not found: ".$expDir);
        }

        if (!file_exists($actDir)) {
            throw new RuntimeException("Actual dir not found: ".$actDir);
        }

        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($expDir));
        $expFiles = array();
        while ($dir->valid()) {
            if (!$dir->isDot()) {
                array_push($expFiles, $dir->getSubPathName());
            }
            $dir->next();
        }

        $dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($actDir));
        $actFiles = array();
        while ($dir->valid()) {
            if (!$dir->isDot()) {
                array_push($actFiles, $dir->getSubPathName());
            }
            $dir->next();
        }

        $this->assertEquals($expFiles, $actFiles);

        foreach ($expFiles as $key => $value) {
            $expFile = file_get_contents($expDir.DIRECTORY_SEPARATOR.$value);
            $actFile = file_get_contents($expDir.DIRECTORY_SEPARATOR.$actFiles[$key]);
            $this->assertEquals($expFile, $actFile);
        }
    }
}
