<?php
/*
* -------------------------------------------------
* The edit.php file
* Sets up the view for editing an update
* Loads the templates
* -------------------------------------------------
*/

  // Create instance of DatabaseTable for updates
  $updateClass = new DatabaseTable('updates');
  $updateMessage = "<br>";

  // Check if no update is provided or a wrong value is passed manually from the browser and redirect
  if(empty($upId)){
    header("Location: /Assignment/public/Admin/NotFound");
  }
  $update = $updateClass->find('update_id', $upId);
  if($update->rowCount()==0){
    header("Location: /Assignment/public/Admin/NotFound");
  }
  $update = $update->fetch();

  // When submit button is clicked
  if(isset($_POST['submit'])){
    $_POST['update']['update_id']=$upId;


    // Check the submitted update for validation
    $ckUpdate = checkUpdate($_POST['update']);
    if($ckUpdate){
      // If an image is provided, change the current image
      if(isset($_FILES['image'])){
        $_POST['update']['image']=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], './images/updates/'.$_FILES['image']['name']);
      }
      else{
        $_POST['update']['image']="No Image";
      }

      //Update the data in the updates table and redirect
      $updateClass->save($_POST['update'], 'update_id');
      header("Location: /Assignment/public/AdminManageUpdates/operation/editsuccess");
    }
    else{
      $update = $_POST['update'];
      $updateMessage = "Cannot have empty fields.";
    }
  }
  //Set the edit variable to true. This is required to pass data to the form when an edit is performed
  $edit = true;

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageupdates/addUpdate.php';
  $content = loadTemplate($fileName,
              [
                'type'=>'Edit',
                'edit'=>$edit,
                'update'=>$update,
                'id'=>$upId,
                'updateMessage'=>$updateMessage
              ]);
  $title = 'Fran\'s Furniture - Edit Update';
  require_once 'loadview.php';

?>
