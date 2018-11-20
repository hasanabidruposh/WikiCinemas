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


<?php
	$sql = "SELECT `Movie_id`, `Name`, `Genre`, `Image`, `Director`, `Description`, `release_date`, `Rating`, `Duration` FROM `movie` ";
	
	$result = mysqli_query($con, $sql);
	
while($row = mysqli_fetch_assoc($result)){
	$id=$row["Movie_id"];	
	?>
    <form method="post" action="actors profile.php">
<div class="movies" style="color:#0AA8F4"> 
	 
    <img class="movies" src="Images\Movies\<?php echo $row["Image"]; ?>" style="padding-right:20px; padding-bottom:20px">
    
<a style="font-size:36px; padding-left:; text-decoration:none; color:#25AFC0; padding-bottom:none">
    	
		<?php echo $row["Name"]." (".$row["release_date"].")"; ?>
   
    </a> 
    
  		<div style="color:#000000">

		
        <span  style="padding-right:10px">
        
         <?php echo $row["Genre"]; ?>
         
         <span  style="padding-left:10px">/</span>
         
        <span style="padding-left:10px" >
        
        <?php echo $row["Duration"]; ?>        
        </span>
         
         </span>
    	
    </div>
    
		<div style="padding-top:10px">
    	<img src="Images/4-star-rating.png" style="height:15px; width:15px; padding-right:2px; padding-top:8px">
        <span style="color:#000000; font-size:20px; font-weight:bolder">
		
			<?php echo $row["Rating"]; ?>
		
		</span>
    </div>
    
    <div style="padding-top:10px">
    		<b style="color:#676060">Director:</b>
			<?php
				echo $row['Director'];
			  ?>
            
		</div>
    
   		<div style="padding-top:10px">
    		<b style="color:#676060"> Stars: </b> &nbsp;
			<?php
			
			$query="SELECT * FROM perform WHERE Movie_id='$id'";
			
			$p = mysqli_query($con, $query);
				while($perform = mysqli_fetch_assoc($p)){ 
				
			?>
                
                 <button name="actor" value="<?php echo $perform["actor_name"]; ?>" style="color:#25AFC0"><?php echo $perform["actor_name"]; ?></button>
                
			<?php
				}
			  ?>
            
		</div>
    
   <div style="color:#000000; padding-top:10px; padding-bottom:30px">
	
	<?php echo $row["Description"]; ?>
	
	</div>
	</div>
    </form>
	
<?php } ?>


</body>

</html>
