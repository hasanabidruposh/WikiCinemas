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
	border:1px solid gray;
    background-color: white;
    margin: 20px 0 20px 0;
    padding: 20px;
}

img.movies {
	float:left
}

img {
	width:10%
}
table, th, td{
		border: 5px solid #00ffbf;
		text-align: center;
		padding: 20px;
	}
	table#t01{
		width: 80%;
	}
	table#t01 tr:nth-child(even){
		background-color: #fff;}
	table#t01 tr:nth-child(odd){
		background-color: #eee;
	}	
	table#t01 th{
		color: black;
		background-color: #00ffbf;}

</style>

</head>

<body>


   <h1 style="float:left; border:5px solid; border-color:#333333; padding:10px">Wiki Cinemas</h1>
	<div style="height:17px; background-color:transparent;" class="menu"></div>
	<ul>

  <li><a href="Home.php">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="Book.php">Buy Tickets</a></li>
 
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
<br><br>
	<table width="724" id="t01" style="margin-left:10%;">
<caption><h1>ACTOR INFO:</h1></caption>
	<tr>
		<th width="53%">Name</th>  
		<td width="47%"> smith</td>
		 
	</tr>
	<tr>
		<th >Age</th>
		<td >30</td>
		
	</tr>
		<tr>
		<th >Birthdate</th>
		<td >30</td>
	</tr>
	<tr>
		<th >Nationality</th>
		<td>American</td>
	</tr>
	
</table>
</center>
</body>

</html>
