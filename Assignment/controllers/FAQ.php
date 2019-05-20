<?php
/*
  Controller Class - FAQ for Displaying FAQ Content
*/
  class FAQ extends Controller{
////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Sets up the display for FAQs area
    */
    public function index(){

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/users/userfaq/FAQcontent.php';
      $content = loadTemplate($fileName, []);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - FAQs',
        'content'=>$content
      ];
      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }

?>
