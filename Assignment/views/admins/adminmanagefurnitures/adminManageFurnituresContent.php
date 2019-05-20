<!-- The admin view for managing furnitures -->
<!-- This part displays a table which includes all the availble furniture -->
<br><br>
<h2>
  Manage Furnitures
</h2>

<?php
// The message to be displayed if provided
$textWithSpace = preg_replace("([A-Z])", " $0", $message);
?>
<p align = "right"><?php echo $textWithSpace;?>
</p>

<!-- The table of furniture -->
<table class = "adminTable">
  <tr>
    <th> </th>
    <th>Furniture Name</th>
    <th>Price</th>
    <th>Availability</th>
    <th>Status</th>
    <th>Product Description</th>
    <th>Images</th>
    <th>Category</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Date Posted</th>
  </tr>
<?php
$count = 0;
  foreach($allFurnitures as $furniture){
    $count++;

// Set coloured availability text
$availableText = $furniture['availability'] == "Available" ? "<font style = 'color: green;'>Available</font>" :
                                                             "<font style = 'color: red;'>Unavailable</font>";

$furniture_images = getFurnitureImagesByFurniture($furniture['id']);

// Get all the images to be displayed


$imageText = "";

while($image = $furniture_images->fetch()) {
  $image_name = $_SERVER['DOCUMENT_ROOT'] . '/Assignment/public/'.$image['path'];
  if(file_exists($image_name)){
    $imageText .= '
      <a style = "text-decoration: none;" href = "/Assignment/public/'.$image['path'].'" target = _blank>
        <img alt = "Not Found"
                    onerror="arguments[0].currentTarget.style.display=\'none\'"
                    src = "/Assignment/public/' . $image['path'] . '"
                    class = "tableimage">
      </a>';


  }
}

// Echo the rows
echo '<tr>
      <td>'.$count.'</td>
      <td>'.$furniture['name'].'</td>
      <td>£'.$furniture['price'].'</td>
      <td><a href = "/Assignment/public/AdminManageFurnitures/availability/'.$furniture['id'].'">'.$availableText.'</td>
      <td>'.$furniture['status'].'</td>
      <td>'.preg_replace('/([^\s]{10})(?=[^\s])/', '$1'.'<wbr>', $furniture['description']).'</td>
      <td style = "width: 230px;">'.$imageText.'</td>
      <td>'.getCategory($furniture['categoryId']).'</td>
      <td><a href = "/Assignment/public/AdminManageFurnitures/edit/'.$furniture['id'].'">Edit</a></td>
      <td><a href = "/Assignment/public/AdminManageFurnitures/delete/'.$furniture['id'].'">Delete</a></td>
      <td>'.$furniture['date_posted'].'</td>
    <tr>';
  }

?>
</table>

<br><br>
<!-- Link to add a new furniture -->
<p style = "text-align: center;">
  <a href = "/Assignment/public/AdminManageFurnitures/add/">Add new Furniture</a>
</p>
