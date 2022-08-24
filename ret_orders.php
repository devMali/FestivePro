<!DOCTYPE html>
<html>
<body align="center">
	<!-- header-section-starts -->
	
	<!-- header-section-ends -->
	
		<!-- content-section-starts -->
	
	<div class="content">
	<div class="container" style="margin-left:150px;">
    <header style="margin-right:650px;">
					<h3 class="head text-center">Return Order</h3>
				</header>
		<!--<center><img src="include/logo.png" alt="" style=" padding-top:10px; padding-bottom:30px;" /></center>-->
		<br /><br />
		<div class="login-page">	    
				   <div class="account_grid">
			   
			   <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  	<form  method="post">
				<h1 style=" font-family:Montserrat, sans-serif; color:#330066; " align="left"></h1>
<?php	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	} 
?>

				  <div>
					<span>Enter Invoice No;</span>
					<input type="text" placeholder="Invoice no:" name="r1" required autofocus> 
				  </div>
				  <input type="submit" name="submit" value="SUBMIT" align="middle">
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
	//include 'functions/functions.php';
    //$c=user();
	if(isset($_SESSION['client']['status']))
	{
		$c=user();
		//echo"<script>alert('$c');</script>";
	}
	
	if(isset($_POST['submit']))
    {
        $r1=$_POST['r1'];

		$q="select * from sales,sales_return where sales.sales_id=sales_return.sales_id and sales_return.sales_id='$r1'";
        $q_run=mysqli_query($con,$q) or die(mysqli_error($con));

		 if(mysqli_affected_rows($con)==1)
		{
			echo"<script>alert('Order already returned...!');
			window.open('my_account.php','_self');</script>";
		}

        $q="select * from sales,payment_details where sales.sales_id=payment_details.sales_id and sales.sales_id='$r1' and payment_details.pay_status='Complete' and sales.username='$c'";
        $q_run=mysqli_query($con,$q);

        while($row=mysqli_fetch_array($q_run))
        {
            $in=$row['sales_id'];
        }
		
		if(mysqli_affected_rows($con)==1)
        {
            
            //echo"<script>alert('invoice number found');</script>";
            echo"<script>window.open('ret_orders2.php?r1=$r1','_self');</script>";

        }
        else
        {
            echo"<script>alert('invoice number not found');</script>";
        }
	//}

    }
?>
