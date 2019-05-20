<?php

/*
* -------------------------------------------------
* The add.php file
* Sets up the view for adding a user
* Loads the templates
* -------------------------------------------------
*/

  // Create instance of DatabaseTable for users
  $userClass = new DatabaseTable('users');

  //This message would later be displayed in the view if an error occurs,
  //it will be edited as per the requirements
  $userNameMessage = "<br>";

  // When the form is submitted,
  if(isset($_POST['submit'])){

    // Check the submitted furniture for validation
    $ckUser = checkUser($_POST);
    if($ckUser){
      //If the provided username is unique and the provided passwords match, add the user
      if(isUsernameAvailable($_POST['username'])){
        if($_POST['password']!=$_POST['confirmpassword']){
          $userNameMessage = "<font style ='color:red; '>Passwords do not match.</font>";
        }
        else{
          $criteria = [
            'name'=>$_POST['name'],
            'username'=>$_POST['username'],
            'password'=> password_hash($_POST['password'], PASSWORD_DEFAULT),
            'type'=>'staff'
          ];
          // Add the user to the database and redirect
          $userClass->save($criteria);
          header("Location: /Assignment/public/AdminManageUsers/Operation/addsuccess");
        }
      }
      else{//Message to display when username is not unique
        $userNameMessage = "<font style ='color:red; '>Username Already Exists.</font>";
      }
    }
    else{
      $userNameMessage = "<font style ='color:red; '>Cannot have empty fields</font>";
    }
  }

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageusers/addUser.php';
  $title = "Fran's Furniture - Add User";
  $content = loadTemplate($fileName,
              ['type'=>'Add', 'name'=>'', 'userNameMessage'=>$userNameMessage]);
  require_once 'loadview.php';

?>
