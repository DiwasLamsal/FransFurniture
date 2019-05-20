<!-- The main homepage of the system -->
<!-- The users area that displays all the updates in the system -->
<main class = "home">
  <p>Welcome to Fran's Furniture. We're a family run furniture shop based in Northampton.
     We stock a wide variety of modern and antique furniture including laps, bookcases, beds and sofas.</p>

  <br>
  <br>
  <br>

<!-- The updates to be displayed -->
<h2 style = "text-align: center;">Updates</h2>
<ul class = "furniture">
  <?php
$count =0;
  foreach ($allUpdates as $update){
    $count++;
    echo'<li>';
        echo '<h3>'.$update['title'].'</h3>';
        // Get the image of the update if it exists
        $image_name = $_SERVER['DOCUMENT_ROOT'] . '/Assignment/public/images/updates/' . $update['image'];
        if(file_exists($image_name)){
          echo '<img src = "/Assignment/public/images/updates/'.$update['image'].'">';
        }
        echo '<h6 style = "text-align: right;"> Date Posted: '.$update['date_posted'].'</h6>';
        echo '<br>';
        echo '<p>'.$update['description'].'</p>';
        echo '<br><br>';
    echo'</li>';
    //Display only the latest 4 updates
    if ($count==4) break;
  }

  // If there are no updates, display the following message
  if($count==0){
    echo '<h3 style = "text-align: center;">No Updates Available</h3>';
  }

?>

</ul>

</main>
