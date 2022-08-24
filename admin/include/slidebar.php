<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
<li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
		
<li><a href="category.php"><i class="fa fa-list"></i> <span>Category</span></a></li> 										

<li id="menu-academico" ><a href="Subcategory.php"><i class="fa fa-list"></i> <span>Sub Category</span></a></li>

<li id="menu-academico" ><a href="unit.php"><i class="fa fa-file-text-o"></i> <span>Product Unit</span></a></li>


<li id="menu-academico" ><a href="product.php"><i class="lnr lnr-book"></i> <span>Products</span></a></li>			 

<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Area</span> <span class="fa fa-angle-right" style="float: right"></span></a>
	<ul id="menu-academico-sub" >
		<li id="menu-academico-avaliacoes" ><a href="city.php">City</a></li>
		<li id="menu-academico-avaliacoes" ><a href="area.php">Area</a></li>
	</ul>
</li>
<!--<li id="menu-academico" ><a href="offer.php"><i class="lnr lnr-book"></i> <span>Offer</span></a></li>-->
<li><a href="users.php"><i class="lnr lnr-chart-bars"></i> <span>User Deails</span></a></li>

<li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Sales</span> <span class="fa fa-angle-right" style="float: right"></span></a>
	<ul id="menu-academico-sub" >
		<li id="menu-academico-avaliacoes" ><a href="sales_master.php">Sales Master</a></li>
		<li id="menu-academico-boletim" ><a href="sales_details.php">Sales Details</a></li>
	</ul>
</li>
<li><a href="sales_ret.php"><i class="lnr lnr-layers"></i> <span>Sales Return</span></a></li>

<li><a href="payment.php"><i class="lnr lnr-envelope"></i> <span>Payment</span></a></li>

<li><a href="wish.php"><i class="lnr lnr-envelope"></i> <span>Wishlist</span></a></li>

<li><a href="feedback.php"><i class="lnr lnr-envelope"></i> <span>Feedback</span></a></li>

<li><a href="complaint.php"><i class="lnr lnr-pencil"></i> <span>Complaints</span></a></li>

<!--<li><a href="logout.php"><i class="lnr lnr-chart-bars"></i> <span>Logout</span></a></li>-->
									
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
<!--main-->			
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"></script>
<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
<script src="js/jquery.fn.gantt.js"></script>
<script src="js/menu_jquery.js"></script>
</body>
</html>
						
			