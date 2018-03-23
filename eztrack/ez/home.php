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
	<?php
		if (isset($_POST['search'])){
			$ck=0;
			$search= mysqli_real_escape_string($conn, $_POST['order_id']);
			$order_id=$_POST['order_id'];

			$sql= "SELECT * FROM orders RIGHT JOIN company ON orders.email = company.email WHERE order_no='$order_id'";
			$result= mysqli_query($conn, $sql);
			$queryResult=mysqli_num_rows($result);
			if ($queryResult>0){
				while ($row=mysqli_fetch_assoc($result)) {
					
					?>
					<div class="content2">
						<div class="content2-header1">
							<p>Order No : <span><?php echo $row['order_no']; ?></span></p>
						</div>
						<?php
							$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id  WHERE order_no='$order_id' ORDER BY solved_step.id DESC
									LIMIT 1";
							
							
							$result= mysqli_query($conn, $sql);
							$queryResult=mysqli_num_rows($result);
							if ($queryResult>0) {

								while ($row=mysqli_fetch_assoc($result)) {
									$sql= "SELECT * FROM orders RIGHT JOIN company_step ON orders.email = company_step.email  WHERE order_no='$order_id' ";
									
									
									$result= mysqli_query($conn, $sql);
									$queryResult=mysqli_num_rows($result);
									if ($queryResult>0) {
										while ($row3=mysqli_fetch_assoc($result)) {
											if ($row['step_name']==$row3['step1']) {
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step2']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step2']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step3']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step3']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step4']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step4']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step5']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step5']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step6']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step6']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step7']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step7']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step8']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step8']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step9']; ?></span></p>
												</div>
												<?php
											}elseif($row['step_name']==$row3['step9']){
												?>
												<div class="content2-header1">
													<p>Next Status: <span><?php echo $row3['step10']; ?></span></p>
												</div>
												<?php
											}
										}
									}


									?>
									
									<?php
								}
							}else{
								?>
								<div class="content2-header1">
									<p>Next Status: <span><?php echo "order recieved"; ?></span></p>
								</div>
								<?php
							}
						?>
						<!-- <div class="content2-header1">
							<p>Status : <span>Checking Quality</span></p>
						</div> -->
						<div class="content2-header1">
							<p>Expected Date : <span>7-NOV-2015</span></p>
						</div>
						<div class="clear"></div>
					</div>
					<?php
				}
			}
			?>
			<?php
				$sql= "SELECT * FROM orders RIGHT JOIN company_step ON orders.email = company_step.email WHERE order_no='$order_id'";
				$result= mysqli_query($conn, $sql);
				$queryResult=mysqli_num_rows($result);
				if ($queryResult>0) {
					while ($row=mysqli_fetch_assoc($result)) {
						?>
							<div class="content3">
						        <div class="shipment">
						        	<?php
						        		$step_name=$row['step1'];
										$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
										$result= mysqli_query($conn, $sql);
										$row2=mysqli_fetch_assoc($result);
						        		if ($row['step1']==$row2['step_name']) {
						        			?>
		        							<div class="confirm">
		        				                <div class="imgcircle">
		        				                    <img src="images/confirm.png" alt="confirm order">
		        				            	</div>
		        								<span class="line"></span>
		        								<p><?php echo $row['step1']; ?></p>
		        							</div>
		        							<?php
						        		}else{
						        			?>
				        						<div class="confirm">
				        			                <div class="imgcircle" style="background-color: #F5998E;">
				        			                    <img src="images/confirm.png" alt="confirm order">
				        			            	</div>
				        							<span class="line" style="background-color: #F5998E;"></span>
				        							<p><?php echo $row['step1']; ?></p>
				        						</div>
				        						<?php
						        		}
						        	?>

									<?php
										$step_name=$row['step2'];
										$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
										$result= mysqli_query($conn, $sql);
										$row2=mysqli_fetch_assoc($result);
										if ($row['step2']==$row2['step_name']) {
											?>
											<div class="process">
								           	 	<div class="imgcircle">
								                	<img src="images/process.png" alt="process order">
								            	</div>
												<span class="line"></span>
												<p><?php echo $row['step2']; ?></p>
											</div>
											<?php
										}else{
											?>
											<div class="process">
								           	 	<div class="imgcircle" style="background-color: #F5998E;">
								                	<img src="images/process.png" alt="process order">
								            	</div>
												<span class="line" style="background-color: #F5998E;"></span>
												<p><?php echo $row['step2']; ?></p>
											</div>
											<?php
										}
									?>

									<?php
										$step_name=$row['step3'];
										$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
										$result= mysqli_query($conn, $sql);
										$row2=mysqli_fetch_assoc($result);
										if ($row['step3']==$row2['step_name']) {
											?>
											<div class="quality">
												<div class="imgcircle">
								                	<img src="images/quality.png" alt="quality check">
								            	</div>
												<span class="line" style="background-color: #98D091;"></span>
												<p><?php echo $row['step3']; ?></p>
											</div>
											<?php
										}else{
											?>
											<div class="quality">
												<div class="imgcircle" style="background-color: #F5998E;">
								                	<img src="images/quality.png" alt="quality check">
								            	</div>
												<span class="line" style="background-color: #F5998E;"></span>
												<p><?php echo $row['step3']; ?></p>
											</div>
											<?php
										}
									?>

									<?php
										$step_name=$row['step4'];
										$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
										$result= mysqli_query($conn, $sql);
										$row2=mysqli_fetch_assoc($result);
										
										if ($row['step4']==$row2['step_name']) {
											
											?>
											<div class="dispatch">
												<div class="imgcircle" style="background-color: #98D091;">
								                	<img src="images/dispatch.png" alt="dispatch product">
								            	</div>
												<?php
													if ($row['step5']!='') {
														?>
														<span class="line" style="background-color: #98D091;"></span>
														<?php
													}
												?>
												<p><?php echo $row['step4']; ?></p>
											</div>
											<?php
										}else{
											
											?>
											<div class="dispatch">
												<div class="imgcircle" style="background-color: #F5998E;">
								                	<img src="images/dispatch.png" alt="dispatch product">
								            	</div>
												<?php
													if ($row['step5']!='') {
														?>
														<span class="line" style="background-color: #F5998E;"></span>
														<?php
													}
												?>
												<p><?php echo $row['step4']; ?></p>
											</div>
											<?php
										}
									?>

									<?php
										$step_name=$row['step5'];
										$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
										$result= mysqli_query($conn, $sql);
										$row2=mysqli_fetch_assoc($result);
										if ($row['step5']==$row2['step_name'] && ($row['step5']!='' && $row2['step_name']!='')) {
											?>
											<div class="delivery">
												<div class="imgcircle" style="background-color: #98D091;">
								                	<img src="images/delivery.png" alt="delivery">
												</div>
												<?php
													if ($row['step6']!='') {
														?>
														<span class="line"></span>
														<?php
													}
												?>
												
												<p><?php echo $row['step5']; ?></p>
											</div>
											<?php
										}elseif($row['step5']!=''){
											?>
											<div class="delivery">
												<div class="imgcircle" style="background-color: #F5998E;">
								                	<img src="images/delivery.png" alt="delivery">
												</div>
												<?php
													if ($row['step6']!='') {
														?>
														<span class="line" style="background-color: #F5998E;"></span>
														<?php
													}
												?>
												<p><?php echo $row['step5']; ?></p>
											</div>
											<?php
										}
									?>

										<?php
											$step_name=$row['step6'];
											$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
											$result= mysqli_query($conn, $sql);
											$row2=mysqli_fetch_assoc($result);
											if ($row['step6']==$row2['step_name'] && ($row['step6']!='' && $row2['step_name']!='')) {
												?>
												<div class="delivery">
													<div class="imgcircle" style="background-color: #98D091;">
									                	<img src="images/delivery.png" alt="delivery">
													</div>
													<?php
													if ($row['step7']!='') {
														?>
														<span class="line"></span>
														<?php
													}
												?>
													<p><?php echo $row['step6']; ?></p>
												</div>
												<?php
											}elseif($row['step6']!=''){
												
												?>
												<div class="delivery">
													<div class="imgcircle" style="background-color: #F5998E;">
									                	<img src="images/delivery.png" alt="delivery">
													</div>
													<?php
														if ($row['step7']!='') {
															?>
															<span class="line" style="background-color: #F5998E;"></span>
															<?php
														}
													?>
													<p><?php echo $row['step6']; ?></p>
												</div>
												<?php
											}
										?>

											<?php
												$step_name=$row['step7'];
												$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
												$result= mysqli_query($conn, $sql);
												$row2=mysqli_fetch_assoc($result);
												if ($row['step7']==$row2['step_name'] && ($row['step7']!='' && $row2['step_name']!='')) {
													?>
													<div class="delivery">
														<div class="imgcircle" style="background-color: #98D091;">
										                	<img src="images/delivery.png" alt="delivery">
														</div>
														<?php
															if ($row['step8']!='') {
																?>
																<span class="line"></span>
																<?php
															}
														?>
														<p><?php echo $row['step7']; ?></p>
													</div>
													<?php
												}elseif($row['step7']!=''){
													?>
													<div class="delivery">
														<div class="imgcircle" style="background-color: #F5998E;">
										                	<img src="images/delivery.png" alt="delivery">
														</div>
														<?php
															if ($row['step8']!='') {
																?>
																<span class="line" style="background-color: #F5998E;"></span>
																<?php
															}
														?>
														<p><?php echo $row['step7']; ?></p>
													</div>
													<?php
												}
											?>

												<?php
													$step_name=$row['step8'];
													$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
													$result= mysqli_query($conn, $sql);
													$row2=mysqli_fetch_assoc($result);
													if ($row['step8']==$row2['step_name'] && ($row['step8']!='' && $row2['step_name']!='')) {
														?>
														<div class="delivery">
															<div class="imgcircle" style="background-color: #98D091;">
											                	<img src="images/delivery.png" alt="delivery">
															</div>
															<?php
																if ($row['step9']!='') {
																	?>
																	<span class="line"></span>
																	<?php
																}
															?>
															<p><?php echo $row['step8']; ?></p>
														</div>
														<?php
													}elseif($row['step8']!=''){
														?>
														<div class="delivery">
															<div class="imgcircle" style="background-color: #F5998E;">
											                	<img src="images/delivery.png" alt="delivery">
															</div>
															<?php
																if ($row['step9']!='') {
																	?>
																	<span class="line" style="background-color: #F5998E;"></span>
																	<?php
																}
															?>
															<p><?php echo $row['step8']; ?></p>
														</div>
														<?php
													}
												?>

													<?php
														$step_name=$row['step9'];
														$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
														$result= mysqli_query($conn, $sql);
														$row2=mysqli_fetch_assoc($result);
														if ($row['step9']==$row2['step_name'] && ($row['step9']!='' && $row2['step_name']!='')) {
															?>
															<div class="delivery">
																<div class="imgcircle" style="background-color: #98D091;">
												                	<img src="images/delivery.png" alt="delivery">
																</div>
																<?php
																	if ($row['step10']!='') {
																		?>
																		<span class="line"></span>
																		<?php
																	}
																?>
																<p><?php echo $row['step9']; ?></p>
															</div>
															<?php
														}elseif($row['step9']!=''){
															?>
															<div class="delivery">
																<div class="imgcircle" style="background-color: #F5998E;">
												                	<img src="images/delivery.png" alt="delivery">
																</div>
																<?php
																	if ($row['step10']!='') {
																		?>
																		<span class="line" style="background-color: #F5998E;"></span>
																		<?php
																	}
																?>
																<p><?php echo $row['step9']; ?></p>
															</div>
															<?php
														}
													?>

														<?php
															$step_name=$row['step10'];
															$sql= "SELECT * FROM orders RIGHT JOIN solved_step ON orders.order_no = solved_step.order_id WHERE order_no='$order_id' AND step_name='$step_name' ";
															$result= mysqli_query($conn, $sql);
															$row2=mysqli_fetch_assoc($result);
															if ($row['step10']==$row2['step_name'] && ($row['step10']!='' && $row2['step_name']!='')) {
																?>
																<div class="delivery">
																	<div class="imgcircle" style="background-color: #98D091;">
													                	<img src="images/delivery.png" alt="delivery">
																	</div>
																	
																	<p><?php echo $row['step10']; ?></p>
																</div>
																<?php
															}elseif($row['step10']!=''){
																?>
																<div class="delivery">
																	<div class="imgcircle" style="background-color: #F5998E;">
													                	<img src="images/delivery.png" alt="delivery">
																	</div>
																	
																	<p><?php echo $row['step10']; ?></p>
																</div>
																<?php
															}
														?>
									
									<div class="clear"></div>
								</div>
							</div>
							<?php
					}
				}else{
					?>
						<h3>There are no result</h3>
					<?php
				}
			?>
				
				

				<?php
		}
	?>
	<!-- <div class="content2">
		<div class="content2-header1">
			<p>Order No : <span>Ipsum Dolor</span></p>
		</div>
		<div class="content2-header1">
			<p>Status : <span>Checking Quality</span></p>
		</div>
		<div class="content2-header1">
			<p>Expected Date : <span>7-NOV-2015</span></p>
		</div>
		<div class="clear"></div>
	</div> -->
	<!-- <div class="content3">
        <div class="shipment">
			<div class="confirm">
                <div class="imgcircle">
                    <img src="images/confirm.png" alt="confirm order">
            	</div>
				<span class="line"></span>
				<p>Confirmed Order</p>
			</div>
			<div class="process">
           	 	<div class="imgcircle">
                	<img src="images/process.png" alt="process order">
            	</div>
				<span class="line"></span>
				<p>Processing Order</p>
			</div>
			<div class="quality">
				<div class="imgcircle">
                	<img src="images/quality.png" alt="quality check">
            	</div>
				<span class="line"></span>
				<p>Quality Check</p>
			</div>
			<div class="dispatch">
				<div class="imgcircle">
                	<img src="images/dispatch.png" alt="dispatch product">
            	</div>
				<span class="line"></span>
				<p>Dispatched Item</p>
			</div>
			<div class="delivery">
				<div class="imgcircle">
                	<img src="images/delivery.png" alt="delivery">
				</div>
				<p>Product Delivered</p>
			</div>
			<div class="clear"></div>
		</div>
	</div> -->
</div>

<div class="footer">
	<p>Copyright © Ez Tracking</p>
</div>
</body>
</html>