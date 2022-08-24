<?php
error_reporting();
include 'include/connection.php';

 $to=$_GET["to"];
 $from=$_GET["from"];
 
$db=mysqli_query($con,"select *from order_master o,registration r,Product_details p where o.User_id=r.User_id and o.Product_id=p.Product_id and Order_date between '$to' and '$from' order by Order_date DESC");
$nr=mysqli_num_rows($db);
echo "<h3>Orders from ".date('d-m-Y',strtotime($to))." to ". date('d-m-Y',strtotime($from)).
" are $nr.</h3>";
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
