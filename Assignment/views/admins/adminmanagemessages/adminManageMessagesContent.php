<!-- The admin view for managing enquiries -->
<!-- This part displays a table which includes all the availble enquiries -->
<br><br>
<h2>
  Manage Enquiries
</h2>

<?php
// The message to be displayed if provided
$textWithSpace = preg_replace("([A-Z])", " $0", $message);
?>
<p align = "right"><?php echo $textWithSpace; ?>
</p>

<!-- The table of enquiries -->
<table border = "1" class = "adminTable">
  <tr>
    <th> </th>
    <th>Customer Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Enquiry</th>
    <th>Status</th>
    <th>Manage</th>
    <th>Staff Associated</th>
  </tr>
  <?php
    $count = 0;
    foreach($allEnquiries as $en){
      $count++;
      if($en['status']=="Pending"){
        $statusText = "<font style = 'color: red;'>Pending</font>";
      }
      else{
        $statusText = "<font style = 'color: green;'>Completed</font>";

      }

      echo '<tr>
              <td>'.$count.'</td>
              <td>'.$en['fullname'].'</td>
              <td>'.$en['email'].'</td>
              <td>'.$en['contact'].'</td>'
              .
              /*
                mowgli -- Stackoverflow --
                https://stackoverflow.com/questions/9815040/smarter-word-wrap-in-php-for-long-words
              */
              '<td>'.preg_replace('/([^\s]{15})(?=[^\s])/', '$1'.'<wbr>', $en['message']).'</td>
              <td>'.$statusText.'</td>
              <td style = "text-align: center;"><a href = "/Assignment/public/AdminManageMessages/pending/'.$en['enquiry_id'].'">Pending</a><br>
              <a href = "/Assignment/public/AdminManageMessages/completed/'.$en['enquiry_id'].'">Completed</a><br>
              <a href = "/Assignment/public/AdminManageMessages/delete/'.$en['enquiry_id'].'">Delete</a></td>
              <td>'.getUserNameById($en['staff_id']).'</td>
            <tr>';
    }

  ?>
</table>

<br><br>
