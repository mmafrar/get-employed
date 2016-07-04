<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Get Employed(); - Search</title>
    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        
        #login{
            float:right;
            width:300px;
            margin:5px 10px 50px 0px;
            padding:5px;
        }

    	#search{
            float:left;
            width: 45%;
            margin:10px 0px 0px 325px;
            text-align:center;
            font-size: 18px;
        }
       
    </style>
</head>
<body>

	<img  src="../img/sitename.jpg" style="width:100%">
	<ul class="topnav" style="hover: 
    background-color: #ffffff;
    color: #008CBA"> <!--navigation bar-->
        
        <li><a href="contact.php">Contact us</a></li> 
        <li><a href="search.php">Search</a></li>
        <li><a href="role.php">Sign Up</a></li> 
        <li><a href="../index.php">Home</a></li>
        
    </ul>
    
    <!--displaying the user name if logged in and if not ask to log in-->
    <div id='login'>
    <?php
	session_start();
	require_once('connection.php');

	if(isset($_SESSION['email'])) {
		$email = $_SESSION['email'];
		$sql = "SELECT first_name, last_name FROM employer WHERE email='$email'";
	    $result = $connection->query($sql);

	    if($result->num_rows < 1) {
	    	$sql = "SELECT first_name, last_name FROM jobseeker WHERE email='$email'";
	    	$result = $connection->query($sql);
	    }

	    $row = $result->fetch_assoc();

	    echo "Logged in as ";

	    foreach ($row as $key => $value) {
	    	echo "<b>" . $value . " </b>";
	    }

		echo "<br/><br/><form><input type='submit' name='logout' value='Logout' class='button'></form><br/>";

	    if (isset($_GET['logout'])){
	    	header('Location:../index.php?logout=true');
	    }	
	} else {
		echo "<br><center>You are not logged in <br/><br/> <a href='../index.php'>Log in</a></center><br/>";
	}

	if(isset($_GET['search'])) {
		$search = $_GET['search'];
	}
?>
   </div>
        
<!--left industry search navigation bar-->
 <ul class="left" >          
   
<!--displaying left nav bar categories for job industries-->
    	<?php
    		$sql = "SELECT DISTINCT industry FROM jobs ORDER BY industry ASC";
	    	$result = $connection->query($sql);

	    	$row = $result->fetch_row();

	    	while($row != NULL){
			    foreach($row as $key => $value) {
			    	echo "</br><a href='search.php?industry=$value'>$value</a>";
			    }
			    $row = $result->fetch_row();
			}
		?>
</ul>  
<!--end of left industry search navigation bar-->

<!--search box-->
<div id='search'>
	<form name='search' method='get'></br/>
	<input type="text" name="keywords" placeholder="Type your keywords here..." size='50' style="font-size: 18px;"><br/><br/>
	<input type="submit" name="submit" class="button" value="Go!"><br/><br/>
	</form>

<!--start of php for industry wise search--> 
<?php
    	if(isset($_GET['industry'])){
    		$industry = $_GET['industry'];

    		$sql = "SELECT job_id, job_title, contract_type, company_name, city FROM jobs WHERE industry='$industry'";

    		$result = $connection->query($sql);
	    	$row = $result->fetch_row();

	    	while($row != NULL) {

			    foreach($row as $key => $value) {
			    		
			    	if ($key == 0) {
			    		$job_id = $value;
			    		continue;
			    	}

			    	if($key ==4) {
			    		echo $value . "<br/><br/>";
			    		echo "<a href='view.php?job_id=$job_id'>View Details</a><br/><br/><br/><br/>";
			    	} else {
			    		echo $value . " | ";
			    	}
			    }
		    	$row = $result->fetch_row();
		    }
    	}
    ?>
<!--end of php for industry wise search-->

<!--start of php for keyword wise search-->
    <?php
    	if(isset($_GET['submit'])) {
    		$keywords = $_GET['keywords'];
    		$keyword_tokens = explode(' ', $keywords);

    		foreach($keyword_tokens as $keyword) {
    			$sql = "SELECT job_id, job_title, contract_type, company_name, city FROM jobs WHERE description LIKE '%$keyword%'";

    			$result = $connection->query($sql);
	    		$row = $result->fetch_row();

	    		while($row != NULL) {

			    	foreach($row as $key => $value) {
			    		
			    		if ($key == 0) {
			    			$job_id = $value;
			    			continue;
			    		}

			    		if($key == 4) {
			    			echo $value . "<br/><br/>";
			    			echo "<a href='view.php?job_id=$job_id'>View Details</a><br/><br/>";
			    		} else {
			    			echo $value . " | ";
			    		}
			    	}
		    		$row = $result->fetch_row();
		    	}
    		}
    	}
    ?>
    <!--end of php for keyword wise search-->
</div>
</body>
</html>