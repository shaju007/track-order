<?php
include 'db.php';
session_start();
if(!isset($_SESSION['login']) and !isset($_SESSION['boyLogin'])){ //if login in session is not set
    header("Location:signin.php");
}
if (isset($_POST['submit'])) {
	
	$order_id=$_POST['order_id'];
	$email=$_POST['email'];
	$sql2="INSERT INTO orders(email, order_no)"
                  ."VALUES('$email','$order_id')";
                  if(mysqli_query($con,$sql2) === true){
                  	echo "success";
            	}

}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard company</title>
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
             <!--header start here-->
				<div class="header-main">
					<form action="live_order.php" method="post"> 
							<div class="form-group has-success">
					        <label class="control-label" for="inputSuccess1">Order ID Here</label>
					        
					        <input type="text" name="order_id" class="form-control1" id="inputSuccess1" required>
					      </div>
						 	<div class="form-group has-success">
					        <label class="control-label" for="inputSuccess1">Customer Email</label>
					        <input type="text" name="email" class="form-control1" id="inputSuccess1" required>
					      </div>
										
							<center><button type="submit" name="submit"  class="btn btn-primary">Live This Order</button></center>
											
						     <div class="clearfix"> </div>
					</form>
					
				
				</div>
<!--heder end here-->
		
