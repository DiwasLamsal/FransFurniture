<!-- The form to edit a user's password -->
<?php
  $action = "/Assignment/public/AdminManageUsers/editPassword/".$id;
?>

<br><br>
<h2>
  <?php echo $type.' User';?>
</h2>


  <form action="<?php echo $action;?>" method="post" style="padding: 40px">

    <label>Old Password: </label>
    <input type="password" placeholder="Password" name="oldpassword"
        value = ""/>

    <label>Password: </label>
    <input type="password" placeholder="Password" name="newpassword"
        value = ""/>

    <label>Confirm Password: </label>
    <input type="password" placeholder="Confirm Password" name="confirmpassword"
        value = ""/>

    <!-- Display any error -->
    <label><?php echo $userNameMessage; ?><label>

    <input type="submit" name="submit" id = "addUserSubmit" value="Submit" />

  </form>
