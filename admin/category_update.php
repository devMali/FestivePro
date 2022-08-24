<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
$id=$_POST["r0"];
$cna=$_POST["r1"];

$db=mysqli_query($con,"update category set cat_name='$cna' where cat_id='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Category updated succesfully.');
			window.location.href='category.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='category.php';</script>";
	}
}
else
{
	header("location:category.php");
}
?>