<?php

/*
  Controller Class - Logout for Logging out the user
*/

  class Logout extends Controller{

////////////////////////////////////////////////////////////////////////////////


    /** The index function
    * Sets up the logout view and performs logout
    */
    public function index(){

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/logout/logoutContent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Logged Out',
        'content'=>$content
      ];

      require_once 'loadview.php';

    }

////////////////////////////////////////////////////////////////////////////////

  }


 ?>
