<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
$id=$_POST["r0"];
$sna=$_POST["r1"];
$cna=$_POST["r2"];

$db=mysqli_query($con,"update area set area_name='$sna',city_id='$cna' where area_id='$id'");
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Area updated succesfully.');
			window.location.href='area.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='area.php';</script>";
	}
}
else
{
	header("location:area.php");
}
?>