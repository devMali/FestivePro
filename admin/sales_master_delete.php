<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from sales_details where sales_id='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Row deleted succesfully.');
			window.location.href='sales_master.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected row is related in other table.');
			window.location.href='sales_master.php';</script>";
	}
}
else
{
	header("location:sales_master.php");
}
?>