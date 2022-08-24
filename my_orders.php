<?php
if(empty($_REQUEST))
	{
		echo "<script>window.open('my_account.php','_self')</script>";
	}
error_reporting();
include 'include/connection.php';

//getting user
$c=user();
	$get_c="select *from user where username='$c'";
	$run_c=mysqli_query($con,$get_c);
	while($row_c=mysqli_fetch_array($run_c))
	{
		$customer_id=$row_c['username'];
		$customer_name=$row_c['fname'];
	}
?>
<link href="include/table.css" rel="stylesheet" style="text/css">
				<header>
					<h3 class="head text-center">All Order Details</h3>
				</header>
	<table width="100%" style="width:100%; float:left;">
		<tr align="center">
			<th>Invoice No</th>
			<th>Amount</th>
			<th>Total Products</th>
			<th>Order Date</th>
			<th>Payment Status</th>
		</tr>
		
<?php
$i=0;

	$get_orders="select * from sales,sales_details where sales.sales_id=sales_details.sales_id and sales.username='$c' ";
	$run_orders=mysqli_query($con,$get_orders);
	while($row_orders=mysqli_fetch_array($run_orders))
	{
		$order_id=$row_orders['sales_id'];
		$due_amount=$row_orders['price'];
		$products=$row_orders['qty'];
		$date=$row_orders['sdate'];
		
	$pm=mysqli_query($con,"select *from payment_details where username='$c' AND sales_id='$order_id'");
		while($row1=mysqli_fetch_array($pm))
		{
		$status=$row1['pay_status'];
		}

		$i++;
		if($status=='Pending')
		{
			$status='Unpaid';
		}
		else
		{
			$status='Paid';
		}
?>	
	<tr align="center">
		<td><?php echo $order_id; ?></td>
		<td><?php echo $due_amount; ?></td>
		<td><?php echo $products; ?></td>
		<td><?php echo date('d-m-Y',strtotime($date)); ?></td>
		<td><?php echo $status; ?></td>
		
	</tr>	
<?php	
	}
?>	
	</table>
