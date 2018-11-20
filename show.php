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
    die("Connection failed: " . $conn->connect_error);
	} 
	
	
	
	if(isset($_POST['delete_show'])){
		$id=$_POST['delete_show'];
			$sql="DELETE FROM shows WHERE Show_ID=$id";
			mysqli_query($con,$sql);
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
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
    padding: 15px;
    text-decoration: none;
	font-size:12px;
	padding:15px;
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

input{
	width:100%;
	padding:10px 12px;
	margin:auto;
	display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	
}

b{font-size:22px}

button.log{
	width:100%; padding:15px; font-size:20px; background-color:#4CAF50; color:#F7F3F3
	}
	
button.cancel{
	padding:10px;
	background-color:#F80211;
	color:#F9F7F7;
}

select{
	padding:10px 12px;
	color:#000000;
	width:60%;
}

select:invalid { color:#000000; }

option{
	color:#000000;
}

</style>

</head>

<body>

   <h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:15px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div> <div style="height:15px"></div>
<ul style="height:auto">

  <li><a href="home.php">Home</a></li>
  <li><a href="movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="shows.php">Shows</a></li>  
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
   		if($_SESSION["username"]==$row["Admin_ID"]){ $c = "admin.php"; }
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
  </ul>
<br><br>
<div class="w3-row w3-container" >

<?php 
	$sql="SELECT Show_ID,Show_time, Show_date, Seat_available,Name,Theater_name,price,Total_seats,movie.Image,shows.Movie_ID FROM shows,movie,theaters WHERE shows.Movie_ID=movie.Movie_id and shows.Tlicense_no=theaters.Tlicense_No";
	$result=mysqli_query($con,$sql);
	

?>

<?php while($row=mysqli_fetch_assoc($result)){ 
	$t=$row['Total_seats'];
	$p=$row['Seat_available'];
	$sold=$row['Total_seats']-$row['Seat_available'];
	$t=date_create($row['Show_time']);
	$time=date_format($t,"H:i");
	$id=$row['Show_ID'];
	?>
	
<div class="w3-col w3-container" style="float:left; width:23%; height:650px; background-color:#f1f1f1;border:2px solid #000000;">

<img style="padding-top:15px; padding-left:8px; width:95%; margin:auto" src="Images\movies\<?php echo $row['Image']?>" >

<div style=" padding-left:8px; width:95%; margin:auto">

<p><strong>Name:</strong> <?php echo $row['Name']; ?></p>
<p><strong>Theater:</strong> <?php echo $row['Theater_name']; ?></p>
<p><strong>Time:</strong> <?php echo $time ?></p>
<p><strong>Date:</strong> <?php echo $row['Show_date']; ?></p>
<p><strong>price:</strong> <?php echo $row['price']; ?></p>
<p><strong>Total seats:</strong> <?php echo $row['Total_seats']; ?></p>

</div>
</div>

<div class="w3-col w3-container" style="width:2%"><br></div>

<?php } ?>
</body>
</html>
