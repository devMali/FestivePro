<?php
	error_reporting();
	include 'include/connection.php';
	$db=mysqli_query($con,"select *from sales");
?>

			<?php
				include 'include/header.php';
			?>
			<div class="content">
					<div class="monthly-grid">
					 
						<div class="panel panel-widget">
<center><h3 style="color:#333333;"> Sales Return Details: </h3> </center><br />
<?php
$start=0; // limit=1,2;
$limit=10; // limit=2,2;
$t=mysqli_query($con,"select * from sales_return");
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

//$db=mysqli_query($con,"select *from sales o,user r where o.username=r.username order by sales_id limit $start,$limit");
$db=mysqli_query($con,"select * from sales_return sr,sales_return_details srd where sr.sal_ret_id=srd.sal_ret_id limit $start,$limit") or die(mysqli_error($con));
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table">
  <tr>
  	<th>Sales Return Id</th>
	<th>Invoice No</th>
	<th>Date</th>
    <th>Product name</th>
    <th>Quantity</th>
	<th>Reason</th>
    <th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
      
	  $pro_id=$row['pro_id'];
      $db1="select * from product where pro_id='$pro_id'";
      $db_run=mysqli_query($con,$db1);
      while($row1=mysqli_fetch_array($db_run))
      {
        $pro_name=$row1['pro_name'];
      }
      
  ?>
  <tr>
      	<td><?php echo $row["sal_ret_id"];?></td>
		<td><?php echo $row["sales_id"]; ?></td>
		<td><?php echo $row["srDate"];?></td>
		<td><?php echo $pro_name;?></td>
		<td><?php echo $row["qty"];?></td>
        <td><?php echo $row["reason"];?></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='sales_return_delete.php?x=<?php echo $row["sal_ret_id"];?>'>Delete</a></td>
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
							