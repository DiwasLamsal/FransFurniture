<?php
/*
  The dbconnect.php file
	Connects and sets up the $pdo variable
*/

	//Set up the variables to be used
	$server = 'localhost';
	$username = 'root';
	$password = '';

	//The name of the schema used in the assignment
	$schema = 'furniture';

	//The pdo variable is initialized
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password,
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
?>
