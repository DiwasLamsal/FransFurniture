<?php


/*
* -------------------------------------------------
* The otherDatabaseFunctions.php
* Contains different kinds of functions used in the
* assignment which indirectly or directly link to the
* database.
* -------------------------------------------------
*/

//////////////////////////////////////////////////////////////////////////////

  /** Function isUserNameAvailable
  * Checks whether provided username already exists
  * @param username -The username selected
  * @param currentUserName - The existing username(Used when editing)
  * @return flag - Boolean value according to whether username is available
  */
  function isUserNameAvailable($username, $currentUserName=""){
    $userClass = new DatabaseTable('users');
    $users = $userClass->find('username', $username);
    if($users->rowCount()>0 && $username!=$currentUserName)
      return false;
    else
      return true;
  }
//////////////////////////////////////////////////////////////////////////////

  /**
  * Function getUserNameById
  * @param id takes in the user_id
  * @return fullname of user
  */
  function getUserNameById($id){
    $userClass = new DatabaseTable('users');
    $users = $userClass->find('user_id', $id);
    if($users->rowCount()>0)
      return $users->fetch()['name'];
    else
      return "Unknown";
  }

//////////////////////////////////////////////////////////////////////////////

  /**
  * Function getUserById
  * @param id - takes in the user_id
  * @return user - The user array from database
  */
  function getUserById($id){
    $userClass = new DatabaseTable('users');
    $users = $userClass->find('user_id', $id);
    if($users->rowCount()>0)
      return $users->fetch();
    else
      return false;
  }


//////////////////////////////////////////////////////////////////////////////

  /** Function checkOldPassword
  * Checks whether the provided password matches the old one
  * @param userId -The user's id
  * @param password - The password provided
  * @return flag - Boolean value according to whether password matches
  */
  function checkOldPassword($userId, $password){
    $userClass = new DatabaseTable('users');
    $users = $userClass->find('user_id', $userId);
    if(password_verify($password , $users->fetch()['password'])){
      return false;
    }
    else {
      return true;
    }
  }

//////////////////////////////////////////////////////////////////////////////


  /** Function isCategoryAvailable
  * Checks whether the provided category name is taken
  * @param catName -The provided category name
  * @return flag - Boolean value according to whether category exists
  */
  function isCategoryAvailable($catName){
    $categoryClass = new DatabaseTable('category');
    $category = $categoryClass->find('name', $catName);
    if($category->rowCount()>0)
      return false;
    else
      return true;
  }


//////////////////////////////////////////////////////////////////////////////

  /** Function getCategory
  * Takes in the id and returns the category name
  * @param catId - The category id to be provided
  * @return categoryName - Category's name
  */
  function getCategory($catId){
    $categoryClass = new DatabaseTable('category');
    $category = $categoryClass->find('id', $catId);
    return $category->fetch()['name'];
  }


//////////////////////////////////////////////////////////////////////////////


  /** Function getFurnitureImagesByFurniture
  * Takes in the id and returns the images for furniture
  * @param furId - The furniture id to be provided
  * @return categoryName - Category's name
  */
  function getFurnitureImagesByFurniture($furId){
    $furnitureImageClass = new DatabaseTable('furniture_images');
    $images = $furnitureImageClass->find('furniture_id', $furId);
    return $images;
  }


//////////////////////////////////////////////////////////////////////////////


  /** Function removeFurnitureImagesByFurniture
  * Takes in the id and removes the images for furniture
  * @param furId - The furniture id to be provided
  */
  function removeFurnitureImagesByFurniture($furId){
    $furnitureImageClass = new DatabaseTable('furniture_images');
    $images = $furnitureImageClass->delete('furniture_id', $furId);
  }


///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////

/** Function pagination
* This function returns three items according to the current page and category if provided
* @param category - The category if needed to be provided for the product
* @return stmt - The furnitures are returned according to the set limit
*/
function pagination($category=""){
  	global $pdo;
  	$page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Display three furnitures per page
  	$furnitureInPage = 3;
    //This gets the current furniture in the queue
  	$currentFurniture = ($furnitureInPage * $page) - $furnitureInPage;
    // Query the database for furniture according to set limit
  	$query = ($category=="") ?
    "SELECT * FROM furniture WHERE availability = 'Available' ORDER BY id desc LIMIT {$currentFurniture}, {$furnitureInPage}" :
    "SELECT * FROM furniture WHERE categoryId = {$category} AND availability = 'Available' ORDER BY id desc LIMIT {$currentFurniture}, {$furnitureInPage}";
    $stmt = $pdo->prepare($query);
  	$stmt->execute();
    return $stmt;
}


/** Function findFurnitureCount
* This function returns three number of furniture in the database
* @return stmt - The number of furniture
*/
function findFurnitureCount($category=""){
  global $pdo;
  $query = ($category=="") ?
            "SELECT COUNT(*) as total_rows FROM furniture WHERE availability = 'Available'" :
            "SELECT COUNT(*) as total_rows FROM furniture WHERE categoryId = {$category} AND  availability = 'Available'";
  $stmt = $pdo->prepare( $query );
  $stmt->execute();
  return $stmt;
}


///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////



?>
