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
	
	$sql = "SELECT `Tlicense_No`, `Theater_name`, `Location`, `Image` FROM `theaters`";
	
		$result=mysqli_query($con, $sql);
		  
  $sql="SELECT * FROM admin WHERE Admin_ID='Admin'";
		$admin=mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($admin);	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sign up</title>
<style>
ul {
	margin-top: 10px;
    list-style-type: none;
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
	font-size:24px;
	padding-top:35px;
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

div.theater {
	border:5px solid gray;
    background-color: white;
    margin: 40px 50px 40px 50px;
    padding: 10px;
}

img.theater {
	float:left
}

img {
	width:21%
}

</style>

</head>

</style>

</head>

<body>

   <h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<ul style="height:90px">

  <li><a href="home.php">Home</a></li>
  <li><a href="movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  
  <?php
  $sql="SELECT * FROM admin WHERE Admin_ID='Admin'";
		$admin=mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($admin);

	if(isset($_SESSION["username"])){	
   		if($_SESSION["username"]==$row["Admin_ID"]){
			 $c = "admin.php"; 
			 }
		else {$c = "Book.php"; }
		}
   
    else {$c = "Book.php"; }?>
 <li> <a href="<?php echo $c;?>"> 
 
  <?php 
  if(isset($_SESSION["username"])){
  		if($_SESSION["username"]==$row["Admin_ID"]){ echo "Administrative Control";}
		 else { echo "Buy Tickets"; }
		}
  
  else { echo "Buy Tickets"; }  ?>
  </a></li>

  
 <?php if(isset($_SESSION["username"])) $b = "Log_out.php"; else $b = "Log_in.php";?>
 <li style="float:right"> <a href="<?php echo $b;?>"> 
  <?php if(isset($_SESSION["username"])){ echo "log out";} 
  else {echo "sign up";} ?>
  </a></li> 
 
  <?php if(isset($_SESSION["username"])) $a = "Profile.php"; else $a = "Log_in.php";?>
  <li style="float:right;">	<a href="<?php echo $a; ?>"> 
  <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; else echo "Log in";?></a> </li>

<?php while($row = mysqli_fetch_assoc($result)){
		$Tid=$row["Tlicense_No"];
		$sql="SELECT movie.Name FROM movie,shows,theaters WHERE shows.Movie_ID=movie.Movie_id AND theaters.Tlicense_No=shows.Tlicense_no AND theaters.Tlicense_No=$Tid";
		
		$th=mysqli_query($con, $sql);
	?>
 </ul>   
 
<div class="theater" style="color:#0AA8F4;padding-bottom:45px">
     
        <img class="theater" src="Images\Theaters\<?php
			echo $row["Image"];
		?>" style="height:80%;padding-right:20px; padding-bottom:0px">
    
    <p style="font-size:36px;color:#25AFC0; padding-bottom:none">
        <?php
			echo $row["Theater_name"];
		?>
    </p>
    
    <div style="color:#000000;">
        <span  style="padding-right:10px"><b style="color:#25AFC0;">Location: </b>   <?php
			echo $row["Location"]; ?>
		 </span>  
    </div>
    
    <div style="padding-top:10px;padding-bottom:none;">
        <span  style="padding-right:10px;color:green;"><b style="color:#25AFC0;">Now Showing: </b> <?php while($now = mysqli_fetch_assoc($th)){ echo $now["Name"].","; } ?> </span>
    </div>
</div>


</div>
<?php } ?>
</body>

</html>