<?php
/*
* -------------------------------------------------
* The delete.php file
* Deletes the furniture
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/
  // Create instance of DatabaseTable for furnitre
  $furnitureClass = new DatabaseTable('furniture');
  $furniture = $furnitureClass->find('id', $furId);

  //Check if no furniture is provided or a wrong value is passed manually from the browser and redirect
  if(empty($furId) || $furniture->rowCount()==0)
    header("Location: /Assignment/public/Admin/NotFound");

  //If the furniture exists, delete it and then redirect
  $furnitureName = $furniture->fetch();
  $furnitureClass->delete('id', $furId);
  header("Location: /Assignment/public/AdminManageFurnitures/operation/deletesuccess";

?>
