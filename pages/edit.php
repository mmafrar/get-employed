<?php
	require_once('connection.php');

	if(isset($_GET['job_id'])) {
		$job_id = $_GET['job_id'];
	}

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
?>

<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Edit</title>
    

    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script type="text/javascript" src="../js/job_validation.js"></script>
    <style>
        table{
            width:400px;
            margin:0px 0px 0px 300px;
            }
        #employer{
            float:right;
            width:300px;
            margin:0px 250px 0px 0px;
            border:none;
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
    
	<form method='post' name='job' onSubmit="return validate()">
		<center><h1>Edit job details</h1></center>
        <div id='employer'>
			<img src="../img/employer.jpg"><br>
    	</div>
		<table>
			<tr>
				<td><b>Company Name:</b></td><td><input type='text' name='company_name' value='<?php echo $company_name; ?>' /> </td>
			</tr>
			<tr>
				<td><b>Company Type:</b></td><td><input type='text' name='company_type' value='<?php echo $company_type; ?>' /> </td>
			</tr>
			<tr>
				<td><b>Industry:</b></td><td><input type='text' name='industry' value='<?php echo $industry; ?>' /> </td>
			</tr>
			<tr>
				<td><b>Job Title:</b></td><td><input type='text' name='job_title' value='<?php echo $job_title; ?>' /> </td>
			</tr>
			<tr>
				<td><b>Contract Type:</b></td><td><input type='text' name='contract_type' value='<?php echo $contract_type; ?>' /> </td>
			</tr>
			<tr>
				<td><b>City:</b></td><td><input type='text' name='city' value='<?php echo $city; ?>' /> </td>
			</tr>
			<tr>
				<td><b>Professional Skills:</b></td><td><textarea name='professional'><?php echo $professional; ?></textarea> </td>
			</tr>
			<tr>
				<td><b>Language Skills:</b></td><td><textarea name='language'><?php echo $language; ?></textarea> </td>
			</tr>
			<tr>
				<td><b>Description:</b></td><td><textarea name='description'><?php echo $description; ?></textarea>
			</tr>
			<tr>
				<td colspan=2 align='center'><input type='submit' name='submit' value='Update Details' /></td>
			</tr>
		</table>
	</form>

	<?php
		if(isset($_POST['submit'])){
			// Caputring the values sent through POST
	        $company_name = $_POST["company_name"];
	        $company_type = $_POST["company_type"];
	        $industry = $_POST["industry"];
	        $job_title = $_POST["job_title"];
	        $contract_type = $_POST["contract_type"];
	        $city = $_POST["city"];
	        $language = $_POST["language"];
	        $professional = $_POST["professional"];
	        $description = $_POST["description"];

	        $sql = "UPDATE jobs SET company_name = '$company_name', company_type='$company_type', industry = '$industry', job_title = '$job_title', contract_type = '$contract_type', city = '$city', description = '$description', language_skills = '$language', professional_skills = '$professional' WHERE job_id='$job_id'";

	        // Verifying whether query executed
	        if($connection->query($sql) === TRUE) {
	        	echo "Job detaisl successfully updates!";
	        	header('Location:dashboard.php');
	            } else {
	                    die('<br/>Error: ' . $connection->error);
	            }
	        }

	        if(isset($connection)){
				$connection->close();
			}
		?>
	</body>
</html>