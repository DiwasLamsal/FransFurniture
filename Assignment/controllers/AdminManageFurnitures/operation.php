<?php

/*
* -------------------------------------------------
* The operation.php file
* Sets up the view for displaying furnitures table
* Loads the template
* -------------------------------------------------
*/

//The message variable that is displayed after some operations
  $message = "";
  if(!empty($values)){
    if($values=="addsuccess")
      $message = "Successfully Added";
    else if($values == "editsuccess")
      $message = "Succesfully Edited";
    else if($values == "deletesuccess")
      $message = "Succesfully Deleted";
    else if($values == "availability")
      $message = "Succesfully Changed Availability";
    else
      $message = "Error Occured";
  }

  // Create instance of DatabaseTable for furniture
  $furnitureClass = new DatabaseTable('furniture');
  $allFurnitures = $furnitureClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagefurnitures/adminManageFurnituresContent.php';
  $content = loadTemplate($fileName, ["allFurnitures"=>$allFurnitures, 'message'=>$message,]);
  $title = "Fran's Furniture - Manage Furnitures";
  require_once 'loadview.php';

?>
