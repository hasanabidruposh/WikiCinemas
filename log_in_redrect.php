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
	 $username = $_POST["username"];
	 $password = $_POST["pass"];
	 
	$sql = "SELECT * FROM customer WHERE Name='$username' and Password='$password'";
	
		$result=mysqli_query($con, $sql);
		
	$sql="SELECT * FROM admin WHERE Admin_ID='$username' and Password='$password'";
		$admin=mysqli_query($con, $sql);
		?>	
	

<!DOCTYPE html>
<html>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 23.5px;
    text-decoration: none;
}

li a:hover {
    background-color: #111111;
}

div.menu{
	padding: 2px;
    color: white;
    background-color: black;
    text-align:Center;
}


form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>

<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px">Wiki Cinemas</h1>
<div style="height:18px; background-color:transparent;" class="menu"></div>
<ul>
  <li><a href="Home.php">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="book.php">Buy Tickets</a></li>
  <li><a href="log_in.php">Log in/sign up</a></li> 
</ul>

<br>

<?php
		if($admin->num_rows > 0){
			$_SESSION["username"] = $username;
			 ?>
			<h1 style="text-align:center"><?php echo "Welcome Admin";	?>	</h1><br>
            <h1 style="text-align:center"><?php echo "Redirecting you to homepage.";	?>	</h1>
		<?php	header("Refresh: .5; URL=Home.php");
		}
		else if($result->num_rows > 0){
			$_SESSION["username"] = $username;	?>
            
			<h1 style="text-align:center"><?php echo "Logged insuccessfully .......";	?>	</h1><br>
            <h1 style="text-align:center"><?php echo "Redirecting you to homepage.";	?>	</h1>
		<?php	header("Refresh: .5; URL=Home.php");
		}
	
		else{	
			?> <h1 style="text-align:center"> <?php echo "Wrong Username or Password.....!!"; ?> </h1><br>
            <h1 style="text-align:center"><?php echo "Try Again with a valid username and password.";	?>	</h1>
		<?php }
?>

</body>
</html>
