<?php
/*
* -------------------------------------------------
* The delete.php file
* Deletes the user
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/

  //Check if no user is provided and redirect
  if(empty($userId)){
    header("Location: /Assignment/public/Admin/NotFound");
  }

  // Create instance of DatabaseTable for users
  $userClass = new DatabaseTable('users');
  $userSelected = $userClass->find('user_id',$userId);

  //If the user type is super, disallow removing the user and redirect, else delete the user
  if($userSelected->fetch()['type']=="super"){
    header("Location: /Assignment/public/AdminManageUsers/Operation/deletefail");
  }
  else{
    $userClass->delete('user_id', $userId);
    header("Location: /Assignment/public/AdminManageUsers/Operation/deletesuccess");
  }
?>
