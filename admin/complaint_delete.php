<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from complaint where complaint_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Row deleted succesfully.');
			window.location.href='complaint.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected row is related in other table.');
			window.location.href='complaint.php';</script>";
	}
}
else
{
	header("location:complaint.php");
}
?>