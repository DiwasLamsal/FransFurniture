<?php

require_once 'functions/testFunctions.php';

use PHPUnit\Framework\TestCase;

// Test Whether the provided user contains missing fields
class UserTest extends TestCase {

  public function testEmptyName() {
     $invalidUser = [
       'name' => '',
       'username'=> 'username',
       'password'=> 'password',
       'confirmpassword'=> 'password2'
     ];
     $valid = checkUser($invalidUser);
     $this->assertFalse($valid);
  }

  public function testEmptyUsername() {
     $invalidUser = [
       'name' => 'John',
       'username'=> '',
       'password'=> 'password',
       'confirmpassword'=> 'password2'
     ];
     $valid = checkUser($invalidUser);
     $this->assertFalse($valid);
  }

  public function testEmptyPassword() {
     $invalidUser = [
       'name' => 'John',
       'username'=> 'username',
       'password'=> '',
       'confirmpassword'=> 'password2'
     ];
     $valid = checkUser($invalidUser);
     $this->assertFalse($valid);
  }

  public function testEmptyConfirmPassword() {
     $invalidUser = [
       'name' => 'John',
       'username'=> 'username',
       'password'=> 'password',
       'confirmpassword'=> ''
     ];
     $valid = checkUser($invalidUser);
     $this->assertFalse($valid);
  }


  public function testValid() {
     $validUser = [
       'name' => 'John',
       'username'=> 'username',
       'password'=> 'password',
       'confirmpassword'=> 'password2'
     ];
     $valid = checkUser($validUser);
     $this->assertTrue($valid);
  }


}
