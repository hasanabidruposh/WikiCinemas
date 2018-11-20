<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
.img{
	size:portrait;
  width:18.85%;
  padding:6px;
  margin:auto;
}

div{
	margin:auto;
}

</style>
</head>
<body style="background-image:url(Images/35227745.jpg); background-attachment:fixed; background-size:cover ">



<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto; background-color:#FFFFFF"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<ul style="height:90px">

  <li><a href="Home.php">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
  
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
  
 <?php if(isset($_SESSION["username"])) $b = "Log_out.php"; else $b = "sign_up.php";?>
 <li style="float:right"> <a href="<?php echo $b;?>"> 
  <?php if(isset($_SESSION["username"])){ echo "log out";} 
  else {echo "sign up";} ?>
  </a></li> 
 
  <?php if(isset($_SESSION["username"])) $a = "Profile.php"; else $a = "Log_in.php";?>
  <li style="float:right;">	<a href="<?php echo $a; ?>"> 
  <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; else echo "Log in";?></a> </li>
  
  
</ul>
<br><br>

<div style=" width:70%; padding-left:160px; background-image:url(Images/tvguide-glasspane.png)">
<br>
<div style="font-size:xx-large; color:#FFFFFF; float:"> <a href="show.php" style="text-decoration:none; color:#FFFFFF"> Now Showing: </a> </div>

<div>

<a href="#alien"><img class="img" src="images/101601_wallpaper_aliens_vs_predator_2_01_800.jpg"></a> 

<a href="#alien"><img img class="img" src="images/96600_wallpaper_commandos2_04_800.jpg"></a>

<a href="#alien"><img img class="img" src="Images/resevil2c_800.jpg" ></a>

<a href="#alien"><img img class="img" src="Images/139541_wallpaper_monsters_inc_01_800.jpg"></a>


</div>

<div style="font-size:xx-large; padding-top:50px; padding-left:6px; color:#FFFFFF">Coming Soon:</div>

<div style="border:thin">

<a href="#alien"> <img src="Images/163390_wallpaper_spider_man_the_move_game_01_800.jpg" class="img"></a> 

<a href="#alien"><img src="Images/1057711526_Prince of Persia The Sands of Time_PS2_4_1152.jpg" class="img"></a>

<a href="#alien"><img src="Images/finding-nemo-wallpaper-001-1024.jpg" class="img"></a>

<a href="#alien"><img src="Images/MaxPayne_535_1024.jpg" class="img"></a>


</div>
<br>

</div>
<br><br><br><br>

<div>    
    <ul style="width:100%">
  <li ><a href="about_us.php">About us</a></li>
  <li><a href="privacy.php">Privacy Policy</a></li>
  <strong style="float:right; color:#FBF8F8; padding:10px; padding-top:35px"> Wiki Cinemas©2016</strong>
</ul>
</div>


</body>
</html>
