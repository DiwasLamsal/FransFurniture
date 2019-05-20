<?php

require_once 'functions/testFunctions.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided update contains missing fields
class UpdateTest extends TestCase {

  public function testEmptyName() {
     $invalidUpdate = [
       'title' => '',
       'description'=> 'Some Description'
     ];
     $valid = checkUpdate($invalidUpdate);
     $this->assertFalse($valid);
  }

  public function testEmptyDescription() {
     $invalidUpdate = [
       'title' => 'Update',
       'description'=> ''
     ];
     $valid = checkUpdate($invalidUpdate);
     $this->assertFalse($valid);
  }


  public function testValid() {
     $validUpdate = [
       'title' => 'Update',
       'description'=> 'Some Description'
     ];
     $valid = checkUpdate($validUpdate);
     $this->assertTrue($valid);
  }


}
