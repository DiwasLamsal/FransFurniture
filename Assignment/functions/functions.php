<?php

/*
* -------------------------------------------------
* The functions.php
* Contains different kinds of functions used in the
* assignment.
* -------------------------------------------------
*/


//////////////////////////////////////////////////////////////////////////////

  /** Function loadTemplate
  * Loads the template with provided arguments
  * @param fileName -The name of the file to be loaded to
  * @param templateVars - The variables that need to be set in the file
  * @return contents - The loaded contents
  */
  function loadTemplate($fileName, $templateVars) {
    extract($templateVars);
    ob_start();
    require $fileName;
    $contents = ob_get_clean();
    return $contents;
  }

//////////////////////////////////////////////////////////////////////////////

?>
