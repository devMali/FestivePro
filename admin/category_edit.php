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
<center><h3 style="color:#333333">Update Category:</h3></center><br>
							<div class="panel-title">
<?php
	$id=$_GET["x"];
	$db=mysqli_query($con,"select * from category where cat_id='$id'");
	$rc=mysqli_num_rows($db);
	$row=mysqli_fetch_array($db);
?>

<div align="center">
<form action="category_update" method="post">
<table>
	<tr>
		<td> Category: </td>
		<input type="hidden" name="r0" value='<?php echo $row["cat_id"];?>' />
		<td>	<input type="text" name="r1" value='<?php echo $row["cat_name"];?>' />	</td>
	</tr>
	<tr>
		<td colspan="2"> <input type="submit" name="submit" value="Update" />
		<a href="category"><input type="button" value="Cancel" /></a> </td>
	</tr>
</table>
</form>

</div>
<br><br>
							</div>
							<center><h3 style="color:#333333"> All Categories: </h3></center><br>
<?php
$id=$_GET["x"];
$db=mysqli_query($con,"select * from category order by cat_id");
$rc=mysqli_num_rows($db);
?>

<table border="1" align="center">
  <tr>
    <th>Category Id</th>
    <th>Category Name</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
    <td><?php echo $row["cat_id"];?></td>
		<td><?php echo $row["cat_name"];?></td>
		<td><a onclick='javascript:confirmationUpdate($(this));return false;' 
			href='category_edit.php?x=<?php echo $row["cat_id"];?>'>Edit</a></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;'  
		href='category_delete.php?x=<?php echo $row["cat_id"];?>'>Delete</a></td>
  </tr>
  <?php
  }
   ?>
</table>
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
