<?php

require_once 'functions/testFunctions.php';
require_once 'models/databasetable.php';
require_once 'dbconnect/dbconnect.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided username already exists in database
class UsernameAvailabilityTest extends TestCase {

  public function testExistingName() {
     $name = 'admin';
     $valid = checkIsUserNameAvailable($name);
     $this->assertFalse($valid);
  }

  public function testNonExistingName() {
     $name = 'Astronaut';
     $valid = checkIsUserNameAvailable($name);
     $this->assertTrue($valid);
  }


}
