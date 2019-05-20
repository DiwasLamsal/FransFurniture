<!-- The template for displaying furnitures to the users -->
<main class = "admin">
	<!-- The search box -->
	<section class="left" style = "width: 15%;">
		<input type = "text" name = "search" id = "searchbar" onkeyup="search(this.value)">
		<br><br><hr><br><br>

		<ul>
			<!-- The title -->
			<li><a href = "/Assignment/public/UsersFurniture">All Furnitures</a></li>
			<!-- Display all the categories to the left sidebar(Provided by the controller) -->
			<?php
			foreach ($allCategories as $cat) {?>
				<li>
					<a href="/Assignment/public/UsersFurniture/Products/<?php echo $cat['id'];?>">
						<?php echo $cat['name'];?>
					</a>
				</li>
			<?php }?>
		</ul>
	</section>

	<section class="right" style = "width: 85%;">

		<!-- Display the select menu to select second hand, new or all products -->
		<form method="post">
			<select style = "float: right;" name = "filter" onchange="this.form.submit()">
				<option value = "All"
					<?php if(isset($_POST['filter'])&&$_POST['filter']=="All") echo"selected='selected'";
						else echo "false";?>>
					All
				</option>
				<option value = "Brand New"
						<?php if(isset($_POST['filter'])&&$_POST['filter']=="Brand New") echo"selected='selected'";
						else echo "false";?>>
					Brand New</option>
					<option value = "Second Hand"
						<?php if(isset($_POST['filter'])&&$_POST['filter']=="Second Hand") echo"selected='selected'";
							else echo "false";?>>
						Second hand</option>
			</select>
			<span style = "float: right; margin-top: 30px; margin-right: 10px;">Filter: </span>
		</form>

		<!-- Set the title according to category name -->
		<h1><?php echo isset($_GET['category']) ? getCategory($_GET['category']) : 'All Furnitures';?></h1>

		<!-- Display the view content -->
    <?php echo $content;?>

</section>
</main>
