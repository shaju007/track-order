<?php
	include 'db.php';
?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!doctype html>
<html>
<head>
<title>Ez Tracking</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shipment Track Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>


<div class="content">
<div class="content1">
	<h1>EZ Tracking</h1>
	</div>
	<div class="content2">
		<?php
			$sql="SELECT DISTINCT company_name FROM company ";
			$result= mysqli_query($conn, $sql);
			$queryResult=mysqli_num_rows($result);
			if ($queryResult>0) {
				?>
				<div class="content2-header1">
					<p>Total registered Company : <span><?php echo $queryResult;?></span></p>
				</div>
				<?php
			}
		?>
		
		<div class="content2-header1">
			<p>Total View : <span>Checking Quality</span></p>
		</div>
		<div class="content2-header1">
			<p>Date : <span>3 jan 2018</span></p>
		</div>
		<div class="clear"></div>
	</div>
<br><br><br><br>
<center>
	<form class="form-inline" action="home.php" method="POST">
  <div class="form-group mb-2">
   
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="order_id"  align="center"  class="form-control" id="text" placeholder="order id" required>
  </div>
  <button type="submit" class="button" name="search">Track</button>
</form>

			<div class="clear"></div><br><br><br><br>
			<div class="footer">
<div class="content1">
	<p>Copyright © Ez Tracking</p>
	</div>
	
</div>
		</div>
	</div>
</div>


</body>
</html>