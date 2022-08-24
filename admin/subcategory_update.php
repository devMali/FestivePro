<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
$id=$_POST["r0"];
$sna=$_POST["r1"];
$cna=$_POST["r2"];

$db=mysqli_query($con,"update subcategory set sub_name='$sna',cat_id='$cna' where sub_id='$id'");
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Subcategory updated succesfully.');
			window.location.href='subcategory.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='subcategory.php';</script>";
	}
}
else
{
	header("location:subcategory.php");
}
?>