<!--four-grids here-->
		<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-agileits">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">

								<h3>Delivery Boy</h3>
								<?php
									$sqldb = "SELECT * FROM delivery_boy where company_email='".$_SESSION['email']."'";
									$resultdb = mysqli_query($con, $sqldb);
									$queryResultdb=mysqli_num_rows($resultdb);
									if ($queryResultdb>0) {
										?>
										<h4> <?php echo $queryResultdb;?> </h4>
										<?php 
									}
									?>
								
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-agileinfo">
							<div class="icon">
								<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Clients</h3>
								<?php
									$sqldb = "SELECT * FROM orders where email='".$_SESSION['email']."'";
									$resultdb = mysqli_query($con, $sqldb);
									$queryResultdb=mysqli_num_rows($resultdb);
									if ($queryResultdb>0) {
										?>
										<h4> <?php echo $queryResultdb;?> </h4>
										<?php 
									}
									?>
								

							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-w3ls">
							<div class="icon">
								<i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Live Orders</h3>
											<?php
											$live=0;
											$done=0;
												$sql = "SELECT * FROM orders where email='".$_SESSION['email']."' order by id desc";
												$result = mysqli_query($con, $sql);

												if (mysqli_num_rows($result) > 0) {
												    // output data of each row
												    while($row = mysqli_fetch_assoc($result)) {
												        $sqlck="SELECT step_name FROM `solved_step` WHERE order_id='".$row['order_no']."'";
												        $resultck= mysqli_query($con, $sqlck);
												        $queryResultck=mysqli_num_rows($resultck);
												        if ($queryResultck>0) {
												        	$rowck=mysqli_fetch_assoc($resultck);
												        	//echo $queryResultck;
												        	$sqlck2= "SELECT * FROM company WHERE email='".$_SESSION['email']."'";
												        	$resultck2= mysqli_query($con, $sqlck2);
												        	$queryResultck2=mysqli_num_rows($resultck2);
												        	if ($queryResultck2>0) {
												        		$rowck2=mysqli_fetch_assoc($resultck2);
												        		$dn=$queryResultck+1;
												        		if($rowck2["step_count"]== $queryResultck){
												        			
												        			$done++;
												        
												        		}
												        		else{
												        			$live++;
												        			
												        			
												        		}
												        	}
												        }
												        else{
												        	$live++;
								        	        		
												        }
												        ?>
															
														



												        <?php
												    }
												} else {
												    echo "0 results";
												}
												?>
											
								<h4><?php echo $live;?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-wthree">
							<div class="icon">
								<i class="glyphicon glyphicon-briefcase" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Done Orders</h3>
								<h4><?php echo $done;?></h4>
								
							</div>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
               	<div class="col-sm-6 w3-agile-crd">
                            <div class="card">
                                <div class="card-body card-padding">
                                    <div class="widget">
                                        <header class="widget-header">
                                            <h4 class="widget-title">Live Order's</h4>
                                            
                                        </header>
                                        
                                        
                                        <hr class="widget-separator">
                                        <div class="widget-body">
                                            <div class="streamline">
												
															<?php 
															$sql = "SELECT COUNT(*) FROM orders";
															$result = mysqli_query($con,$sql );
															$r = mysqli_fetch_row($result);
															$numrows = $live;

															// number of rows to show per page
															$rowsperpage = 5;
															// find out total pages
															$totalpages = ceil($numrows / $rowsperpage);

															// get the current page or set a default
															if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
															   // cast var as int
															   $currentpage = (int) $_GET['currentpage'];
															} else {
															   // default page num
															   $currentpage = 1;
															} // end if

															// if current page is greater than total pages...
															if ($currentpage > $totalpages) {
															   // set current page to last page
															   $currentpage = $totalpages;
															} // end if
															// if current page is less than first page...
															if ($currentpage < 1) {
															   // set current page to first page
															   $currentpage = 1;
															} // end if

															// the offset of the list, based on current page 
															$offset = ($currentpage - 1) * $rowsperpage;

															// get the info from the db 
																$sql = "SELECT * FROM orders where email='".$_SESSION['email']."' order by id desc LIMIT $offset, $rowsperpage";
																$result = mysqli_query($con, $sql);

																if (mysqli_num_rows($result) > 0) {
																    // output data of each row
																    while($row = mysqli_fetch_assoc($result)) {
																        $sqlck="SELECT step_name FROM `solved_step` WHERE order_id='".$row['order_no']."'";
																        $resultck= mysqli_query($con, $sqlck);
																        $queryResultck=mysqli_num_rows($resultck);
																        if ($queryResultck>0) {
																        	$rowck=mysqli_fetch_assoc($resultck);
																        	//echo $queryResultck;
																        	$sqlck2= "SELECT * FROM company_step WHERE email='".$_SESSION['email']."'";
																        	$resultck2= mysqli_query($con, $sqlck2);
																        	$queryResultck2=mysqli_num_rows($resultck2);
																        	if ($queryResultck2>0) {
																        		$rowck2=mysqli_fetch_assoc($resultck2);
																        		$dn=$queryResultck+1;
																        		if($rowck2["step$dn"]=='' or $queryResultck==10){
																        			//echo 'done';
																        			?>
																        			

																        			<?php 
																        		}
																        		else{
																        			?>
																        			<div class="sl-item sl-danger">
																        			    <div class="sl-content">
																        			      
																        			        <a href="view.php?id=<?php echo $row["id"];?>"><p><?php echo $row["order_no"].  "<br>";?></p></a>
																        			    </div>
																        			</div>
																					<?php
																        		}
																        	}
																        }
																        else{
												        	        			?>
												        	        			<div class="sl-item sl-danger">
												        	        			    <div class="sl-content">
												        	        			      
												        	        			        <a href="view.php?id=<?php echo $row["id"];?>"><p><?php echo $row["order_no"].  "<br>";?></p></a>
												        	        			    </div>
												        	        			</div>
												        						<?php
																        }
																        
																    }
																} else {
																    echo "0 results";
																}// end while

															/******  build the pagination links ******/
															// range of num links to show
															$range = 3;

															// if not on page 1, don't show back links
															if ($currentpage > 1) {
															   // show << link to go back to page 1
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
															   // get previous page num
															   $prevpage = $currentpage - 1;
															   // show < link to go back to 1 page
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
															} // end if 

															// loop to show links to range of pages around current page
															for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
															   // if it's a valid page number...
															   if (($x > 0) && ($x <= $totalpages)) {
															      // if we're on current page...
															      if ($x == $currentpage) {
															         // 'highlight' it but don't make a link
															         echo " [<b>$x</b>] ";
															      // if not current page...
															      } else {
															         // make it a link
															         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
															      } // end else
															   } // end if 
															} // end for

															// if not on last page, show forward and last page links        
															if ($currentpage != $totalpages) {
															   // get next page
															   $nextpage = $currentpage + 1;
															    // echo forward link for next page 
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
															   // echo forward link for lastpage
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
															} // end if
															/****** end build pagination links ******/
															?>
 
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                           	<div class="col-sm-6 w3-agile-crd">
                                        <div class="card">
                                            <div class="card-body card-padding">
                                                <div class="widget">
                                                    <header class="widget-header">
                                                        <h4 class="widget-title">Done Order's</h4>
                                                        
                                                    </header>
                                                    
                                                    
                                                    <hr class="widget-separator">
                                                    <div class="widget-body">
                                                        <div class="streamline">
            												
            												<?php 
															$sql = "SELECT COUNT(*) FROM orders";
															$result = mysqli_query($con,$sql );
															$r = mysqli_fetch_row($result);
															$numrows = $done;
														

															// number of rows to show per page
															$rowsperpage = 4;
															// find out total pages
															$totalpages = ceil($numrows / $rowsperpage);

															// get the current page or set a default
															if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
															   // cast var as int
															   $currentpage = (int) $_GET['currentpage'];
															} else {
															   // default page num
															   $currentpage = 1;
															} // end if

															// if current page is greater than total pages...
															if ($currentpage > $totalpages) {
															   // set current page to last page
															   $currentpage = $totalpages;
															} // end if
															// if current page is less than first page...
															if ($currentpage < 1) {
															   // set current page to first page
															   $currentpage = 1;
															} // end if

															// the offset of the list, based on current page 
															$offset = ($currentpage - 1) * $rowsperpage;

															// get the info from the db 
																$sql = "SELECT * FROM orders where email='".$_SESSION['email']."' order by id asc";
																$result = mysqli_query($con, $sql);

																if (mysqli_num_rows($result) > 0) {
																    // output data of each row
																    while($row = mysqli_fetch_assoc($result)) {
																    	
																    	
																        $sqlck="SELECT step_name FROM `solved_step` WHERE order_id='".$row['order_no']."'";
																        $resultck= mysqli_query($con, $sqlck);
																        $queryResultck=mysqli_num_rows($resultck);
																        if ($queryResultck>0) {
																        	$rowck=mysqli_fetch_assoc($resultck);
																        	//echo $queryResultck;
																        	$dn=$queryResultck+1;
																        	$sqlck2= "SELECT * FROM orders RIGHT JOIN company_step on orders.email=company_step.email WHERE company_step.step$dn='' and order_no='".$row['order_no']."' and orders.email='".$_SESSION['email']."' LIMIT $offset, $rowsperpage";
																        	
																        	$resultck2= mysqli_query($con, $sqlck2);
																        	$queryResultck2=mysqli_num_rows($resultck2);
																        	if ($queryResultck2>0) {
																        		

																        			?>
																        			<div class="sl-item sl-danger" >

																        			    <div class="sl-content" >
																        			      
																        			        <a href="view.php?id=<?php echo $row["id"];?>"><p><?php echo $row["order_no"].  "<br>";?></p></a>
																        			    </div>
																        			</div>

																        			<?php 
																        		
																        		
																        	}
																        }
																        
																        
																    }
																} else {
																    echo "0 results";
																}// end while

															/******  build the pagination links ******/
															// range of num links to show
															$range = 4;

															// if not on page 1, don't show back links
															if ($currentpage > 1) {
															   // show << link to go back to page 1
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
															   // get previous page num
															   $prevpage = $currentpage - 1;
															   // show < link to go back to 1 page
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
															} // end if 

															// loop to show links to range of pages around current page
															for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
															   // if it's a valid page number...
															   if (($x > 0) && ($x <= $totalpages)) {
															      // if we're on current page...
															      if ($x == $currentpage) {
															         // 'highlight' it but don't make a link
															         echo " [<b>$x</b>] ";
															      // if not current page...
															      } else {
															         // make it a link
															         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
															      } // end else
															   } // end if 
															} // end for

															// if not on last page, show forward and last page links        
															if ($currentpage != $totalpages) {
															   // get next page
															   $nextpage = $currentpage + 1;
															    // echo forward link for next page 
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
															   // echo forward link for lastpage
															   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
															} // end if
            																		/****** end build pagination links ******/
            												?>

                                  
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
						<div class="clearfix"></div>
						
                   
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
	 <p>© All Rights Reserved | Design by Sabbir</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
										
										
										 <li id="menu-academico" ><a href="add_delivery_boy.php"><i class="fa fa-envelope nav_icon"></i><span>Add Delivery Boy</span><div class="clearfix"></div></a></li>
										 <li id="menu-academico" ><a href="boy_signin.php"><i class="fa fa-envelope nav_icon"></i><span> Delivery Boy Sign in</span><div class="clearfix"></div></a></li>
									<li><a href="signin.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Signin </span><div class="clearfix"></div></a></li>
									<li id="menu-academico" ><a href="signup.php"><i class="fa fa-bar-chart"></i><span>Signup</span><div class="clearfix"></div></a></li>
									
									 </li>
									<li><a href="logout.php"><i class="fa fa-check-square-o nav_icon"></i><span>Logout</span>
									</li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
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