<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from image where pro_id='$id'");
$db=mysqli_query($con,"delete from product where pro_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Product deleted succesfully.');
			window.location.href='product.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected product is related in other table.');
			window.location.href='product.php';</script>";
	}
}
else
{
	header("location:product.php");
}
?>