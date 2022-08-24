<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from area where area_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Area deleted succesfully.');
			window.location.href='area.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected area is related in other table.');
			window.location.href='area.php';</script>";
	}
}
else
{
	header("location:area.php");
}
?>