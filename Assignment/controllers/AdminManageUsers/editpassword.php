<?php
/*
* -------------------------------------------------
* The editpassword.php file
* Sets up the view for editing a user's password
* Loads the templates
* -------------------------------------------------
*/

  //Check if no user is provided and redirect
  if(empty($userId)){
    header("Location: /Assignment/public/Admin/NotFound");
  }

  // Create instance of DatabaseTable for users
  $userClass = new DatabaseTable('users');
  $userSelected = $userClass->find('user_id',$userId);

  //This message would later be displayed in the view if an error occurs,
  //it will be edited as per the requirements
  $userNameMessage = "<br>";

  // When the form is submitted,
  if(isset($_POST['submit'])){
      //Check if the two passwords match and display message accordingly
    if($_POST['newpassword']!=$_POST['confirmpassword']){
      $userNameMessage = "<font style ='color:red; '>Passwords do not match.</font>";
    }//Check if the old password matches and display message accordingly
    else if(checkOldPassword($userId, $_POST['oldpassword'])){
      $userNameMessage = "<font style ='color:red; '>Old password does not match.</font>";
    }//If both match, Save the new password
    else{
      $criteria = [
        'user_id'=>$userId,
        'password'=> password_hash($_POST['newpassword'], PASSWORD_DEFAULT)
      ];

      // Update the database with the user's new password and redirect
      $userClass->save($criteria, 'user_id');
      header("Location: /Assignment/public/AdminManageUsers/Operation/editpasssuccess");
    }
  }


  //If the user selected exists, set the post variable to the selected user
  if($userSelected->rowCount()>0){
    $_POST = $userSelected->fetch();
  }
  else{
    header("Location: /Assignment/public/AdminManageUsers/Operation/nosuchuser");
  }

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageusers/editPassword.php';
  $content = loadTemplate($fileName, ['type'=>'Edit', 'id'=>$userId,
                                      'userNameMessage'=>$userNameMessage]);
  $title = "Fran's Furniture - Edit User's Password";
  require_once 'loadview.php';

?>
