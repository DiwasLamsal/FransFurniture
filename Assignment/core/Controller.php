<?php

/*
  Controller Class - The superclass for all the controllers
*/
  class Controller{
    public $content;
////////////////////////////////////////////////////////////////////////////////
    /** The view function
    * Called by the child classes
    * Calls the view file which displays the content
    */
    public function view($data=""){
      require_once '../views/index.php';
    }
////////////////////////////////////////////////////////////////////////////////
  }

?>
