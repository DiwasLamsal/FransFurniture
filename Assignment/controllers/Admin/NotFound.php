<?php

/*
  The file for displaying Not Found Message
*/

// Load the contents into the View
  $fileName = '../views/admins/adminnotfound/notFoundContent.php';
  $content = loadTemplate($fileName, []);

  $fileName = '../templates/AdminTemplate.php';
  $contents = [
    'title'=>'Fran\'s Furniture - Admin',
    'content'=>$content
  ];

// Load the view into the template
  $this->content = loadTemplate($fileName, $contents);
  $this->view($this->content);

?>
