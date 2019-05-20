<?php
/*
* -------------------------------------------------
* The edit.php file
* Sets up the view for editing a user
* Loads the templates
* -------------------------------------------------
*/

  //Check if no user is provided and redirect
  if(empty($userId)){
    header("Location: /Assignment/public/Admin/NotFound");
  }

  // Create instance of DatabaseTable for users
  $userClass = new DatabaseTable('users');
  $userSelected = $userClass->find('user_id',$userId);

  // Get the current user's name
  $currentUserName =  ($userClass->find('user_id',$userId))->fetch()['username'];

  //This message would later be displayed in the view if an error occurs,
  //it will be edited as per the requirements
  $userNameMessage = "<br>";

  // When the form is submitted,
  if(isset($_POST['submit'])){


    // Check the submitted furniture for validation
    // Dummy passwords are sent because this edit feature does not allow editing password
    // A separate feature allows editing password
    // For the test to be valid, dummy passwords need to be sent.
    $_POST['password']='dummy';
    $_POST['confirmpassword']='dummy';
    $ckUser = checkUser($_POST);
    if($ckUser){
      //If the provided username is unique, update the user
      if(isUserNameAvailable($_POST['username'], $currentUserName)){
        $criteria = [
          'user_id'=>$userId,
          'name'=>$_POST['name'],
          'username'=>$_POST['username']
        ];
        //Save the user and redirect
        $userClass->save($criteria, 'user_id');
        header("Location: /Assignment/public/AdminManageUsers/Operation/editsuccess");
      }
      else{//Message to display when username is not unique
        $userNameMessage = "<font style ='color:red; '>Username Already Exists.</font>";
      }
    }
    else{
      $userNameMessage = "<font style ='color:red;'>Cannot have empty fields.</font>";
    }
  }

  //If the user selected exists, set the post variable to the selected user
  if($userSelected->rowCount()>0){
    $_POST = $userSelected->fetch();
  }
  else{
    header("Location: /Assignment/public/AdminManageUsers/Operation/nosuchuser");
  }

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanageusers/addUser.php';
  $content = loadTemplate($fileName, ['type'=>'Edit', 'id'=>$userId,
                                      'userNameMessage'=>$userNameMessage]);
  $title = "Fran's Furniture - Edit User";
  require_once 'loadview.php';

?>
