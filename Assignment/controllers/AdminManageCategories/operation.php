<?php
/*
* -------------------------------------------------
* The operation.php file
* Sets up the view for displaying categories table
* Loads the template
* -------------------------------------------------
*/

//The message variable that is displayed after some operations
  $message = "";
  if(!empty($values)){
    if($values=="addsuccess")
      $message = "Successfully Added Category";
    else if($values == "editsuccess")
      $message = "Succesfully Edited Category";
    else if($values == "deletesuccess")
      $message = "Succesfully Deleted Category";
    else if($values == "deletefail")
      $message = "Cannot Delete Category With Products";
    else
      $message = "Error";
  }

  // Create instance of DatabaseTable for category
  $categoryClass = new DatabaseTable('category');
  $allCategories = $categoryClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagecategories/adminManageCategoriesContent.php';
  $title = "Fran's Furniture - Manage Categories";
  $content = loadTemplate($fileName, ["allCategories"=>$allCategories, 'message'=>$message,]);


  require_once 'loadview.php';

?>
