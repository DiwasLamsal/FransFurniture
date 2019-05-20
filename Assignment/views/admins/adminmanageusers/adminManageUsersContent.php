<!-- The admin view for managing users -->
<!-- This part displays a table which includes all the availble users -->
<br><br>
<h2>
  Manage Users
</h2>

<?php
// The message to be displayed if provided
$textWithSpace = preg_replace("([A-Z])", " $0", $message);
?>
<p align = "right"><?php echo $textWithSpace; ?>
</p>

<!-- The table of users-->
<table class = "adminTable">
  <tr>
    <th> </th>
    <th>Name</th>
    <th>Username</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Edit Password</th>
  </tr>
  <?php
  $count = 0;

  //Check if the current user is or a staff
  //Only administrators can add edit or delete users
  //Other staff can only change their own passwords
  if (session_status() == PHP_SESSION_NONE) {
  	session_start();
  }
  $currentUser = getUserById($_SESSION['loggedin']);

    foreach($allUsers as $user){

      if($currentUser['type']=="super"){
        $editText = '<a href = "/Assignment/public/AdminManageUsers/edit/'.$user['user_id'].'">
                        Edit
                     </a>';
        $deleteText = '<a href = "/Assignment/public/AdminManageUsers/delete/'.$user['user_id'].'">
                        Delete
                       </a>';
        $editPasswordText = '<a href = "/Assignment/public/AdminManageUsers/editPassword/'.$user['user_id'].'">
                                Edit Password
                             </a>';
      }
      else{
        $editText = $deleteText = $editPasswordText = '<font style = "color: red;">No Access</font>';
      }

      if($currentUser==$user){
        $editPasswordText = '<a href = "/Assignment/public/AdminManageUsers/editPassword/'.$user['user_id'].'">
                                Edit Password
                             </a>';
      }

      $count++;
      echo '<tr>
              <td>'.$count.'</td>
              <td>'.$user['name'].'</td>
              <td>'.$user['username'].'</td>

              <td>
                '.$editText.'
              </td>

              <td>
                '.$deleteText.'
              </td>

              <td>
                '.$editPasswordText.'
              </td>
            <tr>';
    }

  ?>
</table>

<br><br>
<!-- Link to add a new user-->
<?php  if($currentUser['type']=="super"){ ?>
<p style = "text-align: center;">
  <a href = "/Assignment/public/AdminManageUsers/add/">Add new user</a>
</p>

<?php } ?>
