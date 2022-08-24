
<header>
	<link href="include/table.css" rel="stylesheet" style="text/css">
	<header style="">
					<h3 class="head text-center">My Wishlist</h3>
				</header>
	
</header>
<body>
	


	

	<?php
		
		$user_id=user();
		$sql="select * from wishlist where username='$user_id'";
		$run=mysqli_query($con,$sql);

		if(mysqli_num_rows($run) > 0)
		{
			?>
			<form action="index.php" method="post" enctype="multipart/form-data">
	<table width="80%" align="center" > 
		<tr align="center"  >
			
			<th>Product(s)</th>
			<th>Price</th>
			<th>Add to cart</th>
			<th>Remove</th>			
		</tr>
		<?php
		
		while($record=mysqli_fetch_array($run))
		{
			$pro_id=$record['pro_id'];
			$pro_price="select *from product where pro_id='$pro_id'";
			$run_pro_price=mysqli_query($con,$pro_price);
			while($p_price=mysqli_fetch_array($run_pro_price))
		{
	
			$product_name=$p_price['pro_name'];
			$price=$p_price['pro_price'];
			
			$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic);

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
			}
			
			?>

	
		<tr align="center">
		
		<td><img src="images/<?php echo $pro_im; ?>" style="height:100px;
			width:100px;" /><br /><?php echo $product_name; ?></td>
			<td>&#x20B9; <?php echo $price; ?></td>
			<td><button class="btn btn-success" style="float:left; margin-top:50px; margin-bottom:50px;margin-left:90px;">
			<a href="cart.php?add_cart=<?php echo $pro_id; ?>"> Add to cart</a></button></td>
				<td><button class="btn btn-danger" style="float:left; margin-top:50px; margin-bottom:50px;margin-left:80px;">
				<a href="wish_remove.php?re=<?php echo $pro_id; ?>">Remove</a></button></td>
			
		</tr>
	
	
	<?php
		
		}
	}
	
		}
		else
		{
			?> <center><br><br><h1 style="color:red;">Your Wishlist is Empty</h1></center> <?php
		}

	?>
	</table>
	</form>
	</body>