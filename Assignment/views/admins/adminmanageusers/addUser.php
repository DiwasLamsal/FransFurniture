<!-- The form to add a user -->
<?php
  // Set the title and form action according to the type of action
  // It could be add or edit
  $action = $type == "Add" ?  "/Assignment/public/AdminManageUsers/Add" :
            "/Assignment/public/AdminManageUsers/Edit/".$id;
?>

<br><br>
<h2>
  <?php echo $type.' User';?>
</h2>

  <form action="<?php echo $action;?>" method="post" style="padding: 40px">

    <label>Name: </label>
    <input type="text" placeholder="Full Name" name="name"
        value = "<?php if(isset($_POST['name'])) echo $_POST['name'];?>"/>

    <label>Username: </label>
    <input type="text" placeholder="Username" name="username"
        value = "<?php if(isset($_POST['username'])) echo $_POST['username'];?>"/>

<!-- The password fields are not displayed on edit forms, instead, they are moved to  -->
<!--  a new form called editpassword -->
<?php if($type=="Add"){ ?>
    <label>Password: </label>
    <input type="password" placeholder="Password" name="password"
        value = ""/>

    <label>Confirm Password: </label>
    <input type="password" placeholder="Confirm Password" name="confirmpassword"
        value = ""/>
<?php } ?>
    <!-- Display any error -->
    <label><?php echo $userNameMessage; ?><label>

    <input type="submit" name="submit" id = "addUserSubmit" value="Submit" />

  </form>
