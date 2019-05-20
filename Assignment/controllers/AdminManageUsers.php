<?php
/*
  Controller Class - AdminManageUsers for Managing Users
*/

class AdminManageUsers extends Controller{

////////////////////////////////////////////////////////////////////////////////

  /** The index function
  * Calls the operation member function
  */
  public function index(){
    $this->operation();
  }

////////////////////////////////////////////////////////////////////////////////

  /** The operation function
  * Includes the file that sets up the display for the admin users contents
  * @param values - The values passed on as messages
  *
  */
  public function operation($values = []){
    require_once '../controllers/AdminManageUsers/operation.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The add function
  * Includes the file that sets up the display for adding a staff
  */
  public function add(){
    require_once '../controllers/AdminManageUsers/add.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The edit function
  * Includes the file that sets up the display for editing a staff's details
  * @param userId - The id of the user to be edited
  *
  */
  public function edit($userId = []){
    require_once '../controllers/AdminManageUsers/edit.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The editPassword function
  * Includes the file that sets up the display for editing a staff's password
  * @param userId - The id of the user to be edited
  *
  */
  public function editPassword($userId=[]){
    require_once '../controllers/AdminManageUsers/editpassword.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The delete function
  * Includes the file that deletes a staff
  * @param userId - The id of the staff to be deleted
  *
  */
  public function delete($userId = []){
    require_once '../controllers/AdminManageUsers/delete.php';
  }

////////////////////////////////////////////////////////////////////////////////


}


?>
