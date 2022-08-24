<?php
error_reporting();
include 'include/connection.php';
$id=$_GET["uid"];
$db=mysqli_query($con,"select *from registration r,city_details c where r.City_id=c.City_id and r.City_id='$id'");
?>
<?php
$sp=mysqli_query($con,"select *from registration where City_id='$id'");
$np=mysqli_num_rows($sp);
if($id > 0)
{
	echo "<h3>Total number of customers are $np.</h3>";
}
else
{
	$sp1=mysqli_query($con,"select *from registration");
	$np1=mysqli_num_rows($sp1);
	echo "<h3>Total number of customers are $np1.</h3>";
	exit;}
?>	
  <table class="table table-condensed">
    <thead>
      <tr>
    <th>Customer Id</th>
    <th>Customer Name</th>
    <th>Address</th>
    <th>City Name</th>
    <th>Mobile no</th>
      </tr>
    </thead>
  <?php
  while($row=mysqli_fetch_array($db))
  {
  ?>
	
    <tbody>
      <tr>
	    <td><?php echo $row["User_id"];?></td>
		<td><?php echo $row["User_name"];?></td>
		<td><?php echo $row["Address"];?></td>
		<td><?php echo $row["City_name"];?></td>
		<td><?php echo $row["Phone_no"];?></td>
    </tr>
    </tbody>
  <?php
  }
   ?>	
  </table>
