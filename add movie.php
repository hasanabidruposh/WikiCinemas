<?php
ob_start();
session_start();
?>

<?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}

	$sql= "SELECT Name FROM movie WHERE Name='$_POST[Movie_name]'";
	$result = $con->query($sql);
	
	if ($result->num_rows > 0){ ?>
    
	<h1 style="text-align:center; color:#FF0000">	
	<?php	
		echo "Record already exists";
		header("Refresh: .5; URL=admin.php");
	 ?> </h1>
		
      <?php  }
	
	else{
	$sql = "INSERT INTO `movie`(`Name`, `Genre`, `Image`, `Director`, `Description`, `release_date`, 			`Rating`, `Duration`) VALUES ('$_POST[Movie_name]','$_POST[Genre]','$_POST[Image]','$_POST[Director]','$_POST[Description]','$_POST[release_year]','$_POST[rating]','$_POST[duration]')";
	
	
	
	if (mysqli_query($con, $sql)== FALSE) {
    die("Data error " . $con->connect_error);
	}
	
	else{
		$sql="SELECT `Movie_id`,`Name` FROM `movie` WHERE `Name`='$_POST[Movie_name]'";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_assoc($result);
		$id=$row["Movie_id"];
		

		
	$sql="INSERT INTO `perform`(`Movie_id`, `actor_name`) VALUES 	('$id','$_POST[actor_1]'),('$id','$_POST[actor_2]'),('$id','$_POST[actor_3]')";
		
		$p=mysqli_query($con, $sql);
		
		If(!$p){
			die("actor error " . $con->connect_error);
		}
		else{ ?>
		<h1 style="text-align:center"> <?php	echo "Movie added"; ?> </h1>
        
		<?php	header("Refresh: .5; URL=Movies.php");}
		
	}
}
?>