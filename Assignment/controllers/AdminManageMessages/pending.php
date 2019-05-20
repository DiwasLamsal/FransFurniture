<?php
/*
* -------------------------------------------------
* The pending.php file
* Changes the status of the enquiry to pending
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/
  // Create instance of DatabaseTable for enquiries
  $enquiryClass = new DatabaseTable('enquiries');
  if(empty($enId)){
    header("Location: /Assignment/public/Admin/NotFound");
  }
  $getEnquiry = $enquiryClass->find('enquiry_id', $enId);
  if($getEnquiry->rowCount()==0){
    header("Location: /Assignment/public/Admin/NotFound");
  }

  //Check who changed the status of the enquiry and set the staff associated to the current staff
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $criteria=[
    'enquiry_id'=>$enId,
    'status'=>'Pending',
    'staff_id'=>$_SESSION['loggedin']
  ];

  //Update the data for enquiries and redirect
  $enquiryClass->update($criteria, 'enquiry_id');
  header("Location: /Assignment/public/AdminManageMessages/Operation/enqstaf");
?>
