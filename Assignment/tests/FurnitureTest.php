<?php

require_once 'functions/testFunctions.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided furniture contains missing fields
class FurnitureTest extends TestCase {

  public function testEmptyName() {
     $invalidFurniture = [
       'name' => '',
       'description'=> 'Some Description',
       'price'=> '500'
     ];
     $valid = checkFurniture($invalidFurniture);
     $this->assertFalse($valid);
  }

  public function testEmptyDescription() {
     $invalidFurniture = [
       'name' => 'Bed',
       'description'=> '',
       'price'=> '500'
     ];
     $valid = checkFurniture($invalidFurniture);
     $this->assertFalse($valid);
  }

  public function testEmptyPrice() {
    $invalidFurniture = [
      'name' => 'Bed',
      'description'=> 'Some Description',
      'price'=> ''
    ];
    $valid = checkFurniture($invalidFurniture);
    $this->assertFalse($valid);
  }

  public function testValid() {
     $validFurniture = [
       'name' => 'Bed',
       'description'=> 'Some Description',
       'price'=> '500'
     ];
     $valid = checkFurniture($validFurniture);
     $this->assertTrue($valid);
  }


}
