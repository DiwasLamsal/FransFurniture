<!-- The users area that displays all the furniture in the system -->
	<ul class="furniture">

<?php


//https://www.codeofaninja.com/2013/06/simple-php-pagination-script.html
// https://www.youtube.com/watch?v=8WoxPWVxXHI

///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////

	// When the action is not search and no filter is applied
	if(!isset($search) && ((isset($_POST['filter']) && $_POST['filter']=="All")||!isset($_POST['filter']))){
			$allFurnitures = ($category=="") ? pagination() : pagination($category);
	}


///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////



	// If there are no furnitures in the provided category or search term
	if($allFurnitures->rowCount() == 0){
		echo '<br><br><h2>😥Oops! Nothing here to see. <br><br>
					How about trying a different category or a search term?</h2>';
	}


	foreach ($allFurnitures as $furniture) {
		// Display the furniture only if the availability is set to Available
		if($furniture['availability']=="Available"){
			// Check the status of the furniture (second hand, new) that is selected and only
			// Display the selected kinds of furniture
			if(isset($_POST['filter']) && $_POST['filter']!="All"){
				if($_POST['filter']!=$furniture['status']){
					continue;
				}
			}
		echo '<li>';

		// Div to hold images
		echo '<div class = "imageHolder">';
		$furniture_images = getFurnitureImagesByFurniture($furniture['id']);

		// Get all the images to be displayed


		$imageText = "";

		while($image = $furniture_images->fetch()) {
		  $image_name = $_SERVER['DOCUMENT_ROOT'] . '/Assignment/public/'.$image['path'];
		  if(file_exists($image_name)){
		    echo '
		      <a style = "text-decoration: none;" href = "/Assignment/public/'.$image['path'].'" target = _blank>
		        <img alt = "Not Found"
		                    onerror="arguments[0].currentTarget.style.display=\'none\'"
		                    src = "/Assignment/public/' . $image['path'] . '"
		                    class = "tableimage">
		      </a>';
		  }
		}
		echo '</div>';

		// Div to display the furniture details
		echo '<div class="details">';
		echo '<h2>'
					. $furniture['name'] .
					'</h2>';

		echo '<h4>£' . $furniture['price'] . '</h4>';
		echo '<p>' . $furniture['description'] . '</p>';
		echo '<br>';
		echo '<h5> Item type: ' . $furniture['status'] . '</h5><br>';
		echo '<h6> Date Posted: ' .$furniture['date_posted'].'</h6>';
		echo '</div>';
		echo '</li>';
	}
}

?>




	<div style="text-align: center; margin-left: -60px;">

<?php


//https://www.codeofaninja.com/2013/06/simple-php-pagination-script.html
// https://www.youtube.com/watch?v=8WoxPWVxXHI

///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////

	// When the action is not search and no filter is applied
	if(!isset($search) && ((isset($_POST['filter']) && $_POST['filter']=="All")||!isset($_POST['filter']))){
		// Total number of furniture to display per page
		$furnitureInPage = 3;
		//Page number
		$page = isset($_GET['page']) ? $_GET['page'] : 1;

		// Total number of pages according to whether the category is set or not
		$count = ($category=="") ? findFurnitureCount() : findFurnitureCount($category);

		//Get the number of rows
		$numrows = $count->fetch();
		$total_rows = $numrows['total_rows'];

		//Total pages would be nunber of rows divided by the number of items plus one
		$total_pages = ceil($total_rows / $furnitureInPage)+1;

		for ($i=1; $i<$total_pages; $i++) {
			 // For current page remove the link and add different color
			 if ($i == $page) {
					 echo "<span class='paginationButton' style='background:DodgerBlue;'>$i</span>";
			 }
			 // Style the adjacent buttons to make them appear bigger
			 else if($i == ($page+1) || $i==($page-1)){
				  echo " <a href='?page=$i' class='paginationButton notSelected adjacentBtn' style = 'color: white !important;'>$i</a> ";
			 }
			 // For other pages add the link to them
			 else {
					 echo " <a href='?page=$i' class='paginationButton notSelected' style = 'color: white !important;'>$i</a> ";
			 }
		}
	}

///////////////////////////////////////////////////////////////////////////
//////////////////////      PAGINATION       //////////////////////////////
///////////////////////////////////////////////////////////////////////////


?>

	</div>

</ul>
