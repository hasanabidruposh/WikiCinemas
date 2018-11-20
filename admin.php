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
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="w3.css">
<title>sign up</title>
<style>
.img{
	size:portrait;
  width:18.85%;
  padding:6px;
  margin:auto;
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
  <li><a href="admin.php">Admin Control</a></li>
  <li><a href="shows.php">Show Manager</a></li>
 
 <li style="float:right"> <a href="#">Admin</a></li> 
 <li style="float:right"> <a href="Log_out.php">Log out</a></li> 

</ul>
<br><br><br>
<div class="w3-row w3-container">
<div class="w3-col w3-container" style="float:left; width:47%; background-color:#f1f1f1;border:5px solid #000000;">
<br>
  <form action="add movie.php" method="post">
  	<h1 style="font-size:36px; color:#000DFF; text-align:center"> Add a Movie</h1>    
      
  	<label><b>Name of the Movie</b></label> <br>
      
      <input type="text" name="Movie_name" placeholder="" required><br><br>
      
      <label><b>Genre</b></label> <br>
      
      <input type="text" name="Genre" placeholder="" required><br><br>
      
      <label><b>Director</b></label> <br><br>
      
      <input type="text" name="Director" placeholder="" required><br><br>
      
      <label><b>Description</b></label> <br><br>
      
      <input type="text" name="Description" placeholder=""><br><br>
      
      <label><b>Release_year</b></label> <br><br>
      
      <input type="text" name="release_year" placeholder="" required><br><br><br>
      
      <label><b>Rating</b></label> <br><br>
      
      <input type="text" name="rating" placeholder="" required><br><br><br>
      
      <label><b>Duration</b></label> <br><br>
      
      <input type="text" name="duration" placeholder="" required><br><br><br>
      
      <label><b>Image Link</b></label> <br><br>
      
      <input type="text" name="Image" placeholder="The name of the file" required><br><br><br>
      
      <label><b>Actors</b></label> <br><br>
      
      <input type="text" name="actor_1" placeholder="actor 1"><br><br>
      <input type="text" name="actor_2" placeholder="actor 2"><br><br>
      <input type="text" name="actor_3" placeholder="actor 3"><br><br>
      
      <button type="submit" class="log">Submit</button><br><br>
      
      <button type="button" class="cancel"><a href="home.php" style="color:white;text-decoration:none">Cancel</a></button><br><br>
     
     
          
  </form>
</div>
<div class="w3-col w3-container" style="width:2%"></div>
<div class="w3-col w3-container" style="width:50.5%;">
  <form action="add_theater.php" method="post" style=" background-color:#f1f1f1; border:5px solid #000000; padding:12px">
  <br>
  <h1 style="font-size:36px; color:#000DFF; text-align:center"> Add a Theater</h1>    
    
  <label><b>Name of the Theater</b></label> <br>
    
    <input type="text" name="Theater_name" placeholder="" required><br><br>
    
    <label><b>Location</b></label> <br>
    
    <input type="text" name="Location" placeholder="" required><br><br>
    
    <label><b>Image</b></label> <br><br>
    
    <input type="text" name="T_Image" placeholder="JPG / JPEG / PNG   file" required><br><br>
    
    <button type="submit" class="log">Submit</button><br><br>
    
    <button type="button" class="cancel"><a href="home.php" style="color:white;text-decoration:none">Cancel</a></button><br><br>
        
</form>
<br><br><br>

<form name="add_show" action="add_show.php" style=" margin:auto; background-color:#f1f1f1; border:5px solid #000000; padding:12px" method="post">
  <h1 style="font-size:36px; color:#000DFF; text-align:center"> Add a Show</h1>    
  
  <?php 
    $sql = "SELECT `Movie_id`, `Name` FROM `movie` ";  
    $result=mysqli_query($con,$sql);
    
  ?>
  
  <label><b>Movie Name</b></label> <br>
    <select style="size:100px" name="Show_Movie" required>
      <option value="0" disabled selected hidden>Choose Movie</option>
      <?php
      while($movie=mysqli_fetch_assoc($result)){ $b = $movie["Movie_id"]; ?>
      <option value="<?php echo $b; ?>"> <?php echo $movie["Name"]; ?> </option>
        <?php } ?>
  </select>
    <br><br>
    
    <?php 
    $sql1 = "SELECT `Tlicense_No`, `Theater_name` FROM `theaters`";  
    $result1=mysqli_query($con,$sql1);
    
  ?>
    
    <label><b>Location</b></label> <br>
  <select style="size:100px" name="Show_theater" required>
      <option value="0" disabled selected hidden>Choose Theater</option>
      <?php
      while($theater=mysqli_fetch_assoc($result1)){ 
      $a = $theater["Tlicense_No"];
    ?>
      <option value="<?php echo $a;?>"> <?php echo $theater["Theater_name"]; ?> </option>
        <?php
    
     } ?>
  </select>
    
    <br><br>
    
    <label><b>Date</b></label> <br>
    
    <input type="date" name="Show_Date" placeholder="Date of the show" required><br><br>
    
    <label><b>Time</b></label> <br><br>
    
    <input type="time" name="Show_Time" placeholder="Time of the show" required><br><br>
    
    <label><b>Seats</b></label> <br><br>
    
    <input type="number" name="Seats" placeholder="No. of seats for the show" required><br><br>
    
    <input type="number" name="Price" placeholder="Price of per ticket" required><br><br>
    
    <button name="submit" type="submit" class="log">Submit</button><br><br>
    
    <button type="button" class="cancel"><a href="home.php" style="color:white;text-decoration:none">Cancel</a></button><br><br>
        
</form>
</div>


<br><br><br>
</div>
<br><br>
<div style=" width:70%; padding-left:160px; border:solid">
<br>
<div style="font-size:xx-large; float:"> <a href="show.php" style="text-decoration:none; "> Now Showing: </a> </div>

<?php 
	$sql="SELECT `id`, `unique` FROM `run` ";
	$result=mysqli_query($con,$sql);
?>

<div>

</div>

<div style="font-size:xx-large; padding-top:50px; padding-left:6px;">Coming Soon:</div>

<div style="border:thin">

<a href="#alien"> <img src="Images/163390_wallpaper_spider_man_the_move_game_01_800.jpg" class="img"></a> 

<a href="#alien"><img src="Images/1057711526_Prince of Persia The Sands of Time_PS2_4_1152.jpg" class="img"></a>

<a href="#alien"><img src="Images/finding-nemo-wallpaper-001-1024.jpg" class="img"></a>

<a href="#alien"><img src="Images/MaxPayne_535_1024.jpg" class="img"></a>


</div>
<br>

</div>


</body>
</html>
