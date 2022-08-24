<?php
	error_reporting();
	include 'include/connection.php';
?>

			<?php
				include_once 'include/header.php';
			?>
			<div class="content">
					<div class="monthly-grid">
					 
						<div class="panel panel-widget">
<center><h3 style="color:#333333">Insert Offer:</h3></center><br>
							<div class="panel-title">
							 
<form action="offer_add" method="post">
<table align="center">
	<tr>
		<td>Description: </td>
		<td><input type="text" name="r1" autofocus required="" /></td>	
	</tr>
	<tr>
		<td>Start Date: </td>
		<td><input type="date" name="r2" autofocus required="" /></td>	
	</tr>
	<tr>
		<td>End Date: </td>
		<td><input type="date" name="r3" autofocus required="" /></td>	
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Insert" /></td>
	</tr>
</table>	
</form>

<br><br>
							</div>
<center><h3 style="color:#333333;"> All Offers: </h3> </center><br />
<?php
$db=mysqli_query($con,"select *from offer");
$rc=mysqli_num_rows($db);
  ?>
<table border="1" align="center">
  <tr>
    <th>Offer Id</th>
    <th>Description</th>
	<th>Start Date</th>
    <th>End Date</th>
    <th>Edit</th>
	<th>Delete</th>
  </tr>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
  <tr>
    <td><?php echo $row["offer_id"];?></td>
		<td><?php echo $row["description"];?></td>
        <td><?php echo date("d-m-Y", strtotime($row["start_date"]));?></td>
        <td><?php echo date("d-m-Y", strtotime($row["end_date"]));?></td>
		<td><a onclick='javascript:confirmationUpdate($(this));return false;'
			href='offer_edit.php?x=<?php echo $row["offer_id"];?>'>Edit</a></td>
		<td><a onclick='javascript:confirmationDelete($(this));return false;' 
			href='offer_delete.php?x=<?php echo $row["offer_id"];?>'>Delete</a></td>
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

