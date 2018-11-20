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
<title>Untitled Document</title>
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
</style>
</head>

<body>
<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto; background-color:#FFFFFF"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<ul style="height:90px">

  <li><a href="Home.htm">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
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
  
  <?php
  
  $name=$_SESSION["username"];
	
	$sql="SELECT `customer_id` FROM `customer` WHERE Name='$name'"; 
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($result);
	
	$customer_id=$row['customer_id'];

	$sql="SELECT `price` FROM `shows` WHERE Show_ID= $_SESSION[show]"; 
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($result);
	$price=$row['price']*$_POST['Seat_amount'];
	
	$sql="SELECT * FROM `bank_account`,`customer` WHERE `bank_account`.`B_AC_No`=`customer`.`B_AC_No` AND `customer`.`customer_id`=$customer_id";
	$result1=mysqli_query($con, $sql);
	$row1=mysqli_fetch_assoc($result1);
	$information="";
	if($row1['Amount']>=$price){
		$sql="UPDATE `bank_account`, `customer` SET `Amount`=`Amount`- $price WHERE 		`bank_account`.`B_AC_No`=`customer`.`B_AC_No` AND `customer`.`customer_id`=$customer_id"; 
		mysqli_query($con, $sql);
		
		$sql="UPDATE `bank_account` SET `Amount`=`Amount`+ $price WHERE `B_AC_No`=12345678"; 
		mysqli_query($con, $sql);
	
	
	
	
	$sql="INSERT INTO `tickets`(`show_id`, `No_of_seats`,`Phone_no`,`Price`,`customer_id`) VALUES ('$_SESSION[show]','$_POST[Seat_amount]','$_POST[phone]','$price','$customer_id')"; 
	$result=mysqli_query($con, $sql);
	
	$sql="SELECT Ticket_no FROM `tickets` WHERE `show_id`=$_SESSION[show] and  `No_of_seats`=$_POST[Seat_amount] and `Phone_no`=$_POST[phone] and `Price`=$price and `customer_id`=$customer_id "; 
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($result);
	
	$ticket=$row['Ticket_no'];
	$date=date("Y-m-d");
	$sql="INSERT INTO `book`(`Customer_ID`, `ticket_no`, `booking_date`) VALUES ('$customer_id','$ticket','$date')"; 
	$result=mysqli_query($con, $sql);
	
	$sql="SELECT shows.Show_time, shows.price, theaters.Theater_name FROM `shows` INNER JOIN theaters ON shows.Tlicense_no=theaters.Tlicense_No WHERE shows.Show_ID=$_SESSION[show]";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_assoc($result);
		$time=date_create($row['Show_time']);
		$t=date_format($time,"H:i");
		$theater=$row['Theater_name'];
		
	$sql="SELECT  `Name`, `Image` FROM `movie` WHERE `Movie_id`=$_SESSION[movie_id]";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_assoc($result);
		$Movie_name=$row['Name'];
		$Image=$row['Image'];
	
	$sql="SELECT `transaction_id` FROM `book` WHERE `ticket_no`=$ticket";
		$result=mysqli_query($con, $sql);
		$row=mysqli_fetch_assoc($result);
		
	$Tid=$row['transaction_id'];
	}
	else{$information ="Insufficient Balance......!!";}
?>	
</ul>
<?php if($information==""){?>
    <h2 style="margin-left:30%;">You have successfully booked ticket(s) for this show!!!</h2>
    <h3 style="margin-left:45%">Ticket Information</h3>
    <div class="w3-col w3-container" style="float:left; margin-left:39%; width:23%; height:750px; background-color:#f1f1f1;border:2px solid #000000;">
    
    <img style="padding-top:15px; padding-left:8px; width:95%; margin:auto" src="Images\movies\<?php echo $Image; ?>" >
    
    <div style=" padding-left:8px; width:95%; margin:auto">
    
    <p><strong>Name: </strong><?php echo $Movie_name;?></p>
    <p><strong>Theater: </strong><?php echo $theater;?></p>
    <p><strong>Time: </strong><?php echo $t;?></p>
    <p><strong>Date: </strong><?php echo $_SESSION['date'];?></p>
    <p><strong>Cost: </strong><?php echo $price;?></p>
    <p><strong>No of Seats: </strong><?php echo $_POST['Seat_amount'];?></p>
    <p><strong>Transaction ID: </strong><?php echo $Tid;?></p>
    <?php }
    
     
	else{
    	echo "<p style='color:red;font-size:50px;'>$information</p>";
		header('refresh: 3, url=home.php');
     }
	 ?>
    


</div>

</div>

<div class="w3-col w3-container" style="width:2%"><br></div>

<?php	
	$_SESSION['date']='';$_SESSION['movie_id']='';$_SESSION['show']='';

  ?>
</body>
</html>