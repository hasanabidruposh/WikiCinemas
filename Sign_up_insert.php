<?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	?>
    <h1> <?php
    if ($con->connect_error) {
    	die("Connection failed: " . $con->connect_error);
	} ?> </h1>
    
    <?php
	
	//$ac_no=$_POST[AC_No];
	//$ac_pass=$_POST[AC_Pass];
	
	$query="SELECT `B_AC_No`, `Password` FROM `bank_account` WHERE `B_AC_No`='$_POST[AC_No]' AND `Password`='$_POST[AC_Pass]'";
	
	if(!(mysqli_query($con, $query))){ ?>
	 	<h1> <?php echo "wrong bank account no. or password"; ?> </h1> <?php
		}
	
	else{
	$sql = "INSERT INTO `customer`(`Name`, `Password`, `Address`, `Phone_No`, `Email_ID`,`B_AC_No`) VALUES ('$_POST[name]','$_POST[Password]','$_POST[address]','$_POST[Phone_No]','$_POST[Email_ID]','$_POST[AC_No]')";
	
		$result=mysqli_query($con, $sql);
	
	if(!$result){
		die("Data error" . $con->connect_error);
		}
	
	else{	
		?>
        <h1 style="text-align:center"> <?php echo "congratulation. You have successfully signed up an account with us.";} ?> </h1> <?php
	}
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
