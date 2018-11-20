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

</style>

</head>

<body>


</style>
</head>
<body >



<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px; width:auto; background-color:#FFFFFF"><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px">iki Cinemas</div></h1>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<ul style="height:90px">

  <li><a href="Home.php">Home</a></li>
  <li><a href="Movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="book.php">Buy Tickets</a></li>
  <li style="float:right"><a href="log_in.php">Log in</a></li> 
</ul>


<form action="Sign_up_insert.php" style="width:50%; margin:auto; background-color:#f1f1f1;border:10px solid #f1f1f1" method="post">
	<h1 style="font-size:36px; color:#000DFF; text-align:center"> Sign Up</h1>    
    
	<label><b>Full Name</b></label> <br>
    
    <input type="text" name="name" placeholder="Enter full name" required><br><br>
    
    <label><b>Email address</b></label> <br>
    
    <input type="text" name="Email_ID" placeholder="Enter email address" required><br><br>
    
    <label><b>Password</b></label> <br><br>
    
    <input type="password" name="Password" placeholder="Enter password" required><br><br>
    
    <label><b>Address(Zip Code)</b></label> <br><br>
    
    <input type="text" name="address" placeholder="Enter 4 digit zip code"><br><br>
    
    <label><b>Contact Number</b></label> <br><br>
    
    <input type="text" name="Phone_No" placeholder="Enter phone no" required><br><br><br>
    
    <label><b>Bank account no.</b></label> <br><br>
    
    <input type="text" name="AC_No" placeholder="Price of your purchases will be reducted from this account" required><br><br><br>
    
    <label><b>Bank account password.</b></label> <br><br>
    
    <input type="password" name="AC_Pass" placeholder="" required><br><br><br>
    
    <button type="submit" class="log">Submit</button><br><br>
    
    <button type="button" class="cancel"><a href="home.php" style="color:white;text-decoration:none">Cancel</a></button><br><br>
    
    
    
</form>
</body>
</html>
