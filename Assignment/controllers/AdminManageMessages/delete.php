<?php
/*
* -------------------------------------------------
* The delete.php file
* Deletes the enquiry
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

  //If the enquiry exists, delete it and then redirect
  $enquiryClass->delete('enquiry_id', $enId);
  header("Location: /Assignment/public/AdminManageMessages/Operation/deletesuccess");

?>
