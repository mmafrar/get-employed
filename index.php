<?php
	session_start();
	require_once('pages/connection.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GetEmployed(); - Home</title>
	    <meta charset="UTF-8">
	    <meta name="description" content="Home page for GetEmployed(); website">
	    <meta name="keywords" content="jobs,career,get employed,">
	    <meta name="author" content="group work">
	    
	    <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

	<body>

		<img src='img/sitename.jpg' style='width:100%'>

		<ul class='topnav'> <!--navigation bar-->
			<li><a href='pages/contact.php'>Contact us</a></li> <!-- link the signup page here-->
			<li><a href='pages/search.php'>Search</a></li>
			<li><a href='pages/role.php'>Sign Up</a></li> <!-- link the signup page here-->
			<li><a href='index.php'>Home</a></li>
		</ul>

		<div> <!--images for slider-->
			<img class='slides' src='img/1.png' />
			<img class='slides' src='img/2.png' />
			<img class='slides' src='img/3.png' />
		</div>

		<script type='text/javascript' src='js/slider.js'></script> <!-- this make the slider change on timing -->

		<!-- start of user loging part -->
		<form name="signin" method="post" action="" id='login'><br/>
			<label><b>User Name:</b></label>
			<input type="text" name="email" /><br><br>
            <label><b>Password:</b></label>
			<input type="password" name="password" /><br><br>
			<input type="submit" name="submit" class="button" value="Sign In">
			<!-- end of form loging part -->
            
            <!-- start of php for user loging part -->
			<?php
				if(isset($_GET["logout"])) {
					unset($_SESSION["email"]);
					$message = "You are logged off";
				} else {
					$message = "<p>If you are a new user<br/><br><a  href='pages/role.php'>Sign Up</a></p>";
				}

				if(isset($_POST["submit"])) {
	            
	                $email = $_POST["email"];
	                $password = md5($_POST["password"]);

	                // Querying the Employer table
					$sql = "SELECT email, password FROM employer WHERE email='$email' AND password='$password'";
	                $result = $connection->query($sql);

	                if($result->num_rows > 0) {
	                    $row = $result->fetch_assoc();
	                    $_SESSION["email"]=$email;
	                    $message = "<font color=green> <br/> <b> Login Success </b> </font>";
	                    header("Location:pages/dashboard.php");
	                } else {

	                	// Querying the Jobseeker table
						$sql = "SELECT email, password FROM jobseeker WHERE email='$email' AND password='$password'";
						$result = $connection->query($sql);

	                	if($result->num_rows > 0) {
	                    	$row = $result->fetch_assoc();
	                    	$_SESSION["email"]=$email;
	                    	$message = "<font color=green> <br/> <b> Login Success </b> </font>";
	                    	header('Location:pages/search.php');
	                    } else {
	                    	$message = "<font color=red> <br/> <b> Wrong username or password.<br>Please try again.</b> </font>";
	                		$message = $message . "<p>If you are a new user<br/><a href='role.php'>Sign Up</a></p>";
	                    }
	                }
	            }
	            echo "<br/>" . $message;

	            // Close connection
	            if(isset($connection)){
	            	$connection->close();
	            }
	        ?>
		</form>

		<!--search button linked to search page -->
	    <div id='search'>
	       <p> You can search jobs without signing in and click here to search for any type of career you wish to take part in future.</p>
	       <a href="pages/search.php" class="button">Search Jobs</a><br/><br/>
	    </div>
	</body>
</html>