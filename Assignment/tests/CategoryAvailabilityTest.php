<?php

require_once 'functions/testFunctions.php';
require_once 'models/databasetable.php';
require_once 'dbconnect/dbconnect.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided category name already exists in database
class CategoryAvailabilityTest extends TestCase {

  public function testExistingName() {
     $name = 'Beds';
     $valid = checkIsCategoryAvailable($name);
     $this->assertFalse($valid);
  }

  public function testNonExistingName() {
     $name = 'Mercedes';
     $valid = checkIsCategoryAvailable($name);
     $this->assertTrue($valid);
  }


}
