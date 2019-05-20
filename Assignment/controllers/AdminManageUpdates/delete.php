<?php
/*
* -------------------------------------------------
* The delete.php file
* Deletes the update
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/

  // Create instance of DatabaseTable for updates
  $updateClass = new DatabaseTable('updates');

  //Check if no update is provided or a wrong value is passed manually from the browser and redirect
  if(empty($upId))
    header("Location: /Assignment/public/Admin/NotFound");+
  $update = $updateClass->find('update_id', $upId);
  if($update->rowCount()==0)
    header("Location: /Assignment/public/Admin/NotFound");

  //If the update exists, delete it and then redirect
  $update = $update->fetch();
  $updateClass->delete('update_id', $upId);
  header("Location: /Assignment/public/AdminManageUpdates/operation/deletesuccess");

?>
