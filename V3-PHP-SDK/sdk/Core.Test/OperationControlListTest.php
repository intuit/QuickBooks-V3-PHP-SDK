<?php

require_once('../sdk/config.php');

/**
 * Description of ContentWriterTest
 *
 * @author amatiushkin
 */
class OperationControlListTest extends PHPUnit_Framework_TestCase {
    
    
    public function testOperationControlList()
    {
        $i = new OperationControlList();
        $i->setOperationList(array(
            '*'  => array('*'  => true),
            'en' => array('op' => false)           
        ));
        
        $this->assertTrue(  $i->isAllowed('aa', 'cc') );
        $this->assertTrue(  $i->isAllowed('aa', 'op') );
        $this->assertTrue(  $i->isAllowed('en', 'cc') );
        $this->assertFalse( $i->isAllowed('en', 'op') );
    }
   
    public function testOperationControlListUsingDefault()
    {
        $i = new OperationControlList( OperationControlList::getDefaultList(true) );
        $i->appendRules(array(
            'AA' => array('do' => false),
            'BB' => array('do' => false)
        ));
        
        $this->assertTrue(  $i->isAllowed('AA', 'aa') );
        $this->assertFalse( $i->isAllowed('AA', 'do') );
        $this->assertTrue(  $i->isAllowed('BB', 'aa') );
        $this->assertFalse( $i->isAllowed('BB', 'do') );
    }  
    
    public function testOperationControlListUsingNegative()
    {
        $i = new OperationControlList( OperationControlList::getDefaultList(false) );
        $i->appendRules(array(
            'AA' => array('do' => true),
            'BB' => array('do' => true)
        ));
        
        $this->assertFalse( $i->isAllowed('AA', 'aa') );
        $this->assertTrue(  $i->isAllowed('AA', 'do') );
        $this->assertFalse( $i->isAllowed('BB', 'aa') );
        $this->assertTrue(  $i->isAllowed('BB', 'do') );
    }
    
    public function testAppendRules()
    {
       $i = new OperationControlList( OperationControlList::getDefaultList(true) );
       $i->appendRules(array(
            OperationControlList::ALL => array('do' => false),
            'BB' => array('do' => true)
        ));
       $this->assertEquals(array(
        OperationControlList::ALL=>array(
             OperationControlList::ALL => true,
             'do' => false    
        ),
        'BB' =>  array('do' => true)  
       ), $i->getOperationList());
    }
    
     
    public function testOperationControlList_DefaultOneNegative()
    {
        $i = new OperationControlList( OperationControlList::getDefaultList(true) );
        $i->appendRules(array(
            OperationControlList::ALL => array('do' => false),
            'BB' => array('do' => true)
        ));
        
        $this->assertTrue(  $i->isAllowed('AA', 'aa') );
        $this->assertFalse( $i->isAllowed('AA', 'do') );
        $this->assertTrue(  $i->isAllowed('BB', 'aa') );
        $this->assertTrue(  $i->isAllowed('BB', 'do') );
    }  
    
    
    public function testOperationControlList_DefaultGlovalNegative()
    {
        $i = new OperationControlList( OperationControlList::getDefaultList(true) );
        $i->appendRules(array(
            OperationControlList::ALL => array('do' => false),
            'AA' => array('XX' => true)
        ));
        
        $this->assertFalse( $i->isAllowed('AA', 'do') );
    }
}
