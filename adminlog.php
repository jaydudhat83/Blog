<?php
$result="";
 
if(isset($_GET["signinbtn"]))
{
	$ids=$_GET["email"];
    $psswd=$_GET["pass"];
	$flag=0;
	$data=mysqli_connect("localhost","root","","blog") or die();
	$db=mysqli_query($data,"SELECT `emailid` FROM signin WHERE `admin`='1'");
	foreach ($db as $id) {
		if($id['emailid']==$ids){
			$flag=1;
			break;
		}
	}
	if($flag==1){
		$db=mysqli_query($data,"SELECT `password` FROM signin WHERE `emailid`='$ids' and `admin`='1'");
		$db=mysqli_fetch_assoc($db);
		if($db["password"]==$psswd)
		{
			setcookie("user",$ids,time()+1*60*60);
			header("location:admin.php");
		}
		else{
			 
			echo "<script type='text/javascript'>alert('Email or Password Incorrect');</script>";
		}
	}
	else{
		 
		echo "<script type='text/javascript'>alert('You Are not Admin Yet!!');</script>";
	}

}

?>

 




<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login  </title>

        
         
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
                            <h1><strong>Admin </strong> Login  </h1>
                             
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login </h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom" style="align-content: center;">
				                    <form role="form" action="adminlog.php " method="get" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username" name=>Username</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" class="btn" name="signinbtn">Sign in!</button>
				                        
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