<?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}
	
	$sql = "INSERT INTO `customer`(`Name`, `Password`, `Address`, `Phone_No`, `Email_Id`) VALUES ('Tayef','12345678','1217','01521484899','artayefrahman@yahoo.com')";
	
		$result=mysqli_query($con, $sql);
		
		//$row = mysqli_fetch_assoc($result);
		
		//echo $row["Name"];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sign up</title>
<style>
</style>
</head>
<body>

</body>
</html>
