<?php
/*
  Controller Class - AdminManageUpdates for Managing Updates
*/

class AdminManageUpdates extends Controller{

////////////////////////////////////////////////////////////////////////////////

  /** The index function
  * Calls the operation member function
  */
  public function index($message=[]){
    $this->operation($message);
  }

////////////////////////////////////////////////////////////////////////////////

  /** The operation function
  * Includes the file that sets up the display for the admin updates contents
  * @param values - The values passed on as messages
  *
  */
  public function operation($values = []){
    require_once '../controllers/AdminManageUpdates/operation.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The delete function
  * Includes the file that deletes an update
  * @param upId - The id of the update to be deleted
  *
  */
  public function delete($upId = []){
    require_once '../controllers/AdminManageUpdates/delete.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The add function
  * Includes the file that sets up the display for adding an update
  */
  public function add(){
    require_once '../controllers/AdminManageUpdates/add.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The edit function
  * Includes the file that sets up the display for editing an update's details
  * @param upId - The id of the update to be edited
  *
  */
  public function edit($upId = []){
    require_once '../controllers/AdminManageUpdates/edit.php';
  }

////////////////////////////////////////////////////////////////////////////////

}


?>
