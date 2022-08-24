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
		//header("location:index.php");	
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

				   <div class="account_grid">
			   
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<form  method="post">
				
                

<link href="include/table.css" rel="stylesheet" style="text/css">
<table width="100%" style="width:50%; float:center;">
		<tr align="center">
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Total Price</th>
		</tr>
	<?php
	$r1=$_GET['r1'];
	
    $q="select * from sales_details where sales_id='$r1'";
    $q_run=mysqli_query($con,$q);

    while($row=mysqli_fetch_array($q_run))
    {
        $pro_id=$row['pro_id'];
        $qty=$row['qty'];
        $price=$row['price'];
		
		$q1="select * from product where pro_id='$pro_id'";
		$q1_run=mysqli_query($con,$q1);
	while($row=mysqli_fetch_array($q1_run))
	{
		$pro_name=$row['pro_name'];
	}
?>
<tr align="center">
		<td><?php echo $pro_name; ?></td>
		<td><?php echo $qty; ?></td>
		<td><?php echo $price; ?></td>
		
	</tr>	
	
<?php	
	}

	//include 'include/footer.php';
?>	
</table>
<br/>
<div class="login-page">
<div>
					<p style="color:red;">Please Enter The Reason:</p>
					<input type="text" name="reason" autofocus>
				  </div>
				  <input type="submit" name="submit" value="Return" align="middle">
</div>
	</body>		  

</html>
<?php
	include 'include/connection.php';

	if(isset($_POST['submit']))
	{
		$q="select * from sales_details where sales_id='$r1'";
		$q_run=mysqli_query($con,$q);
		
		$reason=$_POST['reason'];
		$ret_id=mt_rand();

		while($row=mysqli_fetch_array($q_run))
		{
		
			$q="insert into sales_return values('$ret_id',NOW(),'$r1')";
			$q1_run=mysqli_query($con,$q);

			$q="insert into sales_return_details values('$ret_id','$pro_id','$qty','$reason')";
			$q1_run=mysqli_query($con,$q);// or die(mysqli_error($con));

			if(mysqli_affected_rows($con))
			{
				echo"<script>alert('Product Return Successfully');
				window.open('my_account.php','_self');</script>";
			
			}
			else
			{
				echo"<script>alert('Error Occured');</script>";
			}
		}
	}
?>
