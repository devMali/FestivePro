	<!-- header-section-starts -->
		<?php
		include 'include/header.php';
		include 'include/connection.php';
	?>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>




	<!-- header-section-ends -->
		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
			
				<div class="products-grid">
<div class="products">
				<div class="product-listy">
					<h2>Our Products</h2>
					<ul class="product-list">
<?php
		$get_subCats="select * from subcategory s,category c where s.cat_id=c.cat_id";
		$run_subCats=mysqli_query($con,$get_subCats);
			while($row_subCats=mysqli_fetch_array($run_subCats))
			{
				$subCat_id=$row_subCats["sub_id"];
				$subCat_name=$row_subCats["sub_name"];

				echo "<li><a href='products.php?subCat=$subCat_id'>$subCat_name</a></li>";
			}
				
?>					
					</ul>
				</div>


			</div>
				<header>
					<h3 class="head text-center">Product Details</h3>
				</header>
				
<!--getproductsfunction-->
<?php
if(isset($_GET['pro_id']))
{
	$product_id = $_GET['pro_id'];
	
	
	$get_pic="select i.* from image i,product p where p.pro_id='$product_id' and p.pro_id=i.pro_id";	
	$run_pic=mysqli_query($con,$get_pic);

	while($row_pic=mysqli_fetch_array($run_pic))
	{
		$pro_im=$row_pic['image_name'];
	}

	$get_prod="select *from product where pro_id = '$product_id'";					
	$run_prod=mysqli_query($con,$get_prod);
	while($row_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_prod['pro_id'];
		$pro_name=$row_prod['pro_name'];
		$pro_de=$row_prod['pro_desc'];	
		$pro_unit=$row_prod['unit_id'];
		$pro_price=$row_prod['pro_price'];		
		$pro_quantity=$row_prod['stock'];		

		$path="images/$pro_im";
		
?>
<div class="new-product">				
			<div class="col-md-5 zoom-grid">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo $path; ?>">
								<div class="thumb-image"> <img src="<?php echo $path;?>" height="50px;" width="100px;" data-imagezoom="true" class="img-responsive" alt="" /> </div>
							</li>
						</ul> 
					</div>
				</div>				
				
				<div class="col-md-7 ">
	<div class="span span1">
			<p class="left">Name:</p>
			<p class="right"><?php echo $pro_name; ?></p>
			<div class="clearfix"></div>
	</div>
	<div class="span span2">
			<p class="left" style=" padding-bottom:10px;">Description:<br></p>
			<p class="right"><?php echo $pro_de; ?></p>
			<div class="clearfix"></div>
	</div>
	<div class="span span3">
			<p class="left">Price:</p>
			<p class="right"><?php echo $pro_price; ?></p>
			<div class="clearfix"></div>
	</div>
	<div class="span span4">
			<p class="left">In Stock:</p>
			<p class="right"><?php echo $pro_quantity; ?></p>
			<div class="clearfix"></div>
	</div>
	
	<a href="cart.php?add_cart=<?php echo $pro_id; ?>">
<button style="float:left; margin-top:10px; margin-bottom:80px;" class="btn btn-info">Add to cart</button></a>
<a href="Wishlist.php?my_fvrt=<?php echo $pro_id; ?>">
<button style="margin-top:10px;margin-left:90px; margin-bottom:80px;" class="btn btn-info">Add to Wishlist</button></a>
<a href="index.php">
<button style="float:right; margin-top:-115px; margin-bottom:80px;" class="btn btn-info">Home</button></a>

				<script src="js/imagezoom.js"></script>
					<!-- FlexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $(".flexslider").flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				</div>
					
<?php
	}
}
?>	
<?php

$sql="select distinct s.sub_id from category c,subcategory s,product p where c.cat_id=s.cat_id and s.sub_id=p.sub_id and p.pro_id='$product_id'";
$run=mysqli_query($con,$sql);

while($data=mysqli_fetch_assoc($run))
{
	$see=$data['sub_id'];
}
echo"
<a href='products.php?subCat=$see' ><button style='margin-bottom:10px;float:right;' class='btn btn-danger'>Related Products..!</button></a>";
 ?>
<!--//productsfunction-->
<br />
<br /><br/>

<!--feedback-->
<br/><br/><br/><br/>
     <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab" style="display:block;">
        <li class="test-class active"><a class="deco-none" style="float:left;margin-top:50px;"> Feedback</a></li>
      </ul>

<?php
	
	if(isset($_POST['feed']))
	{
		$user_id=user();
		extract($_POST);
		//$r1=$_POST['r1'];
		$feed_insert="insert into feedback(pro_id,feedback,username,feed_date) values('$pro_id','$r1','$user_id',NOW())";
		$feed_run=mysqli_query($con,$feed_insert) or die(mysqli_eroor($con));	
		if(mysqli_affected_rows($con)==1)
		{
		echo "<script>alert('Thanks for giving a Feedback');
			window.open('details.php?pro_id=$pro_id','_self');</script>";
		}
	}
	
		$feed_select="select *from feedback where pro_id='$pro_id'";
		$run_feed=mysqli_query($con,$feed_select);
		while($row_feed=mysqli_fetch_array($run_feed))
		{
			$f_id=$row_feed['feed_id'];
			$p_id=$row_feed['pro_id'];
			$feedback=$row_feed['feedback'];
			$user=$row_feed['username'];
			$feed_date=$row_feed['feed_date'];
			
			$user_select="select *from user where username='$user'";
			$run_user=mysqli_query($con,$user_select);
			while($row=mysqli_fetch_array($run_user))
			{
				$user_name=$row['fname'];
			}
?>

<div class="media response-info">
	<div class="media-left response-text-left">
		<img class="media-object" src="images/defualt_user.png" style="height:50px; width:50px;"  />
			<h5><a href="#"><?php echo $user_name; ?></a></h5>
	</div>
	<div class="media-body response-text-right">
		<p><?php echo $feedback; ?></p>
			<ul>
				<li><?php echo date('d-m-Y ',strtotime($feed_date)); ?></li>
			</ul>		
	</div>
</div>
<hr  />
<?php
		}
if( isset($_SESSION['client']['status']))
{
	?>		
	<div class="contact-form" style="margin-top:20px;">
	<form action="details?pro_id=<?php echo $pro_id; ?>" method="post">
		<textarea placeholder="Enter Your Feedback" name="r1" style="height:100px; width:800px; resize:none" required></textarea>
		<input type="submit" name="feed" value="SUBMIT" >
	</form>
</div>


<?php
}	
?>

	
<!--//feedback-->
				</div>	

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
