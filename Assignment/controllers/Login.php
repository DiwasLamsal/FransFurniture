<?php

/*
  Controller Class - Login for Displaying Login Form
*/

  class Login extends Controller{

////////////////////////////////////////////////////////////////////////////////


    /** The index function
    * Sets up the login view and performs login actions
    */
    public function index(){
      // Set up the session if the credentials match and redirect to admin home
      session_start();
      if(isset($_SESSION['loggedin'])){
        header("Location: /Assignment/public/Admin/Home");
      }

      // Create instance of DatabaseTable for users
      $userClass = new DatabaseTable('users');
      $allUsers  = $userClass->findAll();

      //This message would later be displayed in the view if an error occurs,
      //it will be edited as per the requirements
      $loginText = "";

      //When the form is submitted
      if(isset($_POST['submit'])){
        $flag = false;

        //Check the database for all the users, if the login details match, set flag to true
        //and set the session.
        foreach ($allUsers as $user) {
          if($user['username']==$_POST['username']){
            $a = password_verify($user['password'], $_POST['password']);
            if(password_verify( $_POST['password'], $user['password'])){
                $_SESSION['loggedin']=$user['user_id'];
                $flag = true;
            }
          }
        }

        //If logged in, redirect to Admin dashboard
        if($flag){
          header("Location: /Assignment/public/Admin/Home");
        }//Else display message
        else
          $loginText = "<font style = 'color:red;'>Wrong Username or Password!</font>";
      }

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/login/loginContent.php';
      $content = loadTemplate($fileName, ['text'=>$loginText]);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Log in',
        'content'=>$content
      ];

      require_once 'loadview.php';

    }

////////////////////////////////////////////////////////////////////////////////

  }


 ?>
