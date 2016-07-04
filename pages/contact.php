<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Contact Us</title>
    

    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        table {
            float:right;
            width:30%;
            margin:60px;
        }

        #contact {
        	float: left;
        	width: 40%;
        	margin: 60px;
        	padding: 20px;
        	text-align: center;
            border-color: #008CBA;
            border-top-style: dotted;
            border-right-style: solid;
            border-bottom-style: dotted;
            border-left-style: solid;
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
    <br>
    
    <div id='contact'>    
    <h2>Mailing Address</h2>
    
	<p>No. 35,<br/> Philip Gunewardena Mawatha,<br/> Colombo,<br/> Sri Lanka</p>

	<h2>Phone</h2>
	<p>+94 11 2 581245</p>
    
    </div>
    
	
    
	<form method='post'>
		<table>
            <th>
                <td colspan="2"> <h2>Drop us a message</h2></td>
            </th>
			<tr>
				<td>Name: </td>
				<td><input type='text' name='name'/></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type='text' name='email'/></td>
			</tr>
			<tr>
				<td>Contact Number: </td>
				<td><input type='text' name='contact'/></td>
			</tr>
			<tr>
				<td>Subject: </td>
				<td><input type='text' name='subject'/></td>
			</tr>
			<tr>
				<td>Message: </td>
				<td><textarea name='message'></textarea></td>
			</tr>
			<tr>
				<td colspan='2' align='center'><input type='submit' class="button" name='submit'/ value='Send'></td>
			</tr>
		</table>
	</form>

	<?php
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$contact = $_POST['contact'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$message = "From: " . $name . " \n" . "Email: " . $email . " \n" . "Contact Number: " . $contact . " \n\n" . $message;

			mail('feedback@GetEmployed.com', $subject, $message);

			echo "<h3>Your message was sent</h3>";
		}
	?>

</body>
</html>