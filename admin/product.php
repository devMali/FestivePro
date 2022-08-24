<?php
	error_reporting();
	include 'include/connection.php';
	$db0=mysqli_query($con,"select * from subcategory");
	$db1=mysqli_query($con,"select * from unit");
?>

			<?php
				include_once 'include/header.php';
			?>
			<div class="content">
					<div class="monthly-grid">
					 
						<div class="panel panel-widget">
<center><h3 style="color:#333333">Insert Product:</h3></center><br>
							<div class="panel-title">
							 
<form action="product_add" method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
		<td>Product: </td>
		<td><input type="text" name="r1" autofocus required="" /></td>	
	</tr>
	<tr>
		<td>Description:</td>
		<td><textarea name="r2" rows="7" required=""></textarea></td>
	</tr>
	<tr>
		<td>Product Unit: </td>
		<td><select name="r3" placeholder="select Unit">
		<?php
			while($row1=mysqli_fetch_array($db1))
			{
		?>
				<option value='<?php echo $row1["unit_id"]; ?>'><?php echo $row1["unit_name"];?></option>
			<?php
			}
		?>
		
	</select></td>	
	</tr>
	<tr>
		<td>SubCategory: </td>
		<td><select name="r4" placeholder="select SubCategory">
		<?php
			while($row0=mysqli_fetch_array($db0))
			{
		?>
				<option value='<?php echo $row0["sub_id"]; ?>'><?php echo $row0["sub_name"];?></option>
			<?php
			}
		?>
		
	</select></td>	
	</tr>
	<tr>
		<td>Product Price: </td>
		<td><input type="number" name="r5" required="" /></td>	
	</tr>
	<tr>
		<td>Image:</td>
		<td><input type="file" class="form-control" name="r6"  accept=".jpg, .jpeg, .png" required /></td>
	</tr>
	<tr>
		<td>Product Quantity: </td>
		<td><input type="number" name="r7" required="" /></td>	
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Insert" /></td>
	</tr>
</table>	
</form>

<br><br>
							</div>
<center><h3 style="color:#333333;"> All Products: </h3> </center><br />
<?php
$start=0; // limit=1,2;
$limit=5; // limit=2,2;
$t=mysqli_query($con,"select * from product");
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

$db=mysqli_query($con,"select * from product p,subcategory s,unit pu where p.sub_id=s.sub_id and p.unit_id=pu.unit_id order by pro_id limit $start,$limit");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center" class="table" style="table-layout:auto;">
  <tr>
    <th>Product Id</th>
    <th>Product Name</th>
	<th>Description</th>
	<th>Product Unit</th>
	<th>SubCategory</th>
	<th>Product Price</th>
	<th>Image</th>
    <th>Stock</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
	$pro_id=$row['pro_id'];
  ?>
  <tr>
    	<td><?php echo $row["pro_id"];?></td>
		<td><?php echo $row["pro_name"];?></td>
		<td><?php echo $row["pro_desc"];?></td>
		<td><?php echo $row["unit_name"];?></td>
		<td><?php echo $row["sub_name"];?></td>
		<td><?php echo $row["pro_price"];?></td>

		<?php 
		$get_pic="select * from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic) or die(mysqli_error($con));

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
				//echo"<script>alert('$pro_im');</script>";
			}
			
		echo"<td><img src='../images/$pro_im' width='100' height='100' alt='Not Available'/> </td>"
		?>
		<td><?php echo $row["stock"];?></td>
		
		
		<td><a onclick='javascript:confirmationUpdate($(this));return false;'
			href='product_edit.php?x=<?php echo $row["pro_id"];?>'>Edit</a></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='product_delete.php?x=<?php echo $row["pro_id"];?>'>Delete</a></td>
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
							