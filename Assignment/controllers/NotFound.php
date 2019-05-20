<?php
/*
  Controller Class - NotFound for displaying not found message
*/

  class NotFound extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Sets up the Not Found view
    */
    public function index(){
//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/users/notfound/notFoundContent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Not Found',
        'content'=>$content
      ];
      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }

?>
