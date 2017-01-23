<?php

require_once('../sdk/config.php');

/**
 * Description of ContentWriterTest
 *
 * @author amatiushkin
 */
class ContentWriterTest extends PHPUnit_Framework_TestCase {
    
    
    public function testNullability()
    {
       $i = new ContentWriter();
       $this->assertNull($i->getBytes());
       $this->assertNull($i->getContent());
       $this->assertNull($i->getHandler());
       $this->assertNull($i->getPrefix());
       $this->assertNull($i->getTempPath());
       $this->assertFalse($i->isHandler());
    }
    
    public function testSaveTempWithText()
    {
        $content = $this->getTextSampleWithSalt();
        $size = strlen($content);
        $i = new ContentWriter($content);
        $i->saveTemp();
        $this->assertEquals($size, $i->getBytes());
        $this->assertEquals(filesize($i->getTempPath()),$i->getBytes());
        $this->assertFalse($i->isHandler());
        $this->assertEquals($content,  file_get_contents($i->getTempPath()));
        $this->deleteTestFile($i, __METHOD__);

    }
    
    public function testSaveAsHandlerText()
    {
        $content = $this->getTextSampleWithSalt();
        $size = strlen($content);        
        $i = new ContentWriter($content);
        $i->saveAsHandler();
        $this->assertTrue($i->isHandler());
        $this->assertEquals($size, $i->getBytes());
        $this->assertEquals(filesize($i->getTempPath()),$i->getBytes());
        $handler = $i->getHandler();
        $this->assertTrue(is_resource($handler));
        $this->assertEquals(substr($content, 0, 10), fread($handler, 10));
        $this->assertTrue(file_exists($i->getTempPath()));
        fclose($handler);
        $this->assertFalse(file_exists($i->getTempPath()));
    }
    
    /**
     * @requires OS Linux
     */
    public function testSaveTempWithPrefixLinux()
    {
        $i = new ContentWriter($this->getTextSample());
        $prefix = "thistestprefix";
        $i->setPrefix($prefix);
        $i->saveTemp();
        $this->assertContains($prefix, $i->getTempPath());
        $this->deleteTestFile($i, __METHOD__);
    }
    
    /**
     * @requires OS WIN32|WINNT
     */
    public function testSaveTempWithPrefixWin()
    {
        $i = new ContentWriter($this->getTextSample());
        $prefix = "thistestprefix";
        $i->setPrefix($prefix);
        $i->saveTemp();
        $this->assertContains(substr($prefix, 0,3), $i->getTempPath());
        $this->deleteTestFile($i, __METHOD__);
    }    
    
    public function testSaveAsHandlerWithPrefix()
    {
        $i = new ContentWriter($this->getTextSample());
        $prefix = "thistestprefix";
        $i->setPrefix($prefix);
        $i->saveAsHandler();
        $this->assertNotContains($prefix, $i->getTempPath());
        
    }
    
     
    /**
     * @expectedException SdkException
     * @expectedExceptionMessage Directory is empty
     */    
    public function testSaveFileNull()
    {
        $i = new ContentWriter($this->getTextSample());
        $i->saveFile(NULL);
    }  
    
 
    /**
     * @expectedException SdkException
     * @expectedExceptionMessage Directory (/a/b/c/d/e/f/FAKE) doesn't exist
     */    
    public function testSaveFile()
    {
        $i = new ContentWriter($this->getTextSample());
        $i->saveFile('/a/b/c/d/e/f/FAKE');
    }  
    
    
    /**
     * @expectedException SdkException
     * @requires OS Linux
     * @expectedExceptionMessage Directory (/) is not writable
     */    
    public function testSaveFileRoot()
    {
        $i = new ContentWriter($this->getTextSample());
        $i->saveFile(DIRECTORY_SEPARATOR, 'test.txt');
    }  
    
    
        
    /**
     * @expectedException SdkException
     * @requires OS WIN32|WINNT
     * @expectedExceptionMessage File (\\test.txt) is not writable
     */    
    public function testSaveFileRootWin()
    {
        $i = new ContentWriter($this->getTextSample());
        $i->saveFile(DIRECTORY_SEPARATOR, 'test.txt');
    } 
  
    public function testSaveFileOk()
    {
        $content = $this->getTextSampleWithSalt();
        $size = strlen($content);
        $fileRand = 'mytest'.rand(0,10000).".txt";
        $i = new ContentWriter($content);
        $i->saveFile(sys_get_temp_dir(),$fileRand);
        $this->assertEquals($size, $i->getBytes());
        $this->assertEquals($i->getContent(), file_get_contents($i->getTempPath()));
        $this->deleteTestFile($i, __METHOD__);
    } 
   
    /**
     * @expectedException SdkException
     * @expectedExceptionMessage mytest_double_save.txt) already exists
     */
    public function testSaveFileDoubleSave()
    {
        $fileRand = 'mytest_double_save.txt';
        $path = sys_get_temp_dir(). DIRECTORY_SEPARATOR.$fileRand;
        $this->assertTrue((bool)file_put_contents($path, "php unit tests generates this file"));
        $i = new ContentWriter("fake");
        $i->saveFile(sys_get_temp_dir(),$fileRand);
        unlink($path);
    }
    
    public function testSaveWithPrefix()
    {
        $prefix = "myprefix";
        $size = strlen($this->getTextSample());
        $i = new ContentWriter($this->getTextSample());
        $i->setPrefix($prefix);
        $i->saveFile(sys_get_temp_dir());
        $this->assertEquals($size, $i->getBytes());
        
        $path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $prefix;
        // no file with prefix only
        $this->assertFalse(file_exists($path));
        $this->assertContains($path, $i->getTempPath());
        $this->deleteTestFile($i, __METHOD__);
        
        $fileRand = 'mytest'.rand(0,10000).".txt";
        $i->saveFile(sys_get_temp_dir(), $fileRand);
        $this->assertTrue(file_exists($path . $fileRand));
        $this->deleteTestFile($i, __METHOD__);
    }
    
    /**
     * @expectedException SdkException
     * @expectedExceptionMessage Empty or zero file was received
     */
    public function testSaveTempWithEmptyContent()
    {
        $i = new ContentWriter("");
        $i->saveTemp();      
    }
    
 
    
    private function deleteTestFile(ContentWriter $i,$method)
    {
        $this->assertTrue(unlink($i->getTempPath()),"Unable to delete temp file, which was generated by test ($method)");
    }
    
    private function getTextSample()
    {
        return "My beloved \tText\r\n sample.";
    }
    
    private function getTextSampleWithSalt()
    {
        return $this->getTextSample() . microtime() . rand(1000, 5000);
    }
    
}
