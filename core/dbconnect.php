<?php
	
	$servername = "127.0.0.1";
	$username = "";
	$password = "";
	$staffdb = "hive";
	$armadb = "life";

	$conn = new mysqli($servername, $username, $password, $staffdb);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$conn2 = new mysqli($servername, $username, $password, $armadb);

	if ($conn2->connect_error) {
		die("Connection failed: " . $conn2->connect_error);
	}
	

?>

