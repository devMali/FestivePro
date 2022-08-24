<?php
	session_start();
	error_reporting();
	if(isset($_SESSION['client']['status']))
	{
		header("location:index.php");
	}
	include 'include/connection.php';
	$q=mysqli_query($con,"select * from city_details");
?>

<!DOCTYPE html>
<html>
<head>
<title>FestoFest</title>
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
	
		<!-- registration-form -->
<div class="registration-form">
	<div class="container">
		<!--<center><img src="include/logo.png" alt="" /></center>-->
		<div class="registration-grids">	
		<div class="reg-form">
				<div class="reg" align="center">
					 <form action="register_process.php" method="post" enctype="multipart/form-data">
<h1 style=" font-family:Montserrat, sans-serif; color:#330066; padding-bottom:20px" align="left">Create Account</h1>	
<?php
	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}

?>
				
		<ul>
			<li class="text-info">User name 
			 <input type="text" placeholder="User name: atleast 3 character" name="r1" pattern="[A-Za-z ]{3,15}"
			 title="Must contain atleast 3 characters and no special symbols" required="" autofocus>
			</li>
		</ul>
		<ul>
			<li class="text-info">Address 
			<textarea placeholder="Address: atleast 15 characters" name="r2" rows="4" required=""></textarea>
			</li>
		</ul>				 
		<ul>
			<li class="text-info">City 
			<select placeholder="last name:" name="r3" required>
			<?php
			while($row=mysqli_fetch_array($q))
			{
			?>
			<option value="<?php echo $row['City_id']; ?>"><?php echo $row['City_name'] ?></option>
			<?php
			}
			?>
			</select>
			</li>
		</ul>
		<ul>
			<li class="text-info">Mobile No 
			<input type="text" placeholder="Mobile no:" name="r4" required="" pattern="[0-9]{10}"
			title="Must contain numeric value" autofocus maxlength="10">
			</li>
		</ul>
		<ul>
			<li class="text-info">E-mail 
			<input type="email" placeholder="Email address:" name="r5" required="">
			</li>
		</ul>
		<ul>
			<li class="text-info">Password 
			<input placeholder="At least 6 characters:" type="password" name="r6" minlength="6" maxlength="10" required="">
			</li>
		</ul>
		<ul>
			<li class="text-info">Retype Password 
			<input placeholder="Retype password:" type="password" name="r7" minlength="6" maxlength="18" required="">
			</li>
		</ul>
		<ul style="margin-bottom:10px;">		
			<input type="submit" name="submit" value="REGISTER NOW">
		</ul>
		</form>
				 </div>
				 
		   <div align="center" style=" color:#000033; padding:10px; size:100%; font-size:18px">
		   Already have an Account?
		   <form action="login.php" method="post" style="padding:20px;">
		   	<input type="submit" value="Sign In" />
		   </form>
			</div>
		
		   </div>	
		</div>
	</div>
</div>
<!-- registration-form -->

		
		
</body>
</html>