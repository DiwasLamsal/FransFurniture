<?php
/*
* -------------------------------------------------
* The operation.php file
* Sets up the view for displaying users table
* Loads the template
* -------------------------------------------------
*/

//The message variable that is displayed after some operations
  $message = "";
  if(!empty($values)){
    if($values=="addsuccess")
      $message = "Successfully Added User";
    else if($values == "editsuccess")
      $message = "Succesfully Edited User";
    else if($values == "deletesuccess")
      $message = "Succesfully Deleted User";
    else if($values == "editpasssuccess")
      $message = "Succesfully Edited Password";
    else if($values == "nosuchuser")
      $message = "No Such User";
    else if($values == "deletefail")
      $message = "Cannot Delete the Super Admin";
    else
      $message = "Error Occured";
  }

  // Create instance of DatabaseTable for users
  $userClass = new DatabaseTable('users');
  $allUsers  = $userClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageusers/adminManageUsersContent.php';
  $content = loadTemplate($fileName, ["allUsers"=>$allUsers, 'message'=>$message]);
  $title = "Fran's Furniture - Manage Users";
  require_once 'loadview.php';

?>
