<?php
error_reporting();
include 'include/connection.php';
$id=$_GET["oid"];
$db=mysqli_query($con,"select * from payment_details p,Shipping_details s,Order_details od where p.Shipping_id=s.Shipping_id and s.OrderDetail_id=od.OrderDetail_id and p.Payment_status='$id'");
?>
<?php
$sp=mysqli_query($con,"select *from Payment_details where Payment_status='$id'");
$np=mysqli_num_rows($sp);
?>	
<?php
if($id=='Pending')
{
	echo "<h3>Total Pending orders are $np.</h3>";
}
else if($id=='Complete')
{
	echo "<h3>Total Complete orders are $np.</h3>";
}
else
{
$sp1=mysqli_query($con,"select *from Payment_details");
$np1=mysqli_num_rows($sp1);
echo "<h3>Total orders from customers are $np1.</h3>";
exit;
}
?>
  <table class="table table-condensed">
    <thead>
      <tr>
			<th>Order Id</th>
			<th>Due Amount</th>
			<th>Invoice No</th>
			<th>Total Products</th>
			<th>Order Date</th>
			<th>Order Status</th>
      </tr>
    </thead>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
	
    <tbody>
      <tr>
      	<td><?php echo $row["OrderDetail_id"];?></td>
		<td><?php echo $row["Due_amount"];?></td>
		<td><?php echo $row["Invoice_no"];?></td>
		<td><?php echo $row["Total_products"];?></td>
		<td><?php echo date("d-m-Y",strtotime($row["Order_date"]));?></td>
		<td><?php echo $row["Payment_status"];?></td>
    </tr>
    </tbody>
  <?php
  }
   ?>	
  </table>
