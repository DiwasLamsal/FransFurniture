<!-- The admin view for managing categories -->
<!-- This part displays a table which includes all the available categories -->
<br><br>
<h2>
  Manage Categories
</h2>

<?php
// The message to be displayed if provided
$textWithSpace = preg_replace("([A-Z])", " $0", $message);
?>
<p align = "right"><?php echo $textWithSpace; ?>
</p>

<!-- The table of categories -->
<table border = "1" class = "adminTable">
  <tr>
    <th> </th>
    <th>Category Name</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
    $count = 0;
    foreach($allCategories as $cat){
      $count++;
      echo '<tr>
              <td>'.$count.'</td>
              <td>'.$cat['name'].'</td>
              <td><a href = "/Assignment/public/AdminManageCategories/edit/'.$cat['id'].'">Edit</a></td>
              <td><a href = "/Assignment/public/AdminManageCategories/delete/'.$cat['id'].'">Delete</a></td>
            <tr>';
    }

  ?>
</table>

<br><br>
<!-- Link to add a new category -->
<p style = "text-align: center;">
  <a href = "/Assignment/public/AdminManageCategories/add/">Add new Category</a>
</p>
