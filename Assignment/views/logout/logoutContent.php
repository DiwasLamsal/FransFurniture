<!-- The logout file that logs the user out -->
<?php
  session_start();

  if(isset($_SESSION['loggedin'])){
    unset($_SESSION['loggedin']);
  }
  session_destroy();

?>
<!-- The message to be displayed after logged out -->
<main class = "home">
  <h2>You are now Logged out.</h2>
</main>
