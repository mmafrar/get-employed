<?php
	require_once('connection.php');

	if(isset($_GET['job_id'])) {
		$job_id = $_GET['job_id'];
	}

	$sql = "DELETE FROM jobs WHERE job_id='$job_id'";
	$result = $connection->query($sql);

	// Verifying whether query executed
    if($connection->query($sql) === TRUE) {
        header('Location:dashboard.php');
    } else {
        die('<br/>Error: ' . $connection->error);
   	}
   	
	if(isset($connection)){
		$connection->close();
	}
?>