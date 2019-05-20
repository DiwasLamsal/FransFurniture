<?php

/*
  Controller Class - AdminManageMessages for Managing Enquiries
*/
class AdminManageMessages extends Controller{

////////////////////////////////////////////////////////////////////////////////

  /** The index function
  * Calls the operation member function
  */
  public function index($message=[]){
    $this->operation($message);
  }

////////////////////////////////////////////////////////////////////////////////

  /** The operation function
  * Includes the file that sets up the display for the admin enquiries contents
  * @param values - The values passed on as messages
  *
  */
  public function operation($values = []){
    require_once '../controllers/AdminManageMessages/operation.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The delete function
  * Includes the file that deletes an enquiry
  * @param enId - The id of the enquiry to be deleted
  *
  */
  public function delete($enId = []){
    require_once '../controllers/AdminManageMessages/delete.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The pending function
  * Includes the file that sets the status to pending
  * @param furId - The id of the enquiry to be altered
  *
  */
  public function pending($enId = []){
    require_once '../controllers/AdminManageMessages/pending.php';
  }

////////////////////////////////////////////////////////////////////////////////

  /** The completed function
  * Includes the file that sets the status to completed
  * @param furId - The id of the enquiry to be altered
  *
  */
  public function completed($enId = []){
    require_once '../controllers/AdminManageMessages/completed.php';
  }

////////////////////////////////////////////////////////////////////////////////


}


?>
