<?php
	error_reporting();
	include 'include/connection.php';
?>

			<?php
				include 'include/header.php';
			?>
			<div class="content">
					<div class="monthly-grid">
					 
						<div class="panel panel-widget">
<center><h3 style="color:#333333;"> Shipping Details: </h3> </center><br />
<?php
$start=0; // limit=1,2;
$limit=10; // limit=2,2;
$t=mysqli_query($con,"select * from shipping_details");
$total=mysqli_num_rows($t);
if(isset($_GET['id']))
{
	$id=$_GET['id'];	//$start=2*1;
	$start=($id-1)*$limit;	//$start=2;
}
else
{
	$id=1;
}
$page=ceil($total/$limit);

$db=mysqli_query($con,"select *from Shipping_details s,order_details o,city_details c,registration r where s.OrderDetail_id=o.OrderDetail_id and s.City_id=c.City_id and r.User_id=o.User_id order by Shipping_id limit $start,$limit");
$rc=mysqli_num_rows($db);
?>
<table border="1" align="center" class="table">
  <tr>
    <th>Shipping Id</th>
    <th>Invoice No</th>
	<th>Customer Name</th>
    <th>Shipping Date</th>
	<th>Mobile No</th>
	<th>Address</th>
	<th>City Name</th>
	<th>Pincode</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
      	<td><?php echo $row["Shipping_id"];?></td>
      	<td><?php echo $row["Invoice_no"];?></td>
      	<td><?php echo $row["Name"];?></td>
		<td><?php echo date("d-m-Y", strtotime($row["Shipping_date"]));?></td>
		<td><?php echo $row["Phone_no"];?></td>
	  	<td><?php echo $row["Address"];?></td>
		<td><?php echo $row["City_name"];?></td>
		<td><?php echo $row["Pincode"];?></td>
	  	<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='Shipping_delete.php?x=<?php echo $row["Shipping_id"];?>'>Delete</a></td>
  </tr>
  <?php
  }
   ?>
</table>
<br /><center>
  <ul class="pagination">
	 <?php if($id > 1) {?> <li><a href="?id=<?php echo ($id-1) ?>">Previous</a></li><?php }?>
	 <?php
	 for($i=1;$i <= $page;$i++){
	 ?>
		<li><a href="?id=<?php echo $i ?>"><?php echo $i;?></a></li>
	  <?php
	 }
	  ?>
	<?php if($id!=$page) //3!=4
	{?> 
	  <li><a href="?id=<?php echo ($id+1); ?>">Next</a></li>
	<?php }?>
 </ul>

							<div class="panel-body">
								<div class="contain">	
									<div class="gantt"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="content-top">
				<div class="area">
			<?php
				include_once 'include/footer.php';
			?>			
			</div>
		</div>
</div>
			<?php
				include_once 'include/slidebar.php';
			?>
							