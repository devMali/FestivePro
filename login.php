<?php
	error_reporting();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	if(isset($_SESSION['client']['status']))
	{
		header("location:index.php");	
	}
	include 'include/header.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>FestivePro</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eshop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
</head>
<body>
	<!-- header-section-starts -->
	
	<!-- header-section-ends -->
	
		<!-- content-section-starts -->
	
	<div class="content">
	<div class="container" align="center">
			
		<!--<center><img src="include/logo.png" alt="" style=" padding-top:10px; padding-bottom:30px;" /></center>-->
		<br /><br />
		<div class="login-page">	    
				   <div class="account_grid">
			   
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<form action="login_process" method="post">
				<h1 style=" font-family:Montserrat, sans-serif; color:#330066; padding-bottom:20px" align="center">Login</h1>	
<?php	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	} 
?>

				  <div>
					<span>Username</span>
					<input type="text" placeholder="username" name="r1" required autofocus> 
				  </div>
				  <div>
					<span>Password</span>
					<input type="password" placeholder="password" name="r2" required> 	
				  </div>
				  <input type="submit" name="submit" value="Login" align="middle">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
		   <table>
		   <tr>
		   <td><div style=" color:#000033;margin-left:50px; padding:10px; size:100%; font-size:18px">
		   Forgot Password..?
		   <form action="forgot.php" method="post" style="margin-right:50px;padding:20px;" >
		   	<a href="forgot.php"><button type="button" class="btn btn-danger" >Get Password</button></a>
		   </form>
		   </div></td>
		   <td><div style=" color:#000033; padding:10px; size:100%; font-size:18px">
		   New to FestivePro?
		   <form action="register.php" method="post" style="margin-left:0px;padding:20px;" >
		   <a href="register.php"><button type="button" class="btn btn-danger" >Create Account</button></a>
		   </form>
		   </div></td>
		   </tr>
		   </table>

</div>
</div>
		
</body>
</html>
<?php
	include 'include/footer.php';
?>