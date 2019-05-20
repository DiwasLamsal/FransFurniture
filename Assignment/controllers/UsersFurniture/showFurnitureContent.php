<?php

  // Create instance of DatabaseTable for categories
  $category = new DatabaseTable('category');
  $allCategories = $category->findAll();
  // Create instance of DatabaseTable for furniture
  $furniture = new DatabaseTable('furniture');

  //If category is not set, get all furnitures, and if is set, get only from selected category
  if(empty($categoryId))
    $allFurnitures = $furniture->findAllSorted('date_posted');
  else
    $allFurnitures = $furniture->findSorted("categoryId", $categoryId, 'date_posted');

  $cat = empty($categoryId) ? "" : $categoryId;

  $contents = [
    'allFurnitures'=>$allFurnitures,
    'category'=>$cat
  ];

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/users/userfurniture/userFurnitureContent.php';
  $content = loadTemplate($fileName, $contents);


?>
