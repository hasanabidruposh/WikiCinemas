<?php
ob_start();
session_start();


	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php  
	$time=$_POST['Show_Time']; $date=$_POST['Show_Date']; $seat=$_POST['Seats']; $movie=$_POST['Show_Movie'];
	$theater=$_POST['Show_theater']; $Price=$_POST['Price'];
	
	$sql = "INSERT INTO `shows`(`Show_time`, `Show_date`, `Total_seats`, `Movie_ID`, `Tlicense_no`,`Seat_available`,`price`) VALUES ('$time','$date','$seat','$movie','$theater','$seat','$Price')";
	
	//$result=mysqli_query($con,$sql);
	
	if(mysqli_query($con,$sql)){
		echo "Show Added successfully";
		header('refresh:.2, shows.php');
	}
	
	else{
		echo "Data error.";
	}
?>

</body>
</html>