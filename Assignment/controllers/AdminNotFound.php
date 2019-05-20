<?php

/*
  Controller Class - AdminNotFound for Displaying Not Found Content
*/
  class AdminNotFound extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Sets up the display and calls the view
    */
    public function index(){

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/admins/adminnotfound/notFoundContent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/AdminTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Not Found',
        'content'=>$content
      ];
      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }



?>
