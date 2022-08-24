<?php
error_reporting();
if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

	if(empty($_REQUEST))
	{
		echo "<script>window.open('index.php','_self')</script>";
	}
	if(isset($_SESSION['client']['status']))
	{
		header("location:index.php");	
	}
	//include 'include/connection.php';
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
			  	<form  method="post">
				<h1 style=" font-family:Montserrat, sans-serif; color:#330066; " align="left">Account Recovery</h1>
                <h3 style="font-family:Montserrat, sans-serif; color:#330066;padding-bottom:20px;">Step-2</h3>
<?php	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);

		
	} 
	$r1=$_GET['r1'];
		$r2=$_GET['r2'];
?>

				  <div>
					<span>UserName</span>
					<input type="text" value="<?php echo $r1; ?>"  readonly/> 
				  </div>
				  <div>
					<span>Security Question</span>
					<input type="text" value="<?php echo $r2; ?>"  readonly/> 
				  </div>
				  <div>
					<span>Security Answer</span>
					<input type="password" name="r3" placeholder="Enter Secutiy Answer" autofocus /> 
				  </div>
				  <input type="submit" name="submit" value="STEP-3" align="middle">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
		  

</div>
</div>
		
</body>
</html>
<?php
	include 'include/connection.php';

	if(isset($_POST['submit']))
	{
		$r1=$_GET['r1'];
		$r2=$_GET['r2'];
		$r3=$_POST['r3'];
		//$email='malidevendra40@gmail.com';

		$q="select * from user where username='$r1' and sec_que='$r2'";
		$q_run=mysqli_query($con,$q) or die(mysqli_error($con));

		while($row=mysqli_fetch_array($q_run))
		{
			$sec_ans=$row['sec_ans'];
		}
		
		//$r3=md5($r3);
		if($r3==$sec_ans)
		{
			echo "<script>alert('security answer match');</script>";
			//header('location:forgot3.php');
			echo"<script>window.open('forgot3.php?r1=$r1','_self');</script>";
/* 			
	$to = $email;
	$subject = "Order Summary";
	$message = "Hey.. ".$r1." Your password- $pass !\n\n";
	//"\nOrder No: ".$ino.
	//"\nTotal Products: ".$tpro.
	//"\nAmount: ".$damo.
	//"\nOrder Date: ".$dt;			
	$headers = "From: Devendra<malidevendra40@gmail.com>";

	mail($to, $subject, $message, $headers);	 */
		}
		else
		{
			echo "<script>alert('security answer not match');</script>";
			echo"<script>window.open('forgot2.php?r1=$r1&r2=$r2','_self');</script>";
		}
	} 

?>
<?php
	include 'include/footer.php';
?>