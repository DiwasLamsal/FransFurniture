<?php

  /*
    Controller Class - Admin for Admin/Staff Dashboard
  */
  class Admin extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Calls the home member function
    */
    public function index(){
      $this->home();
    }

////////////////////////////////////////////////////////////////////////////////

    /** The home function
    * Includes the file for displaying Dashboard content
    */
    public function home($values = []){
      require_once '../controllers/Admin/Home.php';
    }

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Includes the file for displaying 'Not Available' page
    */
    public function notFound($values = []){
      require_once '../controllers/Admin/NotFound.php';
    }

////////////////////////////////////////////////////////////////////////////////
  }

?>
