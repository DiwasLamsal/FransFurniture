<?php
/*
* -------------------------------------------------
* The add.php file
* Sets up the view for adding a furniture
* Loads the templates
* -------------------------------------------------
*/

// Create instance of DatabaseTable for furniture
$furnitureClass = new DatabaseTable('furniture');
$furnitureImageClass = new DatabaseTable('furniture_images');

//This message would later be displayed in the view if an error occurs,
//it will be edited as per the requirements
$furnitureMessage = "<br>";

//Set the edit variable to false. This is required to pass data to the form when an edit is performed
$edit = false;
$furniture = "";
// When the form is submitted,
if(isset($_POST['submit'])){

  // Check the submitted furniture for validation
  $ckFurniture = checkFurniture($_POST['furniture']);
  if($ckFurniture){
    //Set the date and availability of the furniture
    $_POST['furniture']['date_posted']=date("Y-m-d H:i:s");
    $_POST['furniture']['availability']="Available";

  //--------------------------------LOAD IMAGES----------------------------------//

    //Insert the data into the furnitures table and redirect
    $furnitureClass->save($_POST['furniture']);

    $addedFurniture = $furnitureClass->findLastRecord('id')->fetch();
    $furnitureId = $addedFurniture['id'];
  // Help taken from http://www.javascripthive.info/php/php-multiple-files-upload-validation/

    // Create an array of extensions from which the uploaded image files can be
    $extensionArray = array("svg","SVG", "jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");

    // Get all the image files
    foreach($_FILES["images"]["tmp_name"] as $key=>$value){
      //Set the variables from image
      $temp = $_FILES["images"]["tmp_name"][$key];
      $name = $_FILES["images"]["name"][$key];
      $size = $_FILES["images"]["size"][$key];

      //Check if the uploaded file is not of valid extension or more than the limit size
      $checkExtension = pathinfo($name, PATHINFO_EXTENSION);
      if(!in_array($checkExtension, $extensionArray)||$size>2100000 || $size==0)
      // If the file violates the conditions, Simply ignore the file and contiue with the rest
        continue;

      // Random name is generated for unique image name
      $dir = "images/furniture/";
      $image = $dir.microtime(true).basename($name);
      $_POST['image']['path']=$image;

      // Set the values for furniture_image
      $furniture_image['path']=$image;
      $furniture_image['furniture_id']=$furnitureId;

      //Upload the files into the image directory and save the image to the database
      move_uploaded_file($temp, $image);
      $furnitureImageClass->save($furniture_image);
    }

    header("Location: /Assignment/public/AdminManageFurnitures/operation/addsuccess");
  }
  else{
    $furniture = $_POST['furniture'];
    $edit = true;
    $furnitureMessage = "Cannot have empty fields!";
  }

}


// Create instance of DatabaseTable for furniture
$categoryClass = new DatabaseTable('category');
$allCategories = $categoryClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

$fileName = '../views/admins/adminmanagefurnitures/addFurniture.php';
$title = "Fran's Furniture - Add a Furniture";
$content = loadTemplate($fileName,
            ['type'=>'Add', 'edit'=>$edit, 'allCategories'=>$allCategories, 'furniture'=>$furniture,
          'furnitureMessage'=>$furnitureMessage]);
require_once 'loadview.php';


?>
