<!-- The form to add a category -->
<?php
  // Set the title and form action according to the type of action
  // It could be add or edit
  $action = $type == "Add" ?  "/Assignment/public/AdminManageCategories/Add" :
            "/Assignment/public/AdminManageCategories/Edit/".$id;
?>

<br><br>
<h2>
  <?php echo $type.' Category';?>
  </h2>

  <form action="<?php echo $action;?>" method="post" style="padding: 40px">

    <label>Enter Category Name:</label>
    <input type="text" name="category" value = "<?php echo $name;?>"/>
    <br>
    <!-- Display error message -->
    <label><?php echo $catNameMessage; ?><label>

  <?php if($type == "Edit") {?>
    <input type = "hidden" name = "categoryId" value = "<?php echo $id;?>">
  <?php } ?>
    <input type="submit" name="submit" value="Submit" />
  </form>
