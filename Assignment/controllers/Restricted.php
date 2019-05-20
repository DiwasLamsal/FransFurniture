<?php
/*
  Controller Class - Restricted for displaying restricted message
  Is displayed when a non logged in user tries to access staff area
*/

  class Restricted extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Sets up the Restricted View
    */
    public function index(){

//--------------------------------LOAD TEMPLATE----------------------------------//
      $fileName = '../views/users/restricted/restrictedContent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Restricted',
        'content'=>$content
      ];
      require_once 'loadview.php';
    }
    
////////////////////////////////////////////////////////////////////////////////

  }


 ?>
