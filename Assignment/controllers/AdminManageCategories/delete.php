<?php
/*
* -------------------------------------------------
* The delete.php file
* Deletes the category if it has no existing
* products under it.
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/

  $categoryClass = new DatabaseTable('category'); // Create instance of DatabaseTable for category
  $furnitureClass = new DatabaseTable('furniture'); // Create instance of DatabaseTable for furnitre

  //Check if furnitures exist that reference the category
  $flag = false;
  $allFurnitures = $furnitureClass->findAll();
  foreach ($allFurnitures as $furniture) {
    if($furniture['categoryId']===$catId){
      $flag = true; //If any furnture exists within the category, set flag to true
    }
  }
  if($flag==true){ //If Flag is true redirect back to dashboard without deleting category
    header("Location: /Assignment/public/AdminManageCategories/Operation/deletefail");
  }
  else{ //Else, delete the category and redirect.
    $categoryClass->delete('id', $catId);
    header("Location: /Assignment/public/AdminManageCategories/Operation/deletesuccess");
  }

?>
