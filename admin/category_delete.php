<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{	
$id=$_GET["x"];

$db=mysqli_query($con,"delete from category where cat_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Category deleted succesfully.');
			window.location.href='category.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected category is related in other table.');
			window.location.href='category.php';</script>";
	}
}
else
{
	header("location:category.php");
}
?>