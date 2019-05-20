<?php

/*
  Controller Class - AdminManageFurnitures for Managing Furnitures
*/
class AdminManageFurnitures extends Controller{
////////////////////////////////////////////////////////////////////////////////

  /** The index function
  * Calls the operation member function
  */
  public function index($message=[]){
    $this->operation($message);
  }

////////////////////////////////////////////////////////////////////////////////

  /** The operation function
  * Includes the file that sets up the display for the admin furniture contents
  * @param values - The values passed on as messages
  *
  */
  public function operation($values = []){
    require_once '../controllers/AdminManageFurnitures/operation.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The add function
  * Includes the file that sets up the display for adding a furniture
  */
  public function add(){
    require_once '../controllers/AdminManageFurnitures/add.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The edit function
  * Includes the file that sets up the display for editing a furniture's details
  * @param furId - The id of the furniture to be edited
  *
  */
  public function edit($furId=[]){
    require_once '../controllers/AdminManageFurnitures/edit.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The delete function
  * Includes the file that deletes a furniture
  * @param furId - The id of the furniture to be deleted
  *
  */
  public function delete($furId=[]){
    require_once '../controllers/AdminManageFurnitures/delete.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The availability function
  * Includes the file that alters a furniture's availability field
  * @param furId - The id of the furniture to be altered
  *
  */
  public function availability($furId=[]){
    require_once '../controllers/AdminManageFurnitures/availability.php';
  }

////////////////////////////////////////////////////////////////////////////////


}

?>
