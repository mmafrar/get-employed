<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Registration</title>
    
    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        #employer{
            float: right;
            border:none;
            margin: 0px 400px 0px 0px;
        }
        
        #jobseeker{
            float: left;
            border:none;
            margin: 0px 0px 0px 400px;
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
        
		<center> <h1>Select your role!</h1></center>
		<form method="post" action="">
            <div id='employer'>
    			<img src="../img/employer.png"><br><br>
                <input type="submit" name="employer" class="button" value="I am an Employer">
            </div>
            <div id='jobseeker'>
                <img src="../img/seeker.png"><br><br>
                <input type="submit" name="jobseeker" class="button" value="I am a Jobseeker">
			</div>
		</form>
	

	<?php
		if(isset($_POST['employer'])) {
			header("Location:employer.php");
		}

		if(isset($_POST['jobseeker'])) {
			header("Location:jobseeker.php");
		}
	?>

</body>
</html>