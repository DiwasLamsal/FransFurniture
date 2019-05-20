<?php

/*
* -------------------------------------------------
* The availability.php file
* Sets up the view for adding a furniture
* Loads the templates
* -------------------------------------------------
*/

  $furnitureClass = new DatabaseTable('furniture');// Create instance of DatabaseTable for furniture
  $furniture = $furnitureClass->find('id', $furId);// Get the furniture from id
  if(empty($furId) || $furniture->rowCount()==0){// If no such furniture exists, redirect
    header("Location: /Assignment/public/AdminNotFound");
  }
  $furnitureAvailability = $furniture->fetch();
//Check the furniture's availability and set it to the opposite to existing value and redirect
  if($furnitureAvailability['availability']=='Available'){
    $criteria = ['id'=>$furId, 'availability'=>'Unavailable'];
    $furnitureClass->save($criteria, 'id');
  }
  else{
    $criteria = ['id'=>$furId, 'availability'=>'Available'];
    $furnitureClass->save($criteria, 'id');
  }
  header("Location: /Assignment/public/AdminManageFurnitures/operation/availability/");

?>
