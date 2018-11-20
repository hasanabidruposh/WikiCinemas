<?php

ob_start();
SESSION_start();

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='wiki_cinemas';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}


if(!(isset($_POST['Search_Movies'])) and !(isset($_POST['Select_Show'])) and !(isset($_POST['Search_Shows'])) and !(isset($_POST['submit']))){
		$_SESSION['date']='';$_SESSION['movie_id']='';$_SESSION['show']='';
	}

if((isset($_POST['Search_Movies']))){
	$_SESSION['date']=$_POST['Date'];
}

if((isset($_POST['Search_Shows']))){
	$_SESSION['movie_id']=$_POST['movie'];
}

if((isset($_POST['Show']))){
	$_SESSION['show']=$_POST['Show'];
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sign up</title>
<style>
::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:#FFFFFF;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:#FFFFFF;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:#FFFFFF;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:#FFFFFF;
}

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

input {
	
	padding:10px 12px;
	margin:auto;
	display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	background-color:transparent;
	color:#FFFFFF;
	width:60%;
}

select{
	padding:10px 12px;
	background-color:transparent;
	color:#FFFFFF;
	width:60%;
}

select:invalid { color:#FFFFFF; }

option{
	color:#FFFFFF;
	background-color:#525252;
}
</style>

<body background="Images/dscn8464.jpg" style=" background-size:cover" >

<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto; background-color:#FFFFFF"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<ul style="height:90px">

  <li><a href="home.php">Home</a></li>
  <li><a href="movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="#contact">Buy Tickets</a></li>
  
   <?php if(isset($_SESSION["username"])) $b = "Log_out.php"; else $b = "Log_in.php";?>
 <li style="float:right"> <a href="<?php echo $b;?>"> 
  <?php if(isset($_SESSION["username"])){ echo "log out";} 
  else {echo "sign up";} ?>
  </a></li> 
 
  <?php if(isset($_SESSION["username"])) $a = "Profile.php"; else $a = "Log_in.php";?>
  <li style="float:right;">	<a href="<?php echo $a; ?>"> 
  <?php if(isset($_SESSION["username"])) echo $_SESSION["username"]; else echo "Log in";?></a> </li> 
</ul>
<?php

if(!(isset($_SESSION["username"]))){ ?>
		<h1 style="margin-left:33%; color:#8100FF"> <?php echo "You must log in first !!!!!!"; ?> </h1>
	<?php header("Refresh: 2; URL=Log_in.php");
	}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:50%; background-image:url(Images/tvguide-glasspane.png); background-size:cover; margin:auto" method="post">
<br>
   <select name="Date" required>
   <option value="" disabled selected hidden>Choose Date</option>
<?php
  
  if((($_SESSION['date'])=='') and (($_SESSION['movie_id'])=='') and (($_SESSION['show'])=='') ){
  	
  $sql="SELECT distinct `Show_date` FROM `shows`";
		$result=mysqli_query($con, $sql);
		 ?> 
  
  <?php while($row = mysqli_fetch_assoc($result)){ ?>
  		<option value="<?php echo $row['Show_date']; ?>" ><?php echo $row['Show_date']; ?></option>
  <?php } 
  }
  else{ ?>
  	 <option value="" disabled selected hidden><?php echo $_SESSION['date']; ?></option>
 <?php } ?>
  
</select>
<button type="submit" style="padding:5px" name="Search_Movies">Search movies</button>
</form>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:50%; background-image:url(Images/tvguide-glasspane.png); background-size:cover; margin:auto" method="post">

<br>

<select name="movie" required>
  <option value="" disabled selected hidden>Choose Movie</option>
  <?php 

if((($_SESSION['date'])!='') and (($_SESSION['movie_id'])=='') and (($_SESSION['show'])=='') ){
	$sql="SELECT movie.Movie_id,movie.Name FROM `shows` INNER JOIN movie ON movie.Movie_id=shows.Movie_ID WHERE shows.Show_date='$_SESSION[date]'";
		$result=mysqli_query($con, $sql);
		while($row = mysqli_fetch_assoc($result)){?>
  <option value="<?php echo $row['Movie_id']; ?>"><?php echo $row['Name']; ?></option>
  <?php }
  }

else if((($_SESSION['movie_id'])!='') or (($_SESSION['show'])!='') ){ 
		$sql="SELECT Name FROM movie WHERE Movie_id='$_SESSION[movie_id]'";
		$result=mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
?>
  	 <option value="" disabled selected hidden><?php echo $row['Name']; ?></option>
 <?php } ?>

</select>

<button type="submit" style="padding:5px" name="Search_Shows">Search Shows</button>

<br>
<br>
</form>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width:50%; background-image:url(Images/tvguide-glasspane.png); background-size:cover; margin:auto" method="post">

<select name="Show" required>
  <option value="" disabled selected hidden>Choose Theater and Time</option>
  <?php 

if((($_SESSION['date'])!='') and (($_SESSION['movie_id'])!='') and (($_SESSION['show'])=='') ){
	$sql="SELECT shows.Show_ID,shows.Show_time, theaters.Tlicense_No, theaters.Theater_name FROM `shows` INNER JOIN theaters ON shows.Tlicense_no=theaters.Tlicense_No WHERE shows.Movie_ID=$_SESSION[movie_id]";
		$result=mysqli_query($con, $sql);
		while($row = mysqli_fetch_assoc($result)){ 
			$t=date_create($row['Show_time']);
			$time=date_format($t,"H:i");
		?>
  <option value="<?php echo $row['Show_ID']; ?>"><?php echo $row['Theater_name']." at ".$time; ?></option>
  <?php }
  }

else if((($_SESSION['date'])!='') and (($_SESSION['movie_id'])!='') and (($_SESSION['show'])!='') ){ 
		$sql="SELECT shows.Show_ID,shows.Show_time, theaters.Tlicense_No, theaters.Theater_name FROM `shows` INNER JOIN theaters ON shows.Tlicense_no=theaters.Tlicense_No WHERE shows.Show_ID=$_SESSION[show]";
		$result=mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$t=date_create($row['Show_time']);
			$time=date_format($t,"H:i");
?>
  	 <option value="" disabled selected hidden><?php echo $row['Theater_name']." at ".$time; ?></option>
 
 <?php } ?>
</select>

<button type="submit" style="padding:5px" name="Select_Show">Select Show</button>
</form>

<form id="a" action="Ticket.php" style="width:50%; background-image:url(Images/tvguide-glasspane.png); background-size:cover; margin:auto" method="post">

<br>

<select name="Seat_amount" required>
  <option value="" disabled selected hidden>Choose no. of seats</option>
  <?php 

if((($_SESSION['date'])!='') and (($_SESSION['movie_id'])!='') and (($_SESSION['show'])!='') ){
	$sql="SELECT `Seat_available`,`price` FROM `shows` WHERE `Show_ID`=$_SESSION[show]";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_assoc($result);
		if($row['Seat_available']>=4){ $n=4; }
		else{$n=$row['Seat_available'];}		
		?>
  <?php for($i=1; $i<=$n; $i++){ ?>

  <option value="<?php echo $i; ?>"><?php echo $i; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <?php echo " BDT : ".$i*$row['price'].".00"; ?></option>
  <?php }
}
?>

</select>
<br> <br>
<input type="tel"  placeholder=" 01XXXXXXXXX (who will pickup the tickets)" name="phone" required><br><br>

<button form="a" type="submit" name="submit"  style="padding:5px">submit</button>

</form>
</body>
</html>