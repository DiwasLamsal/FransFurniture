<?php
/*
* -------------------------------------------------
* The completed.php file
* Changes the status of the enquiry to completed
* Redirects to the dashboard, displaying a message
* -------------------------------------------------
*/
  // Create instance of DatabaseTable for enquiries
  $enquiryClass = new DatabaseTable('enquiries');

  //Check if no enquiry is provided or a wrong value is passed manually from the browser and redirect
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
    'status'=>'Completed',
    'staff_id'=>$_SESSION['loggedin']
  ];
  //Update the data for enquiries and redirect
  $enquiryClass->update($criteria, 'enquiry_id');
  header("Location: /Assignment/public/AdminManageMessages/Operation/enqstat");
?>
