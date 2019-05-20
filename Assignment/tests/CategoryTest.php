<?php

require_once 'functions/testFunctions.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided category name is empty
class CategoryTest extends TestCase {

  public function testEmptyName() {
     $emptyName = '';
     $valid = checkCategory($emptyName);
     $this->assertFalse($valid);
  }

  public function testNonEmptyName() {
     $nonEmptyName = 'Bed';
     $valid = checkCategory($nonEmptyName);
     $this->assertTrue($valid);
  }


}
