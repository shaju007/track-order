<?php
include 'db.php';
session_start();
// if (isset($_GET['id'])) {
// 		$userid=(int)$_GET['id'];
// 		echo $userid;
// 	}



?>

<!DOCTYPE HTML>
<html>
<head>
<title>View Order</title>
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
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">

		<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
            <?php

if (isset($_GET['id'])) {

		$_SESSION['userid']=(int)$_GET['id'];
		$userid=(int)$_GET['id'];
		echo $userid;
		
		if (!isset($_SESSION['login'])) {
			$isLoggedin=false;
			
			echo 'kkj';
		}
		else{
			$isLoggedin=true;
			
			
		}
	}

?>
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-6 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h4>Company Name</h4>
								<?php
									$sql= "SELECT * FROM orders RIGHT JOIN company ON orders.email = company.email WHERE orders.id='".$_SESSION['userid']."'";
									$result= mysqli_query($con, $sql);
									$queryResult=mysqli_num_rows($result);
									if ($queryResult>0){
										$row=mysqli_fetch_assoc($result);
										?>
										<h3><?php echo $row['company_name']; ?> </h3>
										<?php
									}
								?>
								
								
							</div>
							
						</div>
					</div>
					
					<div class="col-md-6 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h4>Order ID</h4>
								<?php

								?>
								<h3><?php echo $row['order_no']; ?>
								
							</div>
							
						</div>
					</div>
				
					<div class="clearfix"></div>
				</div>
