<!-- The form to add an update -->
<?php
  // Set the title and form action according to the type of action
  // It could be add or edit
  $action = $type == "Add" ?  "/Assignment/public/AdminManageUpdates/Add" :
            "/Assignment/public/AdminManageUpdates/Edit/".$id;
?>

<br><br>
<h2>
  <?php echo $type.' Update';?>
</h2>


  <form action="<?php echo $action;?>" method="post" style="padding: 40px" enctype="multipart/form-data">

    <label>Title:</label>
    <input type="text" name="update[title]" value = "<?php if($edit) echo $update['title'];?>"/>

    <label> Description:</label>
    <textarea name="update[description]"/><?php if($edit) echo $update['description'];?></textarea>

    <label>Image: </label>
     <input type="file" name="image" id="image">

     <label><font color = "red"><?php echo $updateMessage; ?></font></label>

    <input type="submit" name="submit" value="Submit" />

  </form>
