<?php

/*
* -------------------------------------------------
* The root index.php file
* Is the root directory of the application
* and the single entry point to any and every
* features
* Requires the necessary files to laod the
* application.
* -------------------------------------------------
*/


  require_once '../dbconnect/dbconnect.php';
  require_once '../models/databasetable.php';
  require_once '../functions/functions.php';
  require_once '../loader.php';
  require_once '../functions/testFunctions.php';
  require_once '../functions/otherDatabaseFunctions.php';


// Create instance of the application class which uses the browser's url
  $application = new App;

?>
