<?php
	error_reporting();
	include 'include/connection.php';
	$db=mysqli_query($con,"select * from category");
?>

			<?php
				include_once 'include/header.php';
			?>
			<div class="content">
					<div class="monthly-grid">
					 
						<div class="panel panel-widget">
<center><h3 style="color:#333333">Insert SubCategory:</h3></center><br>
							<div class="panel-title">
							 
<form action="subcategory_add" method="post">
<table align="center">
	<tr>
		<td>SubCategory: </td>
		<td><input type="text" name="r1" pattern="[A-Za-z ]{2,20}" autofocus required=""  /></td>	
	</tr>
	<tr>
		<td>Category: </td>
		<td><select name="r2" placeholder="select Category">
		<?php
			while($row=mysqli_fetch_array($db))
			{
		?>
				<option value='<?php echo $row["cat_id"]; ?>'><?php echo $row["cat_name"];?></option>
			<?php
			}
		?>
		
	</select></td>	
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Insert" /></td>
	</tr>
</table>	
</form>

<br><br>
							</div>
<center><h3 style="color:#333333;"> All SubCategories: </h3> </center><br />
<?php
$db=mysqli_query($con,"select *from subcategory s,category c where s.cat_id=c.cat_id order by sub_id");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center">
  <tr>
    <th>SubCategory Id</th>
    <th>SubCategory Name</th>
	<th>Category Name</th>
	<th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
    <td><?php echo $row["sub_id"];?></td>
		<td><?php echo $row["sub_name"];?></td>
		<td><?php echo $row["cat_name"];?></td>
		<td><a onclick='javascript:confirmationUpdate($(this));return false;'
			href='subcategory_edit.php?x=<?php echo $row["sub_id"];?>'>Edit</a></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='subcategory_delete.php?x=<?php echo $row["sub_id"];?>'>Delete</a></td>
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
							