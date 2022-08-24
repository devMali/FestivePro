<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from subcategory where sub_id='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Subcategory deleted succesfully.');
			window.location.href='subcategory.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected subcategory is related in other table.');
			window.location.href='subcategory.php';</script>";
	}
}
else
{
	header("location:subcategory.php");
}
?>