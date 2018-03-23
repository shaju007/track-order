<?php
include 'db.php';
session_start();
$_SESSION['message']='';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$boyname=mysqli_real_escape_string($con,$_POST['name']);
	
    $email=mysqli_real_escape_string($con,$_POST['email']);
    
    $password=mysqli_real_escape_string($con,$_POST['password']);
 	$companyemail=$_SESSION['email'];

    $sql="INSERT INTO delivery_boy(company_email, email, name, password)"
                  ."VALUES('$companyemail', '$email','$boyname', '$password')";
    if(mysqli_query($con,$sql) === true){
            $_SESSION['message']="Registration successfu! Added $username to the database!";
            //header("location:welcome.php");
          }

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Sign Up</title>
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
		<h2>Add delivery boy</h2>
		<form action="add_delivery_boy.php" method="post">
			
			<div class="username">
				<span class="username">Boy Name:</span>
				<input type="text" name="name" class="name" placeholder="boy Name" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="username">
				<span class="username">Email:</span>
				<input type="text" name="email" class="name" placeholder="Email" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="Password" required="">
				<div class="clearfix"></div>
			</div>
			
			<div class="login-w3">
					<input type="submit" class="login" value="sign up">
			</div>
			<div class="clearfix"></div>
		</form>
		<div class="back">
						<a href="index.php">Back to home</a>
				</div>
				<div class="footer">
					<p>&copy; All Rights Reserved | Design by EzTracking</p>
				</div>
	</div>
	</div>
	</div>
</body>
</html>