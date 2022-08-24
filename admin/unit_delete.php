<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from unit where unit_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Unit deleted succesfully.');
			window.location.href='unit.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected unit is related in other table.');
			window.location.href='unit.php';</script>";
	}
}
else
{
	header("location:unit.php");
}
?>