<?php
	session_start();
	require_once('connection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Admin</title>

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
	    <p>Logged in as Super Admin<br/></p>
	    <button class='button' onclick="window.location.href='backup.php'">Get Backup</button>
	    <button class='button' onclick="window.location.href='report.php'">Search Report</button>
	    <button class='button' onclick="window.location.href='../index.php?logout=true'">Logout</button><br/><br/>

		<?php
			$sql = "SELECT job_id, employer_id, company_name, company_type, industry, job_title, contract_type, city, professional_skills, language_skills, description FROM jobs ORDER BY job_id DESC";
	    	$result = $connection->query($sql);

	    	$row = $result->fetch_row();

	    	while(!($row == NULL)) {
		    	foreach($row as $key => $value) {

		    		if($key == 0){
		    			$job_id = $value;
		    		}

		    		if($key == 1){
		    			echo "<table border=1><tr><td><b> Username <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 2){
		    			echo "<tr><td><b> Company Name <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 3){
		    			echo "<tr><td><b> Company Type <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 4){
		    			echo "<tr><td><b> Industry <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 5){
		    			echo "<tr><td><b> Job Title <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 6){
		    			echo "<tr><td><b> Contract Type <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 7){
		    			echo "<tr><td><b> City <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 8){
		    			echo "<tr><td><b> Professional Skills <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 9){
		    			echo "<tr><td><b> Language Skills <b> </td><td>" . $value . "</td></tr>";
		    			continue;
		    		}

		    		if($key == 10) {
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