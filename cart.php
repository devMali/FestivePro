
	<!-- header-section-starts -->
	<?php
		include 'include/header.php';
		include 'include/connection.php';	

		
	?>
	<!-- header-section-ends -->

		<div class="container">
			<div class="main-content">
<link href="include/table.css" rel="stylesheet" style="text/css">
			
				<div class="products-grid">
				<header>
					<h3 class="head text-center">MY SHOPPING BAG (<?php items(); ?>)</h3><br />
				</header>
<!--getproductsfunction-->
<form action="cart" method="post" enctype="multipart/form-data">
	<table width="80%" align="center">
		<tr align="center">
			<th>Remove</th>
			<th>Product(s)</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total Price</th>
		</tr>
<?php	

$user_id=user();


	$total = 0;
	$sel_price="select * from cart where username='$user_id'";
	$run_price=mysqli_query($con,$sel_price);
	$itemss=mysqli_num_rows($run_price);
	if($itemss==0)
	{
		echo "<script>window.open('".$_SERVER['HTTP_REFERER']."','_self');
		alert('Your cart is empty');</script>";
	}
	while($record=mysqli_fetch_array($run_price))
	{
		$pro_id=$record['pro_id'];
		$quantity=$record['qty'];
		
		$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
		$run_pic=mysqli_query($con,$get_pic);

		while($row_pic=mysqli_fetch_array($run_pic))
		{
			$pro_im=$row_pic['image_name'];
		}

		$pro_price="select * from product where pro_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price=array($p_price['pro_price']);
			$product_name=$p_price['pro_name'];
			$image=$pro_im;
			$price=$p_price['pro_price'];
			$pq=$p_price['stock'];
				
			$values=array_sum($product_price);
			$total += $values*$quantity;
			
?>		
		<tr align="center">
			<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
			<td><?php echo $product_name; ?><br /><img src="images/<?php echo $image; ?>" style="height:100px;
			width:100px;" /></td>
			<td>&#x20B9; <?php echo $price; ?></td>

			<input type="hidden" name="id[]" value="<?php echo $pro_id; ?>" />
			<td>
			<input type="number" name="qty[]" value="<?php echo $quantity; ?>" size="3" />
			</td>
			
			<?php
				if(isset($_POST['qty_bt']))
				{
					$qty=$_POST['qty'];
					
					$ids=$_POST['id'];
					$array=array_combine($ids,$qty);
					
					foreach($array as $i => $q)
					{
					if($q>$pq)
					{
					 echo "<script>alert('Sorry we have only ".$pq." item(s) of selected Product');
					 window.open('cart.php','_self');</script>";
					}
					else if($q<=0)
					{
					 echo "<script>alert('Please,Enter 1 or greater values in quantity');
					 window.open('cart.php','_self');</script>";
					}
					else
					{
						$insert_qty="update cart set qty='$q' where pro_id='$i' AND username='$user_id'";
						$run_qty=mysqli_query($con,$insert_qty) or die(mysqli_error($con));
						
						$total=$total*$q;
					
						if($run_qty)
						{
							echo "<script>window.open('cart.php','_self');</script>";
						}
					}
					}
				}
			?>
				
			<td>&#x20B9; <?php echo $price*$quantity; ?></td>
		</tr>	
<?php
		}
	}
?>
		<tr align="center">
			<td></td>
			<td></td>
			<td></td>
			<td align="right">Sub Total:</td>
			<td>&#x20B9; <?php echo $total; ?></td>
		</tr>
		<tr align="center">
			<td><input type="submit" name="update" value="Remove" /></td>
			<td colspan="2"><input type="submit" name="continue" value="Continue Shopping" /></td>
			<td><input type="submit" name="qty_bt" value="Update Qauntity" /></td>
			<td><a href="checkout.php"><input type="button" name="btn" value="Checkout"  /></a></td>
		</tr>
	</table>
</form>			
<?php
if(isset($_POST['update']))
{
	foreach($_POST['remove'] as $remove_id)
	{
		$delete_products="delete from cart where pro_id='$remove_id' AND username='$user_id'";
		$run_delete=mysqli_query($con,$delete_products);
		
		if($run_delete)
		{
			echo "<script>alert('Item(s) successfully removed');
			window.open('index','_self');</script>";
		}
	}
}
if(isset($_POST['continue']))
{
			echo "<script>window.open('index.php','_self');</script>";
}
?>
<!--//productsfunction-->
						
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
		<!-- content-section-ends-here -->
		
		<?php
			include 'include/footer.php';
		?>
</body>
</html>