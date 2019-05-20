<?php

use PHPUnit\Framework\TestCase;

// Test Whether the provided passwords match and password is valid
class ConfirmPasswordTest extends TestCase {

  public function testInvalidMatch() {
     $user = [
       'password'=>'somepassword',
       'confirmpassword'=>'otherpassword'
     ];
     $valid = checkConfirmPassword($user);
     $this->assertFalse($valid);
  }

  public function testInvalidLength() {
     $user = [
       'password'=>'test',
       'confirmpassword'=>'test'
     ];
     $valid = checkConfirmPassword($user);
     $this->assertFalse($valid);
  }

  public function testValid() {
     $user = [
       'password'=>'samepassword',
       'confirmpassword'=>'samepassword'
     ];
     $valid = checkConfirmPassword($user);
     $this->assertTrue($valid);
  }


}