<!--//four-grids here-->
<!--agileinfo-grap-->
			
                        
                    	
                        
                    	
						<div class="clearfix"></div>
                   
	<!--//photoday-section-->	
	<!--w3-agileits-pane-->	
	<div class="w3-agileits-pane">
	
		<div class="col-md-12 agile-info-stat">
			<div class="stats-info stats-last widget-shadow">
						<table class="table stats-table ">
							<thead>
								<tr>
									<th>S.NO</th>
									<th>Step Name</th>
									<th>STATUS</th>
									<?php 
										if ($isLoggedin) {
											$sqlck="SELECT step_name FROM `solved_step` WHERE order_id='".$row['order_no']."'";
											$resultck= mysqli_query($con, $sqlck);
											$queryResultck=mysqli_num_rows($resultck);
											if ($queryResultck>0) {
												$rowck=mysqli_fetch_assoc($resultck);
												echo $queryResultck;
												$sql= "SELECT * FROM orders RIGHT JOIN company_step ON orders.email = company_step.email WHERE orders.id='$userid'";
												$result= mysqli_query($con, $sql);
												$queryResult=mysqli_num_rows($result);
												if ($queryResult>0) {
													$row=mysqli_fetch_assoc($result);
													$dn=$queryResultck+1;
													if(!$row["step$dn"]=='' and $queryResultck!=10){
														echo '<th>PROGRESS</th>';
													}
												}
											}
											else{
												echo '<th>PROGRESS</th>';
											}
											?>
											
											<?php
										}
									?>
									
								</tr>
							</thead>
							<tbody>
								
								<?php

									$sql= "SELECT * FROM orders RIGHT JOIN company_step ON orders.email = company_step.email WHERE orders.id='$userid'";
									$result= mysqli_query($con, $sql);
									$queryResult=mysqli_num_rows($result);
									if ($queryResult>0) {
										while ($row=mysqli_fetch_assoc($result))
										{

											?>
											<?php
												if ($row['step1']!='') {
													?>
													<tr>
														<th scope="row">1</th>
														<td><?php echo $row['step1'];?></td>
														        	<?php
														        		$step_name=$row['step1'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step1']==$row2['step_name']) {
														        			$prv=1;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con1'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step1']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin) {
														        									$prv=0;
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con1"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?>
														        							</td>
														        			<?php }?>
														
														
													</tr>
													<?php
												}
											?>
											
											<?php
												if ($row['step2']!='') {
													?>
													<tr>
														<th scope="row">2</th>
														<td><?php echo $row['step2'];?></td>
														<?php
														        		$step_name=$row['step2'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step2']==$row2['step_name']) {
														        			$prv=2;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con2'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step2']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin && $prv==1) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con2"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step3']!='') {
													?>
													<tr>
														<th scope="row">3</th>
														<td><?php echo $row['step3'];?></td>
														<?php
														        		$step_name=$row['step3'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step3']==$row2['step_name']) {
														        			$prv=3;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con3'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step3']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin  && $prv==2) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con3"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step4']!='') {
													?>
													<tr>
														<th scope="row">4</th>
														<td><?php echo $row['step4'];?></td>
														<?php
														        		$step_name=$row['step4'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step4']==$row2['step_name']) {
														        			$prv=4;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con4'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step4']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin  && $prv==3) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con4"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step5']!='') {
													?>
													<tr>
														<th scope="row">5</th>
														<td><?php echo $row['step5'];?></td>
														<?php
														        		$step_name=$row['step5'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step5']==$row2['step_name']) {
														        			$prv=5;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con5'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step5']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin  && $prv==4) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con5"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step6']!='') {
													?>
													<tr>
														<th scope="row">6</th>
														<td><?php echo $row['step6'];?></td>
														<?php
														        		$step_name=$row['step6'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step6']==$row2['step_name']) {
														        			$prv=6;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con6'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step6']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin  && $prv==5) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con6"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step7']!='') {
													?>
													<tr>
														<th scope="row">7</th>
														<td><?php echo $row['step7'];?></td>
														<?php
														        		$step_name=$row['step7'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step7']==$row2['step_name']) {
														        			$prv=7;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span>
																						<td><?php
																								if (isset($_POST['con7'])) {
																									$sql2="INSERT INTO solved_step(order_id, step_name)"
																				                  ."VALUES('".$row['order_no']."','".$row['step7']."')";
																				                  if(mysqli_query($con,$sql2) === true){
																				                  	echo "success";
																				            	}
																								}
																							?>
																							<?php
																								if ($isLoggedin  && $prv==6) {
																									?>
																										<form name="form1" method="post">
																											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
																												<input type="submit" name="con7"  class="btn btn-primary" value="Click here"></input>
																											</a>
																											
																										
																										
																									</form>
																									<?php
																								}
																							?></td>
														        				</td>

														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step8']!='') {
													?>
													<tr>
														<th scope="row">8</th>
														<td><?php echo $row['step8'];?></td>
														<?php
														        		$step_name=$row['step8'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step8']==$row2['step_name']) {
														        			$prv=8;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con8'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step8']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin  && $prv==7) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con8"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step9']!='') {
													?>
													<tr>
														<th scope="row">9</th>
														<td><?php echo $row['step9'];?></td>
														<?php
														        		$step_name=$row['step9'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step9']==$row2['step_name']) {
														        			$prv=9;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con9'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step9']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin && $prv==8) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con9"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
												if ($row['step10']!='') {
													?>
													<tr>
														<th scope="row">10</th>
														<td><?php echo $row['step10'];?></td>
														<?php
														        		$step_name=$row['step10'];
																		$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='".$row['order_no']."' AND step_name='$step_name' ";
																		$result= mysqli_query($con, $sql);
																		$row2=mysqli_fetch_assoc($result);
														        		if ($row['step10']==$row2['step_name']) {
														        			$prv=10;
														        			?>
														        			<td><span class="label label-success">Done</span></td>
														        			<?php
														        		}else{?>
														        				<td><span class="label label-danger">Pending</span></td>
														        						<td><?php
														        								if (isset($_POST['con10'])) {
														        									$sql2="INSERT INTO solved_step(order_id, step_name)"
														        				                  ."VALUES('".$row['order_no']."','".$row['step10']."')";
														        				                  if(mysqli_query($con,$sql2) === true){
														        				                  	echo "success";
														        				            	}
														        								}
														        							?>
														        							<?php
														        								if ($isLoggedin && $prv==9) {
														        									?>
														        										<form name="form1" method="post">
														        											<a href="view.php?id=<?php echo $_SESSION['userid'];?>">
														        												<input type="submit" name="con10"  class="btn btn-primary" value="Click here"></input>
														        											</a>
														        											
														        										
														        										
														        									</form>
														        									<?php
														        								}
														        							?></td>
														        			<?php }?>
														
													</tr>
													<?php
												}
											?>
											<?php
										}
									}
								?>

								<!-- <tr>
									<th scope="row">1</th>
									<td>Order Received</td>
									<td><span class="label label-success">Done</span></td>
									<td><button type="button"  class="btn btn-primary">Click here</button></td>
								</tr> -->
								
							</tbody>
						</table>
					</div>
			</div>
		  <div class="clearfix"></div>
	  </div>
	  <!--//w3-agileits-pane-->	
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>©All Rights Reserved | Design by EzTracking </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
			<?php 
				if ($isLoggedin) {
					?>
									<div class="sidebar-menu">
										<header class="logo1">
											<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
										</header>
											<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
					                              <div class="menu">
														<ul id="menu" >
															<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
															
															
															 <li id="menu-academico" ><a href="add_delivery_boy.php"><i class="fa fa-envelope nav_icon"></i><span>Add Delivery Boy</span><div class="clearfix"></div></a></li>
														<li><a href="signin.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Signin </span><div class="clearfix"></div></a></li>
														<li id="menu-academico" ><a href="signup.php"><i class="fa fa-bar-chart"></i><span>Signup</span><div class="clearfix"></div></a></li>
														
														 </li>
														<li><a href="signin.php"><i class="fa fa-check-square-o nav_icon"></i><span>Logout</span>
														</li>
													  </ul>
													</div>
														
												  </div>
												  <div class="clearfix"></div>		
												</div>
												<?php
				}
			?>
				
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
				{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
			],
			lineColors:['#ff4a43','#a2d200','#22beef'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
</body>
</html>