<!DOCTYPE html>
<html>
<head>
	<title>GetEmployed(); - Report</title>

	<?php require_once('connection.php'); ?>

    <meta charset="UTF-8">
    <meta name="description" content="login for GetEmployed(); website">
    <meta name="keywords" content="jobs,career,get employed,">
    <meta name="author" content="group work">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">

	<style type="text/css">
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

<?php
	echo "<h2>Search Queries - Report</h2>";

	echo "<button class='button' onclick=\"window.location.href='graph.php'\">Views as a graph</button><br/>";

	$sql = "SELECT keyword, count FROM report ORDER BY count DESC";
	$result = $connection->query($sql);

	$row = $result->fetch_row();

	echo "<table border=1><tr><th>Keyword</th><th>Count</th></tr><tr>";

	while(!($row == NULL)) {
    	foreach($row as $key => $value) {

    		if($key == 0){
    			echo "<td>" . $value . "</td>";
    			continue;
    		}

    		if($key == 1){
    			echo "<td>" . $value . "</td>";
    			continue;
    		}
    	}
    	echo "</tr>";
    	$row = $result->fetch_row();
    }
    echo "</table>";
?>