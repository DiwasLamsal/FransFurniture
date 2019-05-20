<!-- The admin view for managing updates -->
<!-- This part displays a table which includes all the availble updates -->
<br><br>
<h2>
  Manage Updates
</h2>

<?php
// The message to be displayed if provided
$textWithSpace = preg_replace("([A-Z])", " $0", $message);
?>
<p align = "right"><?php echo $textWithSpace; ?>
</p>

<!-- The table of updates -->
<table class = "adminTable">
  <tr>
    <th> </th>
    <th>Title</th>
    <th>Description</th>
    <th>Image</th>
    <th>Date Posted</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
<?php
$count = 0;
  foreach($allUpdates as $update){
    $count++;
    // Get the image to be displayed
    $image_name = $_SERVER['DOCUMENT_ROOT'] . '/Assignment/public/images/updates/' . $update['image'];
    $img = "";
    if(file_exists($image_name)){
      $img = '<img class = "tableimage" src = "/Assignment/public/images/updates/'.$update['image'].'">';
    }

    echo '<tr>
            <td>'.$count.'</td>
            <td>'.$update['title'].'</td>
            <td>'.$update['description'].'</td>
            <td>'.$img.'</td>
            <td>'.$update['date_posted'].'</td>
            <td>
              <a href = "/Assignment/public/AdminManageUpdates/edit/'.$update['update_id'].'">
                Edit
                </a>
            </td>

            <td>
              <a href = "/Assignment/public/AdminManageUpdates/delete/'.$update['update_id'].'">
                Delete
              </a>
            </td>
          <tr>';
  }

?>
</table>
<!-- Link to add a new update -->
<br><br>
<p style = "text-align: center;">
  <a href = "/Assignment/public/AdminManageUpdates/add/">Add new update</a>
</p>
