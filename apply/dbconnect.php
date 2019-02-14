<?php
	date_default_timezone_set('UTC');
	$servername = "127.0.0.1";
	$username = "";
	$password = "";
	$dbname = "hive";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>
