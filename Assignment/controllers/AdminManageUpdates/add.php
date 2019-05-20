<?php
/*
* -------------------------------------------------
* The add.php file
* Sets up the view for adding an update
* Loads the templates
* -------------------------------------------------
*/

// Create instance of DatabaseTable for updates
$updateClass = new DatabaseTable('updates');

//This message would later be displayed in the view if an error occurs,
//it will be edited as per the requirements
$updateMessage = "<br>";

//Set the edit variable to false. This is required to pass data to the form when an edit is performed
$edit = false;
$update = "";
// When the form is submitted,
if(isset($_POST['submit'])){

  // Check the submitted update for validation
  $ckUpdate = checkUpdate($_POST['update']);
  if($ckUpdate){

    //Set the date of the update
    $_POST['update']['date_posted']=date("Y-m-d H:i:s");

  //--------------------------------LOAD IMAGES----------------------------------//

    //If an image is provided, upload the image to the images directory and set its name in the image field
    if(isset($_FILES['image'])){
      $_POST['update']['image']=$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'], './images/updates/'.$_FILES['image']['name']);
    }
    else{
      $_POST['update']['image']="No Image";
    }

    //Insert the data into the updates table and redirect
    $updateClass->save($_POST['update']);
    header("Location: /Assignment/public/AdminManageUpdates/operation/addsuccess");
  }
  else{
    $edit = true;
    $update = $_POST['update'];
    $updateMessage = "Cannot have empty fields.";
  }

}


//--------------------------------LOAD TEMPLATE----------------------------------//


$fileName = '../views/admins/adminmanageupdates/addUpdate.php';
$content = loadTemplate($fileName,
            ['type'=>'Add', 'edit'=>$edit, 'updateMessage'=>$updateMessage, 'update'=>$update]);
$title = 'Fran\'s Furniture - Add an Update';
require_once 'loadview.php';

?>
