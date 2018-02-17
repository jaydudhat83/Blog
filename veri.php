<?php
$result="";
$flag='0';
 
if(isset($_POST["signinbtn"]))
{				
	$vid=$_POST['vid'];
	$data1=mysqli_connect("localhost","root","","blog") or die();    
	$db=mysqli_query($data1,"SELECT `code`,`emailid`,`password`,`fname`,`lname` FROM veri where `vid`='$vid'");
	$db=mysqli_fetch_assoc($db);
	$ocode=$db['code'];
	$maill=$db['emailid'];
	$ucode=$_POST["ucode"];
	 
	if($ucode == $ocode)
	{
	
		$da=mysqli_connect("localhost","root","","blog") or die();    
		$db=mysqli_query($da,"SELECT `code`,`emailid`,`password`,`fname`,`lname` FROM veri where `vid`='$vid'");
		$db=mysqli_fetch_assoc($db);
		$maill=$db['emailid'];
		$fn=$db['fname'];
		$ln=$db['lname'];
		$pw=$db['password'];
		echo $maill.$fn;
		mysqli_query($da,"INSERT INTO signin VALUES(' ','$fn','$ln','$maill','$pw','0','0')");
		echo "<script type='text/javascript'>alert('You Are in equal loop!!');</script>";
		$flag='1';
		 
	}else
	{
		echo "<script type='text/javascript'>alert('Code is incorrect We have sent New Code!!');</script>";
		$flag='2';
	}


}
$code=rand(100000,999999);
if($flag=='0'){
	$data=$_GET['id'];
	$data1=mysqli_connect("localhost","root","","blog") or die();
    mysqli_query($data1,"UPDATE veri SET `code`='$code' where `emailid`='$data'");
}elseif ($flag=='2') {
	$data=$maill;
	$data1=mysqli_connect("localhost","root","","blog") or die();
    mysqli_query($data1,"UPDATE veri SET `code`='$code' where `emailid`='$data'");
}else
{
	$data='';
}

if($flag =='0' or $flag =='2')
{
	ini_set("SMTP","ssl://smtp.gmail.com");
	ini_set("smtp_port","587");
	$to =  $data;
	$from = "jaydudhatnk@gmail.com";
	$subject = "Your Confirmation Code is here";
	
	$message = "
	<html>
	<head>
	</head>
	<body>
		<div style='width:70%;display:block;margin:auto;background-color:#26a69a;box-shadow:1px 1px 50px #26a69a;border-radius:5px'>
			<h2 style='text-align:center;color:white;font-family: Oswald, sans-serif;'>Blog website Email verification</h2>
			<p style='font-family: Oswald, sans-serif;text-align:center;color:white'>Hello ,<br><b>Your account activation Code is $code</b>  
			</div>
		</body>
		</html>";
		$headers = "From: jaydudhatnk@gmail.com\r\n";
		$headers .= "Reply-To: jaydudhatnk@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$mail = mail($to, $subject, $message, $headers);
		

	}



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
											<p>Enter Verification Code:</p></h3>
										</div>
										<div class="form-top-right">
											<i class="fa fa-key"></i>
										</div>
									</div>
									<div class="form-bottom" style="align-content: center;">
										<?php 
										$data1=mysqli_connect("localhost","root","","blog") or die();
										mysqli_query($data1,"UPDATE veri SET `code`='$code' where `emailid`='$data'");
										$db=mysqli_query($data1,"SELECT `vid` FROM veri where `emailid`='$data'");
										$db=mysqli_fetch_assoc($db);
										$vid=$db['vid'];
										echo"<form role=form  method=post class=login-form action=veri.php?vid=$vid&id=$data>";?>
										<div class="form-group">

											<input type="text" name="ucode" placeholder="Code..." class="form-username form-control" id="form-username">
										</div>

										<button type="submit" class="btn" name="signinbtn">Vefiy!</button>

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