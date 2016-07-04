<?php
	require_once('connection.php');

	if(isset($_GET['job_id'])) {
		$job_id = $_GET['job_id'];

		$sql = "SELECT company_name, company_type, industry, job_title, contract_type, city, professional_skills, language_skills, description FROM jobs WHERE job_id='$job_id'";
		$result = $connection->query($sql);

	    $row = $result->fetch_row();

		foreach($row as $key => $value) {

			if($key == 0){ $company_name = $value; }
			if($key == 1){ $company_type = $value; }
			if($key == 2){ $industry = $value; }
			if($key == 3){ $job_title = $value; }
			if($key == 4){ $contract_type = $value; }
			if($key == 5){ $city = $value; }
			if($key == 6){ $professional = $value; }
			if($key == 7){ $language = $value; }
			if($key == 8){ $description = $value; }
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Get Employed(); - View</title>
    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        table{
            float:left;
            width:600px;
            margin:5px 0px 0px 400px;
            border-width: 5px;
            text-align:left;
            font-size: 20px;
        }
        tr:nth-child(even) {background-color: #cce6ff}
        
        th, td {
    padding: 15px;
    text-align: left;
}
    </style>
</head>
<body>
    
        <img  src="../img/sitename.jpg" style="width:100%">
	   <ul class="topnav"> <!--navigation bar-->
        
        <li><a href="contact.php">Contact us</a></li> <!-- link the signup page here-->
        <li><a href="search.php">Search</a></li>
        <li><a href="role.php">Sign Up</a></li> <!-- link the signup page here-->
        <li><a href="../index.php">Home</a></li>
        
    </ul>
		<table>
			<tr>
				<td><b>Company Name:</b></td><td><?php echo $company_name; ?></td>
			</tr>
            
			<tr>
				<td><b>Company Type:</b></td><td><?php echo $company_type; ?></td>
			</tr>
			<tr>
				<td><b>Industry:</b></td><td><?php echo $industry; ?></td>
			</tr>
			<tr>
				<td><b>Job Title:</b></td><td><?php echo $job_title; ?></td>
			</tr>
			<tr>
				<td><b>Contract Type:</b></td><td><?php echo $contract_type; ?> </td>
			</tr>
			<tr>
				<td><b>City:</b></td><td><?php echo $city; ?></td>
			</tr>
			<tr>
				<td><b>Professional Skills:</b></td><td><?php echo $professional; ?> </td>
			</tr>
			<tr>
				<td><b>Language Skills:</b></td><td><?php echo $language; ?></td>
			</tr>
			<tr>
				<td><b>Description:</b></td><td><?php echo $description; ?></td>
			</tr>
		</table>
	</form>

	<?php
		if(isset($connection)){
			$connection->close();
		}
	?>

</body>
</html>