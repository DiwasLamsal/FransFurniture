<!-- The form to add a furniture -->
<?php
  // Set the title and form action according to the type of action
  // It could be add or edit
  $action = $type == "Add" ?  "/Assignment/public/AdminManageFurnitures/Add" :
            "/Assignment/public/AdminManageFurnitures/Edit/".$id;
?>

<br><br>
<h2>
  <?php echo $type.' Furniture';?>
  </h2>


<form action="<?php echo $action;?>" method="post" style="padding: 40px" enctype="multipart/form-data">

  <label>Furniture Name:</label>
  <input type="text" name="furniture[name]" value = "<?php if($edit) echo $furniture['name'];?>"/>

  <label>Furniture Price:</label>
  <input type="text" name="furniture[price]" value = "<?php if($edit) echo $furniture['price'];?>"/>

  <!-- Display the select list of item status -->
  <label>Furniture Status:</label>
  <select name = "furniture[status]">
    <option value = "Brand New" <?php
    if($edit && $furniture['status']=="Brand New")
      echo 'selected = "selected"'
    ?>>Brand New</option>
    <option value = "Second Hand" <?php
    if($edit && $furniture['status']=="Second Hand")
      echo 'selected = "selected"'
    ?>>Second Hand</option>
  </select>

  <label>Furniture Description:</label>
  <textarea name="furniture[description]"/><?php if($edit) echo $furniture['description'];?></textarea>

  <!-- Display the select list of categories -->
  <label>Furniture Category:</label>
  <select name = "furniture[categoryId]">
    <?php
    foreach ($allCategories as $cat) {
      if($edit && $furniture['categoryId']==$cat['id']){
        $selected = 'selected = "selected"';
      }
      else{
        $selected = "";
      }
      echo'<option value = '.$cat['id'].' '.$selected.'>'.$cat['name'].'</option>';
    }
    ?>
  </select>

  <label>Select Multiple Images: </label>
  <input type="file" name="images[]" multiple="multiple" />

  <label style = "width: 45%;">Note*: Images larger than 2MB will not be uploaded and only valid image
    file types will be uploaded.
  </label>


  <label><font color = "red"><?php echo $furnitureMessage; ?></font></label>



  <input type="submit" name="submit" value="Submit" id = "addFurnitureSubmit" style = "margin-bottom: 100px;"/>

</form>
