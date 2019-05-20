<!-- The contact page which contains a form that sends enquiries to the staff area -->
<main class="home">

<?php
  $action = "/Assignment/public/Contact/addEnquiry";

  if($message==""){ ?>

    <p>Please call us on  01604 90345 or email <a href="mailto:enquiries@fransfurniture.co.uk">enquiries@fransfurniture.co.uk</a>

    <br><br>
      <hr>
    <br><br>

    <h2>
      Leave an Enquiry
    </h2>

      <form action="<?php echo $action;?>" method="post" style="padding: 0px">

        <label>Name: </label>
        <input type="text" placeholder="Full Name" name="fullname"
         value = "<?php if(isset($_POST['fullname']))echo $_POST['fullname'];?>"/>

        <label>Email: </label>
        <input type="email" placeholder="Email" name="email"
         value = "<?php if(isset($_POST['email']))echo $_POST['email'];?>"/>

        <label>Contact Number: </label>
        <input type="text" placeholder="Phone" name="contact"
         value = "<?php if(isset($_POST['contact']))echo $_POST['contact'];?>"/>

        <label>Message</label>
        <textarea name = "message" placeholder="Your message here!"><?php if(isset($_POST['message']))echo $_POST['message'];?></textarea>

        <label><?php echo $enquiryMessage; ?></label>

        <input type="submit" name="submit" value="Submit" id = "addEnquirySubmit" />
        <br>
      </form>
<?php }
// Display a message when the contact form is submitted
  else{
    echo '<h2>'.$message.'</h2>';
  }
?>


</main>
