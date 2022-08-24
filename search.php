	<!-- header-section-starts -->
	<?php
	if(empty($_REQUEST))
	{
		echo "<script>window.open('index.php','_self')</script>";
	}
		include 'include/header.php';
		include 'include/connection.php';		
	?>
	<!-- header-section-ends -->

		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
			
				<div class="products-grid">
				<header>
					<h3 class="head text-center"></h3>
				</header>
<!--getproductsfunction-->
<?php	
if(isset($_GET['user_query']))
{
	$user_keyword = $_GET['user_query'];
	$get_prod="select *from product where pro_name like '%$user_keyword%'";					
	$run_prod=mysqli_query($con,$get_prod);
		$count = mysqli_num_rows($run_prod);
	if($count==0)
	{
		echo "<h2> NO Products found!</h2>";
	}
	while($row_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_prod['pro_id'];
		$pro_name=$row_prod['pro_name'];
		$pro_price=$row_prod['pro_price'];		
		$pro_de=$row_prod['pro_desc'];	
		$pro_unit=$row_prod['unit_id'];
		
		$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic);

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
			}
				echo "	<div class='col-md-4 product simpleCart_shelfItem text-center'>
						<a href='#'><img src='images/$pro_im' alt='' /></a>
						<div class='mask'>
							<a href='details.php?pro_id=$pro_id'>Quick View</a>
						</div>
						<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
						<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
						</div>";
					
	}
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