<html lang="en">
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
	
	$flag=1;
	$flag2=1;
	
	if(isset($_POST['update'])){
		$user = $_SESSION["username"];
		$sql="SELECT `Password`FROM `customer` WHERE `Name`='$user'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		//echo $row['Password'].' '.$_POST['old_password'];
		if($row['Password']==$_POST['old_password']){
			//echo "ruposh";
		if($_POST['new_password']!=$row['Password']){
			//echo $row['Password'].' '.$_POST['new_password'];
		
		$sql="UPDATE `customer` SET `Name`='$_POST[fname]',`Address`='$_POST[address]',`B_AC_No`='$_POST[BAC]',`Phone_No`='$_POST[phn]',`Email_ID`='$_POST[email]' WHERE  `customer_id`='$_POST[update]'";
		mysqli_query($con,$sql);
		$_SESSION["username"]=$_POST['fname'];
		
		if(strlen($_POST['new_password'])!=0){
			$sql="UPDATE `customer` SET `Password`='$_POST[new_password]' WHERE  `customer_id`='$_POST[update]'";
			mysqli_query($con,$sql);
		}
		
		}
		else{ $flag2=0; }
		}
		
		else{ $flag=0;}
	}
	
	
	
	$sql="SELECT `customer_id`, `Name`, `Password`, `Address`, `B_AC_No`, `Phone_No`, `Email_ID` FROM `customer` WHERE `Name`='$_SESSION[username]'"; 
	
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$id=$row['customer_id'];

?>
<head>
    <title>User Profile</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/lib/w3.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-flex.css">
    <link rel="stylesheet" href="css/bootstrap-flex.min.css">
    <link rel="stylesheet" href="css/bootstrap-flex.min.css">
    <link rel="stylesheet" href="css/bootstrap-flex.min.css">
    <link rel="stylesheet" href="css/bootstrap-flex.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/notify.js"></script>
    <script type="text/javascript" src="js/notify.min.js"></script>
    <style type="text/css">
        .button {
          border-radius: 4px;
          background-color: #f4511e;
          border: none;
          color: #FFFFFF;
          text-align: center;
          font-size: 17px;
          padding: 10px;
          width: 120px;
          transition: all 0.5s;
          cursor: pointer;
          margin: 5px;
        }

        .button span {
          cursor: pointer;
          display: inline-block;
          position: relative;
          transition: 0.5s;
        }

        .button span:after {
          content: '»';
          position: absolute;
          opacity: 0;
          top: 0;
          right: -20px;
          transition: 0.5s;
        }

        .button:hover span {
          padding-right: 25px;
        }

        .button:hover span:after {
          opacity: 1;
          right: 0;
        }
        #up:hover{
            background-color: default;
            color: green;
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
	text-decoration:none;
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
<br>
   <h1 style="float:left; font-size:36px; border:5px solid; border-color:#333333; padding:10px; width:auto" ><img src="Images/lo.png" style="float:left;width:70px;height:60px;"> <div style="width:250px; padding-top:20px; padding-bottom:10px">iki Cinemas</div></h1>
<div style="height:6px; background-color:transparent;" class="menu"></div> <div style="height:12px"></div>
<ul style="height:auto">

  <li><a href="home.php">Home</a></li>
  <li><a href="movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>  
 <li style="float:right"> <a href="#"> <?php echo $_SESSION["username"];?></a></li> 
 <li style="float:right"> <a href="Log_out.php">Log out</a></li> 

</ul>
<br><br>
<?php if($flag==0){ ?> <h1 style="text-align:center; color:#FF0004"><?php echo "Wrong password!!!!!!"; ?></h1> <?php } ?>

<?php if($flag2==0){ ?> <h1 style="text-align:center; color:#FF0004"><?php echo "Passwords do not match."; ?></h1> <?php } ?>

 <div class="container w3-teal" style="text-align: center;padding-top:5px;">
 	<h1 style="text-align:center">User Profile</h1>
          <form id="html5Form"  class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                              <div style="margin-left: 95px"> 
                              <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="fname">Name:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="30" pattern="[a-zA-Z ]+" class="form-control" id="fname" name="fname" value="<?php echo $row['Name'];?>" placeholder="Enter First Name" required>
                                    </div>

                                <div class="form-group" style="text-align: right;">
                                
                                    <div class="col-sm-4">
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="address">Address:</label>
                                    <div class="col-sm-4 ">
                                        <input type="number" maxlength="4" class="form-control" id="address" name="address" value="<?php echo $row['Address'];?>" placeholder="Upazila, Zila, Postal Code" >
                                    </div>
                                </div><br>
                                
                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="phn">Contact No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="phn" name="phn" value="<?php echo $row['Phone_No'];?>" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="phn">B_AC_No:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="20" pattern="[0-9+]+" class="form-control" id="phn" name="BAC" value="<?php echo $row['B_AC_No'];?>" placeholder="Enter Contact No" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="email">Email:</label>
                                    <div class="col-sm-4">
                                        <input type="text" maxlength="50" class="form-control" id="email" name="email" value="<?php echo $row['Email_ID'];?>" >
                                    </div>
                                </div><br>
                                
                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="password">Old Password:</label>
                                    <div class="col-sm-4"> 
                                        <input type="password" maxlength="30" class="form-control" id="password" name="old_password" placeholder="Enter old Password" required>
                                    </div>
                                </div><br>

                                <div class="form-group" style="text-align: right;">
                                    <label class="control-label col-sm-4" for="password">New Password:</label>
                                    <div class="col-sm-4">
             <input type="password" maxlength="30" class="form-control" id="password" name="new_password" placeholder="Enter if you wish to change your Password" >
                                    </div><br>
                                    
                                    
                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <button class="button" type="submit" name="update" id="update" value="<?php echo $id; ?>"><b><span>Update</span></b></button><br>
                                    </div>
                                </div>
                              
                            </form>
                            </div> 
                            </div>
                            </div></div>
                            </div>
                          
                           <div><br></div>
                           <br><br>

</body>
</html>