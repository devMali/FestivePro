
<?php

    include 'include/connection.php';
    include 'functions/functions.php';
?>

<?php

		$user_id=user();
		$user_select="select * from user where username='$user_id'";
		$run_user=mysqli_query($con,$user_select);
		while($row=mysqli_fetch_array($run_user))
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$add=$row['address'];
			$area=$row['area_id'];
			$phone=$row['mobile_no'];
			$email=$row['email'];
		}
		//echo"<script>alert('$add')</script>";
	$q=mysqli_query($con,"select * from area");
	
	if(isset($_POST['checkout']))
	{	
		extract($_POST);
		//Getting products and no of items
		

		$total = 0;
		$sel_price="select *from cart where username='$user_id'";
		$run_price=mysqli_query($con,$sel_price);
		//$status='Pending';
		$invoice_no=mt_rand();
		$count_pro=mysqli_num_rows($run_price);
		$sgst='18%';
		$cgst='18%';
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
		
	
		$insert_details="insert into sales(sales_id,username,sdate,SGST,CGST,del_add,shipping_chrg,area_id,offer_id) 
		Values('$invoice_no','$user_id',NOW(),'$sgst','$cgst','$r3','100','$r4','2')";
		$run_details=mysqli_query($con,$insert_details);
		
		$status='Pending';
		$insert_pay="insert into payment_details(username,pay_date,pay_method,pay_status,sales_id) values('$user_id',NOW(),'$r6','$status','$invoice_no')";
		$run_pay=mysqli_query($con,$insert_pay);

		if(mysqli_affected_rows($con)==1)
	
		{
	
			echo "<script>alert('Your order is confimed..Thank you!');
			</script>";

			$q=mysqli_query($con,"select *from payment_details where sales_id='$invoice_no'") or die(mysqli_error($con));
		while($row=mysqli_fetch_array($q))
		{
			$pm=$row['pay_method'];
			if($pm=='Online Payment')
			{
			$update_payment="update payment_details set pay_status='Complete' where sales_id='$invoice_no'";
			$run_payment=mysqli_query($con,$update_payment) or die(mysqli_error($con));
			}
		}		
			
    }
	header("location:cart_empty_2.php");
	}
?>