<?php

  $fileName = '../templates/AdminTemplate.php';
  $contents = [
    'title'=>$title,
    'content'=>$content
  ];
  
  $this->content = loadTemplate($fileName, $contents);
  $this->view($this->content);
?>
