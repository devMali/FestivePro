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
                <h3 style="font-family:Montserrat, sans-serif; color:#330066;padding-bottom:20px;">Step-3</h3>
<?php	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);

		
	} 
	$r1=$_GET['r1'];
		//$r2=$_GET['r2'];
?>

<div>
					<span>UserName</span>
					<input type="text" value="<?php echo $r1; ?>"  readonly/> 
				  </div>
				  <div>
					<span>Enter New Password:</span>
					<input type="password" placeholder="At least 6 characters:" name="r2" required  autofocus/>
				  </div>
				  <div>
					<span>Enter New Password Again:</span>
					<input type="password" placeholder="At least 6 characters:" name="r3" required  autofocus/>
				  </div>
				  <input type="submit" name="submit" value="Change Password" align="middle">
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
        extract($_POST);
        
     if(strlen($r2) < 6)
        {
            echo "<script>alert('Passwords must be at least 6 characters.');
                window.open('forgot3.php?r1=$r1','_self');</script>";
        }	
        else if($r2!=$r3)
        {
            echo "<script>alert('The two passwords did not matched.');
                window.open('forgot3.php?r1=$r1','_self');</script>";
        }
        else
        {
            $enc_pass=md5($r2);
        $update_pass="update user set password='$enc_pass' where username='$r1'";
        $run_pass=mysqli_query($con,$update_pass);
            echo "<script>alert('Your Password has been changed');
                window.open('login.php','_self');</script>";
        }
        
    }
    

?>
<?php
	include 'include/footer.php';
?>