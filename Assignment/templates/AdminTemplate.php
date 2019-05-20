<?php

/*

	The admin area template

*/

//If the user is not logged in, redirect them to restricted area when they try
//access admin area.
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!isset($_SESSION['loggedin'])){
	header("Location: /Assignment/public/Restricted");
}

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- CSS Link - An absolute link is used because of .htaccess structure -->
		<link rel="stylesheet" href="/Assignment/public/css/styles.css"/>
		<!-- The title of the page -->
		<title><?php echo $title;?></title>
	</head>
	<body>
	<header>
		<section>
			<aside>

				<h3>Opening Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: 10:00-16:00</p>
			</aside>
			<h1>Fran's Furniture</h1>


		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/Assignment/public/Admin">Home</a></li>
			<li><a href="/Assignment/public/Logout">Log Out</a></li>
			<li><a href="/Assignment/public/" target="_blank">Users Area</a></li>
			<li><a>Welcome, <?php echo getUserNameById($_SESSION['loggedin']).'!';?></a></li>

		</ul>

	</nav>
<img src="/Assignment/public/images/randombanner.php"/>
	<main class="admin">


	<section class="left">
		<br>
		<ul>
			<li><a href="/Assignment/public/AdminManageUsers">Manage Users</a></li>
			<li><a href="/Assignment/public/AdminManageCategories">Manage Categories</a></li>
			<li><a href="/Assignment/public/AdminManageFurnitures">Manage Furnitures</a></li>
			<li><a href="/Assignment/public/AdminManageMessages">Manage Messages</a></li>
			<li><a href="/Assignment/public/AdminManageUpdates">Manage Updates</a></li>
		</ul>
	</section>

	<section class="right">
		<!-- The content of the admin template - Which are the views -->
		<?php echo $content;?>
	</section>


	</main>

	<footer>
		<!-- The updating copyright date. The current year will be displayed -->
		&copy; Fran's Furniture <?php echo date("Y");?>
	</footer>
</body>
</html>
