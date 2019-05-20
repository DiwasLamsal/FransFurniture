<?php
/*
* -------------------------------------------------
* The loadview.php file
* Is created to reduce Repetition of code
* -------------------------------------------------
*/

  $this->content = loadTemplate($fileName, $contents);
  $this->view($this->content);

?>
