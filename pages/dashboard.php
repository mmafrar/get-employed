<?php
	session_start();
	require_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Dashboard</title>

    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/job_validation.js"></script>
   
    <style>
        table{
            width:400px;
            margin:0px 0px 30px 200px;
        }

    	#emp {
            float:right;
            width:380px;
            margin:0px 135px 0px 0px;
            padding:10px;
            text-align: center;
		}

        h2 {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

	<img src='../img/sitename.jpg' style='width:100%'>

	<ul class='topnav'> <!--navigation bar-->
		<li><a href='contact.php'>Contact us</a></li> <!-- link the signup page here-->
		<li><a href='search.php'>Search</a></li>
		<li><a href='role.php'>Sign Up</a></li> <!-- link the signup page here-->
		<li><a href='../index.php'>Home</a></li>
	</ul>

    <br>
    <center>
	<?php

		if(isset($_SESSION['email'])) {
			$email = $_SESSION['email'];
			$sql = "SELECT first_name, last_name FROM employer WHERE email='$email'";
	    	$result = $connection->query($sql);

	    	if($result->num_rows < 1){
	    		header('Location:../index.php');
	    	}
		} else {
			header('Location:../index.php');
		}

		$sql = "SELECT first_name, last_name FROM employer WHERE email='$email'";
	    $result = $connection->query($sql);
	    $row = $result->fetch_assoc();

	    echo "Logged in as ";

	    foreach ($row as $key => $value) {
	    	echo "<b>" . $value . " </b>";
	    }

	    echo "<br/><br/><form><input type='submit' name='logout' value='Logout' class='button'></form>";

	    if (isset($_GET['logout'])){
	    	header('Location:../index.php?logout=true');
	    }
	?>     
		<form name='job' method='post' action='' onSubmit='return validate()'>
		<h1>Post a job</h1>
		</center>
        <div id='emp'>
			<img src="../img/employer.png"><br>
    	</div>
			<table class="dashboard">
				<tr>
					<td><b>Company Name:</b></td>
					<td><input type='text' name='company_name'/></td>
				</tr>
				<tr>
					<td><b>Company Type:</b></td>
					<td><input type='text' name='company_type'/></td>
				</tr>
				<tr>
					<td><b>Industry:</b></td>
					<td><input type='text' name='industry'/></td>
				</tr>
				<tr>
					<td><b>Job Title:</b></td>
					<td><input type='text' name='job_title'/></td>
				</tr>
				<tr>
					<td><b>Contract Type:</b></td>
					<td><input type='text' name='contract_type'/></td>
				</tr>
				<tr>
					<td><b>City:</b></td>
					<td><input type='text' name='city'/></td>
				</tr>
				<tr>
					<td><b>Language Skills:</b></td>
					<td><input type='text' name='language'/></td>
				</tr>
				<tr>
					<td><b>Professional Skills:</b></td>
					<td><input type='text' name='professional'/></td>
				</tr>
				<tr>
					<td><b>Description:</b></td>
					<td><textarea name='description'></textarea></td>
				</tr>
				<tr>
					<td colspan='2' align='center'> <input type="submit" name="submit" value="Post"/> <input type="reset" value="Cancel"/> </td>
				</tr>
			</table><br/>
		</form>

		<?php
			if(isset($_POST['submit'])){
				// Caputring the values sent through POST
	            $employer = $email;
	            $company_name = $_POST["company_name"];
	            $company_type = $_POST["company_type"];
	            $industry = $_POST["industry"];
	            $job_title = $_POST["job_title"];
	            $contract_type = $_POST["contract_type"];
	            $city = $_POST["city"];
	            $language = $_POST["language"];
	            $professional = $_POST["professional"];
	            $description = $_POST["description"];

	            $sql = "INSERT INTO jobs(employer_id, company_name, company_type, industry, job_title, contract_type, city, description, language_skills, professional_skills) VALUES ('$employer', '$company_name', '$company_type', '$industry', '$job_title', '$contract_type', '$city', '$description', '$language', '$professional')";

	            // Verifying whether query executed
	            if($connection->query($sql) === TRUE) {
	                echo "<h2>Job successfully posted!</h2>";
	            } else {
	                    die('<br/>Error: ' . $connection->error);
	            }
	        }
		?>

		<?php
			$sql = "SELECT job_id, company_name, company_type, industry, job_title, contract_type, city, professional_skills, language_skills, description FROM jobs WHERE employer_id='$email' ORDER BY job_id DESC";
	    	$result = $connection->query($sql);

	    	$row = $result->fetch_row();

	    	while(!($row == NULL)) {
		    	foreach($row as $key => $value) {

		    		if($key == 0){
		    			$job_id = $value;
		    		}

		    		if($key == 1){
		    			echo "<table border=1><tr><td><b> Company Name <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 2){
		    			echo "<tr><td><b> Company Type <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 3){
		    			echo "<tr><td><b> Industry <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 4){
		    			echo "<tr><td><b> Job Title <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 5){
		    			echo "<tr><td><b> Contract Type <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 6){
		    			echo "<tr><td><b> City <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 7){
		    			echo "<tr><td><b> Professional Skills <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 8){
		    			echo "<tr><td><b> Language Skills <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 9) {
		    			echo "<tr><td><b> Description <b> </td><td>" . $value . "</td></tr>";
		    			echo "<tr><td colspan='2' align='center'> <a href='edit.php?job_id=$job_id'>Edit</a> &nbsp; <a href='delete.php?job_id=$job_id'>Delete</a> </td></tr>";
		    		}
		    	}
		    	echo "</table><br/>";
		    	$row = $result->fetch_row();
		    }
		    if(isset($connection)){
		    	$connection->close();
		    }
		?>
	</body>
</html>