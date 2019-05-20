<?php

/*
* -------------------------------------------------
* The operation.php file
* Sets up the view for displaying enquiries table
* Loads the template
* -------------------------------------------------
*/


//The message variable that is displayed after some operations
  $message = "";
  if(!empty($values)){
    if($values=="enqstat")
      $message = "Enquiry Status Changed To Completed";
    else if($values == "enqstaf")
      $message = "Enquiry Status Changed To Pending";
    else if($values == "deletesuccess")
      $message = "Succesfully Deleted Enquiry";
    else
      $message = "Error";
  }


  // Create instance of DatabaseTable for enquiries
  $enquiryClass = new DatabaseTable('enquiries');
  $allEnquiries = $enquiryClass->findAll();

//--------------------------------LOAD TEMPLATE----------------------------------//

  $fileName = '../views/admins/adminmanagemessages/adminManageMessagesContent.php';
  $content = loadTemplate($fileName, ["allEnquiries"=>$allEnquiries, 'message'=>$message,]);

  $fileName = '../templates/AdminTemplate.php';
  $contents = [
    'title'=>'Fran\'s Furniture - Manage Enquiries',
    'content'=>$content
  ];

  $this->content = loadTemplate($fileName, $contents);
  $this->view($this->content);

?>
