<?php

/*
  Controller Class - Contact for Displaying Contact Content
*/
  class Contact extends Controller{

////////////////////////////////////////////////////////////////////////////////

    /** The index function
    * Calls the addEnquiry member function
    */
    public function index(){
      $this->addEnquiry();
    }

////////////////////////////////////////////////////////////////////////////////

    /** The addEnquiry function
    * Adds the enquiry to the database
    */
    public function addEnquiry(){
      //This message would later be displayed in the view if an error occurs,
      //it will be edited as per the requirements
      $message = "";
      $enquiryMessage = "";
      // Create instance of DatabaseTable for enquiries
      $enquiryClass = new DatabaseTable('enquiries');

      //When the form is submitted, add the contents to the database
      if(isset($_POST['submit'])){

        // Check the submitted message for validation
        $ckEnquiry = checkEnquiry($_POST);
        if($ckEnquiry){

          $criteria = [
            'fullname'=>$_POST['fullname'],
            'email'=>$_POST['email'],
            'contact'=>$_POST['contact'],
            'message'=>$_POST['message'],
            'status'=>'Pending'
          ];
          $enquiryClass->save($criteria);
          $message = "Thank you! Your enquiry has been posted!";
        }
        else{
          $enquiryMessage = "<font color = 'red'>Cannot have empty fields</font>";
        }
      }

//--------------------------------LOAD TEMPLATE----------------------------------//

      $fileName = '../views/users/contact/contactContent.php';
      $content = loadTemplate($fileName, ['message'=>$message, 'enquiryMessage'=>$enquiryMessage]);

      $fileName = '../templates/UsersTemplate.php';
      $contents = [
        'title'=>'Fran\'s Furniture - Contact Us',
        'content'=>$content
      ];

      require_once 'loadview.php';
    }

////////////////////////////////////////////////////////////////////////////////

  }

?>
