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
<title>Movies</title>

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

div.movies {
	border:1px ;
    background-color: white;
    margin: 20px 0 20px 0;
    padding: 20px;
}

img.movies {
	float:left
}

img {
	width:15%
}

button{
	background-color:transparent;
	background-repeat:no-repeat;
	border:none;
	cursor:pointer;
	overflow:hidden;
	outline:none;
}

</style>

</head>

<body>


   <h1 style="float:left; border:5px solid; border-color:#333333; padding:10px">Wiki Cinemas</h1>
	<div style="height:17px; background-color:transparent;" class="menu"></div>
	<ul>

  <li><a href="Home.php">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
 
 <?php  $sql="SELECT * FROM admin WHERE Admin_ID='Admin'";
		$admin=mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($admin);

	if(isset($_SESSION["username"])){	
   		if($_SESSION["username"]==$row["Admin_ID"]) $c = "admin.php"; }
   
    else $c = "Book.php";?>
 <li> <a href="<?php echo $c;?>"> 
 
  <?php 
  if(isset($_SESSION["username"])){
  		if($_SESSION["username"]==$row["Admin_ID"]){ echo "Administrative Control";} 
		}
  
  else {echo "Buy Tickets";}  ?>
  </a></li>
  
 <?php if(isset($_SESSION["username"])) $b = "Log_out.php"; else $b = "Log_in.php";?>
 <li style="float:right"> <a href="<?php echo $b;?>"> 
  <?php if(isset($_SESSION["username"])){ echo "log out";} 
  else {echo "sign up";} ?>
  </a></li> 
 
  <?php if(isset($_SESSION["username"])) $a = "Profile.php"; else $a = "Log_in.php";?>
  <li style="float:right;">	<a href="<?php echo $a; ?>"> 
  <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; else echo "Log in";?></a> </li>
  
</ul>


 
<div class="movies" > 
	 
    <img class="movies" src="Images/DSC_025.jpg" style="padding-right:20px; padding-bottom:20px">
    <b>Arafatur Rahman</b> <br><br>
    Chittagong University of Engineering and Technology <br><br>
    Department of Computer Science <br><br>
    3rd year student<br><br>
    <b>contact info:</b> atayefrahman@gmail.com
</div>
  
  <br>  	

<div class="movies" > 
	 
    <img class="movies" src="Images/IMG_0212.JPG" style="padding-right:20px; padding-bottom:20px">
    <b>Hasan Abid Ruposh</b> <br><br>
    Chittagong University of Engineering and Technology <br><br>
    Department of Computer Science <br><br>
    3rd year student<br><br>
    <b>contact info:</b> hasanruposh@gmail.com
</div>

</body>

</html>
