<?php

/*
  Controller Class - AdminManageCategories for Managing Categories
*/
class AdminManageCategories extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Calls the operation member function
    */
    public function index($message=[]){
      $this->operation($message);
    }

////////////////////////////////////////////////////////////////////////////////

    /** The operation function
    * Includes the file that sets up the display for the admin category contents
    * @param values - The values passed on as messages
    *
    */
    public function operation($values = []){
      require_once '../controllers/AdminManageCategories/operation.php';
    }

////////////////////////////////////////////////////////////////////////////////

    /** The add function
    * Includes the file that sets up the display for adding a category
    */
    public function add(){
      require_once '../controllers/AdminManageCategories/add.php';
    }

////////////////////////////////////////////////////////////////////////////////

    /** The edit function
    * Includes the file that sets up the display for editing a category
    * @param catId - The id of the category to be edited
    *
    */
    public function edit($catId = []){
      require_once '../controllers/AdminManageCategories/edit.php';
    }

////////////////////////////////////////////////////////////////////////////////

    /** The delete function
    * Includes the file that deletes a category if no items are there under it
    * @param catId - The id of the category to be deleted
    *
    */
    public function delete($catId = []){
      require_once '../controllers/AdminManageCategories/delete.php';
    }

////////////////////////////////////////////////////////////////////////////////
}

 ?>
