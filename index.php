	<!-- header-section-starts -->
	<?php
		include 'include/header.php';
		include 'include/connection.php';		
	
	?>
	<!-- header-section-ends -->
	<!--<div class="banner">
		<div class="container">
<div class="banner-bottom">
	<div class="banner-bottom-left">
		<h2>B<br>U<br>Y</h2>
	</div>
	<div class="banner-bottom-right">
		<div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					<li>
<div class="banner-info">
	<h3>New Arrivals</h3>
		<p><a href="products.php?newa" style="font-size: 20px;font-weight:300;color:#816263; margin-left: 150px;">
			Start your shopping here...</a>
		</p>
</div>
							</li>
							<li>
<div class="banner-info">
	<h3>Best Products</h3>
		<p><a href="products.php?be_pro" style="font-size: 20px;font-weight:300;color:#816263; margin-left: 150px;">
			Start your shopping here...</a>
		</p>
</div>
							</li>
						</ul>
						
					</div>
					<!--banner-->
	  			<script src="js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager:true,
			        nav:false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
	</div>
	<div class="clearfix"> </div>
</div>
	<!--<div class="shop">
		<a href="all_products.php">CLICK HERE FOR ALL PRODUCTS</a>
	</div>-->
	</div>
		</div>

		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">

<style type="text/css" media="all">
a{
	color:#816263;
	display:inline;
	float:left;
}
div.polaroid img.imcat
{
	margin-left:150px;
	height:200px;
	width:350px;
}
div.polaroid img.imcat:hover
{
    -webkit-transform: rotateY(180deg);
    -webkit-transition-duration: 1.5s;
    -webkit-transition-delay: now;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
}
div.polaroid {
  color:#816263;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
div.cat {
	text-align:center;
	margin-left:80px;
  	padding: 10px 20px;
}
</style>

				<div class="products-grid">
				<hr />
				<header>
					<h3 class="head text-center">Shop by Category</h3>
				</header>
				<hr />
<div class="polaroid">
<?php	

	$u=user();
	
		$get_cats="select * from category";
		$run_cats=mysqli_query($con,$get_cats);
			while($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats["cat_id"];
				$cat_name=$row_cats["cat_name"];
			}	
				echo "<a href='products.php?Cat=1'>
				<img src='include/flag.jpg' class='imcat' title='National festivals' />
				<div class='cat'>Republic day/Independence day Products</div></a>";

				echo "<a href='products.php?Cat=3'>
				<img src='include/fireworks.jpg' class='imcat' title='Diwali' />
				<div class='cat'>Diwali Products</div></a>";

				echo "<a href='products.php?Cat=4'>
				<img src='include/holi.jpg' class='imcat' title='Holi' />
				<div class='cat'>Holi Products</div></a>";
				
				echo "<a href='products.php?Cat=5'>
				<img src='include/kites.png' class='imcat' title='Makarsankranti' />
				<div class='cat'>Makarsankranti Products</div></a>";
				
				echo "<a href='products.php?Cat=6'>
				<img src='include/raksha.jpg' class='imcat' title='Rakshabandhan' />
				<div class='cat'>Rakshabandhan Products</div></a>";
				
				echo "<a href='products.php?Cat=7'>
				<img src='include/Navratri.jpg' class='imcat' title='Navratri' />
				<div class='cat'>Navratri Products</div></a>";
				
				echo "<a href='products.php?Cat=9'>
				<img src='include/christmas.jpg' class='imcat' title='christmas' />
				<div class='cat'>Christmas Products</div></a>";

?>		


</div>
				<header>
					<h3 class="head text-center"></h3>
				</header>
<!--getproductsfunction-->
<?php	
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