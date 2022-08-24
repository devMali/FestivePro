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
	getCatPro();
	getSubPro();					
	/* newest();
	best(); */
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