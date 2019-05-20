<?php

/*
* -------------------------------------------------
* The edit.php file
* Sets up the view for editing a furniture
* Loads the templates
* -------------------------------------------------
*/

// Create instance of DatabaseTable for furniture
  $furnitureClass = new DatabaseTable('furniture');
  $furniture = $furnitureClass->find('id', $furId);
  $furnitureImageClass = new DatabaseTable('furniture_images');
  $furnitureMessage = "<br>";

// Check if no furniture is provided or a wrong value is passed manually from the browser and redirect
  if(empty($furId) || $furniture->rowCount()==0){
    header("Location: /Assignment/public/Admin/NotFound");
  }
  $furniture = $furniture->fetch();

// When submit button is clicked
  if(isset($_POST['submit'])){
    $_POST['furniture']['id']=$furId;

  // Check the submitted furniture for validation
    $ckFurniture = checkFurniture($_POST['furniture']);
  // If valid submit the form and update the furniture
    if($ckFurniture){

  // If an image(s) is provided, change the current images.
  // If not, the previous images are saved
      if($_FILES['images']['name'][0]!=""){

  // Remove the existing images for the furniture first
        $furnitureImageClass->delete('furniture_id', $furId);

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
            $furniture_image['furniture_id']=$furId;

            //Upload the files into the image directory and save the image to the database
            move_uploaded_file($temp, $image);
            $furnitureImageClass->save($furniture_image);
        }
      }

      //Update the data into the furnitures table and redirect
      $furnitureClass->save($_POST['furniture'], 'id');
      header("Location: /Assignment/public/AdminManageFurnitures/operation/editsuccess");
  }
  else{
    $furnitureMessage = "Cannot have empty fields!";
    $furniture = $_POST['furniture'];
  }


}
  //Set the edit variable to true. This is required to pass data to the form when an edit is performed
  $edit = true;
  $categoryClass = new DatabaseTable('category');
  $allCategories = $categoryClass->findAll();

  //--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagefurnitures/addFurniture.php';
  $title = "Fran's Furniture - Edit Furniture";
  $content = loadTemplate($fileName,
              [
                'type'=>'Edit',
                'edit'=>$edit,
                'allCategories'=>$allCategories,
                'furniture'=>$furniture,
                'id'=>$furId,
                'furnitureMessage'=>$furnitureMessage
              ]);
  require_once 'loadview.php';


?>
