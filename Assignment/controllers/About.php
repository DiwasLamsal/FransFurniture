<?php

/*
  Controller Class - About for the About page
*/
  class About extends Controller{

////////////////////////////////////////////////////////////////////////////////
    /** Member function index
    * Loads the About template and sends it to the view
    *
    */
    public function index(){

//--------------------------------LOAD TEMPLATE----------------------------------//
      $fileName = '../views/users/about/aboutContent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - About Us',
        'content'=>$content
      ];

      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }

?>
