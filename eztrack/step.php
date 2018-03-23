<?php
include 'db.php';
session_start();
$_SESSION['message']='';

	
if(isset($_POST['step1'])){

	$companyname=$_SESSION['companyname'];
	$mobile=$_SESSION['mobile'];
	$email=$_SESSION['email'];
	$license=$_SESSION['license'];
	$password=$_SESSION['password'];
	$companystep=$_SESSION['companystep'];
	
	
	$sql="INSERT INTO company(email, company_name, password, mobile,trade_lic,step_count)"
                  ."VALUES('$email', '$companyname','$password', '$mobile','$license','$companystep')";
                  if(mysqli_query($con,$sql) === true){
            $_SESSION['message']="Registration successfu! Added $username to the database!";
            if($companystep==4){
          $step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==5){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4,step5)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4','$step5')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==6){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $step6=$_POST['step6'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4,step5,step6)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4','$step5','$step6')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==7){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $step6=$_POST['step6'];
          $step7=$_POST['step7'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4,step5,step6,step7)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4','$step5','$step6','$step7')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==8){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $step6=$_POST['step6'];
          $step7=$_POST['step7'];
          $step8=$_POST['step8'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4,step5,step6,step7,step8)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4','$step5','$step6','$step7','$step8')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==9){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $step6=$_POST['step6'];
          $step7=$_POST['step7'];
          $step8=$_POST['step8'];
          $step9=$_POST['step9'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step5,step6,step7,step8,step9)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4','$step5','$step6','$step7','$step8','$step9')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
          else if($companystep==10){
          	$step1=$_POST['step1'];
          $step2=$_POST['step2'];
          $step3=$_POST['step3'];
          $step4=$_POST['step4'];
          $step5=$_POST['step5'];
          $step6=$_POST['step6'];
          $step7=$_POST['step7'];
          $step8=$_POST['step8'];
          $step9=$_POST['step9'];
          $step10=$_POST['step10'];
          $sql2="INSERT INTO company_step(email, step1, step2, step3,step4,step5,step6,step7,step8,step9,step10)"
                  ."VALUES('$email','$step1', '$step2','$step3', '$step4', '$step5', '$step6', '$step7', '$step8', '$step9', '$step10')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            
            
          }
          }
            
          }
          
          
          
          


    
    

}
	if(!isset($_POST["step1"])){
	$_SESSION['companyname']=$companyname=mysqli_real_escape_string($con,$_POST['name']);
	$_SESSION['mobile']=$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
	
	
    $_SESSION['email']=$email=mysqli_real_escape_string($con,$_POST['email']);
    $_SESSION['license']=$license=mysqli_real_escape_string($con,$_POST['license']);
    $_SESSION['password']=$password=mysqli_real_escape_string($con,$_POST['password']);
    $_SESSION['companystep']=$companystep=mysqli_real_escape_string($con,$_POST['companystep']);
    
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
		<h2>Company Steps</h2>
		<form action="step.php" method="POST">
			<?php
				if ($_SESSION['companystep']==4) {
					?>
					<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<?php
				}
				else if($_SESSION['companystep']==5){
					?>
						<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
					<?php
			}
			else if($_SESSION['companystep']==6){?>
					<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step6:</span>
				<input type="text" name="step6" class="name" placeholder="Step6" required="">
				<div class="clearfix"></div>
			</div>


			<?php

			}
			else if($_SESSION['companystep']==7){?>
				<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step6:</span>
				<input type="text" name="step6" class="name" placeholder="Step6" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step7:</span>
				<input type="text" name="step7" class="name" placeholder="Step7" required="">
				<div class="clearfix"></div>
			</div>
			<?php

			}
			else if($_SESSION['companystep']==8){?>
				<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step6:</span>
				<input type="text" name="step6" class="name" placeholder="Step6" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step7:</span>
				<input type="text" name="step7" class="name" placeholder="Step7" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Step8:</span>
				<input type="text" name="step8" class="name" placeholder="Step8" required="">
				<div class="clearfix"></div>
			</div>
			<?php

			}
			else if($_SESSION['companystep']==9){?>
				<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step6:</span>
				<input type="text" name="step6" class="name" placeholder="Step6" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step7:</span>
				<input type="text" name="step7" class="name" placeholder="Step7" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Step8:</span>
				<input type="text" name="step8" class="name" placeholder="Step8" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step9:</span>
				<input type="text" name="step9" class="name" placeholder="Step9" required="">
				<div class="clearfix"></div>
			</div>
			<?php

			}
			else if($_SESSION['companystep']==9){?>
				<div class="username">
				<span class="username">Step1:</span>
				<input type="text" name="step1" class="name" placeholder="Step1" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step2:</span>
				<input type="text" name="step2" class="name" placeholder="Step2" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step3:</span>
				<input type="text" name="step3" class="name" placeholder="Step3" required="">
				<div class="clearfix"></div>
			</div>
		
			<div class="password-agileits">
				<span class="username">Step4:</span>
				<input type="text" name="step4" class="name" placeholder="Step4" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step5:</span>
				<input type="text" name="step5" class="name" placeholder="Step5" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step6:</span>
				<input type="text" name="step6" class="name" placeholder="Step6" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step7:</span>
				<input type="text" name="step7" class="name" placeholder="Step7" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Step8:</span>
				<input type="text" name="step8" class="name" placeholder="Step8" required="">
				<div class="clearfix"></div>
			</div>
			<div class="username">
				<span class="username">Step9:</span>
				<input type="text" name="step9" class="name" placeholder="Step9" required="">
				<div class="clearfix"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Step10:</span>
				<input type="text" name="step10" class="name" placeholder="Step10" required="">
				<div class="clearfix"></div>
			</div>
			<?php

			}

			?>
	
		
			
			<div class="login-w3">
					<input type="submit" class="login" value="Sign Up">
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