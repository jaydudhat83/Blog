<?php
 	
 		$data=$_GET['id1'];
 
 
		$da=mysqli_connect("localhost","root","","blog") or die();    
		$db=mysqli_query($da,"SELECT `code`,`emailid`,`password`,`fname`,`lname` FROM veri where `emailid`='$data'");
		$db=mysqli_fetch_assoc($db);
		$maill=$db['emailid'];
		$fn=$db['fname'];
		$ln=$db['lname'];
		$pw=$db['password'];
	 
		mysqli_query($da,"INSERT INTO signin VALUES(' ','$fn','$ln','$maill','$pw','0','0')");
		 
		 header("location:login.php");
 


	?>






	<!DOCTYPE html>
	<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">




		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
		<link rel="stylesheet" href="assets/css/style.css">




	</head>

	<body>

		<!-- Top content -->
		<div class="top-content">

			<div class="inner-bg">
				<div class="container">

					<div class="row">
						<div class="col-sm-8 col-sm-offset-2 text">


						</div>
					</div>

					<div class="row">
						<div class="col-sm-5">

							<div class="form-box">
								<div class="form-top">
									<div class="form-top-left">
										<h3> 
											<p>You are Successfully Signed up!!</p></h3>
										</div>
										<div class="form-top-right">
											<i class="fa fa-key"></i>
										</div>
									</div>
									<div class="form-bottom" style="align-content: center;">
										   
										 

									</form>
								</div>
							</div>



						</div>


						<div class="col-sm-1"></div>

						<div class="col-sm-5">


						</div>

					</div>
				</div>

			</div>



			<!-- Javascript -->
			<script src="assets/js/jquery-1.11.1.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.backstretch.min.js"></script>
			<script src="assets/js/scripts.js"></script>


		</body>

		</html>