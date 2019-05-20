<?php

require_once 'functions/testFunctions.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided enquiry contains missing fields
class EnquiryTest extends TestCase {

  public function testEmptyName() {
     $invalidEnquiry = [
       'fullname' => '',
       'email'=> 'test@test.com',
       'contact'=> '9801000000',
       'message'=> 'This is a message'
     ];
     $valid = checkEnquiry($invalidEnquiry);
     $this->assertFalse($valid);
  }

  public function testEmptyEmail() {
    $invalidEnquiry = [
      'fullname' => 'Test Thapa',
      'email'=> '',
      'contact'=> '9801000000',
      'message'=> 'This is a message'
    ];
     $valid = checkEnquiry($invalidEnquiry);
     $this->assertFalse($valid);
  }

  public function testEmptyContact() {
    $invalidEnquiry = [
      'fullname' => 'Test Thapa',
      'email'=> 'test@test.com',
      'contact'=> '',
      'message'=> 'This is a message'
    ];
     $valid = checkEnquiry($invalidEnquiry);
     $this->assertFalse($valid);
  }

  public function testEmptyMessage() {
    $invalidEnquiry = [
      'fullname' => 'Test Thapa',
      'email'=> 'test@test.com',
      'contact'=> '9801000000',
      'message'=> ''
    ];
     $valid = checkEnquiry($invalidEnquiry);
     $this->assertFalse($valid);
  }


  public function testValid() {
    $validEnquiry = [
      'fullname' => 'Test Thapa',
      'email'=> 'test@test.com',
      'contact'=> '9801000000',
      'message'=> 'This is a message'
    ];
     $valid = checkEnquiry($validEnquiry);
     $this->assertTrue($valid);
  }


}
