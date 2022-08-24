<?php
	error_reporting();
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

		include 'functions/functions.php';
		include 'include/connection.php';	
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--webfont-->
<!-- for bootstrap working -->
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- cart -->
	<script src="js/simpleCart.min.js"> </script>
<!-- cart -->
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<style type="text/css">
	.title{
		text-align:center;
		font-size:50px;
		color:red;
		text-shadow: 3px 3px 3px #ababab;
		font-family:'Sofia',sans-serif;
		font-weight:bold;
	}
</style>
</head>
<body>

<div class="header">

		<div class="header-top-strip">
		<div class="container-fluid title" >FestivePro					
<?php 
if( isset($_SESSION['client']['status']))
{
	$u=user();

	$q="select isAdmin from user where username='$u'";
	$run=mysqli_query($con,$q);

	while($row=mysqli_fetch_array($run))
	{
		$s=$row['isAdmin'];
	}

	if($s=='1')
	{
		echo"<a href='admin/index.php'><button name='button' class='btn btn-primary' value='Open Dashboard' style='float:left;'>Open Dashboard</button></a>";
	}

}

?>
		<div class="container-fluid" style="margin-left:300px;color:darkblue;font-size:20px;">-Festival's Products On Web</div>
		</div>
					<br/>
			<div class="container">
				<div class="header-top-left">

<?php
if( isset($_SESSION['client']['status']))
{
	
echo'<ul><li><a><span class="glyphicon glyphicon-user"> </span>Loged In As <span style="text-transform:capitalize">'.$_SESSION['client']['r1'].'</span>'.'</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-lock"> </span>Logout</a></li></ul>';			

					
}	
else
{

	  echo  '<ul><li><a href="login.php"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
	  <li><a href="register.php"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li></ul>';				
	
}
?>	

				</div>

<div class="search">
<form method="get" action="search.php" id="search" enctype="multipart/form-data">
  <input name="user_query" type="text" size="40" placeholder="Search..." />
</form>
</div>
				
				<div class="header-right">
						<div class="cart box_1">
							<a href="cart.php">
							<?php cart(); ?>
<?php if(isset($_SESSION['client']['status']))
{?>					
						<h3> <span> &#x20B9;&nbsp;<?php total_price(); ?>.00 </span> (<span> <?php items(); ?> </span>)	
						<span class="glyphicon glyphicon-shopping-cart"></span></h3>
<?php
}
?>
							</a>
							<!--<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>-->
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
		<!-- header-section-ends -->
		
		
			<div class="banner-top">
		<div class="container">
				<nav class="navbar navbar-default" role="navigation">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
				<!--<div class="logo">
					<h1><a href="index.php"><img src="include/logo.png" alt="" /></a></h1>
				</div>-->
	    </div>
	    <!--/.navbar-header-->
	
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="float:right;">
	        <ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
		    	<li><a href="all_products.php">ALL PRODUCTS</a></li>
				<li><a href="my_account.php">My Account</a></li>
				<?php if(isset($_SESSION['client']['status'])){?>
				<li><a href="cart.php">Shopping Cart</a></li>
				<?php }?>
				<li><a href="contact.php">CONTACT US</a></li>
	        </ul>
	    </div>
	    <!--/.navbar-collapse-->
	</nav>
	<!--/.navbar-->
</div>
</div>
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
