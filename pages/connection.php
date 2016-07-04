<?php
	// Create a database connection
	$connection = new mysqli("localhost", "root", "", "jrs");
	
	if (!$connection) {
		die("Database connection failed: " . $connection->connect_error);
	}
?>