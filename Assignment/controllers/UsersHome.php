<?php

/*
  Controller Class - UsersHome for displaying the home and updates to users
*/
  class UsersHome extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The search function
    * Sets up the users homepage
    * Adds the updates to the homepage
    */
    public function index(){
      // Create instance of DatabaseTable for updates
      $updateClass = new DatabaseTable('updates');
      $allUpdates = $updateClass->findAllSorted('date_posted');

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/users/userhome/userHomeContent.php';
      $content = loadTemplate($fileName, ['allUpdates'=>$allUpdates]);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Home',
        'content'=>$content
      ];

      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }

?>
