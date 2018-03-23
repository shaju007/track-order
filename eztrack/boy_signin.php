<?php
include 'db.php';
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['email'])){
        // removes backslashes
	$email = stripslashes($_POST['email']);
        //escapes special characters in a string
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_POST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM delivery_boy WHERE email='$email'
and password='$password'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows>0){
        	echo "success";
	    //$_SESSION['username'] = $username;
            // Redirect user to index.php
            $row=mysqli_fetch_assoc($result);
            $_SESSION['boyLogin']=true;
            $_SESSION['email']=$row['company_email'];
            
	    header("Location: index.php");
         }else{
         	echo "fail";
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3></div>";
	}
    }
?>


<!DOCTYPE HTML>
<html>
<head>
<title> Sign In </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery-ui.css"> 
<!-- jQuery -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- //jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
</head> 
<body>
	<div class="main-wthree">
	<div class="container">
	<div class="sin-w3-agile">
		<h2>Boy Sign In</h2>
		<form action="boy_signin.php" method="post">
			<div class="username">
				<span class="username">Email:</span>
				<input type="email" name="email" class="name" placeholder="Email" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clearfix"></div>
			</div>
			<div class="rem-for-agile">
				<input type="checkbox" name="remember" class="remember">Remember me<br>
				<a href="#">Forgot Password</a><br>
			</div>
			<div class="login-w3">
					<input type="submit" class="login" value="Sign In">
			</div>
			<div class="clearfix"></div>
		</form>
				<div class="back">
					<a href="index.php">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy;   All Rights Reserved | Design by eztracking</p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>