<?php

/*
* -------------------------------------------------
* The add.php file
* Sets up the view for adding a category
* Loads the templates
* -------------------------------------------------
*/

// Create instance of DatabaseTable for category
  $categoryClass = new DatabaseTable('category');

  //This message would later be displayed in the view if an error occurs,
  //it will be edited as per the requirements
  $catNameMessage = "<br>";

// When the form is submitted,
  if(isset($_POST['submit'])){

    // Test for validation
    $ckCategory = checkCategory($_POST['category']);

    //Check if the provided category name collides with an existing one
    if($ckCategory){
      if(isCategoryAvailable($_POST['category'])){
        $criteria = [
          'name'=>$_POST['category']
        ];

        // Insert the category into the database and redirect to display successful message
        $categoryClass->save($criteria);
        header("Location: /Assignment/public/AdminManageCategories/Operation/addsuccess");
      }
      else{
        // If the category name collides, display the message to the user
        $catNameMessage = "<font style ='color:red; '>Category Name Already Exists.</font>";
      }
    }
    else{
      $catNameMessage = "<font style ='color:red; '>Cannot have empty name.</font>";
    }
  }


//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagecategories/addCategory.php';
  $title = "Fran's Furniture - Add a Category";
  $content = loadTemplate($fileName,
              ['type'=>'Add', 'name'=>'', 'catNameMessage'=>$catNameMessage]);

  require_once 'loadview.php';
?>
