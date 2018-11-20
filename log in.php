<!DOCTYPE html>
<html>
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


form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>

<h1 style="float:left; border:5px solid; border-color:#333333; padding:10px">Wiki Cinemas</h1>
<div style="height:18px; background-color:transparent;" class="menu"></div>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="movies.php">Movies</a></li>
  <li><a href="theater.php">Theaters</a></li>
  <li><a href="#contact">Buy Tickets</a></li>
  <li><a href="log in.php">Log in/sign up</a></li> 
</ul>

<br>


<form style="width:50%;  margin: auto;background-color:#f1f1f1;border:10px solid #f1f1f1"  action="home.php" method="get">
  
  <div style="background-color:#f1f1f1; padding:1px">
  	<h2 style="text-align:center">Login Form</h2>
  </div>
  
  <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required><br>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
        
    <button type="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember Me
    <div style="float:right;">New here? <a href="sign_up.php" style="text-decoration:none">Register Now</a></div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="home.php" style="text-decoration:none;color:white;">Cancel</a></button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
