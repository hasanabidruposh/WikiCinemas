<?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}

	$sql= "SELECT Theater_name FROM `theaters` WHERE Name='$_POST[Theater_name]'";
	
	if (mysqli_query($con, $sql)== TRUE){ ?>
    
	<h1 style="text-align:center; color:#FF0000">	
	<?php	
		echo "Record already exists";
		header("Refresh: .5; URL=admin.php");
	 ?> </h1>
		
      <?php  }
	
	else{
		$sql = "INSERT INTO `theaters`( `Theater_name`, `Location`, `Image`) VALUES 	('$_POST[Theater_name]','$_POST[Location]','$_POST[T_Image]')";
	
	
		if (mysqli_query($con, $sql)== FALSE) {
    		die("Data error " . $con->connect_error);
		}
	
		else{
			?>
    
		<h1 style="text-align:center; color:#000000">	
		<?php	
			echo "Added Successfully";
			header("Refresh: .5; URL=theater.php");
	 	?> </h1>
		
  <?php
		}
	
	}
?>