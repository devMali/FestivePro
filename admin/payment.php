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
<center><h3 style="color:#333333;"> Payment Details: </h3> </center><br />
<?php
$start=0; // limit=1,2;
$limit=10; // limit=2,2;
$t=mysqli_query($con,"select * from payment_details");
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

//$db=mysqli_query($con,"select * from payment_details p,sales_details o,user r
 //where p.username=r.username and p.sales_id=o.sales_id order by pay_id limit $start,$limit");
 $db=mysqli_query($con,"select * from payment_details order by pay_id limit $start,$limit");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table">
  <tr>
    <th>Payment Id</th>
	<th>Username</th>
	<th>Invoice No</th>
	<th>Payment Date</th>
	<th>Payment Method</th>
	<th>Payment Status</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
      	<td><?php echo $row["pay_id"];?></td>
		<td><?php echo $row["username"];?></td>
		<td><?php echo $row["sales_id"];?></td>
		<td><?php echo date("d-m-Y", strtotime($row["pay_date"]));?></td>
		
	  	<td><?php echo $row["pay_method"];?></td>
	  	<td><?php echo $row["pay_status"];?></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='payment_delete.php?x=<?php echo $row["pay_id"];?>'>Delete</a></td>
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
							