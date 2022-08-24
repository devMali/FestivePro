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
<center><h3 style="color:#333333;"> Users Complaints: </h3> </center><br />
<?php
$start=0; // limit=1,2;
$limit=10; // limit=2,2;
$t=mysqli_query($con,"select * from complaint");
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

$db=mysqli_query($con,"select *from complaint order by complaint_id limit $start,$limit");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table">
  <tr>
    <th>Complaint id</th>
	<th>Name</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Date</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
    <td><?php echo $row["complaint_id"];?></td>
	<td><?php echo $row["username"];?></td>
		<td><?php echo $row["Email"];?></td>
		<td><?php echo $row["subject"];?></td>
		<td><?php echo $row["message"];?></td>
		<td><?php echo date("d-m-Y ",strtotime($row["date"]));?></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='complaint_delete.php?x=<?php echo $row["complaint_id"];?>'>Delete</a></td>
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
							