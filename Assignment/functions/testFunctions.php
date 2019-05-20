<?php


/*
* -------------------------------------------------
* The testFunctions.php
* Contains different kinds of functions used for
* validation of data mostly related to forms
* -------------------------------------------------
*/

//////////////////////////////////////////////////////////////////////////////

// Function to check category validation
function checkCategory($categoryName){
  $valid = true;
  if ($categoryName == '') {
    $valid = false;
  }
  return $valid;
}

//////////////////////////////////////////////////////////////////////////////

// Function to check Furniture for Validation
  function checkFurniture($furniture){
    $valid = true;
    if($furniture['name']==''){
      $valid = false;
    }
    if($furniture['description']==''){
      $valid = false;
    }
    if($furniture['price']==''){
      $valid = false;
    }
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////


// Function to check Update for Validation
  function checkUpdate($update){
    $valid = true;
    if($update['title']==''){
      $valid = false;
    }
    if($update['description']==''){
      $valid = false;
    }
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////

// Function to check User for Validation
  function checkUser($user){
    $valid = true;
    if($user['name']==''){
      $valid = false;
    }
    if($user['username']==''){
      $valid = false;
    }
    if($user['password']==''){
      $valid = false;
    }
    if($user['confirmpassword']==''){
      $valid = false;
    }
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////

// Function to check Enquiry for Validation
  function checkEnquiry($enquiry){
    $valid = true;
    if($enquiry['fullname']==''){
      $valid = false;
    }
    if($enquiry['email']==''){
      $valid = false;
    }
    if($enquiry['contact']==''){
      $valid = false;
    }
    if($enquiry['message']==''){
      $valid = false;
    }
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////

// Function to check if category name is available
  function checkIsCategoryAvailable($catName){
    $valid = true;
    $categoryClass = new DatabaseTable('category');
    $category = $categoryClass->find('name', $catName);
    if($category->rowCount()>0)
      $valid = false;
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////

// Function to check if username is available
  function checkIsUserNameAvailable($username){
    $valid = true;
    $userClass = new DatabaseTable('users');
    $users = $userClass->find('username', $username);
    if($users->rowCount()>0)
      $valid = false;
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////

// Function to check whether provided passwords match and password is valid
  function checkConfirmPassword($user){
    $valid = true;
    if($user['password']!=$user['confirmpassword'])
      $valid = false;
    if(strlen($user['password'])<8)
      $valid = false;
    return $valid;
  }

//////////////////////////////////////////////////////////////////////////////


?>
