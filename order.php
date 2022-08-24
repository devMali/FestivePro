<?php	
		error_reporting();
	if(empty($_REQUEST))
	{
		echo "<script>window.open('index.php','_self')</script>";
	}
		include 'functions/functions.php';
		include 'include/connection.php';	

//order Getting customer id
if(isset($_GET['c_id']))
{
	$customer_id=$_GET['c_id'];

	//Getting products and no of items
  	$user_id=user();
	$total = 0;
	$sel_price="select *from cart where username='$user_id'";
	$run_price=mysqli_query($con,$sel_price);
	//$status='Pending';
	$invoice_no=mt_rand();
	$count_pro=mysqli_num_rows($run_price);
	$sgst=1234567890123456;
	$cgst=1234567890123456;

		$insert_details="insert into sales(sales_id,username,sdate,SGST,CGST,del_add,shipping_chrg,area_id,offer_id) 
		Values('$invoice_no','$user_id',NOW(),'$sgst','$cgst','sdlkflkhfldhsfhdslkf','123','1','2')";
		$run_details=mysqli_query($con,$insert_details) or die(mysqli_error($con));

		while($record=mysqli_fetch_array($run_price))
		{
			$pro_id=$record['pro_id'];
			$quantity=$record['qty'];
					
			$pro_price="select *from product where pro_id='$pro_id'";
			$run_pro_price=mysqli_query($con,$pro_price);
			while($p_price=mysqli_fetch_array($run_pro_price))
			{
				$product_price=array($p_price['pro_price']);
				$values=array_sum($product_price);
				$total += $values*$quantity;
					//Getting Quntity
		
				$get_cart="select *from cart where username='$user_id' and pro_id='$pro_id'";
				$run_cart=mysqli_query($con,$get_cart);
				$get_qty=mysqli_fetch_array($run_cart);
				$qty=$get_qty['qty'];
				$sub_total=$total;

				$insert_master="insert into sales_details(sales_id,pro_id,qty,price) 
				Values('$invoice_no','$pro_id','$qty','$sub_total')";
				$run_master=mysqli_query($con,$insert_master) or die(mysqli_error($con));		

			}
		}
		

		
		if($run_master && $insert_details)
		{
			echo "<script>window.open('shipping.php?od_id=$invoice_no','_self');</script>";

		}

	}	
	?>		
