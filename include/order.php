<?php	
		error_reporting();
		include 'functions/functions.php';
		include 'include/connection.php';	

//Getting customer id
if(isset($_GET['c_id']))
{
	$customer_id=$_GET['c_id'];

	//Getting products and no of items
  	$user_id=user();
	$total = 0;
	$sel_price="select *from cart where User_id='$user_id'";
	$run_price=mysqli_query($con,$sel_price);
	//$status='Pending';
	$invoice_no=mt_rand();
	$count_pro=mysqli_num_rows($run_price);
	while($record=mysqli_fetch_array($run_price))
	{
		$pro_id=$record['Product_id'];
		$quantity=$record['Quantity'];
				
		$pro_price="select *from Product_details where Product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price=array($p_price['Product_price']);
			$values=array_sum($product_price);
			$total += $values*$quantity;
		}
	}
	//Getting Quntity
	
	$get_cart="select *from cart where User_id='$user_id'";
	$run_cart=mysqli_query($con,$get_cart);
	$get_qty=mysqli_fetch_array($run_cart);
	$qty=$get_qty['Quantity'];
	$sub_total=$total;
	
	$insert_master="insert into order_master(Order_date,User_id,Invoice_no,Product_id,Quantity) 
	Values(NOW(),'$customer_id','$invoice_no','$pro_id','$qty')";
	$run_master=mysqli_query($con,$insert_master);

	$insert_details="insert into order_details(User_id,Due_amount,Invoice_no,Total_products,Order_date) 
	Values('$customer_id','$sub_total','$invoice_no','$count_pro',Now())";
	$run_details=mysqli_query($con,$insert_details);

	if($run_master && $insert_details)
	{
		echo "<script>alert('Redirecting to Shipping....');
			window.open('shipping.php?od_id=$invoice_no','_self');</script>";

	}

}
?>		