<?php

/*
  The file for displaying the Administrator dashboard contents
*/

// If link is tried to be changed manually, redirect to not found area
  if(!empty($values))
    header("Location: /Assignment/public/Admin/NotFound");

// Load the contents into the View
  $fileName = '../views/admins/adminhome/adminHomeContent.php';
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
