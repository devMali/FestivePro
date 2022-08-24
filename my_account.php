
	<!-- header-section-starts -->
	<?php
		include 'include/header.php';
		include 'include/connection.php';		
	?>
	<!-- header-section-ends -->

		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
<link href="include/table.css" rel="stylesheet" style="text/css">
			
				<div class="products-grid">
				<header>
					<h3 class="head text-center"></h3><br />
				</header>
<!--getproductsfunction-->
<style type="text/css">
a.am:hover{
	padding:1px;
	text-decoration:underline;
}
</style>
<?php
	if(isset($_SESSION['client']['status']))
	{
		$c=user();
	?>
<form method="post" enctype="multipart/form-data">
	<table width="100%" style="width:20%; float:left;">
		<tr align="center">
			<th>Manage Account</th>
		</tr>
		
		<tr align="center">
			<td><a href="my_account.php?my_orders" class="am">My Orders</a></td>
		</tr>
		<tr align="center">
			<td><a href="my_account.php?ret_orders" class="am">Return Orders</a></td>
		</tr>
		<tr align="center">
			<td><a href="my_account.php?edit_account" class="am">Edit Account</a></td>
		</tr>
		<tr align="center">
			<td><a href="my_account.php?change_pass" class="am">Change Password</a></td>
		</tr>
		<tr align="center">
			<td><a href="my_account.php?delete_account" class="am">Delete Account</a></td>
		</tr>
		<tr align="center">
			<td><a href="my_account.php?My_Wishlist" class="am">My Wishlist</a></td>
		</tr>
		<tr align="center">
			<td><a href="logout.php" class="am">Logout</a></td>
		</tr>
	</table>
</form>
<?php
}
?>			
				<header>
					<h3 class="head text-center">Manage your Account</h3>
				</header>

<div class="new-product" style="background-color:#f5f5f5; min-height:500px;">				
<style type="text/css">
h1,h2,h3{
	font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
}
</style>
		<?php getDefault(); ?>						
<?php


if(isset($_GET['my_orders']))
{
	include 'my_orders.php';
}
if(isset($_GET['ret_orders']))
{
	include 'ret_orders.php';
//	echo"<script>Window.open('ret_orders.php?c=$c','_self');</script>";

}
if(isset($_GET['edit_account']))
{
	include 'edit_account.php';
}
if(isset($_GET['change_pass']))
{
	include 'change_pass.php';
}
if(isset($_GET['delete_account']))
{
	include 'delete_account.php';
}
if(isset($_GET['My_Wishlist']))
{
	include 'MyWishlist.php';
}
?>

</div>
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