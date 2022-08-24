	<!-- header-section-starts -->
	<?php
		include 'include/header.php';
		include 'include/connection.php';	
	?>
	<!-- header-section-ends -->
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
			   			
				<div class="products-grid">
				<header>
					<h3 class="head text-center">All Products</h3>
				</header>
<!--getproductsfunction-->
<?php	
$start=0; // limit=1,2;
$limit=6; // limit=2,2;
$t=mysqli_query($con,"select * from product");
$total=mysqli_num_rows($t);
if(isset($_GET['id']))
{
	$id=$_GET['id'];	//$start=2*1;
	$start=($id-1)*$limit;	//$start=2;
}
else
{
	$id=1;
}
$page=ceil($total/$limit);

	$get_prod="select * from product limit $start,$limit";					
	$run_prod=mysqli_query($con,$get_prod);
	while($row_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_prod['pro_id'];
		$pro_name=$row_prod['pro_name'];
		$pro_de=$row_prod['pro_desc'];	
		$pro_unit=$row_prod['unit_id'];
		$pro_price=$row_prod['pro_price'];		

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
					
?>	


<!--//productsfunction-->
						
					<div class="clearfix"></div>
				</div>
			</div>

<br />
<div align="center" style="display:block;">
<nav>
  <ul class="pagination pagination-lg">
	 <?php if($id > 1) {?> <li><a href="?id=<?php echo ($id-1) ?>">Previous</a></li><?php }?>
	 <?php
	 for($i=1;$i <= $page;$i++){
	 ?>
		<li><a href="?id=<?php echo $i ?>"><?php echo $i;?></a></li>
	  <?php
	 }
	  ?>
	<?php if($id!=$page) //3!=4
	{?> 
	  <li><a href="?id=<?php echo ($id+1); ?>">Next</a></li>
	<?php }?>
 </ul>
</nav>
</div>					
		</div>
		<!-- content-section-ends-here -->
		
		<?php
			include 'include/footer.php';
		?>
</body>
</html>