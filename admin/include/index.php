		<!-- header-starts -->
			<?php
				error_reporting();
				include_once 'include/header.php';
				include 'include/connection.php';
			?>
					<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
					
						<div class="panel panel-widget">

<div class="tab-main">
	<!--/tabs-inner-->
	<div class="tab-inner">
		<div id="tabs" class="tabs">
			<!--<h2 class="inner-tittle">Responsive Horizontal Tabs </h2>-->
				<div class="graph">
<nav>
<ul>
	<li class="tab-current"><a href="#section-1" class="icon-shop"><span>Customers</span></a></li>
	<li><a href="#section-2" class="icon-cup"><span>Products</span></a></li>
	<li><a href="#section-3" class="icon-food"><span>Order</span></a></li>
</ul>
</nav>

<div class="content tab">
	<section id="section-1" class="content-current">
		<div class="mediabox">
			<!--<i class="fa fa-shopping-cart"></i>-->
<?php
$sq="select *from registration";
$rq=mysqli_query($con,$sq);
$nc=mysqli_num_rows($rq);
?>
			<h3>Total number of customers are <?php echo $nc; ?>.</h3>
<?php
$db1=mysqli_query($con,"select *from registration r,city_details c where r.City_id=c.City_id order by User_id");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table">
  <tr>
    <th>User Id</th>
    <th>User Name</th>
    <th>Address</th>
    <th>City Name</th>
    <th>Mobile no</th>
    <th>E-mail</th>	
    <th>Password</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db1))
  {
  ?>
  <tr>
    <td><?php echo $row["User_id"];?></td>
		<td><?php echo $row["User_name"];?></td>
		<td><?php echo $row["Address"];?></td>
		<td><?php echo $row["City_name"];?></td>
		<td><?php echo $row["Phone_no"];?></td>
		<td><?php echo $row["Email"];?></td>
		<td><?php echo $row["Password"];?></td>
  </tr>
  <?php
  }
   ?>
</table>
			
		</div>
	</section>

	<section id="section-2">
		<div class="mediabox">
			<!--<i class="fa fa-suitcase"></i>-->
<?php
$sp=mysqli_query($con,"select *from product_details");
$np=mysqli_num_rows($sp);
?>	
				<h3>Total number of products are <?php echo $np; ?>.</h3>
<?php
$sc=mysqli_query($con,"select *from Category");
?>
	</div>
	</section>
	
	<section id="section-3">
		<div class="mediabox">
			<!--<i class="fa fa-sitemap"></i>-->
<?php
$so=mysqli_query($con,"select *from order_master");
$no=mysqli_num_rows($so);
?>
				<h3>Total number of orders are <?php echo $no ?>.</h3>
<?php
$db=mysqli_query($con,"select *from order_master o,registration r,Product_details p where o.User_id=r.User_id and o.Product_id=p.Product_id order by Order_id");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table">
  <tr>
    <th>Order Id</th>
	<th>Order Date</th>
    <th>User Name</th>
	<th>Invoice No</th>
	<th>Product Name</th>
	<th>Quntity</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
    <td><?php echo $row["Order_id"];?></td>
		<td><?php echo date("d-m-Y", strtotime($row["Order_date"]));?></td>
		<td><?php echo $row["User_name"];?></td>
		<td><?php echo $row["Invoice_no"];?></td>
		<td><?php echo $row["Product_name"];?></td>
		<td><?php echo $row["Quantity"];?></td>
  </tr>
  <?php
  }
   ?>
</table>

		</div>
	</section>
			</div><!-- /content -->
		</div>
		<!-- /tabs -->
	</div>
</div>	
<script src="js/cbpFWTabs.js"></script>
	<script>
		new CBPFWTabs( document.getElementById( 'tabs' ) );
	</script>


							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt"></div>
								</div>
								<!-- status -->
							</div>
						</div>
					
					
					</div>
			
						<!--//area-->
							<!--tasks-->
							<!--latest products-->
					<div class="content-top">
						
		<!--realtime updates-->
		<!--chrome safari	-->	
		<!--area-->					
				<div class="area">
					
					<!--linemulti chart-->
					<!--stackedbar chart-->
						<!--//area-->
		<!--<div class="fo-top-di">-->
			<!--footer-starts-->
			<?php
				include_once 'include/footer.php';
			?>
				</div>			

			<!--footer-ends-->
		<!--</div>-->
			</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<!--slidebar-starts-->
			<?php
				include_once 'include/slidebar.php';
			?>
				<!--slidebar-ends-->
