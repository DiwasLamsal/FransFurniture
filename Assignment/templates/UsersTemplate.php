<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<!-- CSS Link - An absolute link is used because of .htaccess structure -->
		<link rel="stylesheet" href="/Assignment/public/css/styles.css" type="text/css">

		<!-- Title -->
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
			<li><a href="/Assignment/public/">Home</a></li>
			<li><a href="/Assignment/public/UsersFurniture">Our Furniture</a></li>
			<li><a href="/Assignment/public/About">About Us</a></li>
			<li><a href="/Assignment/public/Contact">Contact us</a></li>
			<li><a href="/Assignment/public/FAQ">FAQs</a></li>
			<!-- Set the link to login or logout depending on whether the user is logged in -->
			<?php if(!isset($_SESSION['loggedin'])){?>
			<li><a href="/Assignment/public/Login">Login</a></li>
			<?php }
			else{?>
			<li><a href="/Assignment/public/Logout">Log Out</a></li>
			<?php } ?>
		</ul>

	</nav>
<img src="/Assignment/public/images/randombanner.php"/>

	<!-- The content obtained from views -->
      <?php echo $content;?>


	<footer>
		<!-- The updating copyright date. The current year will be displayed -->
		&copy; Fran's Furniture <?php echo date("Y");?>
	</footer>

			<!-- Javascript link -->
	<script src = "/Assignment/public/script.js"></script>
</body>
</html>
