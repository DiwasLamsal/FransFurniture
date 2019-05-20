<?php

/*
* -------------------------------------------------
* The edit.php file
* Sets up the view for editing a category
* Loads the templates
* -------------------------------------------------
*/

  // Create instance of DatabaseTable for category
  $categoryClass = new DatabaseTable('category');

  //Find the category with provided id
  $categorySelected = $categoryClass->find('id',$catId);

  //This message would later be displayed in the view if an error occurs,
  //it will be edited as per the requirements
  $catNameMessage = "<br>";

  // When the form is submitted,
  if(isset($_POST['submit'])){

    // Test for validation
    $ckCategory = checkCategory($_POST['category']);

  if($ckCategory){
      //Check if the provided category name collides with an existing one
      if(isCategoryAvailable($_POST['category'])){
        $criteria = [
          'name'=>$_POST['category'],
          'id'=>$catId
        ];

        // Insert the category into the database and redirect to display successful message
        $categoryClass->save($criteria, 'id');
        header("Location: /Assignment/public/AdminManageCategories/Operation/editsuccess");
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
  // Check if the category in the provided link actually exists
  if($categorySelected->rowCount()>0){
    $categoryName = $categorySelected->fetch()['name'];
  }
  //If it does not, Redirect and display - No Such Category message
  else{
    header("Location: /Assignment/public/AdminManageCategories/Operation/error");
  }

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagecategories/addCategory.php';
  $title = "Fran's Furniture - Edit Category";
  $content = loadTemplate($fileName, ['type'=>'Edit', 'name'=>$categoryName, 'id'=>$catId,
                                      'catNameMessage'=>$catNameMessage]);



  require_once 'loadview.php';


?>
