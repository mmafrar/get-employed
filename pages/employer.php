<?php
	session_start();
	require_once('connection.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GetEmployed(); - Employer</title>
        

        <meta charset="UTF-8">
        <meta name="description" content="login for GetEmployed(); website">
        <meta name="keywords" content="jobs,career,get employed,">
        <meta name="author" content="group work">
    
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <style>
            table{
                width:400px;
                margin:0px 0px 0px 300px;
            }
            tright{
                float:right;
                width:300px;
                margin:0px 250px 0px 0px;
                padding:5px;
                border:none;
}  
        </style>
        
		<script type='text/javascript' src='../js/employer_validation.js'></script>
        
	</head>
	<body>
        
        <img  src="../img/sitename.jpg" style="width:100%">
	
        <ul class="topnav"> <!--navigation bar-->
        
                <li><a href="contact.php">Contact us</a></li> <!-- link the signup page here-->
                <li><a href="search.php">Search</a></li>
                <li><a href="role.php">Sign Up</a></li> <!-- link the signup page here-->
                <li><a href="../index.php">Home</a></li>
        
            </ul>    
        <br>
        
		<form name='register' method='post' action='' onSubmit='return validate()'>
			<center><h1>Register as an Employer</h1></center>
			
            <tright>
			<img src="../img/employer.png"><br>
            </tright>
            
			<table>
				<tr>
					<td><b>First Name:</b></td>
					<td><input type='text' name='first_name'/></td>
				</tr>
				<tr>
					<td><b>Last Name:</b></td>
					<td><input type='text' name='last_name'/></td>
				</tr>
				<tr>
					<td><b>E-Mail Address:</b></td>
					<td><input type="text" name="email"/></td>
				</tr>
				<tr>
					<td><b>Contact Number:</b></td>
					<td><input type="text" name="contact"></td>
				</tr>
				<tr>
					<td><b>Password:</b></td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td><b>Confirm Password:</b></td>
					<td><input type="password" name="password_confirm"></td>
				</tr>
				<tr>
					<td colspan='2' align='center'> <input type="submit" name="submit" class="button" value="Register"/> 
                                                    <input type="reset" class="button" value="Cancel"/> </td>
				</tr>
			</table>
		</form>

		<?php
            if(isset($_POST["submit"])) {

                // Caputring the values sent through POST
                $email = $_POST["email"];
                $password = md5($_POST["password"]);
                $first_name = $_POST["first_name"];
                $last_name = $_POST["last_name"];
                $contact = $_POST["contact"];

                $sql = "INSERT INTO employer(email, password, first_name, last_name, contact) VALUES ('$email', '$password', '$first_name', '$last_name', '$contact')";

                // Verifying whether query executed
                if($connection->query($sql) === TRUE) {
                    $_SESSION['email'] = $email;

                    // Redirecting the Employer to the dashboard
                	header("Location:dashboard.php");
                } else {
                    die('<br/>Error: ' . $connection->error);
                }

                // Close connection
                $connection->close();
            }

		    if(isset($connection)){
		    	$connection->close();
		    }
        ?>
	</body>
</html>