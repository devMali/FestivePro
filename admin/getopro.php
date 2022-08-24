<?php
error_reporting();
include 'include/connection.php';
$id=$_GET["oproid"];
$db=mysqli_query($con,"select *from order_master o,registration r,Product_details p where o.User_id=r.User_id and o.Product_id=p.Product_id and o.Product_id='$id'");
?>
<?php
$sp=mysqli_query($con,"select *from order_master where Product_id='$id'");
$np=mysqli_num_rows($sp);
if($id > 0)
{
	echo "<h3>Total orders on product are $np.</h3>";
}
else
{
	$sp1=mysqli_query($con,"select *from order_master");
	$np1=mysqli_num_rows($sp1);
	echo "<h3>Total orders on products are $np1.</h3>";
	exit;
}
?>	
  <table class="table table-condensed">
    <thead>
      <tr>
    <th>Order Id</th>
	<th>Order Date</th>
    <th>Customer Name</th>
	<th>Invoice No</th>
	<th>Product Name</th>
	<th>Quantity</th>
      </tr>
    </thead>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
	
    <tbody>
      <tr>
      	<td><?php echo $row["Order_id"];?></td>
		<td><?php echo date("d-m-Y", strtotime($row["Order_date"]));?></td>
		<td><?php echo $row["User_name"];?></td>
		<td><?php echo $row["Invoice_no"];?></td>
		<td><?php echo $row["Product_name"];?></td>
		<td><?php echo $row["Quantity"];?></td>
    </tr>
    </tbody>
  <?php
  }
   ?>	
  </table>
