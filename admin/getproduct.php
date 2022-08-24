<?php
error_reporting();
include 'include/connection.php';
$id=$_GET["cid"];
$db1=mysqli_query($con,"select * from product_details p,SubCategory s  where p.SubCategory_id=s.SubCategory_id and p.SubCategory_id='$id'");
?>
<?php
$sp=mysqli_query($con,"select *from product_details where SubCategory_id='$id'");
$np=mysqli_num_rows($sp);
if($id > 0)
{
	echo "<h3>Total number of products are $np.</h3>";
}
else
{
	$sp1=mysqli_query($con,"select *from product_details");
	$np1=mysqli_num_rows($sp1);
	echo "<h3>Total number of products are $np1.</h3>";
	exit;
}
?>	
  <table class="table table-condensed">
    <thead>
      <tr>
    <th>Product Id</th>
    <th>Product Name</th>
	<th>Product Date</th>
	<th>Product Price</th>
      </tr>
    </thead>
  <?php
  while($row=mysqli_fetch_array($db1))
  {
  ?>
	
    <tbody>
      <tr>
      	<td><?php echo $row["Product_id"];?></td>
		<td><?php echo $row["Product_name"];?></td>
		<td><?php echo date("d-m-Y",strtotime($row["Product_date"]));?></td>
		<td><?php echo $row["Product_price"];?></td>
    </tr>
    </tbody>
  <?php
  }
   ?>	
  </table>
