<?php
/*
* -------------------------------------------------
* The operation.php file
* Sets up the view for displaying updates table
* Loads the template
* -------------------------------------------------
*/

//The message variable that is displayed after some operations
  $message = "";
  if(!empty($values)){
    if($values=="addsuccess")
      $message = "Successfully Added Update";
    else if($values == "editsuccess")
      $message = "Succesfully Edited Update";
    else if($values == "deletesuccess")
      $message = "Succesfully Deleted Update";
    else
      $message = "Error Occured";
  }

  // Create instance of DatabaseTable for updates
  $updateClass = new DatabaseTable('updates');
  $allUpdates = $updateClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageupdates/adminManageUpdatesContent.php';
  $content = loadTemplate($fileName, ["allUpdates"=>$allUpdates, 'message'=>$message,]);

  $fileName = '../templates/AdminTemplate.php';
  $title = "Fran's Furniture - Manage Updates";
  require_once 'loadview.php';

?>
