<?php
/*
  App Class - The class that deals with redirecting to proper locations
  -- https://www.youtube.com/watch?v=OsCTzGASImQ
  -- Build a PHP MVC Application
*/
  class App{

    //The default controller and method called when the homepage is attempted to be accessed
    private $controller = 'usershome';
    private $method = 'index';
    private $parameterArray = [];

    /** The constructor for App class
    * This sets up the url
    * Calls the view file which displays the content
    */
    public function __construct(){
      $link = $this->getProperUrl();

      //Check if the provided controller exists for the provided link
      if(file_exists('../controllers/'. $link[0] .'.php')){
        $this->controller = $link[0];
        unset($link[0]);
      }
      require_once '../controllers/'. $this->controller . '.php';

      //Create new instance of the class from controller's file
      $this->controller = new $this->controller;

      //If the provided method exists call the method otherwise, redirect to not found
      if(isset($link[1])){
        if(method_exists($this->controller, $link[1])){
          $this->method = $link[1];
          unset($link[1]);
        }
        else{
          header("Location: ../NotFound");
        }
      }

      //Set the remaining array values into the called method's parameter
      $this->parameterArray = $link ? array_values($link) : [];

      //Call the method from the controller class
      //The call_user_func_array calls the methods from a class as if they were static
      //Set the arguments when calling the method
      call_user_func_array([$this->controller, $this->method], $this->parameterArray);

    }

    /** The getProperUrl function
    * This extracts and returns the chunks provided in the url
    * @return separatedLink -- an array of separated chunks from the url 
    */
    public function getProperUrl(){
      if(isset($_GET['url'])){
        $separatedLink = explode('/', filter_var(rtrim($_GET['url'] , '/'), FILTER_SANITIZE_URL));
        return $separatedLink;
      }
    }


  }


 ?>
